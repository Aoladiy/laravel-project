@props([
    'model'
])
<div class="bg-white w-full border border-gray-100 rounded overflow-hidden shadow-lg hover:shadow-2xl pt-4">
    <a class="block w-full h-40" href="{{route('product', ['id' => $model->id])}}"><img
                class="w-full h-full hover:opacity-90 object-cover" src="{{$model->imageUrl}}"
                alt="{{$model->name}}"></a>
    <div class="px-6 py-4">
        <div class="text-black font-bold text-xl mb-2">
            <a class="hover:text-orange" href="{{route('product', ['id' => $model->id])}}">
                {{$model->name}}
            </a>
        </div>
        <p class="text-grey-darker text-base">
{{--            <span class="inline-block">@include('components.panels.price_formatter', ['price' => $model->price])</span>--}}
            <span class="inline-block">
                <x-price :price="$model->price" />
            </span>
            @isset($model->old_price)
{{--                <span class="inline-block line-through pl-6 text-gray-400">@include('components.panels.price_formatter', ['price' => $model->old_price])</span>--}}
                <span class="inline-block line-through pl-6 text-gray-400">
                    <x-price :price="$model->old_price" />
                </span>
            @endisset
        </p>
    </div>
</div>
