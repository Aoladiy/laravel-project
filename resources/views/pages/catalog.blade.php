@extends('layouts.inner')
@section('page-title', 'Каталог')
@section('title', 'Каталог')
@section('content')
<form class="my-4 border rounded p-4 space-y-4">
    <div class="block sm:flex space-y-2 sm:space-y-0 sm:space-x-4 w-full">
        <div class="flex space-x-2 items-center">
            <label for="fieldFilterName" class="text-gray-700 font-bold">Модель:</label>
            <input id="fieldFilterName" type="text"
                   class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                   placeholder="">
        </div>
        <div class="flex space-x-2 items-center">
            <label for="fieldFilterPriceFrom" class="text-gray-700 font-bold whitespace-nowrap">Цена от:</label>
            <input id="fieldFilterPriceFrom" type="text"
                   class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                   placeholder="">
        </div>
        <div class="flex space-x-2 items-center">
            <label for="fieldFilterPriceTo" class="text-gray-700 font-bold whitespace-nowrap">Цена до:</label>
            <input id="fieldFilterPriceTo" type="text"
                   class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                   placeholder="">
        </div>
        <div class="flex space-x-2 items-center">
            <button
                class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </button>
            <button
                class="inline-block bg-gray-400 hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>
    <hr>
    <div class="flex space-x-2 items-center">
        <div class="font-bold">Сортировать по:</div>
        <button
            class="flex items-center text-orange underline cursor-pointer hover:no-underline hover:text-opacity-70 outline-none focus:outline-none">
            Цене
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7l4-4m0 0l4 4m-4-4v18"/>
            </svg>
            <!--                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">-->
            <!--                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 17l-4 4m0 0l-4-4m4 4V3" />-->
            <!--                        </svg>-->
        </button>
        <button
            class="flex items-center cursor-pointer hover:text-orange hover:no-underline hover:text-opacity-70 outline-none focus:outline-none">
            Модели
        </button>
    </div>
</form>

<div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-6">
    <div class="bg-white w-full border border-gray-100 rounded overflow-hidden shadow-lg hover:shadow-2xl pt-4">
        <a class="block w-full h-40" href="../../../../../Desktop/grade_layout/detail.html"><img
                class="w-full h-full hover:opacity-90 object-cover" src="/assets/pictures/car_ceed.png" alt="Seed"></a>
        <div class="px-6 py-4">
            <div class="text-black font-bold text-xl mb-2"><a class="hover:text-orange"
                                                              href="../../../../../Desktop/grade_layout/detail.html">Seed</a>
            </div>
            <p class="text-grey-darker text-base">
                <span class="inline-block">1 394 900 ₽</span><span class="inline-block line-through pl-6 text-gray-400">1 394 901 ₽</span>
            </p>
        </div>
    </div>
    <div class="bg-white w-full border border-gray-100 rounded overflow-hidden shadow-lg hover:shadow-2xl pt-4">
        <a class="block w-full h-40" href="../../../../../Desktop/grade_layout/detail.html"><img
                class="w-full h-full hover:opacity-90 object-cover" src="/assets/pictures/car_cerato.png" alt="Cerato"></a>
        <div class="px-6 py-4">
            <div class="text-black font-bold text-xl mb-2"><a class="hover:text-orange"
                                                              href="../../../../../Desktop/grade_layout/detail.html">Cerato</a>
            </div>
            <p class="text-grey-darker text-base">
                <span class="inline-block">1 221 900 ₽</span><span class="inline-block line-through pl-6 text-gray-400">1 821 900 ₽</span>
            </p>
        </div>
    </div>
    <div class="bg-white w-full border border-gray-100 rounded overflow-hidden shadow-lg hover:shadow-2xl pt-4">
        <a class="block w-full h-40" href="../../../../../Desktop/grade_layout/detail.html"><img
                class="w-full h-full hover:opacity-90 object-cover" src="/assets/pictures/car_K5-half.png" alt="K5"></a>
        <div class="px-6 py-4">
            <div class="text-black font-bold text-xl mb-2"><a class="hover:text-orange"
                                                              href="../../../../../Desktop/grade_layout/detail.html">K5</a>
            </div>
            <p class="text-grey-darker text-base">
                <span class="inline-block">1 577 900 ₽</span>
            </p>
        </div>
    </div>
    <div class="bg-white w-full border border-gray-100 rounded overflow-hidden shadow-lg hover:shadow-2xl pt-4">
        <a class="block w-full h-40" href="../../../../../Desktop/grade_layout/detail.html"><img
                class="w-full h-full hover:opacity-90 object-cover" src="/assets/pictures/car_k900.png" alt="K900"></a>
        <div class="px-6 py-4">
            <div class="text-black font-bold text-xl mb-2"><a class="hover:text-orange"
                                                              href="../../../../../Desktop/grade_layout/detail.html">K900</a>
            </div>
            <p class="text-grey-darker text-base">
                <span class="inline-block">4 064 900 ₽</span>
            </p>
        </div>
    </div>
    <div class="bg-white w-full border border-gray-100 rounded overflow-hidden shadow-lg hover:shadow-2xl pt-4">
        <a class="block w-full h-40" href="../../../../../Desktop/grade_layout/detail.html"><img
                class="w-full h-full hover:opacity-90 object-cover" src="/assets/pictures/car_mohave_new.png"
                alt="Mohave"></a>
        <div class="px-6 py-4">
            <div class="text-black font-bold text-xl mb-2"><a class="hover:text-orange"
                                                              href="../../../../../Desktop/grade_layout/detail.html">Mohave</a>
            </div>
            <p class="text-grey-darker text-base">
                <span class="inline-block">3 549 900 ₽</span>
            </p>
        </div>
    </div>
    <div class="bg-white w-full border border-gray-100 rounded overflow-hidden shadow-lg hover:shadow-2xl pt-4">
        <a class="block w-full h-40" href="../../../../../Desktop/grade_layout/detail.html"><img
                class="w-full h-full hover:opacity-90 object-cover" src="/assets/pictures/car_new_stinger.png"
                alt="Stinger"></a>
        <div class="px-6 py-4">
            <div class="text-black font-bold text-xl mb-2"><a class="hover:text-orange"
                                                              href="../../../../../Desktop/grade_layout/detail.html">Stinger</a>
            </div>
            <p class="text-grey-darker text-base">
                <span class="inline-block">2 409 900 ₽</span>
            </p>
        </div>
    </div>
    <div class="bg-white w-full border border-gray-100 rounded overflow-hidden shadow-lg hover:shadow-2xl pt-4">
        <a class="block w-full h-40" href="../../../../../Desktop/grade_layout/detail.html"><img
                class="w-full h-full hover:opacity-90 object-cover" src="/assets/pictures/car_rio-x.png"
                alt="Rio X"></a>
        <div class="px-6 py-4">
            <div class="text-black font-bold text-xl mb-2"><a class="hover:text-orange"
                                                              href="../../../../../Desktop/grade_layout/detail.html">Rio
                    X</a></div>
            <p class="text-grey-darker text-base">
                <span class="inline-block">969 900 ₽</span>
            </p>
        </div>
    </div>
    <div class="bg-white w-full border border-gray-100 rounded overflow-hidden shadow-lg hover:shadow-2xl pt-4">
        <a class="block w-full h-40" href="../../../../../Desktop/grade_layout/detail.html"><img
                class="w-full h-full hover:opacity-90 object-cover" src="/assets/pictures/car_rio_new.png"
                alt="Rio"></a>
        <div class="px-6 py-4">
            <div class="text-black font-bold text-xl mb-2"><a class="hover:text-orange"
                                                              href="../../../../../Desktop/grade_layout/detail.html">Rio</a>
            </div>
            <p class="text-grey-darker text-base">
                <span class="inline-block">849 900 ₽</span>
            </p>
        </div>
    </div>
    <div class="bg-white w-full border border-gray-100 rounded overflow-hidden shadow-lg hover:shadow-2xl pt-4">
        <a class="block w-full h-40" href="../../../../../Desktop/grade_layout/detail.html"><img
                class="w-full h-full hover:opacity-90 object-cover" src="/assets/pictures/car_seltos.png" alt="Seltos"></a>
        <div class="px-6 py-4">
            <div class="text-black font-bold text-xl mb-2"><a class="hover:text-orange"
                                                              href="../../../../../Desktop/grade_layout/detail.html">Seltos</a>
            </div>
            <p class="text-grey-darker text-base">
                <span class="inline-block">1 224 900 ₽</span>
            </p>
        </div>
    </div>
    <div class="bg-white w-full border border-gray-100 rounded overflow-hidden shadow-lg hover:shadow-2xl pt-4">
        <a class="block w-full h-40" href="../../../../../Desktop/grade_layout/detail.html"><img
                class="w-full h-full hover:opacity-90 object-cover" src="/assets/pictures/car_sorento_new.png"
                alt="Sorento"></a>
        <div class="px-6 py-4">
            <div class="text-black font-bold text-xl mb-2"><a class="hover:text-orange"
                                                              href="../../../../../Desktop/grade_layout/detail.html">Sorento</a>
            </div>
            <p class="text-grey-darker text-base">
                <span class="inline-block">2 219 900 ₽</span>
            </p>
        </div>
    </div>
    <div class="bg-white w-full border border-gray-100 rounded overflow-hidden shadow-lg hover:shadow-2xl pt-4">
        <a class="block w-full h-40" href="../../../../../Desktop/grade_layout/detail.html"><img
                class="w-full h-full hover:opacity-90 object-cover" src="/assets/pictures/car_soul.png" alt="Soul"></a>
        <div class="px-6 py-4">
            <div class="text-black font-bold text-xl mb-2"><a class="hover:text-orange"
                                                              href="../../../../../Desktop/grade_layout/detail.html">Soul</a>
            </div>
            <p class="text-grey-darker text-base">
                <span class="inline-block">1 094 900 ₽</span>
            </p>
        </div>
    </div>
    <div class="bg-white w-full border border-gray-100 rounded overflow-hidden shadow-lg hover:shadow-2xl pt-4">
        <a class="block w-full h-40" href="../../../../../Desktop/grade_layout/detail.html"><img
                class="w-full h-full hover:opacity-90 object-cover" src="/assets/pictures/car_sportage.png"
                alt="Sportage"></a>
        <div class="px-6 py-4">
            <div class="text-black font-bold text-xl mb-2"><a class="hover:text-orange"
                                                              href="../../../../../Desktop/grade_layout/detail.html">Sportage</a>
            </div>
            <p class="text-grey-darker text-base">
                <span class="inline-block">1 644 900 ₽</span>
            </p>
        </div>
    </div>
    <div class="bg-white w-full border border-gray-100 rounded overflow-hidden shadow-lg hover:shadow-2xl pt-4">
        <a class="block w-full h-40" href="../../../../../Desktop/grade_layout/detail.html"><img
                class="w-full h-full hover:opacity-90 object-cover" src="/assets/pictures/car_xceed.png"
                alt="XSeed"></a>
        <div class="px-6 py-4">
            <div class="text-black font-bold text-xl mb-2"><a class="hover:text-orange"
                                                              href="../../../../../Desktop/grade_layout/detail.html">XSeed</a>
            </div>
            <p class="text-grey-darker text-base">
                <span class="inline-block">1 714 900 ₽</span>
            </p>
        </div>
    </div>
    <div class="bg-white w-full border border-gray-100 rounded overflow-hidden shadow-lg hover:shadow-2xl pt-4">
        <a class="block w-full h-40" href="../../../../../Desktop/grade_layout/detail.html"><img
                class="w-full h-full hover:opacity-90 object-cover" src="/assets/images/no_image.png" alt="XSeed"></a>
        <div class="px-6 py-4">
            <div class="text-black font-bold text-xl mb-2"><a class="hover:text-orange"
                                                              href="../../../../../Desktop/grade_layout/detail.html">Some
                    Car</a></div>
            <p class="text-grey-darker text-base">
                <span class="inline-block">9 999 999 ₽</span>
            </p>
        </div>
    </div>
</div>

<div class="text-center mt-4">
    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px text-lg" aria-label="Pagination">
        <a href="#"
           class="inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-gray-200 cursor-not-allowed">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                 aria-hidden="true">
                <path fill-rule="evenodd"
                      d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                      clip-rule="evenodd"/>
            </svg>
        </a>
        <span
            class="inline-flex items-center px-4 py-2 border border-gray-300 bg-white bg-gray-800 text-gray-300">1</span>
        <a href="#"
           class="inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-gray-700 hover:bg-gray-800 hover:text-white">2</a>
        <a href="#"
           class="inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-gray-700 hover:bg-gray-800 hover:text-white">3</a>
        <a href="#"
           class="inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-gray-700 hover:bg-gray-800 hover:text-white">...</a>
        <a href="#"
           class="inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-gray-700 hover:bg-gray-800 hover:text-white">10</a>
        <a href="#"
           class="inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-800 hover:text-white">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                 aria-hidden="true">
                <path fill-rule="evenodd"
                      d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                      clip-rule="evenodd"/>
            </svg>
        </a>
    </nav>
</div>
@endsection
