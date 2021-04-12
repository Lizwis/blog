@extends('layouts.app')
@section('content')
    <div class="col-lg-12 pt-0 mt-0">
        <div class="row">
            <div class="col-12 px-0">
                <div class="col-12  pt-5 overlay" style="background-image: url(/{{ $post->image }}); height:400px;">
                    <div class="layer">
                        <div class="container">
                            <div class="col-12 py-4 text-white">
                                <div class="font-weight-bold text-white" style="font-size:30px">
                                    <strong> {{ $post->title }}</strong>
                                </div>
                                <div class="pt-2"> Written By : <span class="badge badge-warning">
                                        {{ $post->user->name }}</span> <span class="badge badge-success">
                                        {{ $post->created_at->format('d M Y') }}</span>
                                </div>
                            </div>
                            <div class="col-7  rounded-bottom shadow bg-white mr-auto rounded-top mt-5 pb-5">
                                <div class="font-weight-bold pt-4" style="font-size:30px">
                                    <strong> {{ $post->title }}</strong>
                                </div>
                                <div class="pt-4">
                                    {{ $post->post }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
