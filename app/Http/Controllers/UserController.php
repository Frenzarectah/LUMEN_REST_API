<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\User_;

class UserController extends Controller
{
    public function getUsers()
    {
        $utenti = User_::all();
        foreach($utenti as $user){
            echo("<u>{$user->name}<u></br>");
        };
    }
    public function addUser(Request $request)
    {
        $this->validate($request,[
            'id' => 'string',
            'name' => 'string',
            'email' => 'string',
            'password'=> 'required|string',
            'isAuth' => 'string'
        ]);
        $user_insert = new User_;
        $user_insert->id = $request->input('id');
        $user_insert->name = $request->input('name');
        $user_insert->email = $request->input('email');
        $user_insert->password = $request->input('password');
        $user_insert->isAuth = $request->input('isAuth');
        $user_insert->save();
        if($user_insert->save()) echo("<h2>NEW USER INSERTED SUCCESSFULLY!</h2>");
    }
}
