@extends('layouts.app')

@section('content')
@include('components.header') 
<div class="container mx-auto mt-4 w-full">

    <div class="bg-white rounded-lg shadow-lg p-6 ">

        <div class="flex justify-between items-center">
            <div class="flex">
                <a href="{{ route('index')}}">
                    <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 12H18M6 12L11 7M6 12L11 17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
                <h1 class="text-2xl font-bold ">{{ $ambit->name}} </h1>
            </div>
            
            <div class="flex">
                @role('admin')
                    <button data-modal-target="static-modal" data-modal-toggle="static-modal" class="block text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                        Agregar tema
                    </button>

                    <button data-modal-target="static-modal-delete" data-modal-toggle="static-modal-delete" class="ml-4 block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                        Eliminar tema
                    </button>
                @endrole('admin')
            </div>
            
        </div>
        
        <div class="separador mb-12"></div>
        @if (session()->has('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Éxito:</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        <!-- Main modal -->
        <div id="static-modal"  tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                    <form method="POST" action="{{ route('ambit.theme.store', ['ambit_id' => $ambit->id]) }}" class="mt-4">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Agregar tema
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="static-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Cerrar ambito </span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-4">
                            
                            @csrf

                            <label for="name" class="block">Nombre:</label>
                            <input type="text" id="name" name="name" class="border border-gray-300 rounded-md px-3 py-2 mt-1 mb-4 focus:outline-none focus:ring-blue-500 focus:border-blue-500 block w-full">

                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button data-modal-hide="static-modal" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Agregar</button>
                            <button data-modal-hide="static-modal" type="button" class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div id="static-modal-delete"  tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                    <form method="POST" action="{{ route('ambit.theme.delete') }}" class="mt-4">
                    @csrf
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Eliminar tema
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="static-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Cerrar ambito </span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-4">
                            
                           
                            <label for="name" class="block">Selecciona el tema a borrar:</label>
                            <select class="form-select block w-full mt-1 text-black" name="theme_id">
                                @foreach($ambit->ambitHasTheme as $theme)
                                    @if($theme->theme->status ==1)
                                        <option class="text-black" value="{{ $theme->id }}">{{ $theme->theme->name }}</option>
                                    @endif
                                @endforeach
                            </select>


                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button data-modal-hide="static-modal-delete" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Aceptar</button>
                            <button data-modal-hide="static-modal-delete" type="button" class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    
        <div class="w-full">
         
        @if($ambit->ambitHasTheme != null)

        @foreach($ambit->ambitHasTheme as $index => $theme)

            @if($theme->theme->status == 1)
            <div id="accordion-flush-{{$index}}" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                <h2 id="accordion-flush-heading-{{$theme->id}}">
                    <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3 bg-sky-50 p-8" data-accordion-target="#accordion-flush-body-{{$index}}" aria-expanded="true" aria-controls="accordion-flush-body-{{$index}}">
                        <span class="text-xl font-bold w-full text-left">
                            {{ $theme->theme->name }} 
                        </span>
                        <div class="flex">
                        <!-- <form method="POST" action="{{ route('ambit.theme.delete', ['theme_id' => $theme->id]) }}" class="mr-6">
                            @csrf 
                            <button type="submit"><svg fill="#870000" width="20px" height="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M5.755,20.283,4,8H20L18.245,20.283A2,2,0,0,1,16.265,22H7.735A2,2,0,0,1,5.755,20.283ZM21,4H16V3a1,1,0,0,0-1-1H9A1,1,0,0,0,8,3V4H3A1,1,0,0,0,3,6H21a1,1,0,0,0,0-2Z"/></svg></button>
                        </form>    -->                         
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                            </svg>
                        </div>
                        
                    </button>
                </h2>

                <div id="accordion-flush-body-{{$index}}" class="hidden" aria-labelledby="accordion-flush-heading-{{$theme->id}}">

                    <div class="flex justify-between">
                        <p class="ml-8 mt-6 text-xl">Cursos disponibles:</p>
                        @role('admin')
                            <button data-modal-target="static-modal-add-course-{{$theme->id}}" data-modal-toggle="static-modal-add-course-{{$theme->id}}" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mt-2 mb-2">
                                Agregar curso
                            </button>
                        @endrole('admin')
                    </div>
                    <div class="py-5 border-b border-gray-200 dark:border-gray-700 p-8">
                        @foreach($theme->theme->themeHasCourse as $course)

                        <div id="static-modal-edit-course-{{$course->id}}"  tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                                    <form method="POST" action="{{ route('ambit.edit.course', ['course_id' => $course->course->id]) }}" class="mt-4">
                                        @csrf
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                Editar curso
                                            </h3>
                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="static-modal">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Cerrar ambito </span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-4 md:p-5 space-y-4">

                                            <label for="name" class="block">Nombre del curso:</label>
                                            <input type="text" id="name" name="name" class="border border-gray-300 rounded-md px-3 py-2 mt-1 mb-4 focus:outline-none focus:ring-blue-500 focus:border-blue-500 block w-full" value="{{$course->course->name }}">

                                        </div>
                                        <!-- Modal footer -->
                                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                            <button data-modal-hide="static-modal-edit-course-{{$course->id}}" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Actualizar</button>
                                            <button data-modal-hide="static-modal-edit-course-{{$course->id}}" type="button" class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    
                        
                        <ul class="list-disc list-inside">
                            <li class="flex justify-between items-center py-2">
                                <a class="hover:text-blue-500" href="{{ route('ambit.detail.course', ['id' => $course->course->id])}}">
                                    <div class="flex">
                                        <p class="mr-2">{{ $course->course->name }}</p>
                                            @if($course->course->name != null && $course->course->sinodal1 != null &&  $course->course->sinodal1email != null && 
                                                $course->course->date_test != null && $course->course->school_shift != null && $course->course->classroom  != null && 
                                                $course->course->start != null && $course->course->end != null && $course->course->introduction != null && 
                                                $course->course->general_criteria != null && $course->course->documents != null && $course->course->works != null &&  
                                                $course->course->work_criteria != null && $course->course->work_requeriment != null && $course->course->evaluation_criteria != null &&
                                                $course->course->theme_references != null && $course->course->suggestion != null && $course->course->other != null )
                                                <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Completado</span>
                                            @elseif ($course->course->name != null && $course->course->sinodal1 == null &&  $course->course->sinodal1email == null && 
                                                $course->course->date_test == null && $course->course->school_shift == null && $course->course->classroom  == null && 
                                                $course->course->start == null && $course->course->end == null && $course->course->introduction == null && 
                                                $course->course->general_criteria == null && $course->course->documents == null && $course->course->works == null &&  
                                                $course->course->work_criteria == null && $course->course->work_requeriment == null && $course->course->evaluation_criteria == null &&
                                                $course->course->theme_references == null && $course->course->suggestion == null && $course->course->other == null )
                                                <span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/20">Sin llenar</span>

                                            @else
                                            <span class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-700 ring-1 ring-inset ring-yellow-600/20">No completado</span>

                                            @endif
                                            <b class="ml-2"></b>
                                        @role('admin')
                                           
                                            @if( $course->course->available ==1 )
                                                <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-600/20">Visible</span>
                                            @else
                                                <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-700 ring-1 ring-inset ring-gray-600/10">Oculto</span>
                                            @endif
                                          
                                           

                                        @endrole('admin')
                                       
                                    </div>
                                    
                                </a>
                                <div class="flex">
                                    @role('admin')
                                        <button data-modal-target="static-modal-edit-course-{{$course->id}}" data-modal-toggle="static-modal-edit-course-{{$course->id}}" class="text-blue-700 mr-2" type="button">
                                            Editar 
                                        </button>
                                        <form class="form-delete"
                                            action="{{ route('ambit.delete.course', ['course_id' => $course->course_id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('POST')
                                                <button  class="text-red-700" type="submit">
                                                    Eliminar 
                                                </button>
                                        </form>
                                    @endrole('admin')
                                </div>
                            </li>
                        </ul>

                        @endforeach
                    </div>
                </div>

                <div id="static-modal-add-course-{{$theme->id}}"  tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                            <form method="POST" action="{{ route('ambit.create.course', ['theme_id' => $theme->theme->id]) }}" class="mt-4">
                                @csrf
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                               
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Agregar curso
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="static-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Cerrar ambito </span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4 md:p-5 space-y-4">

                                    <label for="name" class="block">Nombre del curso:</label>
                                    <input type="text" id="name" name="name" class="border border-gray-300 rounded-md px-3 py-2 mt-1 mb-4 focus:outline-none focus:ring-blue-500 focus:border-blue-500 block w-full">

                                </div>
                                <!-- Modal footer -->
                                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                    <button data-modal-hide="static-modal-add-course-{{$theme->id}}" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Agregar</button>
                                    <button data-modal-hide="static-modal-add-course-{{$theme->id}}" type="button" class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>

        @endif
        @endforeach

            

        @endif
        </div>

    </div>
</div>
@endsection

@section('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>
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
    });
</script>
@endsection