@props([
    'models'
])
<div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-6">
    @foreach($models as $model)
        <x-catalog.car-element :model="$model" />
    @endforeach
</div>

