<x-layouts.admin
    page-title="Авторизация"
    title="Авторизация"
>
    @if (session()->has('status'))
        <x-panels.messages.success message="{{session('status')}}" />
    @endif
    <form action="{{route('login')}}" method="post">
        @csrf
        <div class="mt-8 max-w-md">
            <div class="grid grid-cols-1 gap-6">

                <x-forms.auth.email />

                <x-forms.auth.password />

                <x-forms.checkbox name="remember_me">
                    <x-slot:label>Запомнить меня</x-slot:label>
                    <input
                        type="checkbox"
                        name="remember_me"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50"
                        @checked(old('remember_me', true))
                    >
                </x-forms.checkbox>

                <x-forms.row>
                    <x-forms.submit-button>
                        Войти
                    </x-forms.submit-button>
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900"
                           href="{{ route('password.request') }}">
                            Забыли пароль?
                        </a>
                    @endif
                </x-forms.row>
            </div>
        </div>
    </form>
</x-layouts.admin>
