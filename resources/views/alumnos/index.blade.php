@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-4 w-full">

<div class="flex flex-col items-center">
  <p class="text-center text-2xl">CALENDARIO de Exámenes Extraordinarios del <b>{{ $period->name }}</b> </p>
  <p class="text-center text-xl">Criterios para aplicación de Exámenes Extraordinarios 2023-2</p>
  <p class="text-center text-xl">Nota importante: En caso de que no se encuentren los criterios de alguna asignatura, será importante que contactes al jurado del extraordinario a través del correo electrónico que se especifica en el calendario de Exámenes extraordinarios 2023-2.</p>
</div>

<div class="p-12">
    @foreach($ambits as $ambit)
        <div id="accordion-open-{{ $ambit->id }}" data-accordion="open">
            <h2 id="accordion-open-heading-{{ $ambit->id }}">
                <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-open-body-{{ $ambit->id }}" aria-expanded="false" aria-controls="accordion-open-body-{{ $ambit->id }}">
                <span class="flex items-center p-4">{{ strtoupper($ambit->name) }}</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
                </button>
            </h2>
            <div id="accordion-open-body-{{ $ambit->id }}" class="hidden" aria-labelledby="accordion-open-heading-{{ $ambit->id }}">
                <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                    @foreach($ambit->ambitHasTheme as $index => $theme)
                        <div class="ml-4 mt-4">
                            <span class="text-xl font-bold">{{ $theme->theme->name }}</span> 
                            
                            <div class="py-5 border-b border-gray-200 dark:border-gray-700 p-8">
                                @foreach($theme->theme->themeHasCourse as $course)
                                    @if( $course->course->available == 1)
                                        <ul class="list-disc list-inside">
                                            
                                            <li>  
                                                <a class="hover:text-blue-500" href="{{ route('alumno.course', ['id' => $course->course->id])}}">
                                                    {{ $course->course->name }}
                                                </a>
                                            </li>
                                        </ul>
                                    @endif
                                @endforeach
                            </div>
                        </div>     
                        
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
</div>


</div>
@endsection