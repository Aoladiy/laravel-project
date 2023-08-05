<x-layouts.inner_two_columns
    page-title="Для клиентов"
    title="Для клиентов"
>
    <p>Средняя цена моделей:</p>
    @dump($avgPrice)
    <p>Средняя цена моделей на которые действует скидка:</p>
    @dump($avgPriceWithDiscounts)
    <p>Максимальная цена:</p>
    @dump($maxPrice)
    <p>Все виды салонов моделей:</p>
    @dump($salons)
    <p>Названия двигателей, отсортированных по алфавиту:</p>
    @dump($sortedEngines)
    <p>Названия классов моделей, отсортированных по алфавиту:</p>
    @dump($sortedClasses)
    <p>Только модели со скидкой, а также в названии этих моделей, или в названии их двигателей, или КПП, содержиться
        цифра 5 или 6:</p>
    @dump($withDiscountsFiveOrSix)
    <p>Все виды кузовов отсортированные по возрастанию средней цены (для моделей, без учета скидок), где ключом является
        название вида кузова, а значением средняя цена на модели с этим видом кузова. При этом не учитываються модели, у
        которых тип кузова не указан:</p>
    @dump($last)
</x-layouts.inner_two_columns>
