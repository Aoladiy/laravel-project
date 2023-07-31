@props([
    'name',
    'selected'
])
<x-forms.row {{ $attributes }}>
    <select name="{{ $name }}">
        @isset($selected)
            @foreach($classes as $class)
                <option value="{{$class->id}}" @selected($class->id == $selected)>{{$class->name}}</option>
            @endforeach
        @else
            @foreach($classes as $class)
                <option value="{{$class->id}}">{{$class->name}}</option>
            @endforeach
        @endisset
    </select>
</x-forms.row>
