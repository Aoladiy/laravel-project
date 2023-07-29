@props(['message'])
<div class="my-4">
    <div class="px-4 py-3 leading-normal text-green-700 bg-green-100 rounded-lg" role="alert">
        <p>@isset($message) {{$message}} @else Пример вывода успешного сообщения @endisset</p>
    </div>
</div>
