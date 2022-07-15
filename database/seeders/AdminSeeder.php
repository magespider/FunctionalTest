<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUsers = [
                        ['name' => 'Admin01', 'email' => 'admin01@email.com', 'password' => '12345678'],
                        ['name' => 'Admin02', 'email' => 'admin02@email.com', 'password' => '12345678'],
                        ['name' => 'Admin03', 'email' => 'admin03@email.com', 'password' => '12345678'],
                    ]; 
        foreach($adminUsers as $admin){
            if(Admin::where('email', $admin['email'])->doesntExist()){
                Admin::create(['name' => $admin['name'],
                    'email' => $admin['email'],
                    'enabled' => 1,
                    'password' => bcrypt($admin['password']) 
                ]);
            }
        } 
    }
}