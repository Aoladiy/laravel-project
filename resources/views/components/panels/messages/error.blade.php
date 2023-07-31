@props(['message'])
<div class="my-4">
    <div class="px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
        <p>@isset($message) {{$message}} @else Пример вывода текста ошибки @endisset</p>
    </div>
</div>
