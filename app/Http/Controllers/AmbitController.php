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
        $ambit = AmbitHasTheme::where('theme_id', $course->themeHasCourse->theme_id)->get()->first();

        return view('ambit.course', compact('course', 'ambit'));

    }

    public function ambitUpdateCourse(Request $request) {
      
        $sindals = CourseHasSinodal::where('course_id', $request->id)->get();

        if(count($sindals) == 0){

            $sinodal1 = Sinodal::where('email',$request->sinodal1email)->get()->first();
            $sinodal2 = Sinodal::where('email',$request->sinodal2email)->get()->first();
            $sinodal3 = Sinodal::where('email',$request->sinodal3email)->get()->first();


            if($sinodal1 == null){
                $create_sinodals = new Sinodal();
                $create_sinodals->name = $request->sinodal1;
                $create_sinodals->email = $request->sinodal1email;
                $create_sinodals->save();

                $create_sinodal_course = new CourseHasSinodal();
                $create_sinodal_course->sinodal_id = $create_sinodals->id;
                $create_sinodal_course->course_id = $request->id;
                $create_sinodal_course->save();
            }

            if($sinodal2 == null){
                $create_sinodals2 = new Sinodal();
                $create_sinodals2->name = $request->sinodal2;
                $create_sinodals2->email = $request->sinodal1email;
                $create_sinodals2->save();

                $create_sinodal_course2 = new CourseHasSinodal();
                $create_sinodal_course2->sinodal_id = $create_sinodals2->id;
                $create_sinodal_course2->course_id = $request->id;
                $create_sinodal_course2->save();
            }


            if($sinodal3 == null){
                $create_sinodals3 = new Sinodal();
                $create_sinodals3->name = $request->sinodal3;
                $create_sinodals3->email = $request->sinodal1email;
                $create_sinodals3->save();

                $create_sinodal_course = new CourseHasSinodal();
                $create_sinodal_course->sinodal_id = $create_sinodals3->id;
                $create_sinodal_course->course_id = $request->id;
                $create_sinodal_course->save();
            }
            
        }else{
           
            $sinodal1 = Sinodal::where('email',$request->sinodal1email)->get()->first();
            $sinodal2 = Sinodal::where('email',$request->sinodal2email)->get()->first();
            $sinodal3 = Sinodal::where('email',$request->sinodal3email)->get()->first();

            if($sinodal1 == null){
                $create_sinodals = new Sinodal();
                $create_sinodals->name = $request->sinodal1;
                $create_sinodals->email = $request->sinodal1email;
                $create_sinodals->save();

                $sindals[0]->sinodal_id = $create_sinodals->id;
                $sindals[0]->course_id = $request->id;
                $sindals[0]->save();

            }else{
                $sindals[0]->sinodal_id = $sinodal1->id;
                $sindals[0]->course_id = $request->id;
                $sindals[0]->save();
            }

            if($sinodal2 == null){
                $create_sinodals2 = new Sinodal();
                $create_sinodals2->name = $request->sinodal2;
                $create_sinodals2->email = $request->sinodal1email;
                $create_sinodals2->save();

                $sindals[1]->sinodal_id = $create_sinodals2->id;
                $sindals[1]->course_id = $request->id;
                $sindals[1]->save();

            }else{
                $sindals[1]->sinodal_id = $sinodal2->id;
                $sindals[1]->course_id = $request->id;
                $sindals[1]->save();
            }


            if($sinodal3 == null){
                $create_sinodals3 = new Sinodal();
                $create_sinodals3->name = $request->sinodal3;
                $create_sinodals3->email = $request->sinodal1email;
                $create_sinodals3->save();

                $sindals[2]->sinodal_id = $create_sinodals3->id;
                $sindals[2]->course_id = $request->id;
                $sindals[2]->save();

            }else{
                $sindals[2]->sinodal_id = $sinodal3->id;
                $sindals[2]->course_id = $request->id;
                $sindals[2]->save();
            }
            
        }

        $course = Course::findOrFail($request->id);
        
        $course->update([

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

        return $request;
        $create_course = new Course();
        $create_course->name = $request->name;
        $create_course->save();

        $create_theme_has_course = new ThemeHasCourse();
        $create_theme_has_course->theme_id = $request->theme_id;
        $create_theme_has_course->theme_id = $create_course->id;
        $create_theme_has_course->save();

        return back()->with('success', 'Curso agregado exitosamente');
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

   
}
