@props([
'name',
'error' => null
])
<x-forms.row>
    <div class="mt-2">
        <div>
            <label class="inline-flex items-center cursor-pointer">
                {{ $slot }}
                <span class="ml-2">{{ $label }}</span>
            </label>
        </div>
        @error($name)
        <span class="text-xs italic text-red-600">{{ $message }}</span>
        @enderror
    </div>
</x-forms.row>
