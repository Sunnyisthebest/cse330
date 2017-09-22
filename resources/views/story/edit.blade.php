@extends('layouts.master')

@section('title')
 Tong's Blog
@endsection

@section('content')

 <div class="row">
    <div class="col-md-6">
    <div>
    <h1>{{ $story->subject}}</h1>

    <span class="label label-info">{{$story->user_name}}</span>

     <br />
     <br />

    <div class="alert alert-danger" role="alert">
  <p>{{$story->description}}</p>
</div>
</div>
<div>
<h3>Edit this story<h3>
<form action="/home/{story}" method= "post">
        {{csrf_field()}}
            <div class="form-group">
                <label for="subject">Subject</label>
                <input class="form-control" type="text" name="subject" id="subject">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" rows="3" type="text" name="description" id="description"></textarea>
            </div>
            <input type="hidden" name="id" value="{{$story->id}}">
            <button type = "submit" class = "btn btn-primary">Submit</button>
        </form>
</div>

</div>
</div>



        
 @endsection