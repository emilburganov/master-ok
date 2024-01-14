<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Role;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::query()->create([
            'name' => 'admin',
        ]);

        Role::query()->create([
            'name' => 'user',
        ]);

        Status::query()->create([
            'name' => 'Новая',
        ]);

        Status::query()->create([
            'name' => 'Ремонтируется',
        ]);

        Status::query()->create([
            'name' => 'Отремонтировано',
        ]);

        Category::query()->create([
            'name' => 'Косметический ремонт',
        ]);

        Category::query()->create([
            'name' => 'Капитальный ремонт',
        ]);

        Category::query()->create([
            'name' => 'Ремонт электрики',
        ]);

        User::query()->create([
            'full_name' => 'Админыч',
            'email' => 'admin@admin.com',
            'login' => 'admin',
            'password' => Hash::make('remont'),
            'role_id' => 1,
        ]);
    }
}
