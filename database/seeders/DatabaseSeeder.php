<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Ambit;
use App\Models\AmbitHasTheme;
use App\Models\Course;
use App\Models\Period;
use App\Models\Role;
use App\Models\Theme;
use App\Models\ThemeHasCourse;
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

        $docentes = [
            "Mayra A. Mora Miranda" => "mayra.mora@iztacala.unam.mx",
            "Cristopher Tamayo Herrera" => "cristopher.tamayo@iztacala.unam.mx",
            "Mariel Baca Carmona" => "mariel.baca@iztacala.unam.mx",
            "Ana Karina García Santillán" => "karina.garcia@iztacala.unam.mx",
            "Octavio Patiño García" => "octaviopg@iztacala.unam.mx",
            "Mariela Flores Acosta" => "Mariela.flores@iztacala.unam.mx",
            "Elsa Guadalupe López Morales" => "elsa.lopez@iztacala.unam.mx",
            "Susana Meléndez Valenzuela" => "mvsusana@iztacala.unam.mx",
            "Antonio Corona Gómez" => "a.corona@iztacala.unam.mx",
            "Felicitas Salinas Anaya" => "felicitas.salinas@iztacala.unam.mx",
            "Julia Chimal Pablo" => "julia.chimal@iztacala.unam.mx",
            "Rodrigo Martínez Llamas" => "rodrigo.martinez@iztacala.unam.mx",
            "Rosalia Vázquez Arévalo" => "rosalia.vazquez@iztacala.unam.mx",
            "Marta Liliana Pérez Chavarría" => "martha.perez@iztacala.unam.mx",
            "Angelica Irene Hernández González" => "angelica.hernandez@iztacala.unam.mx",
            "Verónica Estela Flores Huerta" => "verónica.flores@iztacala.unam.mx",
            "Elizabeth González Olea" => "Elizabeth.gonzalez@iztacala.unam.mx",
            "José Moctezuma Salinas Torres" => "Moctezuma.salinas@iztacala.unam.mx",
            "Wendy Nicolasa Vega Navarro" => "Wendy.vega@iztacala.unam.mx",
            "Irma Fernández Sánchez" => "irma.fernandez@iztacala.unam.mx"
        ];

        foreach ($docentes as $nombre => $email) {
            $create_user = new User();
            $create_user->name = $nombre;
            $create_user->email = $email;
            $create_user->password = bcrypt('password');
            $create_user->save();

            DB::table('role_user')->insert([
                'user_id' => $create_user->id,
                'role_id' => 2,
                'user_type' => 'App\Models\User',
            ]);
        }

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

        Course::create([
            'name' => 'Metodología Clínica 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 1,
            'course_id' => 1
        ]);


        Course::create([
            'name' => 'Metodología Clínica 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 1,
            'course_id' => 2
        ]);


        Course::create([
            'name' => 'Teoría Clínica 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 1,
            'course_id' => 3
        ]);

        Course::create([
            'name' => 'Teoría Clínica 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 1,
            'course_id' => 4
        ]);

        Course::create([
            'name' => 'Tutoría Clínica 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 1,
            'course_id' => 5
        ]);

        Course::create([
            'name' => 'Tutoría Clínica 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 1,
            'course_id' => 6
        ]);





        Theme::create([
            'name' => 'Existencial Humanista',
        ]);

        Course::create([
            'name' => 'Metodología Clínica 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 2,
            'course_id' => 7
        ]);

        Course::create([
            'name' => 'Metodología Clínica 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 2,
            'course_id' => 8
        ]);

        Course::create([
            'name' => 'Teoría Clínica 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 2,
            'course_id' => 9
        ]);

        Course::create([
            'name' => 'Teoría Clínica 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 2,
            'course_id' => 10
        ]);

        Course::create([
            'name' => 'Tutoría Clínica 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 2,
            'course_id' => 11
        ]);

        Course::create([
            'name' => 'Tutoría Clínica 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 2,
            'course_id' => 12
        ]);




        Theme::create([
            'name' => 'Psicoanálisis y Teoría Social',
        ]);

        Course::create([
            'name' => 'Metodología Clínica 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 3,
            'course_id' => 13
        ]);

        Course::create([
            'name' => 'Metodología Clínica 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 3,
            'course_id' => 14
        ]);

        Course::create([
            'name' => 'Teoría Clínica 1 y 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 3,
            'course_id' => 15
        ]);

        Course::create([
            'name' => 'Tutoría Clínica 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 3,
            'course_id' => 16
        ]);

        Course::create([
            'name' => 'Tutoría Clínica 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 3,
            'course_id' => 17
        ]);




        Theme::create([
            'name' => 'Cognoscitivismo',
        ]);

        Course::create([
            'name' => 'Educación Teórica 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 4,
            'course_id' => 18
        ]);

        Course::create([
            'name' => 'Educación Teórica 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 4,
            'course_id' => 19
        ]);

        Course::create([
            'name' => 'Metodología en Educación 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 4,
            'course_id' => 20
        ]);

        Course::create([
            'name' => 'Metodología en Educación 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 4,
            'course_id' => 21
        ]);

        Course::create([
            'name' => 'Tutoría en Educación 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 4,
            'course_id' => 22
        ]);

        Course::create([
            'name' => 'Tutoría en Educación 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 4,
            'course_id' => 23
        ]);




        Theme::create([
            'name' => 'Conductual, Cognitivo Conductual e Interconductual',
        ]);

        Course::create([
            'name' => 'Educación Teórica 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 5,
            'course_id' => 24
        ]);

        Course::create([
            'name' => 'Educación Teórica 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 5,
            'course_id' => 25
        ]);

        Course::create([
            'name' => 'Metodología en Educación, Desarrollo y Docencia 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 5,
            'course_id' => 26
        ]);

        Course::create([
            'name' => 'Metodología en Educación, Desarrollo y Docencia 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 5,
            'course_id' => 27
        ]);

        Course::create([
            'name' => 'Tutoría en Educación 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 5,
            'course_id' => 28
        ]);

        Course::create([
            'name' => 'Tutoría en Educación 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 5,
            'course_id' => 29
        ]);




        Theme::create([
            'name' => 'Existencial Humanistal',
        ]);

        Course::create([
            'name' => 'Educación Teórica 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 6,
            'course_id' => 30
        ]);

        Course::create([
            'name' => 'Educación Teórica 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 6,
            'course_id' => 31
        ]);

        Course::create([
            'name' => 'Metodología en Educación 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 6,
            'course_id' => 32
        ]);

        Course::create([
            'name' => 'Metodología en Educación 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 6,
            'course_id' => 33
        ]);

        Course::create([
            'name' => 'Tutoría en Educación 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 6,
            'course_id' => 34
        ]);

        Course::create([
            'name' => 'Tutoría en Educación 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 6,
            'course_id' => 35
        ]);




        Theme::create([
            'name' => 'Psicoanálisis y Teoría Social',
        ]);

        Course::create([
            'name' => 'Educación Teórica 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 7,
            'course_id' => 36
        ]);

        Course::create([
            'name' => 'Educación Teórica 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 7,
            'course_id' => 37
        ]);

        Course::create([
            'name' => 'Teoría Clínica 1 y 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 7,
            'course_id' => 38
        ]);

        Course::create([
            'name' => 'Tutoría Clínica 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 7,
            'course_id' => 39
        ]);

        Course::create([
            'name' => 'Tutoría Clínica 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 7,
            'course_id' => 40
        ]);








        Theme::create([
            'name' => 'Sociocultural y de la Actividad',
        ]);

        Course::create([
            'name' => 'Educación Teórica 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 8,
            'course_id' => 41
        ]);

        Course::create([
            'name' => 'Educación Teórica 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 8,
            'course_id' => 42
        ]);

        Course::create([
            'name' => 'Metodología en Educación 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 8,
            'course_id' => 43
        ]);

        Course::create([
            'name' => 'Metodología en Educación 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 8,
            'course_id' => 44
        ]);

        Course::create([
            'name' => 'Tutoría en Educación 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 8,
            'course_id' => 45
        ]);

        Course::create([
            'name' => 'Tutoría en Educación 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 8,
            'course_id' => 46
        ]);



        

        Theme::create([
            'name' => 'Complejidad y Transdisciplina',
        ]);

        Course::create([
            'name' => 'Educación Especial Teórica 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 9,
            'course_id' => 47
        ]);

        Course::create([
            'name' => 'Educación Especial Teórica 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 9,
            'course_id' => 48
        ]);

        Course::create([
            'name' => 'Metodología en Educación Especial 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 9,
            'course_id' => 49
        ]);

        Course::create([
            'name' => 'Metodología en Educación Especial 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 9,
            'course_id' => 50
        ]);

        
        Course::create([
            'name' => 'Tutoría en Educación Especial 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 9,
            'course_id' => 51
        ]);

        Course::create([
            'name' => 'Tutoría en Educación Especial 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 9,
            'course_id' => 52
        ]);





        Theme::create([
            'name' => 'Conductual, Cognitivo Conductual e Interconductual',
        ]);

        Course::create([
            'name' => 'Educación Especial Teórica 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 10,
            'course_id' => 53
        ]);

        Course::create([
            'name' => 'Educación Especial Teórica 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 10,
            'course_id' => 54
        ]);

        Course::create([
            'name' => 'Metodología en Educación Especial 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 10,
            'course_id' => 55
        ]);

        Course::create([
            'name' => 'Metodología en Educación Especial 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 10,
            'course_id' => 56
        ]);

        Course::create([
            'name' => 'Tutoría en Educación Especial 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 10,
            'course_id' => 57
        ]);

        Course::create([
            'name' => 'Tutoría en Educación Especial 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 10,
            'course_id' => 58
        ]);




        Theme::create([
            'name' => 'Sociocultural y de la Actividad',
        ]);

        Course::create([
            'name' => 'Investigación Teórica 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 11,
            'course_id' => 59
        ]);

        Course::create([
            'name' => 'Investigación Teórica 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 11,
            'course_id' => 60
        ]);

        Course::create([
            'name' => 'Metodología en Investigación 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 11,
            'course_id' => 61
        ]);

        Course::create([
            'name' => 'Metodología en Investigación 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 11,
            'course_id' => 62
        ]);

        Course::create([
            'name' => 'Tutoría en Investigación 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 11,
            'course_id' => 63
        ]);

        Course::create([
            'name' => 'Tutoría en Investigación 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 11,
            'course_id' => 64
        ]);





        Theme::create([
            'name' => 'Conductual, Cognitivo Conductual e Interconductual',
        ]);

        Course::create([
            'name' => 'Metodología en Organizacional 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 12,
            'course_id' => 65
        ]);

        Course::create([
            'name' => 'Metodología en Organizacional 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 12,
            'course_id' => 66
        ]);

        Course::create([
            'name' => 'Teoría Organizacional 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 12,
            'course_id' => 67
        ]);

        Course::create([
            'name' => 'Teoría Organizacional 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 12,
            'course_id' => 68
        ]);

        Course::create([
            'name' => 'Tutoría en Organizacional 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 12,
            'course_id' => 69
        ]);

        Course::create([
            'name' => 'Tutoría en Organizacional 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 12,
            'course_id' => 70
        ]);





        Theme::create([
            'name' => 'Existencial Humanista',
        ]);

        Course::create([
            'name' => 'Metodología en Organizacional 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 13,
            'course_id' => 71
        ]);

        Course::create([
            'name' => 'Metodología en Organizacional 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 13,
            'course_id' => 72
        ]);

        Course::create([
            'name' => 'Teoría Organizacional 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 13,
            'course_id' => 73
        ]);

        Course::create([
            'name' => 'Teoría Organizacional 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 13,
            'course_id' => 74
        ]);

        Course::create([
            'name' => 'Tutoría en Organizacional 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 13,
            'course_id' => 75
        ]);

        Course::create([
            'name' => 'Tutoría en Organizacional 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 13,
            'course_id' => 76
        ]);





        Theme::create([
            'name' => 'Psicoanálisis y Teoría Social',
        ]);

        Course::create([
            'name' => 'Metodología en Organizacional 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 14,
            'course_id' => 77
        ]);

        Course::create([
            'name' => 'Metodología en Organizacional 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 14,
            'course_id' => 78
        ]);

        Course::create([
            'name' => 'Teoría Organizacional 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 14,
            'course_id' => 79
        ]);

        Course::create([
            'name' => 'Teoría Organizacional 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 14,
            'course_id' => 80
        ]);

        Course::create([
            'name' => 'Tutoría en Organizacional 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 14,
            'course_id' => 81
        ]);

        Course::create([
            'name' => 'Tutoría en Organizacional 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 14,
            'course_id' => 82
        ]);
        




        Theme::create([
            'name' => 'Complejidad y Transdisciplina',
        ]);


        Course::create([
            'name' => 'Metodología en Salud 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 15,
            'course_id' => 83
        ]);

        Course::create([
            'name' => 'Metodología en Salud 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 15,
            'course_id' => 84
        ]);

        Course::create([
            'name' => 'Salud Teórica 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 15,
            'course_id' => 85
        ]);

        Course::create([
            'name' => 'Salud Teórica 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 15,
            'course_id' => 86
        ]);

        Course::create([
            'name' => 'Tutorías Salud 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 15,
            'course_id' => 87
        ]);

        Course::create([
            'name' => 'Tutorías Salud 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 15,
            'course_id' => 88
        ]);






        Theme::create([
            'name' => 'Conductual, Cognitivo Conductual e Interconductual',
        ]);

        Course::create([
            'name' => 'Metodología en Salud 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 16,
            'course_id' => 89
        ]);

        Course::create([
            'name' => 'Metodología en Salud 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 16,
            'course_id' => 90
        ]);

        Course::create([
            'name' => 'Salud Teórica 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 16,
            'course_id' => 91
        ]);

        Course::create([
            'name' => 'Salud Teórica 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 16,
            'course_id' => 92
        ]);

        Course::create([
            'name' => 'Tutorías Salud 1 matutino',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 16,
            'course_id' => 93
        ]);
        
        Course::create([
            'name' => 'Tutorías Salud 2 vespertino',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 16,
            'course_id' => 94
        ]);





        Theme::create([
            'name' => 'Psicoanálisis y Teoría Social',
        ]);

        Course::create([
            'name' => 'Metodología en Salud 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 17,
            'course_id' => 95
        ]);

        Course::create([
            'name' => 'Metodología en Salud 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 17,
            'course_id' => 96
        ]);

        Course::create([
            'name' => 'Salud Teórica 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 17,
            'course_id' => 97
        ]);

        Course::create([
            'name' => 'Salud Teórica 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 17,
            'course_id' => 98
        ]);

        Course::create([
            'name' => 'Tutorías Salud 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 17,
            'course_id' => 99
        ]);

        Course::create([
            'name' => 'Tutorías Salud 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 17,
            'course_id' => 100
        ]);







        Theme::create([
            'name' => 'Sociocultural y de la Actividad',
        ]);

        Course::create([
            'name' => 'Metodología en Salud 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 18,
            'course_id' => 101
        ]);

        Course::create([
            'name' => 'Metodología en Salud 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 18,
            'course_id' => 102
        ]);

        Course::create([
            'name' => 'Salud Teórica 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 18,
            'course_id' => 103
        ]);

        Course::create([
            'name' => 'Salud Teórica 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 18,
            'course_id' => 104
        ]);

        Course::create([
            'name' => 'Tutorías Salud 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 18,
            'course_id' => 105
        ]);

        Course::create([
            'name' => 'Tutorías Salud 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 18,
            'course_id' => 106
        ]);






        Theme::create([
            'name' => 'Complejidad y Transdisciplina',
        ]);

        Course::create([
            'name' => 'Metodología Social Complejidad 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 19,
            'course_id' => 107
        ]);

        Course::create([
            'name' => 'Metodología Social Complejidad 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 19,
            'course_id' => 108
        ]);


        Course::create([
            'name' => 'Social Teórica Complejidad 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 19,
            'course_id' => 109
        ]);

        Course::create([
            'name' => 'Social Teórica Complejidad 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 19,
            'course_id' => 110
        ]);

        Course::create([
            'name' => 'Tutoría Social Complejidad 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 19,
            'course_id' => 111
        ]);

        Course::create([
            'name' => 'Tutoría Social Complejidad 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 19,
            'course_id' => 112
        ]);







        Theme::create([
            'name' => 'Conductual, Cognitivo Conductual e Interconductual',
        ]);

        Course::create([
            'name' => 'Metodología en Social 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 20,
            'course_id' => 113
        ]);

        Course::create([
            'name' => 'Metodología en Social 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 20,
            'course_id' => 114
        ]);

        Course::create([
            'name' => 'Social Teórica 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 20,
            'course_id' => 115
        ]);
        
        Course::create([
            'name' => 'Social Teórica 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 20,
            'course_id' => 116
        ]);
        
        Course::create([
            'name' => 'Tutoría en Social 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 20,
            'course_id' => 117
        ]);

        Course::create([
            'name' => 'Tutoría en Social 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 20,
            'course_id' => 118
        ]);



        Theme::create([
            'name' => 'Existencial Humanista',
        ]);

        Course::create([
            'name' => 'Metodología en Social 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 21,
            'course_id' => 119
        ]);

        Course::create([
            'name' => 'Metodología en Social 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 21,
            'course_id' => 120
        ]);

        Course::create([
            'name' => 'Social Teórica 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 21,
            'course_id' => 121
        ]);

        Course::create([
            'name' => 'Social Teórica 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 21,
            'course_id' => 122
        ]);

        Course::create([
            'name' => 'Tutoría en Social 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 21,
            'course_id' => 123
        ]);

        Course::create([
            'name' => 'Tutoría en Social 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 21,
            'course_id' => 124
        ]);





        Theme::create([
            'name' => 'Psicoanálisis y Teoría Social',
        ]);

        Course::create([
            'name' => 'Metodología social Psicoanálisis 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 22,
            'course_id' => 125
        ]);

        Course::create([
            'name' => 'Metodología social Psicoanálisis 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 22,
            'course_id' => 126
        ]);

        Course::create([
            'name' => 'Social teórica 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 22,
            'course_id' => 127
        ]);

        Course::create([
            'name' => 'Tutoría en Social 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 22,
            'course_id' => 128
        ]);

        Course::create([
            'name' => 'Tutoría en Social 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 22,
            'course_id' => 129
        ]);





        
        Theme::create([
            'name' => 'Módulo aplicado',
        ]);

        Course::create([
            'name' => 'Introducción a Ámbitos Profesionales 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 23,
            'course_id' => 130
        ]);

        Course::create([
            'name' => 'Introducción a Ámbitos Profesionales 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 23,
            'course_id' => 131
        ]);

        Course::create([
            'name' => 'Propedéutica al Ejercicio Profesional 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 23,
            'course_id' => 132
        ]);

        Course::create([
            'name' => 'Propedéutica al Ejercicio Profesional 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 23,
            'course_id' => 133
        ]);

        Course::create([
            'name' => 'Taller de Formación Profesional 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 23,
            'course_id' => 134
        ]);

        Course::create([
            'name' => 'Taller de Formación Profesional 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 23,
            'course_id' => 135
        ]);

        Course::create([
            'name' => 'Taller de Integración Universitaria 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 23,
            'course_id' => 136
        ]);

        Course::create([
            'name' => 'Taller de Integración Universitaria 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 23,
            'course_id' => 137
        ]);





        Theme::create([
            'name' => 'Método metodológico',
        ]);

        Course::create([
            'name' => 'Estrategias Metodológicas 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 24,
            'course_id' => 138
        ]);

        Course::create([
            'name' => 'Estrategias Metodológicas 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 24,
            'course_id' => 139
        ]);

        Course::create([
            'name' => 'Estrategias Metodológicas 3',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 24,
            'course_id' => 140
        ]);

        Course::create([
            'name' => 'Estrategias Metodológicas 4',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 24,
            'course_id' => 141
        ]);

        Course::create([
            'name' => 'Procesos estadísticos 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 24,
            'course_id' => 142
        ]);

        Course::create([
            'name' => 'Procesos estadísticos 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 24,
            'course_id' => 143
        ]);

        Course::create([
            'name' => 'Procesos estadísticos 3',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 24,
            'course_id' => 144
        ]);

        Course::create([
            'name' => 'Procesos estadísticos 4',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 24,
            'course_id' => 145
        ]);





        Theme::create([
            'name' => 'Método teórico',
        ]);

        Course::create([
            'name' => 'Dimensión Biológica en Psicología 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 25,
            'course_id' => 146
        ]);

        Course::create([
            'name' => 'Dimensión Biológica en Psicología 2 matutino y vespertino',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 25,
            'course_id' => 147
        ]);

        Course::create([
            'name' => 'Tutorías en Dimensión Biológica en Psicología 1 matutino y vespertino',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 25,
            'course_id' => 148
        ]);

        Course::create([
            'name' => 'Tutorías en Dimensión Biológica en Psicología 2 matutino y vespertino',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 25,
            'course_id' => 149
        ]);

        Course::create([
            'name' => 'Tradiciones Teóricas 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 25,
            'course_id' => 150
        ]);

        Course::create([
            'name' => 'Tradiciones Teóricas 2 matutino',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 25,
            'course_id' => 151
        ]);

        Course::create([
            'name' => 'Tutorías de Tradiciones Teóricas 1 vespertino',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 25,
            'course_id' => 152
        ]);

        Course::create([
            'name' => 'Tutorías en Tradiciones Teóricas 2 vespertino',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 25,
            'course_id' => 153
        ]);

        Course::create([
            'name' => 'Tradiciones y Aplicaciones en Psicología 1 y 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 25,
            'course_id' => 154
        ]);

        Course::create([
            'name' => 'Tutorías de Tradiciones y Aplicaciones en Psicología 1 y 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 25,
            'course_id' => 155
        ]);

        Course::create([
            'name' => 'Dimensión Social en Psicología 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 25,
            'course_id' => 156
        ]);

        Course::create([
            'name' => 'Dimensión Social en Psicología 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 25,
            'course_id' => 157
        ]);

        Course::create([
            'name' => 'Tutorías en Dimensión Social en Psicología 1',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 25,
            'course_id' => 158
        ]);

        Course::create([
            'name' => 'Tutorías en Dimensión Social en Psicología 2',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 25,
            'course_id' => 159
        ]);





        Theme::create([
            'name' => 'Plan anterior',
        ]);

        Course::create([
            'name' => 'Desarrollo y Educación Teórica I',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 26,
            'course_id' => 160
        ]);

        Course::create([
            'name' => 'Desarrollo y Educación Teórica II',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 26,
            'course_id' => 161
        ]);

        Course::create([
            'name' => 'Desarrollo y Educación Teórica III',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 26,
            'course_id' => 162
        ]);

        Course::create([
            'name' => 'Educación Especial y Rehabilitación Teórica I',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 26,
            'course_id' => 163
        ]);

        Course::create([
            'name' => 'Educación Especial y Rehabilitación Teórica II. Sección A',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 26,
            'course_id' => 164
        ]);

        Course::create([
            'name' => 'Educación Especial y Rehabilitación Teórica II. Sección B',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 26,
            'course_id' => 165
        ]);

        Course::create([
            'name' => 'Educación Especial y Rehabilitación Teórica III. Sección A',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 26,
            'course_id' => 166
        ]);

        Course::create([
            'name' => 'Educación Especial y Rehabilitación Teórica III. Sección B',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 26,
            'course_id' => 167
        ]);

        Course::create([
            'name' => 'Educación Especial y Rehabilitación Teórica IV. Sección A',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 26,
            'course_id' => 168
        ]);

        Course::create([
            'name' => 'Educación Especial y Rehabilitación Teórica IV. Sección B',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 26,
            'course_id' => 169
        ]);

        Course::create([
            'name' => 'Metodología de la Investigación y Tecnología Aplicada',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 26,
            'course_id' => 170
        ]);

        Course::create([
            'name' => 'Métodos Cuantitativos V',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 26,
            'course_id' => 171
        ]);

        Course::create([
            'name' => 'Psicología Aplicada Laboratorio IV',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 26,
            'course_id' => 172
        ]);

        Course::create([
            'name' => 'Psicología Clínica Teórica I',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 26,
            'course_id' => 173
        ]);

        Course::create([
            'name' => 'Psicología Clínica Teórica III',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 26,
            'course_id' => 174
        ]);

        Course::create([
            'name' => 'Psicología Experimental Laboratorio V',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 26,
            'course_id' => 175
        ]);

        Course::create([
            'name' => 'Psicología Experimental Laboratorio VII',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 26,
            'course_id' => 176
        ]);

        Course::create([
            'name' => 'Psicología Social Teórica I',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 26,
            'course_id' => 177
        ]);

        Course::create([
            'name' => 'Psicología Social Teórica II',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 26,
            'course_id' => 178
        ]);

        Course::create([
            'name' => 'Psicología Social Teórica III',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 26,
            'course_id' => 179
        ]);

        Course::create([
            'name' => 'Psicología Social Teórica IV',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 26,
            'course_id' => 180
        ]);

        Course::create([
            'name' => 'Teoría de las ciencias sociales',
        ]);

        ThemeHasCourse::create([
            'theme_id' => 26,
            'course_id' => 181
        ]);



        AmbitHasTheme::create([
            'ambit_id' => 1,
            'theme_id' => 1,
        ]);


        AmbitHasTheme::create([
            'ambit_id' => 1,
            'theme_id' => 2,
        ]);

        AmbitHasTheme::create([
            'ambit_id' => 1,
            'theme_id' => 3,
        ]);



        

        AmbitHasTheme::create([
            'ambit_id' => 2,
            'theme_id' => 4,
        ]);

        AmbitHasTheme::create([
            'ambit_id' => 2,
            'theme_id' => 5,
        ]);

        AmbitHasTheme::create([
            'ambit_id' => 2,
            'theme_id' => 6,
        ]);

        AmbitHasTheme::create([
            'ambit_id' => 2,
            'theme_id' => 7,
        ]);

        AmbitHasTheme::create([
            'ambit_id' => 2,
            'theme_id' => 8,
        ]);



       

        AmbitHasTheme::create([
            'ambit_id' => 3,
            'theme_id' => 9,
        ]);

        AmbitHasTheme::create([
            'ambit_id' => 3,
            'theme_id' => 10,
        ]);

        AmbitHasTheme::create([
            'ambit_id' => 3,
            'theme_id' => 11,
        ]);



        


        AmbitHasTheme::create([
            'ambit_id' => 4,
            'theme_id' => 12,
        ]);

        AmbitHasTheme::create([
            'ambit_id' => 4,
            'theme_id' => 13,
        ]); 

        AmbitHasTheme::create([
            'ambit_id' => 4,
            'theme_id' => 14,
        ]);



        
        AmbitHasTheme::create([
            'ambit_id' => 5,
            'theme_id' => 15,
        ]);

        AmbitHasTheme::create([
            'ambit_id' => 5,
            'theme_id' => 16,
        ]);

        AmbitHasTheme::create([
            'ambit_id' => 5,
            'theme_id' => 17,
        ]);

        AmbitHasTheme::create([
            'ambit_id' => 5,
            'theme_id' => 18,
        ]);



       

        AmbitHasTheme::create([
            'ambit_id' => 6,
            'theme_id' => 19,
        ]);

        AmbitHasTheme::create([
            'ambit_id' => 6,
            'theme_id' => 20,
        ]);

        AmbitHasTheme::create([
            'ambit_id' => 6,
            'theme_id' => 21,
        ]);

        AmbitHasTheme::create([
            'ambit_id' => 6,
            'theme_id' => 22,
        ]);



        AmbitHasTheme::create([
            'ambit_id' => 7,
            'theme_id' => 23,
        ]);
        



        AmbitHasTheme::create([
            'ambit_id' => 8,
            'theme_id' => 24,
        ]);


        


        AmbitHasTheme::create([
            'ambit_id' => 9,
            'theme_id' => 25,
        ]);


        

        AmbitHasTheme::create([
            'ambit_id' => 10,
            'theme_id' => 26,
        ]);




       

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
