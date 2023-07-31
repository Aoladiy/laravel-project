@props([
    'name',
    'selected'
])
<x-forms.row {{ $attributes }}>
    <select name="{{ $name }}">
        @isset($selected)
            @foreach($carcases as $carcase)
                <option value="{{$carcase->id}}" @selected($carcase->id == $selected)>{{$carcase->name}}</option>
            @endforeach
        @else
            @foreach($carcases as $carcase)
                <option value="{{$carcase->id}}" >{{$carcase->name}}</option>
            @endforeach
        @endisset
    </select>
</x-forms.row>
