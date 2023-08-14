<x-layouts.inner
    page-title="Сброс пароля"
    title="Сброс пароля"
>
    @if (session()->has('status'))
        <x-panels.messages.success message="{{session('status')}}" />
    @endif
    <form method="POST" action="{{ route('password.store')}}">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <x-forms.auth.email/>
        <x-forms.auth.password :with_confirmation="true"/>
        <x-forms.row>
            <x-forms.submit-button>
                Сбросить пароль
            </x-forms.submit-button>
        </x-forms.row>
    </form>
</x-layouts.inner>
