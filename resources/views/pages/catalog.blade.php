<x-layouts.inner
    page-title="Каталог"
    title="Каталог"
>
    @isset($currentCategory->name)
        <x-slot:breadcrumbsName>
            category
        </x-slot:breadcrumbsName>
        <x-slot:breadcrumbsParameter>
            {{$currentCategory->name}}
        </x-slot:breadcrumbsParameter>
    @else
        <x-slot:breadcrumbsName>
            catalog
        </x-slot:breadcrumbsName>
    @endisset
    <form method="get" class="my-4 border rounded p-4 space-y-4">
        <div class="block sm:flex space-y-2 sm:space-y-0 sm:space-x-4 w-full">
            <div class="flex space-x-2 items-center">
                <label for="fieldFilterName" class="text-gray-700 font-bold">Модель:</label>
                <input id="fieldFilterName" type="text" name="name" value="{{request()->get('name')}}"
                       class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                       placeholder="">
            </div>
            <div class="flex space-x-2 items-center">
                <label for="fieldFilterPriceFrom" class="text-gray-700 font-bold whitespace-nowrap">Цена от:</label>
                <input id="fieldFilterPriceFrom" type="number" name="lowest" value="{{request()->get('lowest')}}"
                       class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                       placeholder="">
            </div>
            <div class="flex space-x-2 items-center">
                <label for="fieldFilterPriceTo" class="text-gray-700 font-bold whitespace-nowrap">Цена до:</label>
                <input id="fieldFilterPriceTo" type="number" name="highest" value="{{request()->get('highest')}}"
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
                <a href="{{route('catalog', ['slug' => $currentCategory->slug ?? null])}}"
                   class="inline-block bg-gray-400 hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </a>
            </div>
        </div>
        <hr>
        <div class="flex space-x-2 items-center">
            <div class="font-bold">Сортировать по:</div>
            <x-catalog.sort-button name="order_price" current-value="{{request()->get('order_price') }}">Цене
            </x-catalog.sort-button>
            <x-catalog.sort-button name="order_model" current-value="{{request()->get('order_model') }}">Модели
            </x-catalog.sort-button>
        </div>
    </form>
    <x-catalog.cars :models="$models"/>
    <div class="text-center mt-4">
        <x-panels.pagination :paginator="$models"/>
    </div>
</x-layouts.inner>
