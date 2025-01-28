<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		User::factory()->create([
			'name' => 'Администратор Алексей Шелег',
			'email' => 'q@q.q',
			'role_id' => 1,
			'password' => Hash::make('11111111'),
		]);		
		User::factory()->create([
			'name' => 'Пользователь Иванов Иван',
			'email' => 'w@w.w',
			'role_id' => 2,
			'password' => Hash::make('11111111'),
		]);
        User::factory()->count(15)->create([
			'role_id' => 2,
		]);        
    }
}
