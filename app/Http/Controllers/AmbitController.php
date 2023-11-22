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
}
