{{--@extends('layouts.inner_two_columns')--}}
{{--@section('page-title', 'Для клиентов')--}}
{{--@section('title', 'Для клиентов')--}}
{{--@section('content')--}}
<x-layouts.inner_two_columns
    page-title="Для клиентов"
    title="Для клиентов"
>
    {{--    @include('components.panels.static_demo_content')--}}
    @php
    echo 'Средняя цена моделей:' . PHP_EOL;
    dump($avgPrice);
    echo 'Средняя цена моделей на которые действует скидка:' . PHP_EOL;
    dump($avgPriceWithDiscounts);
    echo 'Максимальная цена:' . PHP_EOL;
    dump($maxPrice);
    echo 'Все виды салонов моделей:' . PHP_EOL;
    dump($salons);
    echo 'Названия двигателей, отсортированных по алфавиту:' . PHP_EOL;
    dump($sortedEngines);
    echo 'Названия классов моделей, отсортированных по алфавиту:' . PHP_EOL;
    dump($sortedClasses);
    echo 'Только модели со скидкой, а также в названии этих моделей, или в названии их двигателей, или КПП, содержиться цифра 5 или 6:' . PHP_EOL;
    dump($withDiscountsFiveOrSix);
    echo 'Все виды кузовов отсортированные по возрастанию средней цены (для моделей, без учета скидок), где ключом является название вида кузова, а значением средняя цена на модели с этим видом кузова. При этом не учитываються модели, у которых тип кузова не указан:' . PHP_EOL;
    dump($last);
    @endphp
    {{--@endsection--}}
</x-layouts.inner_two_columns>
