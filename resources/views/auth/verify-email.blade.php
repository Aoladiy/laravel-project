<x-layouts.inner
    page-title="Подтверждение регистрации"
    title="Подтверждение регистрации"
>
    @if (session()->has('status'))
        <x-panels.messages.success message="{{session('status')}}" />
    @endif
    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <x-forms.row>
            <x-forms.submit-button>
                Отправить ссылку заново
            </x-forms.submit-button>
        </x-forms.row>
    </form>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <x-forms.row>
            <x-forms.cancel-button>
                Выйти
            </x-forms.cancel-button>
        </x-forms.row>
    </form>
</x-layouts.inner>
