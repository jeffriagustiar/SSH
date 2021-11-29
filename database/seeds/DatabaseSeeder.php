<?php

use App\Account;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Fake;
use App\User;
use App\Profile;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(Fake $f)
    {
        //insert dengan relasi
        for ($i=1; $i <= 1 ; $i++) { 
            DB::table('users')->insert([
                'email' => $f->unique()->safeEmail,
                'password' => Hash::make('123456'),
                'created_at' => date_create()
            ]);

            DB::table('profiles')->insert([
                'nama' => $f->name,
                'phone' => $f->phoneNumber,
                'kelamin' => 'Male',
                'alamat' => $f->address,
                'users_id' => User::orderByDesc('id')->first()->id,
                'created_at' => date_create()
            ]);
        }

        //tanpa relasi table yang di ambil dari UserFactory
        //factory(User::class,10)->create(); 
        //factory(Account::class,7041)->create();
    }
}
