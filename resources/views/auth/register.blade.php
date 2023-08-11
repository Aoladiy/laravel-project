<x-layouts.admin
    page-title="Регистрация"
    title="Регистрация"
>
    @if (session()->has('status'))
        <x-panels.messages.error message="{{session('status')}}" />
    @endif
    @if (session()->has('status'))
        <x-panels.messages.success message="{{session('status')}}" />
    @endif
    <form action="{{route('register')}}" method="post">
        @csrf
        <div class="mt-8 max-w-md">
            <div class="grid grid-cols-1 gap-6">
                <x-forms.input for="name" name="name">
                    <x-slot:label>Ваше имя</x-slot:label>
                    <input id="name" type="text" name="name" value="{{old('name')}}"
                           class=" mt-1 block w-full rounded-md @error('name') border-red-600 @else border-gray-300 @enderror shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           placeholder="Николай Николаич" required autofocus>
                </x-forms.input>

                <x-forms.auth.email />

                <x-forms.auth.password :with_confirmation="true" />

                <x-forms.row>
                    <x-forms.submit-button>
                        Регистрация
                    </x-forms.submit-button>
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900"
                           href="{{ route('login') }}">
                            Уже зарегистрированы?
                        </a>
                    @endif
                </x-forms.row>
            </div>
        </div>
    </form>
</x-layouts.admin>
