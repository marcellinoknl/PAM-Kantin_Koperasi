<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     /*
            $table->string('ktp');
            $table->string('nama_lengkap');
            $table->bigInteger('nohp');
            $table->integer('role');
            $table->string('email')->unique();
            $table->string('google')->unique()->nullable();
            $table->string('facebook')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
     */
    public function run()
    {
        \App\Models\User::insert([
            [
                'ktp'=>'11420039',
                'nohp'=>'082166861855',
                'nama_lengkap'=>'Marcellino Lumban Gaol',
                'email'=>'marcellinoknl@gmail.com',
                'password'=>Hash::make('admin123'),
                'role'=>'1'
     
            ]
        ]);
    }
}