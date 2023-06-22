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
            'id' => 'string | unique:users,id',
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
        else echo("<h2>NEW USER INSERTING FAILURE</h2>");
    }
    public function delUser(Request $request)
    {
        $this->validate($request,[
            'id' => 'required',
            'password' => 'required'
        ]);
        if($request->input('password') == 'token') {
            User_::destroy($request->input('id'));
            return '<h2> User with id: '.$request->input('id').' successfully removed!';
        }else{
            return'<h2> NOT AUTHORIZED TO DELETE</h2>';
        }
    }
}
