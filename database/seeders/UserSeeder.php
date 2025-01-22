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
                'name' => 'admin',
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'is_active' => true,
            ],
            [
                'name' => 'gurupiket',
                'username' => 'gurupiket',
                'password' => bcrypt('gurupiket'),
                'is_active' => true,
            ],
        ]);
    }
}
