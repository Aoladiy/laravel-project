@props([
    'name',
    'selected'
])
<x-forms.row {{ $attributes }}>
    <select name="{{ $name }}">
        @isset($selected)
            @foreach($engines as $engine)
                <option value="{{$engine->id}}" @selected($engine->id == $selected)>{{$engine->name}}</option>
            @endforeach
        @else
            @foreach($engines as $engine)
                <option value="{{$engine->id}}" >{{$engine->name}}</option>
            @endforeach
        @endisset
    </select>
</x-forms.row>
