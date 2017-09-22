@extends('layouts.master')

@section('title')
 Tong's Blog
 @endsection

@section('content')
 <div class="row">
    <div class="col-md-6">
    <h3>Stories</h3>
    <table>
        <tr>
            <th>subject</th><br>
            <th>Description</th><br>
            <th>Writter</th>
        </tr>

        <?php foreach ($stories as $story) : ?>
            <tr>
                <td>{{$story->subject}}</td><br>
                <td>{{$story->description}}</td><br>
                <td>{{$story->user_name}}</td>
            </tr>
            
        <?php endforeach ?>
    </table>
        
    </div>
 </div>

 @endsection