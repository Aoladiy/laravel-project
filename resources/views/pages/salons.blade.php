<x-layouts.inner_two_columns
    page-title="Салоны"
    title="Салоны"
>
    <x-slot:breadcrumbsName>
        salons
    </x-slot:breadcrumbsName>
    <div class="space-y-4 max-w-4xl">
        @if($salons !== false)
            @for($i=0; $i<count($salons); $i++)
                <x-panels.salons.all-salons-salon :salon="$salons[$i]" :i="$i"/>
            @endfor
        @else
            <div>
                <p class="text-black text-xl">Данные временно недоступны, пожалуйста попробуйте позже</p>
            </div>
        @endif
    </div>

    <div class="my-4 space-y-4 max-w-4xl">
        <hr>

        <p class="text-black text-2xl font-bold mb-4">Салоны на карте</p>

        <div class="bg-gray-200">
            Карта с салонами
        </div>
    </div>
</x-layouts.inner_two_columns>
