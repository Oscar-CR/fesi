@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-4 w-full bg-white  rounded-lg shadow-lg p-6">
    @if($course->available == 1)
   
    <div class="flex">
        <a href="{{ url()->previous() }}">
            <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 12H18M6 12L11 7M6 12L11 17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>
        <p class="font-bold text-2xl">
            CRITERIOS PARA EL EXAMEN EXTRAORDINARIO DEL {{ strtoupper($period->name) }}
        </p>
    </div>
    
    <table class="border-collapse border border-black w-full mt-8" >
        <tbody>
            <tr>
                <td class="border border-black p-2" style="width: 30%; text-align: center;"><label for="sinodal1" class="font-bold text-xl">Asignatura:</label></td>
                <td class="border border-black p-2" style="width: 70%; text-align: center;" ><p class="font-bold text-xl">{{ $course->name }} ({{ $course->themeHasCourse->theme->name }})</p> </td>
            </tr>
            <tr>
                <td class="border border-black p-2"><label for="sinodal1" class="font-bold" style="width: 30%;">1. SINODAL(ES): (NOMBRE COMPLETO)</label></td>
                <td class="border border-black p-2" style="width: 70%;"> 
                    <p>{{ isset($course->sinodal1)? $course->sinodal1 : ''  }}</p>
                    <p>{{ isset($course->sinodal2)? $course->sinodal2 : ''  }}</p>
                    <p>{{ isset($course->sinodal3)? $course->sinodal3 : ''  }}</p>
                </td>
            </tr>
            <tr>
                <td class="border border-black p-2"><label for="sinodal2" class="font-bold">2. CORREO ELECTRÓNICO:</label></td>
                <td class="border border-black p-2">
                    <p>{{ isset($course->sinodal1email)? $course->sinodal1email : '' }}</p>
                    <p>{{ isset($course->sinodal2email)? $course->sinodal2email : '' }}</p>
                    <p>{{ isset($course->sinodal3email)? $course->sinodal3email : '' }}</p>
                </td>
            </tr>
            <tr>
                <td class="border border-black p-2"><label for="date_test" class="font-bold">3. FECHA DEL EXÁMEN</label></td>
                <td class="border border-black p-2">{{ $course->date_test }}</td>
            </tr>
            <tr>
                <td class="border border-black p-2"><label for="school_shift" class="font-bold">4. TURNO DEL EXAMEN:</label></td>
                <td class="border border-black p-2">{{ $course->school_shift }}</td>
            </tr>
            <tr>
                <td class="border border-black p-2"><label for="introduction" class="font-bold">5. BREVE INTRODUCCIÓN: (OPCIONAL)</label></td>
                <td class="border border-black p-2">{{ $course->introduction }}</td>
            </tr>

            <tr>
                <td class="border border-black p-2"><label for="classroom" class="font-bold">6. AULA EN DONDE SE LLEVARÁ A CABO EL EXAMEN:</label></td>
                <td class="border border-black p-2">{{ $course->classroom }}</td>
            </tr>

            <tr>
                <td class="border border-black p-2"><label for="general_criteria" class="font-bold">7. CRITERIOS GENERALES PARA DERECHO A EXAMEN:</label></td>
                <td class="border border-black p-2">{{ $course->general_criteria }}</td>
            </tr>

            <tr>
                <td class="border border-black p-2"><label for="start" class="font-bold">8. HORARIO: </label></td>
                <td class="border border-black p-2">{{ \Carbon\Carbon::parse($course->start)->format('Y-m-d\ H:i') . ' - ' .\Carbon\Carbon::parse($course->end)->format('Y-m-d H:i')  }}</td>
            </tr>
        
            <tr>
                <td class="border border-black p-2"><label for="documents" class="font-bold">9. DOCUMENTOS A ENTREGAR: (COMPROBANTE DE INSCRIPCIÓN, IDENTIFICACIÓN OFICIAL, OTROS)</label></td>
                <td class="border border-black p-2">{{ $course->documents }}</td>
            </tr>
            <tr>
                <td class="border border-black p-2"><label for="works" class="font-bold">10. TRABAJOS PREVIOS A ENTREGAR: (OPCIONAL)</label></td>
                <td class="border border-black p-2">{{ $course->works }}</td>
            </tr>
            <tr>
                <td class="border border-black p-2"><label for="work_criteria" class="font-bold">11. CRITERIOS DE TRABAJOS PREVIOS A ENTREGAR: (OPCIONAL EN RELACIÓN CON EL PUNTO ANTERIOR)</label></td>
                <td class="border border-black p-2">{{ $course->work_criteria }}</td>
            </tr>
            <tr>
                <td class="border border-black p-2"><label for="work_requeriment" class="font-bold">12. ESPECIFICAR LA FORMA DE ENTREGAR LOS TRABAJOS PREVIOS: (OPCIONAL EN RELACIÓN CON EL PUNTO ANTERIOR: POR CORREO O EN FÍSICO EL DÍA DEL EXAMEN)</label></td>
                <td class="border border-black p-2">{{ $course->work_requeriment }}</td>
            </tr>
            <tr>
                <td class="border border-black p-2"><label for="evaluation_criteria" class="font-bold">13. CRITERIOS DE EVALUACIÓN DEL EXAMEN EXTRAORDINARIO A PRESENTAR</label></td>
                <td class="border border-black p-2">{{ $course->evaluation_criteria }}</td>
            </tr>
            <tr>
                <td class="border border-black p-2"><label for="theme_references" class="font-bold">14. TEMAS Y REFERENCIAS A CONSULTAR PARA PREPARAR LA PRESENTACIÓN DEL EXAMEN EXTRAORDINARIO</label></td>
                <td class="border border-black p-2">{{ $course->theme_references }}</td>
            </tr>
            <tr>
                <td class="border border-black p-2"><label for="suggestion" class="font-bold">15. SUGERENCIAS PARA LA PRESENTACIÓN DEL EXAMEN EXTRAORDINARIO: (OPCIONAL)</label></td>
                <td class="border border-black p-2">{{ $course->suggestion }}</td>
            </tr>
            <tr>
                <td class="border border-black p-2"><label for="other" class="font-bold">16.OTROS ELEMENTOS QUE SE CONSIDEREN IMPORTANTES PARA QUE EL ALUMNADO PRESENTE EL EXTRAORDINARIO</label></td>
                <td class="border border-black p-2">{{ $course->other }}</td>
            </tr>
        </tbody>
    </table>

    <div class="mt-6">
        <form action="{{ route('alumno.course.download', ['id' => $course->id]) }}" method="POST">
            @csrf
            <!-- Aquí puedes agregar campos adicionales si es necesario -->
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 p-2 rounded text-white">DESCARGAR</button>
        </form>
    </div>
    
    @else
        Curso no disponible
    @endif
    
</div>
@endsection