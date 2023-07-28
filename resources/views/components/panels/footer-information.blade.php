<section class="block sm:flex bg-white p-4">
    <div class="flex-1">
        {{--        @include('components.panels.salons')--}}
        <x-panels.salons/>
    </div>
    <div class="mt-8 border-t sm:border-t-0 sm:mt-0 sm:border-l py-2 sm:pl-4 sm:pr-8">
        <p class="text-3xl text-black font-bold mb-4">Информация</p>
        @if($template === 'footer')
            <x-panels.footer-information-footer menu="{{ $menu }}" />
        @elseif($template === 'left')
            <x-panels.footer-information-left menu="{{ $menu }}" />
        @endif
    </div>
</section>
