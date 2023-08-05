<x-layouts.admin
    page-title="Создать новость"
    title="Создать новость"
>
    @if (session()->has('error_message'))
        <x-panels.messages.error message="{{session('error_message', [])[0]}}" />
    @endif
    @if (session()->has('success_message'))
        <x-panels.messages.success message="{{session('success_message', [])[0]}}" />
    @endif
    <form action="{{route('articleCreateRequest')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mt-8 max-w-md">
            <div class="grid grid-cols-1 gap-6">
                <x-forms.input for="title" name="title">
                    <x-slot:label>Название новости</x-slot:label>
                    <input id="title" type="text" name="title" value="{{old('title')}}"
                           class=" mt-1 block w-full rounded-md @error('title') border-red-600 @else border-gray-300 @enderror shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           placeholder="">
                </x-forms.input>

                <x-forms.input for="description" name="description">
                    <x-slot:label>Краткое описание новости</x-slot:label>
                    <input id="description" type="text" name="description" value="{{old('description')}}"
                           class=" mt-1 block w-full rounded-md @error('description') border-red-600 @else border-gray-300 @enderror shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           placeholder="">
                </x-forms.input>

                <x-forms.input for="body" name="body">
                    <x-slot:label>Детальное описание</x-slot:label>
                    <input id="body" type="text" name="body" value="{{old('body')}}"
                           class=" mt-1 block w-full rounded-md @error('body') border-red-600 @else border-gray-300 @enderror shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           placeholder="">
                </x-forms.input>

                <x-forms.input for="image" name="image">
                    <x-slot:label>Основное изображение Новости</x-slot:label>
                    <input id="image" type="file" name="image" value="{{old('image')}}"
                           class=" mt-1 block w-full rounded-md @error('image') border-red-600 @else border-gray-300 @enderror shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           placeholder="">
                </x-forms.input>

                <x-forms.input for="tags" name="tags">
                    <x-slot:label>Теги <u><i>через запятую</i></u></x-slot:label>
                    <input id="tags" type="text" name="tags" value="{{old('tags')}}"
                           class=" mt-1 block w-full rounded-md @error('tags') border-red-600 @else border-gray-300 @enderror shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           placeholder="">
                </x-forms.input>

                <x-forms.checkbox name="published_at">
                    <x-slot:label>Опубликован</x-slot:label>
                    <input
                        type="checkbox"
                        name="published_at"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50"
                        @checked(old('published_at', true))
                    >
                </x-forms.checkbox>

                <x-forms.row>
                    <x-forms.submit-button>
                        Сохранить
                    </x-forms.submit-button>
                    <x-forms.cancel-button href="{{ route('articleCreate') }}" >
                        Отменить
                    </x-forms.cancel-button>
                </x-forms.row>
            </div>
        </div>
    </form>
</x-layouts.admin>
