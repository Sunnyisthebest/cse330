<?php
namespace APP\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function postRegister(Request $request)
    {
        $email = $request['email'];
        $name = $request['name'];
        $password = bcrypt($request['password']);
    }

    public function postLogin()
    {
        $name = $request['signin_name'];
        $password = $request['signin_password'];
    }
}
