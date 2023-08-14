<x-layouts.inner
    page-title="Подтверждение пароля"
    title="Подтверждение пароля"
>
    @if (session()->has('status'))
        <x-panels.messages.error message="{{session('status')}}" />
    @endif
    @if (session()->has('status'))
        <x-panels.messages.success message="{{session('status')}}" />
    @endif
    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf
        <x-forms.auth.password/>
        <x-forms.row>
            <x-forms.submit-button>
                Подтвердить
            </x-forms.submit-button>
        </x-forms.row>
    </form>
</x-layouts.inner>
