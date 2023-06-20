<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    public function login(Request $request)
    {
        $this->validate($request,[
            'email'  => 'required|max:255',
            'password' => 'required|max:50'
        ]);
        $login_credits = $request->only(['email','password']);
        $results = DB::select('Select * FROM users where password = ? AND email = ?',[$login_credits['password'],$login_credits['email']]);
        if($results){
            DB::update("UPDATE `users` SET `isAuth` = '1' where email = ?",[$login_credits['email']]);
            return 'access granted';
        }
        else return 'access denied';
    }
    //
}
