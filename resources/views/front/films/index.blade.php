@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-10 col-sm-offset-1" id="logout">
        @forelse ($films as $film)
        <div class="container">
            <div class="card">
                <div class="container-fliud">
                    <div class="wrapper row">

                        <div class="preview col-md-6">

                            <img src="{{url($film->photo)}}" width="500px" />

                        </div>
                        <div class="details col-md-6">
                            <h3 class="product-title">{{ $film->name }}</h3>
                            <div class="rating">
                                <div class="stars">
                                    <span class="fa fa-star @if($film->rating >= 1) checked @endif"></span>
                                    <span class="fa fa-star @if($film->rating >= 2) checked @endif"></span>
                                    <span class="fa fa-star @if($film->rating >= 3) checked @endif"></span>
                                    <span class="fa fa-star @if($film->rating >= 4) checked @endif"></span>
                                    <span class="fa fa-star @if($film->rating >= 5) checked @endif"></span>
                                </div>
                            </div>
                            <p class="product-description">{{$film->description}}</p>
                            <h4 class="price">Ticket Price: <span>PKR {{ $film->ticket_price }}</span></h4>
                            <h4 class="price">Release Date: <span>{{ $film->release_date }}</span></h4>

                        </div>


                    </div>

                </div>
                @if ($films->hasPages())
                <div class="pagination-wrapper">
                    {{ $films->links() }}
                </div>
                @endif
            </div>
            <div class="page-header">
                <h3 class="reviews">Leave your comment</h3>
                @if (Auth::check())
                <div class="logout">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        {{ csrf_field() }}
                        <button class="btn btn-default btn-circle text-uppercase" type="submit">
                            <span class="glyphicon glyphicon-off"></span> Logout
                        </button>
                    </form>

                </div>
                @else
                <div class="logout">
                    <a class="btn btn-default btn-circle text-uppercase" href="{{route('login')}}">
                        <span class="glyphicon glyphicon-on"></span> Login
                    </a>
                </div>
                @endif
            </div>
            <div class="comment-tabs">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="active"><a href="#comments-logout" role="tab" data-toggle="tab">
                            <h4 class="reviews text-capitalize">Comments</h4>
                        </a></li>
                    <li><a href="#add-comment" role="tab" data-toggle="tab">
                            <h4 class="reviews text-capitalize">Add comment</h4>
                        </a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="comments-logout">
                        <ul class="media-list">
                            <li class="media">
                                <div class="media-body">
                                    @forelse($film->comments as $comment)
                                    <div class="well well-lg">
                                        <h4 class="media-heading text-uppercase reviews">{{$comment->name}} </h4>
                                        <p class="media-comment">
                                            {{$comment->comment}}
                                        </p>
                                    </div>
                                    @empty
                                    <p>No comments</p>
                                    @endforelse
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane" id="add-comment">
                        @if (Auth::check())
                        <form action="{{route('films.comments.store', $film->id)}}" method="post" class="form-horizontal" id="comment-form" role="form">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" id="name" required placeholder="Enter Name" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="uploadMedia" class="col-sm-2 control-label">Comment</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="comment" id="comment" rows="5" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button class="btn btn-success btn-circle text-uppercase" type="submit" id="submitComment"><span class="glyphicon glyphicon-send"></span> Summit comment</button>
                                </div>
                            </div>
                        </form>
                        @else
                        <p>Please login to add comments. <a href="{{route('login')}}">Click here</a> to login</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @empty
        <p>No film</p>
        @endforelse
    </div>
</div>
@endsection