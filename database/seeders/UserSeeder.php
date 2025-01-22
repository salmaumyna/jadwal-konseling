<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'nama' => 'admin',
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'levels' => 'admin',
                'is_active' => true,
            ],
            [
                'nama' => 'gurupiket',
                'username' => 'gurupiket',
                'password' => bcrypt('gurupiket'),
                'levels' => 'guru',
                'is_active' => true,
            ],
        ]);
    }
}
