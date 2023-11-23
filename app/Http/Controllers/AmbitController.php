<?php

namespace App\Http\Controllers;

use App\Models\Ambit;
use App\Models\Course;
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

        return view('ambit.course', compact('course'));

    }

    public function ambitUpdateCourse(Request $request) {

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
