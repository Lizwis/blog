@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container col-lg-12 pt-3">
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-4">
                        <div class="col-12 rounded-top blog-post shadow"
                            style="background-image: url({{ $post->image }})">
                        </div>
                        <div class="col-12 rounded-bottom shadow">
                            <div class="font-weight-bold pt-4">
                                <a class="text-dark" href="/posts/show/{{ $post->id }}">
                                    <strong> {{ $post->title }}</strong>
                                </a>
                            </div>
                            <div class="pt-4">
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
            <div class="row">
                <div class="col-12 d-flex justify-content-center">{{ $posts->links() }}</div>
            </div>
        </div>
    </div>
@endsection
