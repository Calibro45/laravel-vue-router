<?php

use App\User;
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
        $user = new User();

        $user->name = 'andrea';
        $user->email = 'andry16-10-91@hotmail.it';
        $user->password =  Hash::make('prova123456');

        $user->save();
    }
}
