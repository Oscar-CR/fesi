<?php

namespace App\Http\Controllers;

use App\Models\Ambit;
use App\Models\AmbitHasTheme;
use App\Models\Course;
use App\Models\CourseHasSinodal;
use App\Models\Sinodal;
use App\Models\ThemeHasCourse;
use Illuminate\Http\Request;

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

    public function ambitDetail($id) {
        
        $ambit = Ambit::where('id', $id)->get()->first();
        
        return view('ambit.index', compact('ambit'));

    }

    public function ambitDetailCourse($id) {

        $course = Course::where('id', $id)->get()->first();
        $ambit = AmbitHasTheme::where('theme_id', $course->themeHasCourse->theme_id)->get()->first();

        return view('ambit.course', compact('course', 'ambit'));

    }

    public function ambitUpdateCourse(Request $request) {

        $sindals = CourseHasSinodal::where('course_id', $request->id)->get();

        if($sindals == null){

            $sinodal1 = Sinodal::where('email',$request->sonodal1email)->get()->first();
            $sinodal2 = Sinodal::where('email',$request->sonodal2email)->get()->first();
            $sinodal3 = Sinodal::where('email',$request->sonodal3email)->get()->first();


            if($sinodal1 == null){
                $create_sinodals = new Sinodal();
                $create_sinodals->name = $request->sonodal1;
                $create_sinodals->email = $request->sonodal1email;
                $create_sinodals->save();

                $create_sinodal_course = new CourseHasSinodal();
                $create_sinodal_course->sinodal_id = $create_sinodals->id;
                $create_sinodal_course->course_id = $request->id;
                $create_sinodal_course->save();
            }

            if($sinodal2 == null){
                $create_sinodals2 = new Sinodal();
                $create_sinodals2->name = $request->sonodal2;
                $create_sinodals2->email = $request->sonodal1email;
                $create_sinodals2->save();

                $create_sinodal_course2 = new CourseHasSinodal();
                $create_sinodal_course2->sinodal_id = $create_sinodals2->id;
                $create_sinodal_course2->course_id = $request->id;
                $create_sinodal_course2->save();
            }


            if($sinodal3 == null){
                $create_sinodals3 = new Sinodal();
                $create_sinodals3->name = $request->sonodal3;
                $create_sinodals3->email = $request->sonodal1email;
                $create_sinodals3->save();

                $create_sinodal_course = new CourseHasSinodal();
                $create_sinodal_course->sinodal_id = $create_sinodals3->id;
                $create_sinodal_course->course_id = $request->id;
                $create_sinodal_course->save();
            }
            
        }else{

            $sinodal1 = Sinodal::where('email',$request->sonodal1email)->get()->first();
            $sinodal2 = Sinodal::where('email',$request->sonodal2email)->get()->first();
            $sinodal3 = Sinodal::where('email',$request->sonodal3email)->get()->first();

            if($sinodal1 == null){
                $create_sinodals = new Sinodal();
                $create_sinodals->name = $request->sonodal1;
                $create_sinodals->email = $request->sonodal1email;
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
                $create_sinodals2->name = $request->sonodal2;
                $create_sinodals2->email = $request->sonodal1email;
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
                $create_sinodals3->name = $request->sonodal3;
                $create_sinodals3->email = $request->sonodal1email;
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


   
}
