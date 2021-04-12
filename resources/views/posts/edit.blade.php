@extends('layouts.app')
@section('content')
    <div class="container col-8 pt-4 mt-4 shadow">
        <form method="post" action="/post/update/{{ $post->id }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">Post Title</label>
                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                name="title" value="{{ $post->title }}" autocomplete="title" autofocus>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-group row">
                        <label for="post" class="col-md-4 col-form-label text-md-right">Post</label>
                        <div class="col-md-6">
                            <textarea rows="6" class="form-control @error('post') is-invalid @enderror" name="post"
                                autocomplete="post" autofocus>{{ $post->post }}</textarea>
                            @error('post')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="col-md-5 mx-auto pl-5 pb-2">
                        <img src="/{{ $post->image }}" class="rounded-circle shadow" height="150px" width="150px">
                    </div>
                    <div class="form-group row">

                        <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>
                        <div class="col-md-6">
                            <input type="file" class="form-control-file" id="image" name="image" />
                            @error('image')
                                <strong class="text-danger" style="font-size: 13px">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group row">
                        <label for="image" class="col-md-4 col-form-label text-md-right"></label>

                        <div class="col-6">
                            <button type="submit" class="btn btn-success btn-block">Update Post</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
