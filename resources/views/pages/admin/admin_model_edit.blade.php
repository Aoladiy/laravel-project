<x-layouts.admin
    page-title="Редактировать модель"
    title="Редактировать модель"
>
    @if (session()->has('error_message'))
        <x-panels.messages.error message="{{session('error_message', [])[0]}}"/>
    @endif
    @if (session()->has('success_message'))
        <x-panels.messages.success message="{{session('success_message', [])[0]}}"/>
    @endif
    <form action="{{route('modelEditRequest', $model)}}" method="post" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="mt-8 max-w-md">
            <div class="grid grid-cols-1 gap-6">
                <x-forms.input for="name" name="name">
                    <x-slot:label>Название модели</x-slot:label>
                    <input id="name" type="text" name="name" value="{{$model->name}}"
                           class=" mt-1 block w-full rounded-md @error('name') border-red-600 @else border-gray-300 @enderror shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           placeholder="">
                </x-forms.input>

                <x-forms.input for="body" name="body">
                    <x-slot:label>Описание</x-slot:label>
                    <input id="body" type="text" name="body" value="{{$model->body}}"
                           class=" mt-1 block w-full rounded-md @error('body') border-red-600 @else border-gray-300 @enderror shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           placeholder="">
                </x-forms.input>

                <x-forms.input for="price" name="price">
                    <x-slot:label>Цена</x-slot:label>
                    <input id="price" type="number" name="price" value="{{$model->price}}"
                           class=" mt-1 block w-full rounded-md @error('price') border-red-600 @else border-gray-300 @enderror shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           placeholder="">
                </x-forms.input>

                <x-forms.input for="old_price" name="old_price">
                    <x-slot:label>Цена без скидки</x-slot:label>
                    <input id="old_price" type="number" name="old_price" value="{{$model->old_price}}"
                           class=" mt-1 block w-full rounded-md @error('old_price') border-red-600 @else border-gray-300 @enderror shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           placeholder="">
                </x-forms.input>

                <x-forms.input for="image" name="image">
                    <x-slot:label>Основное изображение модели</x-slot:label>
                    <input id="image" type="file" name="image" value="{{$model->imageUrl}}"
                           class=" mt-1 block w-full rounded-md @error('image') border-red-600 @else border-gray-300 @enderror shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           placeholder="">
                </x-forms.input>

                <x-forms.input for="salon" name="salon">
                    <x-slot:label>Салон</x-slot:label>
                    <input id="salon" type="text" name="salon" value="{{$model->salon}}"
                           class=" mt-1 block w-full rounded-md @error('salon') border-red-600 @else border-gray-300 @enderror shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           placeholder="">
                </x-forms.input>

                <x-forms.input for="kpp" name="kpp">
                    <x-slot:label>КПП</x-slot:label>
                    <input id="kpp" type="text" name="kpp" value="{{$model->kpp}}"
                           class=" mt-1 block w-full rounded-md @error('kpp') border-red-600 @else border-gray-300 @enderror shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           placeholder="">
                </x-forms.input>

                <x-forms.input for="year" name="year">
                    <x-slot:label>Год выпуска</x-slot:label>
                    <input id="year" type="number" name="year" value="{{$model->year}}"
                           class=" mt-1 block w-full rounded-md @error('year') border-red-600 @else border-gray-300 @enderror shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           placeholder="">
                </x-forms.input>

                <x-forms.input for="color" name="color">
                    <x-slot:label>Цвет</x-slot:label>
                    <input id="color" type="text" name="color" value="{{$model->color}}"
                           class=" mt-1 block w-full rounded-md @error('color') border-red-600 @else border-gray-300 @enderror shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           placeholder="">
                </x-forms.input>

                <x-forms.checkbox name="is_new">
                    <x-slot:label>Опубликован</x-slot:label>
                    <input
                        value="1"
                        type="checkbox"
                        name="is_new"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50"
                        @checked($model->is_new)
                    >
                </x-forms.checkbox>

                <x-forms.input for="engine_id" name="engine_id">
                    <x-slot:label>Двигатель</x-slot:label>
                    <x-forms.selections.select-engines name="engine_id" selected="{{$model->engine_id}}"/>
                </x-forms.input>

                <x-forms.input for="carcase_id" name="carcase_id">
                    <x-slot:label>Корпус</x-slot:label>
                    <x-forms.selections.select-carcases name="carcase_id" selected="{{$model->carcase_id}}"/>
                </x-forms.input>

                <x-forms.input for="class_id" name="class_id">
                    <x-slot:label>Класс</x-slot:label>
                    <x-forms.selections.select-classes name="class_id" selected="{{$model->class_id}}"/>
                </x-forms.input>

                <x-forms.input for="category_ids[]" name="category_ids[]">
                    <x-slot:label>Категория(и)</x-slot:label>
                    <x-forms.selections.select-categories name="category_ids[]"
                                                          selected="{{$model->categories->pluck('name')}}"
                                                          :model="$model"/>
                </x-forms.input>

                <x-forms.row>
                    <x-forms.submit-button>
                        Сохранить
                    </x-forms.submit-button>
                    <x-forms.cancel-button href="{{ route('modelEdit', $model) }}">
                        Отменить
                    </x-forms.cancel-button>
                </x-forms.row>
            </div>
        </div>
    </form>
</x-layouts.admin>
