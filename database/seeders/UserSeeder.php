<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=0;$i<10;$i++)
        {
            $query = 'insert into users (name,email,password,isAuth) values (?,?,?,?)';
            $name = Str::random(10);
            $password = Str::password(6);
            $isAuth = boolval(0);
            DB::table('users')->insert()
            DB::insert($query,[
                $name,"{$name}@gmail.com",$password,$isAuth

            ]);
        }
    }
}
