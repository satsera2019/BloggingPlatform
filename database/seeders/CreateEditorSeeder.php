<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CreateEditorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'first_name' => 'Editor',
            'last_name' => 'Editor',
            'email' => 'editor@gmail.com',
            'password' => bcrypt('editorUser@123.'),
        ]);
        $user->assignRole('editor');
    }
}
