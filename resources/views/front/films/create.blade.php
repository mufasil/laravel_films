@extends('layouts.app')
@section('content')
<div class="main">
    <div class="main-center">
        <h3>Add Film</h3>
        @if($errors->any())
        {!! implode('', $errors->all('<div>:message</div>')) !!}
        @endif
        <form class="" method="post" action="{{route('films.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <div class="input-group">
                    <input type="text" value="{{old('name')}}" class="form-control" name="name" id="name" placeholder="Enter your Name" />
                </div>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <div class="input-group">
                    <textarea class="form-control" name="description" id="description" row="5">{{old('description')}}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="release_date">Release Date</label>
                <div class="input-group">
                    <input type="date" class="form-control" name="release_date" id="release_date" placeholder="Enter your Name" />
                </div>
            </div>

            <div class="form-group">
                <label for="rating">Rating</label>
                <div class="input-group">
                    <input type="number" value="{{old('rating')}}" class="form-control" name="rating" id="rating" placeholder="Enter Rating" min="1" max="5" />
                </div>
            </div>

            <div class="form-group">
                <label for="ticket_price">Ticket Price</label>
                <div class="input-group">
                    <input type="number" value="{{old('ticket_price')}}" class="form-control" name="ticket_price" id="ticket_price" min="1" placeholder="Enter Ticket Price" />
                </div>
            </div>

            <div class="form-group">
                <label for="photo">Photo</label>
                <div class="input-group">
                    <input type="file" name="photo" id="photo" />
                </div>
            </div>

            <div class="form-group">
                <label for="genre_id">Genre</label>
                <div class="input-group">
                    <ul>
                        @foreach($genres as $genre)
                        <li><input type="checkbox" name="genre_id[]" value="{{$genre->id}}" /> {{$genre->name}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <button type="submit">SUBMIT</button>

        </form>
    </div><!--main-center"-->
</div><!--main-->
@endsection