<section class="block sm:flex bg-white p-4">
    <div class="flex-1">
        <x-salons />
    </div>
    <div class="mt-8 border-t sm:border-t-0 sm:mt-0 sm:border-l py-2 sm:pl-4 sm:pr-8">
        <p class="text-3xl text-black font-bold mb-4">Информация</p>
        <nav>
            <ul class="bullet-list-item">
                @foreach ($menu as $item)
                    <li><a
                            class="@if (request()->routeIs($item['route'])) text-orange cursor-default @else text-gray-600 hover:text-orange @endif"
                            href="{{ route($item['route']) }}">{{ $item['title'] }}</a>
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
</section>
