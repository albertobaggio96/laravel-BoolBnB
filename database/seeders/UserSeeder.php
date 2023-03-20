<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = [
            [
                'name' => 'Alberto',
                'surname' => 'Baggio',
                'date_of_birth' => '1996-03-31',
                'email' => 'albi1313@hotmail.it',
                'password' => 'laravel',
            ],
            [
                'name' => 'Lorenzo',
                'surname' => 'Baggio',
                'date_of_birth' => '1996-03-31',
                'email' => 'lorenzo.ognibene@gmail.com',
                'password' => 'laravel',
            ],
            [
                'name' => 'Sebastiano',
                'surname' => 'Baggio',
                'date_of_birth' => '1996-03-31',
                'email' => 'sebastiano.urban98@gmail.com',
                'password' => 'laravel',
            ],
            [
                'name' => 'Francesco',
                'surname' => 'Baggio',
                'date_of_birth' => '1996-03-31',
                'email' => 'francesco_locasto@libero.it',
                'password' => 'laravel',
            ],
            [
                'name' => 'Samuele',
                'surname' => 'Baggio',
                'date_of_birth' => '1996-03-31',
                'email' => 'samuelecerretti@gmail.com',
                'password' => 'laravel',
            ],
            
        ];


        foreach($users as $user){
            $newUser = new User();
            $newUser->name = $user['name'];
            $newUser->surname = $user['surname'];
            $newUser->date_of_birth = $user['date_of_birth'];
            $newUser->email = $user['email'];
            $newUser->password = Hash::make($user['password']);
            $newUser->save();
        }
    }
}
