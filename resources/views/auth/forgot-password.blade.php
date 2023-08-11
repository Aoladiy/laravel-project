<x-layouts.inner
    page-title="Восстановление пароля"
    title="Восстановление пароля"
>
    @if (session()->has('status'))
        <x-panels.messages.success message="{{session('status')}}" />
    @endif
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <x-forms.auth.email/>
        <x-forms.row>
            <x-forms.submit-button>
                Отправить ссылку на сброс пароля
            </x-forms.submit-button>
        </x-forms.row>
    </form>
</x-layouts.inner>
