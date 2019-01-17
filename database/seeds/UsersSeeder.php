<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $password = \Illuminate\Support\Facades\Hash::make('secret');
        $verification_time = \Carbon\Carbon::now();
        $super = User::create(['name'=>'Super','surname'=>'User','email'=>'admin@ecospotless.co.za'
            ,'contact_number'=>'076677777','email_verified_at'=>$verification_time,'password'=>$password]);

        $super_role = Role::where('name','app-admin')->first();
        $super->roles()->attach($super_role->id);

        $car_valet = User::create(['name'=>'Donald','surname'=>'Washer','email'=>'valet@ecospotless.co.za'
            ,'contact_number'=>'076677777','email_verified_at'=>$verification_time,'password'=>$password]);

        $car_valet_role = Role::where('name','car-valet')->first();
        $car_valet->roles()->attach($car_valet_role->id);

        $car_client = User::create(['name'=>'Trevor','surname'=>'Owner','email'=>'client@ecospotless.co.za'
            ,'contact_number'=>'076677777','email_verified_at'=>$verification_time,'password'=>$password]);

        $valet_role = Role::where('name','client')->first();
        $car_client->roles()->attach($valet_role->id);

        $clerk = User::create(['name'=>'Clerk','surname'=>'User','email'=>'clerk@ecospotless.co.za'
            ,'contact_number'=>'076677777','email_verified_at'=>$verification_time,'password'=>$password]);

        $clerk_role = Role::where('name','clerk')->first();
        $clerk->roles()->attach($clerk_role->id);
    }
}
