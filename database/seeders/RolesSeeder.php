<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        
        $role->name = "Admin";
        $role->description = "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Commodi, explicabo.";
        $role->save();
        
        
        
        $role = new Role();
        
        $role->name = "User";
        $role->description = "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Commodi, explicabo.";
        $role->save();
    }
}
