<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Role::create([
            'name' => 'admin',
            'display_name' => 'Admin', 
            'description' => 'Admin', 
        ]);

        Role::create([
            'name' => 'docente',
            'display_name' => 'Docente', 
            'description' => 'Docente', 
        ]);

        $create_user = new User();
        $create_user->name = 'Admin';
        $create_user->email =  'admin@test.com';
        $create_user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $create_user->save();

        DB::table('role_user')->insert([
            'user_id' => $create_user->id,
            'role_id' => 1,
            'user_type' => 'App\Models\User',
        ]);


        $create_user1 = new User();
        $create_user1->name = 'Docente';
        $create_user1->email =  'docente@test.com';
        $create_user1->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $create_user1->save();

        DB::table('role_user')->insert([
            'user_id' => $create_user1->id,
            'role_id' => 2,
            'user_type' => 'App\Models\User',
        ]);


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
