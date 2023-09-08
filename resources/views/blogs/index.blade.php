@extends('layouts.app')

@section('title', 'Blog Posts')

@section('content_header')
    <h1>Blog Posts</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Blog List</h3>
                    @can('publish post')
                        <div class="card-tools">
                            <a href="{{ route('blogs.create') }}" class="btn btn-primary">Add Post</a>
                        </div>
                    @endcan
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Text</th>
                                <th>Author</th>
                                <th>View count</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->text }}</td>
                                    <td>{{ $post->author->first_name }} {{ $post->author->last_name }}</td>
                                    <td>{{ $post->views }}</td>
                                    <td>{{ $post->created_at }}</td>
                                    <td>{{ $post->updated_at }}</td>
                                    <td>


                                        @can('edit post')
                                            <a href="{{ route('blogs.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                                        @endcan
                                        @can('delete post')
                                            <form action="{{ route('blogs.destroy', $post->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                                            </form>
                                        @endcan

                                        @can('view comment')
                                            <a href="{{ route('blogs.show', $post->id) }}" class="btn btn-primary">View</a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <!-- Display pagination links -->
                    {{-- {{ $posts->links() }} --}}

                    <div class="d-flex justify-content-center mt-4">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
