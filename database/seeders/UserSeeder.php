<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    private string $login = 'Alexey';
    private string $password = 'test';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (User::where('name', $this->login)->count()) {
            return;
        }

        $user = User::create([
            'name' => $this->login,
            'email' => $this->login . '@mail.ru',
            'password' => Hash::make($this->password)
        ]);

        if ($user) {
            $user = User::where('name', $this->login)->first();
            $user->syncRoles('admin');
        }
    }
}
