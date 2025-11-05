<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $role = Role::create(['name' => 'admin']);
        $role = Role::create(['name' => 'user']);

        $user = User::whereIn('email', ['elliotur@gmail.com', 'urizarian@gmail.com'])->get();

        foreach ($user as $u) {
            $u->assignRole('admin');
        }

    }
}
