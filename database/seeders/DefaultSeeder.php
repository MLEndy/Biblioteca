<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admi = Role::create(['name'=>'admin']);

        Permission::create(['name'=>'adminPermission'])->assignRole($admi);

        User::create([
            'name'=>'Miguel Lopez',
            'email'=>'admin@admin.com',
            'password'=>('1234')
        ])->assignRole($admi);
    }
}
