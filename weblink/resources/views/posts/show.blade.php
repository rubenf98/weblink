@extends('welcome')

@section('content')
<link rel="stylesheet" href="/css/post.css">

<script language="javascript">
    function like() {
        var image =  document.getElementById("imageOne");
        
        var url = $(location).attr('href'), divisions = url.split("/"), post_id = divisions[divisions.length-1];           
            
    $.ajax({
        type: 'post',
        url: '/post/like/'+post_id,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },

        success: function (data) {
            if (image.getAttribute('src') == "/icons/heart-filled.svg") 
            {
                image.src = "/icons/heart-regular.svg";
            }
            else 
            {
                image.src = "/icons/heart-filled.svg";
            }            
        }
    });
};
</script>



<div class="post-container">

    <div class="post">
        <div class="post-image">
            @forelse ($post->post_img as $img)
            @if ($loop->first)
            <img class="image" src={{ $img->url}} alt="" srcset="">
            @endif
            @empty
            <img class="image" src="/default.png" alt="" srcset="">
            @endforelse
        </div>


        <div class="post-content">
            <h1>{{$post->title}}</h1>

            <br>

            <b> <i class="fas fa-paragraph"></i> Description</b>
            <p>{{$post->description}}</p>

            <b> <i class="fas fa-tags"></i> Tags</b>
            <div class="info">
                <p>
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

            <div class="user">
                <div class="user-name">
                    <b> <i class="fas fa-user"></i> Creator</b>
                    <p> {{$post->user->name}} <a href="/#"><i class="fas fa-external-link-square-alt"></i></a></p>
                </div>
                <div class="user-rating">
                    <b> <i class="fas fa-plus-square"></i> Created at</b>
                    <p>{{$post->created_at}}</p>
                </div>
            </div>

            <div class="user">
                <div class="user-name">
                    <div>
                        <b> <i class="fas fa-code"></i> Source </b>
                        @if ($post->source)
                        <p><a href={{$post->source}} target="_blank">{{$post->source}}</a></p>
                        @else
                        <p>No code provided</p>
                        @endif
                    </div>
                </div>
                <div class="user-rating">
                    <b> <i class="fas fa-pen"></i> Updated at</b>
                    @if ($post->updated_at)
                    <p>{{$post->updated_at}}</p>
                    @else
                    <p>{{$post->created_at}}</p>
                    @endif
                </div>

            </div>

            <div class="links">
                <a href={{$post->url}} target="_blank"><button>Visit</button></a>
            </div>
        </div>
        <div class="stats-container">
            <div class="stats">
                @if ($post->is_liked)
                <img src="/icons/heart-filled.svg" id="imageOne" onclick="like()" />
                @else
                <img src="/icons/heart-regular.svg" id="imageOne" onclick="like()" />
                @endif
                <span>{{$post->likes->count()}}</span>

                @if ($post->is_liked)
                <img src="/icons/heart-filled.svg" id="imageOne" onclick="like()" />
                @else
                <img src="/icons/heart-regular.svg" id="imageOne" onclick="like()" />
                @endif
                <span>{{$post->likes->count()}}</span>
            </div>

            <div>
                <span class="share">Share</span>
            </div>

        </div>

    </div>

    <hr>

    <h1>Comments</h1>

    <div>
        <form class="input-comment" action="/comment" method="POST">
            @csrf
            <input class="input" type="text" placeholder="Add a comment" name="content" id="">

            <select class="select-css" name="rating">
                <option value="1">Awfull</option>
                <option value="2">Bad</option>
                <option value="3">Medium</option>
                <option value="4">Good</option>
                <option value="5" selected="selected">Great</option>
            </select>
            @if ($errors->has('rating'))
            <div class="error">{{ $errors->first('rating') }}</div>
            @endif
            <input type="hidden" name="post_id" value={{Request::segment(2)}}>
            <button type="submit" class="button">Post</button>
        </form>
        @if ($errors->has('content'))
        <div class="error">{{ $errors->first('content') }}</div>
        @endif
    </div>


    <div class="comments">
        @forelse ($post->comment as $comment)

        <div class="comment">
            <div class="comment-user">
                <b>
                    <p>{{$comment->user->name}}</p>

                </b>
                {{$comment->created_at->diffForHumans()}}
            </div>

            <div class="comment-content">
                {{$comment->content}}
                {{$comment->rating}}
            </div>

            <i class="fas fa-arrow-circle-up"></i>
            <i class="fas fa-chevron-circle-down"></i>
            312
        </div>

        @empty

        <div class="no-data">
            <svg width="184" height="152" viewBox="0 0 184 152" xmlns="http://www.w3.org/2000/svg">
                <g fill="none" fill-rule="evenodd">
                    <g transform="translate(24 31.67)">
                        <ellipse fill-opacity=".8" fill="#F5F5F7" cx="67.797" cy="106.89" rx="67.797" ry="12.668">
                        </ellipse>
                        <path
                            d="M122.034 69.674L98.109 40.229c-1.148-1.386-2.826-2.225-4.593-2.225h-51.44c-1.766 0-3.444.839-4.592 2.225L13.56 69.674v15.383h108.475V69.674z"
                            fill="#AEB8C2"></path>
                        <path
                            d="M101.537 86.214L80.63 61.102c-1.001-1.207-2.507-1.867-4.048-1.867H31.724c-1.54 0-3.047.66-4.048 1.867L6.769 86.214v13.792h94.768V86.214z"
                            fill="url(#linearGradient-1)" transform="translate(13.56)"></path>
                        <path
                            d="M33.83 0h67.933a4 4 0 0 1 4 4v93.344a4 4 0 0 1-4 4H33.83a4 4 0 0 1-4-4V4a4 4 0 0 1 4-4z"
                            fill="#F5F5F7"></path>
                        <path
                            d="M42.678 9.953h50.237a2 2 0 0 1 2 2V36.91a2 2 0 0 1-2 2H42.678a2 2 0 0 1-2-2V11.953a2 2 0 0 1 2-2zM42.94 49.767h49.713a2.262 2.262 0 1 1 0 4.524H42.94a2.262 2.262 0 0 1 0-4.524zM42.94 61.53h49.713a2.262 2.262 0 1 1 0 4.525H42.94a2.262 2.262 0 0 1 0-4.525zM121.813 105.032c-.775 3.071-3.497 5.36-6.735 5.36H20.515c-3.238 0-5.96-2.29-6.734-5.36a7.309 7.309 0 0 1-.222-1.79V69.675h26.318c2.907 0 5.25 2.448 5.25 5.42v.04c0 2.971 2.37 5.37 5.277 5.37h34.785c2.907 0 5.277-2.421 5.277-5.393V75.1c0-2.972 2.343-5.426 5.25-5.426h26.318v33.569c0 .617-.077 1.216-.221 1.789z"
                            fill="#DCE0E6"></path>
                    </g>
                    <path
                        d="M149.121 33.292l-6.83 2.65a1 1 0 0 1-1.317-1.23l1.937-6.207c-2.589-2.944-4.109-6.534-4.109-10.408C138.802 8.102 148.92 0 161.402 0 173.881 0 184 8.102 184 18.097c0 9.995-10.118 18.097-22.599 18.097-4.528 0-8.744-1.066-12.28-2.902z"
                        fill="#DCE0E6"></path>
                    <g transform="translate(149.65 15.383)" fill="#FFF">
                        <ellipse cx="20.654" cy="3.167" rx="2.849" ry="2.815"></ellipse>
                        <path d="M5.698 5.63H0L2.898.704zM9.259.704h4.985V5.63H9.259z"></path>
                    </g>
                </g>
            </svg>
            <p>Be the first to comment</p>

        </div>

        @endforelse


    </div>

</div>

@endsection