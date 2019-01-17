<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $super_admin = [
            'super-delete' => true,
            'super-add' => true,
            'super-update' => true,
            'super-view' => true,
        ];

        $office_clerk = [
            'clerk-delete' => true,
            'clerk-add' => true,
            'clerk-update' => true,
            'clerk-view' => true,
        ];

        $valet_cleaner = [
            'cleaner-delete' => true,
            'cleaner-add' => true,
            'cleaner-update' => true,
            'cleaner-view' => true,
        ];

        $owner = [
            'car-owner-delete' => true,
            'car-owner-add' => true,
            'car-owner-update' => true,
            'car-owner-view' => true,
        ];

        $super_user = Role::create([
            'name' => 'app-admin',
            'display_name'=>'App Admin',
            'permissions' =>$super_admin,
            'guard_name'=>'web'
        ]);

        $car_owner = Role::create([
            'name' => 'client',
            'display_name'=>'Client',
            'permissions' =>$owner,
            'guard_name'=>'web'
        ]);

        $car_valet = Role::create([
            'name' => 'car-valet',
            'display_name'=>'Car Valet',
            'permissions' =>$owner,
            'guard_name'=>'web'
        ]);

        $clerk_user1 = Role::create([
            'name' => 'franchisee',
            'display_name'=>'Franchise',
            'permissions' =>$office_clerk,
            'guard_name'=>'web'
        ]);

        $clerk_user = Role::create([
            'name' => 'clerk',
            'display_name'=>'Clerk',
            'permissions' =>$office_clerk,
            'guard_name'=>'web'
        ]);
    }
}
