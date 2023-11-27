<?php

namespace App\Http\Controllers;

use App\Models\Ambit;
use App\Models\Course;
use App\Models\Period;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;

class AlumnoController extends Controller
{
    public function index()  {
        
        $period = Period::first();
        $ambits = Ambit::all();

        return view('alumnos.index', compact('ambits', 'period'));
    }

    public function course($id) {
        $period = Period::first();
        $course = Course::where('id', $id)->get()->first();
        return view('alumnos.course',compact('course', 'period'));
    }

    public function download(Request $request)  {
        
        $period = Period::first();
        $course = Course::find($request->id);

        $pdf = \PDF::loadView('pdf.course', ['period' => $period, 'course' => $course]);
        $pdf->setPaper('Letter', 'portrait');
        $filename = $course->name . ".pdf";
        $pdf->save(public_path($filename));
   
        return response()->download(public_path($filename))->deleteFileAfterSend(true);
    }
}
