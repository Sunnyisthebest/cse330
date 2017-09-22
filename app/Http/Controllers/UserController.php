<?php
namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function postRegister(Request $request)
    {
        $email = $request['email'];
        $name = $request['name'];
        $password = bcrypt($request['password']);

        $user = new User();
        $user->email = $email;
        $user->name = $name;
        $user->password = $password;

        var_dump($user);

        $user->save();

        return redirect()->back();
    }

    // public function postLogin()
    // {
    //     $name = $request['signin_name'];
    //     $password = $request['signin_password'];
    // }

    public function update()
    {
        $password = bcrypt(request('password'));
         $user = new User();
         $k_v = ['password' => $password];

        $user ->where('id', Auth::id())->update($k_v);
    }
}
