<?php

namespace App\Http\Controllers;

use App\Models\Ambit;
use App\Models\AmbitHasTheme;
use App\Models\Course;
use App\Models\CourseHasSinodal;
use App\Models\Sinodal;
use App\Models\Theme;
use App\Models\ThemeHasCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AmbitController extends Controller
{
    public function store(Request $request) {
        $create_ambit = new Ambit();
        $create_ambit->name = $request->name;
        $create_ambit->description = $request->description;
        $create_ambit->period_id =1;
        $create_ambit->save();

        return redirect()->route('index')
        ->with('success', 'Ambito agregado satisfactoriamente');

    }

    public function delete(Request $request) {

        DB::table('ambits')->where('id',$request->id)->update([
            'status' => 0
        ]);

        return back()->with('success', 'Ámbito eliminado exitosamente');
    }

    public function ambitDetail($id) {
        
        $ambit = Ambit::where('id', $id)->get()->first();
        return view('ambit.index', compact('ambit'));

    }

    public function ambitDetailDelete(Request $request) {

        DB::table('themes')->where('id',$request->theme_id)->update([
            'status' => 0
        ]);

        return back()->with('success', 'Tema eliminado exitosamente');
    }

    public function ambitDetailCourse($id) {

        $course = Course::where('id', $id)->get()->first();
        if ($course !== null && $course->themeHasCourse !== null) {
            $ambit = AmbitHasTheme::where('theme_id', $course->themeHasCourse->theme_id)->first();
        }else{
            $ambit = [];
        }
        
        

        return view('ambit.course', compact('course', 'ambit'));

    }

    public function ambitUpdateCourse(Request $request) {
      
        $course = Course::findOrFail($request->course_id);
        

        DB::table('courses')->where('id', $request->course_id)->update([
            'sinodal1' => $request->sinodal1,
            'sinodal1email' => $request->sinodal1email,
            'sinodal2' => $request->sinodal2,
            'sinodal2email' => $request->sinodal2email,
            'sindal_name3' => $request->sindal_name3,
            'sindal_email3' => $request->sindal_email3,

            'date_test' => $request->date_test,
            'school_shift' => $request->school_shift,
            'classroom' => $request->classroom,
            'start' => $request->start,
            'end' => $request->end,
            'introduction' => $request->introduction,
            'general_criteria' => $request->general_criteria,
            'documents' => $request->documents,
            'works' => $request->works,
            'work_criteria' => $request->work_criteria,
            'work_requeriment' => $request->work_requeriment,
            'evaluation_criteria' => $request->evaluation_criteria,
            'theme_references' => $request->theme_references,
            'suggestion' => $request->suggestion,
            'other' => $request->other,

        ]);
    
        return back()->with('success', 'Curso actualizado exitosamente');


    }

    public function ambitCreateCourse(Request $request)  {

        $create_course = new Course();
        $create_course->name = $request->name;
        $create_course->save();

        $create_theme_has_course = new ThemeHasCourse();
        $create_theme_has_course->theme_id = $request->theme_id;
        $create_theme_has_course->course_id  = $create_course->id;
        $create_theme_has_course->save();

        return back()->with('success', 'Curso agregado exitosamente');
    }

    public function ambitEditCourse(Request $request) {

        DB::table('courses')->where('id', $request->course_id)->update([
            'name' => $request->name
        ]);

        return back()->with('success', 'Curso actualizado exitosamente');
    }

    public function ambitDeleteCourse(Request $request) {

        DB::table('theme_has_course')->where('course_id', $request->course_id)->delete();

        DB::table('courses')->where('id', $request->course_id)->delete();

        return back()->with('success', 'Curso eliminado exitosamente');
    }

    public function ambitAddTheme(Request $request) {
        
        $create_theme = new Theme();
        $create_theme->name = $request->name;
        $create_theme->save();

        $create_ambit_has_theme = new AmbitHasTheme();
        $create_ambit_has_theme->theme_id = $create_theme->id;
        $create_ambit_has_theme->ambit_id = $request->ambit_id;
        $create_ambit_has_theme->save();

        return back()->with('success', 'Tema creado exitosamente');

    }

    public function ambitDeleteTheme(Request $request) {
        
        DB::table('themes')->where('id',$request->theme_id)->update([
            'status' => 0
        ]);

        return back()->with('success', 'Tema eliminado exitosamente');

    }

    public function ambitUpdateEnableCourse(Request $request) {

        DB::table('courses')->where('id',$request->course_id)->update([
            'available' => 1
        ]);

        return back()->with('success', 'El curso ahora es público');

    }
   
    public function ambitUpdateDisableCourse(Request $request) {

        DB::table('courses')->where('id',$request->course_id)->update([
            'available' => 0
        ]);

        return back()->with('success', 'El curso ahora es privado');

    }
}
