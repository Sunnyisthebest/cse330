@extends('layouts.master')

@section('title')
 Tong's Blog
 @endsection

@section('content')



    <h1>Stories</h1>
    <div class="alert alert-info" role="alert">
    <table class="table table-striped">
        <tr>
            <th>subject</th><br>
            <th>Description</th><br>
            <th>Writter</th>
            <th></th>
        </tr>

        <?php foreach ($stories as $story) : ?>
            <tr>
                <td><a href="/home/{{$story->id}}"> {{$story->subject}}</td><br>
                <td>{{$story->description}}</td><br>
                <td>{{$story->user_name}}</td>
                <td>
                   <form action="/home/{story}" method= "post">
                   {{ method_field('DELETE') }}
                     {{csrf_field()}}

                     <input type="hidden" name="id" value="{{$story->id}}">
                    <button type = "submit" class = "btn btn-primary">Delete</button>
                </form>
                </td>
            </tr>
            
        <?php endforeach ?>
    </table>

    </div>   


 @endsection