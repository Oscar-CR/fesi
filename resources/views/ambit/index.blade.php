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
                
            <button data-modal-target="static-modal" data-modal-toggle="static-modal" class="block text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                Agregar nuevo
            </button>
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

                    <form method="POST" action="" class="mt-4">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Agregar ámbito
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

                            <label for="description" class="block">Descripción:</label>
                            <textarea id="description" name="description" class="border border-gray-300 rounded-md px-3 py-2 mt-1 mb-4 focus:outline-none focus:ring-blue-500 focus:border-blue-500 block w-full"></textarea>

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
    

        
        <div class="w-full">
         

        @if($ambit->ambitHasTheme != null)

        @foreach($ambit->ambitHasTheme as $index => $theme)
            <div id="accordion-flush-{{$index}}" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                <h2 id="accordion-flush-heading-{{$theme->id}}">
                    <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3 bg-sky-50 p-8" data-accordion-target="#accordion-flush-body-{{$index}}" aria-expanded="true" aria-controls="accordion-flush-body-{{$index}}">
                        <span class="text-xl font-bold">{{ $theme->theme->name }}</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                        </svg>
                    </button>
                </h2>

                <div id="accordion-flush-body-{{$index}}" class="hidden" aria-labelledby="accordion-flush-heading-{{$theme->id}}">
                    <div class="py-5 border-b border-gray-200 dark:border-gray-700 p-8">
                        @foreach($theme->theme->themeHasCourse as $course)
                            <ul class="list-disc list-inside">
                                
                                <li>  
                                    <a class="hover:text-blue-500" href="{{ route('ambit.detail.course', ['id' => $course->course->id])}}">
                                        {{ $course->course->name }}
                                    </a>
                                </li>
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach

            

        @endif
        </div>

    </div>
</div>
@endsection