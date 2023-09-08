@extends('layouts.app')

@section('content')
    <div class="content-header">
        <h1>Edit Blog Post</h1>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('blogs.update', $blog->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title"
                                        class="form-control  @error('title') is-invalid @enderror"
                                        value="{{ $blog->title }}">
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="text">Text</label>
                                    <textarea name="text" id="text" class="form-control">{{ $blog->text }}</textarea>
                                </div>

                                @error('text')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <button type="submit" class="btn btn-primary">Update Post</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
