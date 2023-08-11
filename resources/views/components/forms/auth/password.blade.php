@props(['with_confirmation' => false])
<x-forms.input for="password" name="password">
    <x-slot:label>Password</x-slot:label>
    <input id="password" type="password" name="password" value="{{old('password')}}"
           class=" mt-1 block w-full rounded-md @error('password') border-red-600 @else border-gray-300 @enderror shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
           placeholder="********" required>
</x-forms.input>
@if($with_confirmation)
    <x-forms.input for="password_confirmation" name="password_confirmation">
        <x-slot:label>Password</x-slot:label>
        <input id="password_confirmation" type="password" name="password_confirmation"
               value="{{old('password_confirmation')}}"
               class=" mt-1 block w-full rounded-md @error('password_confirmation') border-red-600 @else border-gray-300 @enderror shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
               placeholder="********" required>
    </x-forms.input>
@endif
