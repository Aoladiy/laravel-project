@props([
'for',
'name',
])
<x-forms.row {{ $attributes }}>
    <label for="{{ $for }}" class="text-gray-700 font-bold">{{ $label }}</label>
    {{ $slot }}
    @error($name)
    <span class="text-xs italic text-red-600">{{ $message }}</span>
    @enderror
</x-forms.row>
