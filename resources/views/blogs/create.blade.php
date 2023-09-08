@extends('layouts.app')

@section('title', 'Create Blog Post')

@section('content_header')
    <h1>Create Blog Post</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('blogs.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="title">title</label>
                            <input type="title" name="title" id="title"
                                class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="text">Text</label>
                            <textarea id="text" name="text" class="form-control">{{ old('text') }}</textarea>
                        </div>

                        <!-- Display the error message for the textarea -->
                        @error('text')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror


                        <button type="submit" class="btn btn-primary">Create Blog Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
