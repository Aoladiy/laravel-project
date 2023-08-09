<div>
    <p class="inline-block text-3xl text-black font-bold mb-4">Наши салоны</p>
    <span class="inline-block pl-1"> / <a href="{{route('salons')}}"
                                          class="inline-block pl-1 text-gray-600 hover:text-orange"><b>Все</b></a></span>
</div>

<div class="grid gap-6 grid-cols-1 lg:grid-cols-2">
    @isset($salons)
        @foreach($salons as $salon)
            <x-panels.salons.salon :salon="$salon"/>
        @endforeach
    @else
        <div>
            <p class="text-black text-xl">Данные временно недоступны, пожалуйста попробуйте позже</p>
        </div>
    @endisset
</div>
