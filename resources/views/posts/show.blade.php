@extends('layout')

@section('content')
@include('layout.button')

<div class="post-container">
    @php
    $upvotes = $post->likes->count()
    @endphp
    <div class="post">
        <div class="post-image">

            @if ($post->image)
            <img class="image" src={{ $post->image}}>
            @else
            <img class="image" src='/default.png'>
            @endif

            <div class="stats-container">
                <div class="stats">
                    @if ($post->is_liked)
                    <img src="/images/icons/heart-filled.svg" id="upvote-post" onclick="upvotePost()" />
                    @else
                    <img src="/images/icons/heart-regular.svg" id="upvote-post" onclick="upvotePost()" />
                    @endif
                    <span id="upvote">{{$upvotes}}</span>

                </div>
                <div>
                    <span class="share">Share</span>
                </div>
            </div>

        </div>


        <div class="post-content">

            <h1 class="hide">{{$post->title}}</h1>


            <p class="title hide"> <i class="fas fa-paragraph"></i> Description</p>
            <p class="description hide"> {{$post->description}}</p>


            <div class="post-description">
                <div class="item-left">
                    <p class="title"> <i class="fas fa-tags"></i> Tags</p>
                    <p class="description">
                        @forelse ($post->tag as $tag)
                        <span class="tag">{{ $tag->name}} </span>
                        @if(!$loop->last)
                        |
                        @endif
                        @empty
                        <span class="tag">No tags available </span>
                        @endforelse
                    </p>
                </div>
                <div class="item-right">
                    <p class="title"> <i class="fas fa-eye"></i> Views</p>
                    <p class="description"> {{$post->views}}</p>
                </div>
            </div>

            <div class="post-description">
                <div class="item-left">
                    <p class="title"> <i class="fas fa-user"></i> Creator</p>
                    <p class="description"> <a href={{'/user/'.$post->user->id}}
                            target="_blank">{{$post->user->name}}</a></p>
                </div>
                <div class="item-right">
                    <p class="title"> <i class="fas fa-plus-square"></i> Created at</p>
                    <p class="description"> {{$post->created_at->toFormattedDateString()}}</p>
                </div>
            </div>

            <div class="post-description">
                <div class="item-left">
                    <div>
                        <p class="title"> <i class="fas fa-code"></i> Source</p>

                        @if ($post->source)
                        <p class="description"> <a href={{$post->source}} target="_blank">{{$post->source}}</a></p>
                        @else
                        <p class="description"> No code provided</p>
                        @endif
                    </div>
                </div>
                <div class="item-right">
                    <p class="title"> <i class="fas fa-pen"></i> Updated at</p>
                    @if ($post->updated_at)
                    <p class="description"> {{$post->updated_at->toFormattedDateString()}}</p>
                    @else
                    <p class="description"> {{$post->created_at->toFormattedDateString()}}</p>
                    @endif
                </div>
            </div>

            <div class="hidden-container">
                <div class="show">
                    <h1>{{$post->title}}</h1>


                    <p class="title"> <i class="fas fa-paragraph"></i> Description</p>
                    <p class="description"> {{$post->description}}</p>
                </div>

                <div class="post-description-hidden">

                    <div class="hidden-item">
                        <p class="title"> <i class="fas fa-tags"></i> Tags</p>
                        <p class="description">
                            @forelse ($post->tag as $tag)
                            <span class="tag">{{ $tag->name}} </span>
                            @if(!$loop->last)
                            |
                            @endif
                            @empty
                            <span class="tag">No tags available </span>
                            @endforelse
                        </p>
                    </div>
                    <div class="hidden-item">
                        <p class="title"> <i class="fas fa-eye"></i> Views</p>
                        <p class="description"> {{$post->views}}</p>
                    </div>

                    <div class="hidden-item">
                        <p class="title"> <i class="fas fa-user"></i> Creator</p>
                        <p class="description"> <a href={{'/profile/'.$post->user->id}}
                                target="_blank">{{$post->user->name}}</a></p>
                    </div>


                    <div class="hidden-item">
                        <div>
                            <p class="title"> <i class="fas fa-code"></i> Source</p>

                            @if ($post->source)
                            <p class="description"> <a href={{$post->source}} target="_blank">{{$post->source}}</a></p>
                            @else
                            <p class="description"> No code provided</p>
                            @endif
                        </div>
                    </div>
                    <div class="hidden-item">
                        <p class="title"> <i class="fas fa-plus-square"></i> Created at</p>
                        <p class="description"> {{$post->created_at->toFormattedDateString()}}</p>
                    </div>
                    <div class="hidden-item">
                        <p class="title"> <i class="fas fa-pen"></i> Updated at</p>
                        @if ($post->updated_at)
                        <p class="description"> {{$post->updated_at->toFormattedDateString()}}</p>
                        @else
                        <p class="description"> {{$post->created_at->toFormattedDateString()}}</p>
                        @endif
                    </div>
                </div>
            </div>


            @if ($post->url)
            <div class="links">
                <a href={{$post->url}} target="_blank"><button>Visit</button></a>
            </div>

            @endif

        </div>

    </div>


    <div class="comments-container">
        <form class="input-comment" action="/comment" method="POST">
            @csrf
            <textarea maxlength="250" placeholder="Add a comment" name="content"></textarea>
            <input type="hidden" name="post_id" value={{Request::segment(2)}}>
            <button type="submit" class="button">Post</button>
            @if ($errors->has('content'))
            <div class="error">{{ $errors->first('content') }}</div>
            @endif
        </form>

        <div class="comments">
            <h1>{{$post->comment->count()}} Comments</h1>
            @forelse ($post->comment as $comment)
            <div class="comment">
                <div class="comment-user">
                    <img src="{{$comment->user->image}}">
                    <div class="comment-info">
                        <p class="comment-name">{{$comment->user->name}}</p>
                        <p class="comment-date">{{$comment->created_at->diffForHumans()}}</p>
                    </div>
                </div>

                <div class="comment-content">
                    <p>{{$comment->content}}</p>

                    <div class="comments-upvotes">
                        @if ($comment->is_liked)
                        <img class="comment-upvote" src="/images/icons/circle-up-filled.svg" id="upvote-arrow-{{$comment->id}}"
                            onclick="upvoteComment('{{$comment->id}}')" />
                        @else
                        <img class="comment-upvote" src="/images/icons/circle-up.svg" id="upvote-arrow-{{$comment->id}}"
                            onclick="upvoteComment('{{$comment->id}}')" />
                        @endif
                        <span id="comment-{{$comment->id}}">{{$comment->likes->count()}}</span>
                        <span id='comment-id' style="display:none">{{$comment->id}}</span>
                    </div>
                </div>
            </div>


            @empty

            <div class="no-data">
                <img src="/images/nodata.png">
                <p>Be the first to comment</p>
            </div>

            @endforelse
        </div>

    </div>

</div>
<script src="/js/post.js"></script>

@endsection