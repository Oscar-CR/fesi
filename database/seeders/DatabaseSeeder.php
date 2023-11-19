<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Ambit;
use App\Models\AmbitHasTheme;
use App\Models\Period;
use App\Models\Role;
use App\Models\Theme;
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

        Period::create([
            'name' => 'Periodo Agosto-Diciembre 2023',
            'start' => '2023-08-01', 
            'end' => '2023-12-16', 
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


        Ambit::create([
            'name' => 'ÁMBITO CLÍNICO',
            'description' => '',
            'period_id' => 1,
        ]);

        Ambit::create([
            'name' => 'ÁMBITO EDUCACIÓN, DESARROLLO Y DOCENCIA',
            'description' => '',
            'period_id' => 1,
        ]);

        Ambit::create([
            'name' => 'ÁMBITO EDUCACIÓN ESPECIAL',
            'description' => '',
            'period_id' => 1,
        ]);

        Ambit::create([
            'name' => 'ÁMBITO INVESTIGACIÓN',
            'description' => '',
            'period_id' => 1,
        ]);

        Ambit::create([
            'name' => 'ÁMBITO ORGANIZACIONAL',
            'description' => '',
            'period_id' => 1,
        ]);

        Ambit::create([
            'name' => 'ÁMBITO SALUD',
            'description' => '',
            'period_id' => 1,
        ]);


        Ambit::create([
            'name' => 'ÁMBITO SOCIAL',
            'description' => '',
            'period_id' => 1,
        ]);

        Ambit::create([
            'name' => 'MÓDULO APLICADO',
            'description' => '',
            'period_id' => 1,
        ]);

        Ambit::create([
            'name' => 'MÓDULO METODOLÓGICO',
            'description' => '',
            'period_id' => 1,
        ]);

        Ambit::create([
            'name' => 'MÓDULO TEÓRICO',
            'description' => '',
            'period_id' => 1,
        ]);

        Ambit::create([
            'name' => 'PLAN ANTERIOR',
            'description' => '',
            'period_id' => 1,
        ]);

        Ambit::create([
            'name' => 'OPTATIVAS',
            'description' => '',
            'period_id' => 1,
        ]);






        Theme::create([
            'name' => 'Conductual, Cognitivo Conductual e Interconductual',
        ]);

        Theme::create([
            'name' => 'Existencial Humanista',
        ]);

        Theme::create([
            'name' => 'Psicoanálisis y Teoría Social',
        ]);





        Theme::create([
            'name' => 'Cognoscitivismo',
        ]);

        Theme::create([
            'name' => 'Conductual, Cognitivo Conductual e Interconductual',
        ]);

        Theme::create([
            'name' => 'Existencial Humanistal',
        ]);

        Theme::create([
            'name' => 'Psicoanálisis y Teoría Social',
        ]);

        Theme::create([
            'name' => 'Sociocultural y de la Actividad',
        ]);



        

        Theme::create([
            'name' => 'Complejidad y Transdisciplina',
        ]);

        Theme::create([
            'name' => 'Conductual, Cognitivo Conductual e Interconductual',
        ]);

        Theme::create([
            'name' => 'Sociocultural y de la Actividad',
        ]);



        Theme::create([
            'name' => 'Conductual, Cognitivo Conductual e Interconductual',
        ]);

        Theme::create([
            'name' => 'Existencial Humanista',
        ]);

        Theme::create([
            'name' => 'Psicoanálisis y Teoría Social',
        ]);



        Theme::create([
            'name' => 'Complejidad y Transdisciplina',
        ]);

        Theme::create([
            'name' => 'Conductual, Cognitivo Conductual e Interconductual',
        ]);

        Theme::create([
            'name' => 'Psicoanálisis y Teoría Social',
        ]);

        Theme::create([
            'name' => 'Sociocultural y de la Actividad',
        ]);




        Theme::create([
            'name' => 'Complejidad y Transdisciplina',
        ]);

        Theme::create([
            'name' => 'Conductual, Cognitivo Conductual e Interconductual',
        ]);

        Theme::create([
            'name' => 'Existencial Humanista',
        ]);

        Theme::create([
            'name' => 'Psicoanálisis y Teoría Social',
        ]);



        
        Theme::create([
            'name' => 'Módulo aplicado',
        ]);




        Theme::create([
            'name' => 'Método metodológico',
        ]);



        Theme::create([
            'name' => 'Método teórico',
        ]);



        Theme::create([
            'name' => 'Plan anterior',
        ]);





        AmbitHasTheme::create([
            'theme_id' => 1,
            'ambit_id' => 1,
        ]);

        AmbitHasTheme::create([
            'theme_id' => 1,
            'ambit_id' => 2,
        ]);

        AmbitHasTheme::create([
            'theme_id' => 1,
            'ambit_id' => 3,
        ]);



        

        AmbitHasTheme::create([
            'theme_id' => 2,
            'ambit_id' => 4,
        ]);

        AmbitHasTheme::create([
            'theme_id' => 2,
            'ambit_id' => 5,
        ]);

        AmbitHasTheme::create([
            'theme_id' => 2,
            'ambit_id' => 6,
        ]);

        AmbitHasTheme::create([
            'theme_id' => 2,
            'ambit_id' => 7,
        ]);

        AmbitHasTheme::create([
            'theme_id' => 2,
            'ambit_id' => 8,
        ]);



       

       /*  AmbitHasTheme::create([
            'theme_id' => 3,
            'ambit_id' => 9,
        ]);

        AmbitHasTheme::create([
            'theme_id' => 3,
            'ambit_id' => 10,
        ]);

        AmbitHasTheme::create([
            'theme_id' => 3,
            'ambit_id' => 11,
        ]);



        


        AmbitHasTheme::create([
            'theme_id' => 4,
            'ambit_id' => 12,
        ]);

        AmbitHasTheme::create([
            'theme_id' => 4,
            'ambit_id' => 13,
        ]); */

       /*  AmbitHasTheme::create([
            'theme_id' => 4,
            'ambit_id' => 14,
        ]);



        
        AmbitHasTheme::create([
            'theme_id' => 5,
            'ambit_id' => 15,
        ]);

        AmbitHasTheme::create([
            'theme_id' => 5,
            'ambit_id' => 16,
        ]);

        AmbitHasTheme::create([
            'theme_id' => 5,
            'ambit_id' => 17,
        ]);

        AmbitHasTheme::create([
            'theme_id' => 5,
            'ambit_id' => 18,
        ]);



       

        AmbitHasTheme::create([
            'theme_id' => 6,
            'ambit_id' => 19,
        ]);

        AmbitHasTheme::create([
            'theme_id' => 6,
            'ambit_id' => 20,
        ]);

        AmbitHasTheme::create([
            'theme_id' => 6,
            'ambit_id' => 21,
        ]);

        AmbitHasTheme::create([
            'theme_id' => 6,
            'ambit_id' => 22,
        ]);



        AmbitHasTheme::create([
            'theme_id' => 7,
            'ambit_id' => 23,
        ]);
        



        AmbitHasTheme::create([
            'theme_id' => 8,
            'ambit_id' => 24,
        ]);


        


        AmbitHasTheme::create([
            'theme_id' => 9,
            'ambit_id' => 25,
        ]);


        

        AmbitHasTheme::create([
            'theme_id' => 10,
            'ambit_id' => 26,
        ]); */

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
