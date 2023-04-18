<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::insert('INSERT INTO `roles` (`id` ,`role_title`) VALUES (?, ?)', [1, 'Администратор',]);
        DB::insert('INSERT INTO `roles` (`id` ,`role_title`) VALUES (?, ?)', [2, 'Официант',]);
        DB::insert('INSERT INTO `roles` (`id` ,`role_title`) VALUES (?, ?)', [3, 'Повар',]);
        \App\Models\User::factory(10)->create();
    }
}
