
@extends('layouts.master')

@section('title')
 Tong's Blog
 @endsection

@section('content')
 <div class="row">
    <div class="col-md-6">
    <h3>Change your password</h3>
        <form action="/changePWD" method= "post">
        {{csrf_field()}}
            <div class="form-group">
                <label for="subject">new password</label>
                <input class="form-control" type="text" name="subject" id="subject">
            </div>
        </form>
    </div>
 @endsection