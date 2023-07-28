<section class="block sm:flex bg-white p-4">
    <div class="flex-1">
        {{--        @include('components.panels.salons')--}}
        <x-panels.salons/>
    </div>
    <div class="mt-8 border-t sm:border-t-0 sm:mt-0 sm:border-l py-2 sm:pl-4 sm:pr-8">
        <p class="text-3xl text-black font-bold mb-4">Информация</p>
        {{--        @include('panels.footer_information_menu')--}}
        <nav>
            <ul class="text-sm">
                <li>
                    <p class="text-xl text-black font-bold mb-4">Информация</p>
                    <ul class="space-y-2">
                        @foreach ($menu as $item)
                            <li><a
                                    class="@if (request()->routeIs($item['route'])) text-orange cursor-default @else hover:text-orange @endif"
                                    href="{{ route($item['route']) }}">{{ $item['title'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</section>
