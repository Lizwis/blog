@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container col-lg-12 pt-3">
            <div class="row">
                @include('/includes/filter')
                @foreach ($posts as $post)
                    <div class="col-4 mb-4">
                        <div class="col-12 rounded-top blog-post shadow"
                            style="background-image: url({{ $post->image }})">
                            @if (Auth::user())
                                <div class="pt-2 row text-center col-12">
                                    @if (Auth::user()->id == $post->user_id)
                                        <a class="badge badge-warning mr-4" style="font-size: 14px"
                                            href="/post/edit/{{ $post->id }}">
                                            Edit
                                        </a>

                                        <a class="badge badge-success float-right" style="font-size: 14px"
                                            href="/post/delete/{{ $post->id }}">
                                            Delete
                                        </a>
                                    @endif
                                </div>
                            @endif
                        </div>

                        <div class="col-12 rounded-bottom shadow">
                            <div class="pt-4">
                                <ratepost post_id="{{ $post->id }}"></ratepost>
                            </div>
                            <div class="font-weight-bold pt-2">
                                <a class="text-dark" href="/posts/show/{{ $post->id }}">
                                    <strong> {{ mb_strimwidth($post->title, 0, 40, '...') }}</strong>
                                </a>
                            </div>
                            <div class="pt-2" style="min-height:100px">
                                {{ mb_strimwidth($post->post, 0, 100, '...') }}
                            </div>

                            <div class="py-4">
                                <a class="btn btn-success" href="/posts/show/{{ $post->id }}">
                                    Read More
                                </a>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">{!! $posts->links() !!}</div>
        </div>
    </div>
    </div>
@endsection
