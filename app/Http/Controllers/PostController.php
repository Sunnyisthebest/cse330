<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;

class PostController extends Controller
{
    public function edit()
    {
       
        $post = new Post;

        $post->subject = request('subject');
        $post->description = request('description');
        $id = request('id');



        $k_v=[];


        if (!empty($post->subject)) {
            $k_v['subject']=$post->subject;
        }
        if (!empty($post->description)) {
            $k_v['description']=$post->description;
        }

         $w_id = $post->where('id', $id)->value('user_id');
        $u_id =Auth::id();
        if ($w_id!==$u_id) {
            return redirect('/home');
        }

        $post ->where('id', $id)->update($k_v);

        return redirect('/home');
    }

    public function delete()
    {
    
        $post = new Post;
        $where = request('id');

        $w_id = $post->where('id', $where)->value('user_id');
        $u_id =Auth::id();
       // dd($w_id);
        if ($w_id!==$u_id) {
            return redirect('/home');
        }

        $post->where('id', $where)->delete();

        return redirect('/home');
    }

    public function store()
    {
        $post = new Post;

        $post->subject = request('subject');
        $post->description = request('description');
        $user_id = Auth::id();

        $user = new User;
        $user = $user->find($user_id);
        $user_name=$user->name;

        $post->user_id = $user_id;
        $post->user_name = $user_name;

        $post->save();

        return redirect('/home');

        //create a new story and save it into the database.
        //the corresponding table is posts.
    }
}
