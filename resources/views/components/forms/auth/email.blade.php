<x-forms.input for="email" name="email">
    <x-slot:label>Email</x-slot:label>
    <input id="email" type="email" name="email" value="{{old('email')}}"
           class=" mt-1 block w-full rounded-md @error('email') border-red-600 @else border-gray-300 @enderror shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
           placeholder="example@example.com" required autofocus>
</x-forms.input>
