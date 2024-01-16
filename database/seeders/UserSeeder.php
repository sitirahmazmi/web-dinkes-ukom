<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $useradmin = User::create([
            'nip' => '3202116001',
            'nama' => 'Admin1',
            'email' => 'admindinkes@gmail.com',
            'password' => bcrypt('12345'),
        ]);

        $admin = Role::where('name', 'admin')->first();
        $useradmin->addRole($admin);
    }
}
