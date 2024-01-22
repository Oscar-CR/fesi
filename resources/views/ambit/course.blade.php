@extends('layouts.app')

@section('content')
@include('components.header') 
<div class="container mx-auto mt-4 w-full">

    <div class="bg-white rounded-lg shadow-lg p-6 ">
    <div class="flex">
        <a href="{{ route('ambit.detail', ['id' =>$ambit->ambit_id])}}">
            <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 12H18M6 12L11 7M6 12L11 17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>
        <div class="flex justify-between w-full">
            <div>
                <p class="font-bold text-2xl">
                    {{ $course->name }}
                </p>
            </div>
            
            <div>
                @role('admin')
                    @if($course->available == 0)
                        <form action="/course/enable/" method="POST">
                        @csrf
                        @method('POST')
                            <input type="hidden" name="course_id" value="{{$course->id}}"> 
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Habilitar Curso</button>
                        </form>
                    @else
                        <form action="/course/disable/" method="POST">
                        @csrf
                        @method('POST')
                            <input type="hidden" name="course_id" value="{{$course->id}}">
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Deshabilitar Curso</button>
                        </form>
                    @endif
                @endrole('admin')
            </div>
        </div>

        
    </div>
    
    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-4 mt-4 ">
            {{ session('success') }}
        </div>
    @endif
            

        <br>

        <form action="{{ route('ambit.update.course',  $course->id) }}" method="POST" class="bg-white p-6">
            @csrf
            @method('POST')

           
            <input type="text" id="course_id" name="course_id" value="{{ $course->id }}" class="w-full border-gray-300 rounded-md px-4 py-2" hidden>
    
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="sinodal1" class="block mb-2  font-bold mb-2">Sinodal 1:</label>
                    <input type="text" id="sinodal1" name="sinodal1" value="{{ $course->sinodal1 }}" class="w-full border-gray-300 rounded-md px-4 py-2">
                </div>
                <div>
                    <label for="sinodal2" class="block mb-2  font-bold mb-2">Correo sinodal 1:</label>
                    <input type="text" id="sinodal1" name="sinodal1email" value="{{ $course->sinodal1email }}" class="w-full border-gray-300 rounded-md px-4 py-2">
                </div>

                <div>
                    <label for="sinodal2" class="block mb-2  font-bold mb-2">Sinodal 2 (opcional):</label>
                    <input type="text" id="sinodal2" name="sinodal2" value="{{ $course->sinodal2 }}" class="w-full border-gray-300 rounded-md px-4 py-2">
                </div>
                <div>
                    <label for="sinodal2" class="block mb-2  font-bold mb-2">Correo sinodal 2 (opcional):</label>
                    <input type="text" id="sinodal2" name="sinodal2email" value="{{ $course->sinodal2email }}" class="w-full border-gray-300 rounded-md px-4 py-2">
                </div>

                <div>
                    <label for="sinodal3" class="block mb-2  font-bold mb-2">Sinodal 3 (opcional):</label>
                    <input type="text" id="sinodal3" name="sinodal3" value="{{ $course->sinodal3  }}" class="w-full border-gray-300 rounded-md px-4 py-2">
                </div>
                <div>
                    <label for="sinodal3" class="block mb-2  font-bold mb-2">Correo sinodal 3 :</label>
                    <input type="text" id="sinodal3" name="sinodal3email" value="{{ $course->sinodal3email }}" class="w-full border-gray-300 rounded-md px-4 py-2">
                </div>

                

                <div class="mt-10">
                    <div class="flex">
                        <div class="w-1/2  pr-4">
                            <label for="date_test" class="block mb-2  font-bold mb-2 ">Fecha de examen:</label>
                            <input type="date" id="date_test" name="date_test" value="{{ $course->date_test }}" class="w-full rounded-md px-4 py-2">
                        </div>
                        <div class="w-1/2 ">
                            <label for="school_shift" class="block  font-bold mb-2">Turno de examen:</label>
                            <input type="text" id="school_shift" name="school_shift" value="{{ $course->school_shift }}" class="w-full border-gray-300 rounded-md px-4 py-2">
                        </div>
                    </div>
                </div>
                <div  class="mt-10">
                    <div class="flex">
                        <div class="w-1/3 pr-4">
                            <label for="classroom" class="block  font-bold mb-2">Aula de examen :</label>
                            <input type="text" id="classroom" name="classroom" value="{{ $course->classroom }}" class="w-full border-gray-300 rounded-md px-4 py-2">
                        </div>
                        <div class="w-1/3 pr-4">
                            <label for="start" class="block  font-bold mb-2">Horario inicio:</label>
                            <input type="datetime-local" id="start" name="start" value="{{ filled($course->start) ? \Carbon\Carbon::parse($course->start)->format('Y-m-d\TH:i') : '' }}" class="w-full border-gray-300 rounded-md px-4 py-2">
                        </div>
                        <div class="w-1/3">
                            <label for="end" class="block text-lg font-bold mb-2">Horario fin:</label>
                            <input type="datetime-local" id="end" name="end" value="{{ filled($course->end) ? \Carbon\Carbon::parse($course->end)->format('Y-m-d\TH:i') : '' }}" class="w-full border-gray-300 rounded-md px-4 py-2">
                        </div>
                    </div>
                </div>
                
                <div>
                    <label for="introduction" class="block font-bold mb-2">Breve introducción (opcional) :</label>
                    <input type="text" id="introduction" name="introduction" value="{{ $course->introduction }}" class="w-full border-gray-300 rounded-md px-4 py-2">
                </div>
                <div>
                    <label for="general_criteria" class="block font-bold mb-2">Criterios generales para derecho a examen:</label>
                    <textarea id="general_criteria" name="general_criteria" class="w-full border-gray-300 rounded-md px-4 py-2">{{ $course->general_criteria }}</textarea>
                </div>
                <div>
                    <label for="documents" class="block font-bold mb-2">Documentos a entregar (Comprobante de inscripción, identificación oficial, otros) :</label>
                    <textarea id="documents" name="documents" class="w-full border-gray-300 rounded-md px-4 py-2">{{ $course->documents }}</textarea>
                </div>
                <div>
                    <label for="works" class="block font-bold mb-2">Trabajos previos a entregar (Opcional):</label>
                    <textarea id="works" name="works" class="w-full border-gray-300 rounded-md px-4 py-2">{{ $course->works }}</textarea>
                </div>
                <div>
                    <label for="work_criteria" class="block font-bold mb-2">Criterios de trabajos previos a entregar (Opcional en relación con el punto anterior):</label>
                    <textarea id="work_criteria" name="work_criteria" class="w-full border-gray-300 rounded-md px-4 py-2">{{ $course->work_criteria }}</textarea>
                </div>
                <div>
                    <label for="work_requeriment" class="block font-bold mb-2">Especificar la forma de entregar los trabajos previos (Opcional en relación con el punto anterior: Por correo o en físico el día del examen):</label>
                    <textarea id="work_requeriment" name="work_requeriment" class="w-full border-gray-300 rounded-md px-4 py-2">{{ $course->work_requeriment }}</textarea>
                </div>
                <div>
                    <label for="evaluation_criteria" class="block font-bold mb-2">Criterios de evaluación del examen extraordinario  a presentar:</label>
                    <textarea id="evaluation_criteria" name="evaluation_criteria" class="w-full border-gray-300 rounded-md px-4 py-2">{{ $course->evaluation_criteria }}</textarea>
                </div>
                <div>
                    <label for="theme_references" class="block font-bold mb-2">Temas y referencias a consultar para preparar la presentación del examen extraordinario:</label>
                    <textarea id="theme_references" name="theme_references" class="w-full border-gray-300 rounded-md px-4 py-2">{{ $course->theme_references }}</textarea>
                </div>
                <div>
                    <label for="suggestion" class="block font-bold mb-2">Sugerencias para la presentación del examen extraordinario (Opcional):</label>
                    <textarea id="suggestion" name="suggestion" class="w-full border-gray-300 rounded-md px-4 py-2">{{ $course->suggestion }}</textarea>
                </div>
                <div>
                    <label for="other" class="block font-bold mb-2">Otros elementos que se consideren importantes para que el alumnado presente el extraordinario:</label>
                    <textarea id="other" name="other" class="w-full border-gray-300 rounded-md px-4 py-2">{{ $course->other }}</textarea>
                </div>
            </div>

            @if($course->name != null && $course->sinodal1 != null &&  $course->sinodal1email != null && 
                $course->date_test != null && $course->school_shift != null && $course->classroom  != null && 
                $course->start != null && $course->end != null && $course->introduction != null && 
                $course->general_criteria != null && $course->documents != null && $course->works != null &&  
                $course->work_criteria != null && $course->work_requeriment != null && $course->evaluation_criteria != null &&
                $course->theme_references != null && $course->suggestion != null && $course->other != null )
                @role('admin')                 
                    <div class="mt-4">
                        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white rounded-md px-4 py-2">Guardar</button>
                    </div> 
                @endrole('admin')
            @else
            <div class="mt-4">
                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white rounded-md px-4 py-2">Guardar</button>
            </div>
            @endif

            
        </form>

        <form class="form-clear"
            action="{{ route('ambit.theme.clear', ['id' => $course->id]) }}"
            method="POST">
            @csrf
            @method('POST')
            <div class=" mx-6">
                <button id="form-clear" type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white rounded-md px-4 py-2">Limpiar registros</button>
            </div>
        </form>
        
       
    </div>
</div>
@endsection

@section('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    console.log('aaaaaaa')
    $(document).ready(function() {
        $('.form-delete').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡El curso se eliminará permanentemente!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Sí, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });


        $('.form-clear').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡Los registros de este curso se limpiaran y tendrás que llenarlos de nuevo!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Sí, limpiar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    });
</script>
@endsection