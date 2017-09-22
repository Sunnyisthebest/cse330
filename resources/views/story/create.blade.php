@extends('layouts.master')

@section('title')
 Tong's Blog
 @endsection

@section('content')
 <div class="row">
    <div class="col-md-6">
    <h3>Write your own story</h3>
        <form action="/home" method= "post">
        {{csrf_field()}}
            <div class="form-group">
                <label for="subject">Subject</label>
                <input class="form-control" type="text" name="subject" id="subject">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" rows="3" type="text" name="description" id="description"></textarea>
            </div>
            <button type = "submit" class = "btn btn-primary">Submit</button>
        </form>
    </div>
    </div>
 @endsection