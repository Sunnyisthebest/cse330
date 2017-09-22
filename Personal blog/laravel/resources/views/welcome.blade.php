@extends('layouts.master')

@section('title')
 Tong's Blog
 @endsection

@section('content')
 <div class="row">
 	<div class="col-md-6">
 	<h3>Sign up</h3>
 		<form action="#" method= "post">
 			<div class="form-group">
 				<label for="email">Your E-Mail</label>
 				<input class="form-control" type="text" name="email" id="email">
 			</div>
 			<div class="form-group">
 				<label for="name">Your User Name</label>
 				<input class="form-control" type="text" name="name" id="name">
 			</div>
 			<div class="form-group">
 				<label for="password">Your Password</label>
 				<input class="form-control" type="text" name="password" id="password">
 			</div>
 			<button type = "submit" class = "btn btn-primary">Submit</button>
 		</form>
 	</div>
 	<div class="col-md-6">
 	<h3>Sign In</h3>
 		<form action="#" method= "post">
 			<div class="form-group">
 				<label for="name">Your User Name</label>
 				<input class="form-control" type="text" name="name" id="signin_name">
 			</div>
 			<div class="form-group">
 				<label for="password">Your Password</label>
 				<input class="form-control" type="text" name="password" id="signin_password">
 			</div>
 			<button type = "submit" class = "btn btn-primary">Submit</button>
 		</form>
 	</div>
 </div>

 @endsection