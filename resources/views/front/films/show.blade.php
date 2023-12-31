@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-10 col-sm-offset-1" id="logout">
        <div class="container">
            @if($film)
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
            </div>
            <div class="page-header">
                <h3 class="reviews">Leave your comment</h3>
                <div class="logout">
                    <button class="btn btn-default btn-circle text-uppercase" type="button" onclick="$('#logout').hide(); $('#login').show()">
                        <span class="glyphicon glyphicon-off"></span> Logout
                    </button>
                </div>
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
                                    <div class="well well-lg">
                                        <h4 class="media-heading text-uppercase reviews">Marco </h4>
                                        <ul class="media-date text-uppercase reviews list-inline">
                                            <li class="dd">22</li>
                                            <li class="mm">09</li>
                                            <li class="aaaa">2014</li>
                                        </ul>
                                        <p class="media-comment">
                                            Great snippet! Thanks for sharing.
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane" id="add-comment">
                        <form action="#" method="post" class="form-horizontal" id="comment-form" role="form">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="uploadMedia" class="col-sm-2 control-label">Comment</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="comment" id="comment" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button class="btn btn-success btn-circle text-uppercase" type="submit" id="submitComment"><span class="glyphicon glyphicon-send"></span> Summit comment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @else
            <strong>No Film Found</strong>
            @endif
        </div>
    </div>
</div>
@endsection