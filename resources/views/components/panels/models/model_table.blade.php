@props(['models'])
<table class="border border-collapse w-full" style="width: 50px">
    <thead>
    <tr>
        <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">id</th>
        <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">Название модели</th>
        <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">Описание</th>
        <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">Цена</th>
        <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">Цена без скидки</th>
        <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">Салон</th>
        <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">КПП</th>
        <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">Год выпуска</th>
        <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">Цвет</th>
        <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">Новая</th>
        <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">Двигатель</th>
        <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">Корпус</th>
        <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">Класс</th>
        <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">&nbsp;</th>
        <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    @foreach($models as $model)
{{--        @include('panels.articles.article_row', ['article' => $article])--}}
        <x-panels.models.model_row :model="$model" />
    @endforeach
    </tbody>
</table>
