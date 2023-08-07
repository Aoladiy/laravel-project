@props([
    'name',
    'selected',
    'model'
])
<x-forms.row {{ $attributes }}>
    <select name="{{ $name }}" multiple>
        @isset($selected)
            @foreach($categories as $category)
                <option value="{{$category->id}}" @selected(in_array($category->id, old('categories', $model->categories->pluck('id')->all())))>{{$category->name}}</option>
            @endforeach
        @else
            @php $first = $categories->shift() @endphp
            <option selected value="{{$first->id}}">{{$first->name}}</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        @endisset
    </select>
</x-forms.row>
