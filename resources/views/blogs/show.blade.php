@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $blog->title }}</h3>
        </div>
        <div class="card-body">
            <p class="card-text">{{ $blog->text }}</p>
        </div>
        <div class="card-footer">
            <small class="text-muted">Published on {{ $blog->created_at }}</small>
        </div>
    </div>

    <div class="card">
        {{-- <div class="card-header">
            <h3 class="card-title">Comments</h3>
        </div> --}}
        {{-- @foreach ($blog->comments as $item)
            <div class="card-body">
                <p class="card-text">{{ $item->content }}</p>
                <small class="text-muted">Published on {{ $item->created_at }}</small>
                <button type="submit float-wright" class="btn btn-danger">delete comment</button>
            </div>
        @endforeach --}}

        {{-- @foreach ($blog->comments as $comment)
            <div class="comment">
                <i class="fa fa-user" aria-hidden="true"></i>
                <p>{{ $comment->user->first_name }} {{ $comment->user->last_name }}</p>
                <p>{{ $comment->content }}</p>
                <small class="text-muted">Published on {{ $comment->created_at }}</small>
                @if (auth()->user() &&
    auth()->user()->can('delete comment', $comment))
                    <form action="{{ route('comment.destroy', $comment) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Comment</button>
                    </form>
                @endif
            </div>
        @endforeach --}}



    </div>

    <div class="card direct-chat direct-chat-primary">
        <div class="card-header ui-sortable-handle" style="cursor: move;">
            <h3 class="card-title">Comments</h3>
        </div>

        <div class="card-body">
            <div class="direct-chat-messages">
                @foreach ($blog->comments as $comment)
                    <div class="direct-chat-msg @if ($comment->user->id == auth()->user()->id) right @endif">
                        <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-right">{{ $comment->user->first_name }}
                                {{ $comment->user->last_name }}</span>
                            <span class="direct-chat-timestamp float-left">{{ $comment->created_at }}</span>
                        </div>
                        <i class="fa fa-user direct-chat-img" aria-hidden="true"></i>
                        <div class="direct-chat-text">
                            {{ $comment->content }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>


        @can('comment post')
            <div class="card-footer">
                <form action="{{ route('comment.add', $blog) }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="content" name="content" id="content" placeholder="Type Message ..."
                            fdprocessedid="sk394w" class="form-control @error('content') is-invalid @enderror"
                            value="{{ old('content') }}">
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <span class="input-group-append">
                            <button type="submit" class="btn btn-primary" fdprocessedid="bay0w">Send</button>
                        </span>
                    </div>
                </form>
            </div>
        @endcan
    </div>
@endsection
