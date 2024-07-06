<h1>Добро пожаловать, {{ $userName }}!</h1>
<p>Вы успешно добавили новую недвижимость:</p>
<ul>
    <li><strong>Заголовок:</strong> {{ $propertyTitle }}</li>
    <li><strong>Адрес:</strong> {{ $propertyAddress }}</li>
    <li><strong>Цена:</strong> {{ $propertyPrice }}</li>
    <li><strong>Описание:</strong> {{ $propertyDescription }}</li>
    <li><strong>Тип недвижимости:</strong> {{ $propertyType }}</li>
    <li><strong>Количество комнат:</strong> {{ $propertyRooms }}</li>
    <li><strong>Площадь:</strong> {{ $propertyArea }} кв. м.</li>
    <li><strong>Этаж:</strong> {{ $propertyFloor }}</li>
    <li><strong>Общее количество этажей:</strong> {{ $propertyTotalFloors }}</li>
    <li><strong>Мебель:</strong> {{ $propertyFurnished ? 'Да' : 'Нет' }}</li>
    <li><strong>Парковка:</strong> {{ $propertyParking ? 'Да' : 'Нет' }}</li>
    <li><strong>Интернет:</strong> {{ $propertyInternet ? 'Да' : 'Нет' }}</li>
</ul>
<p>Спасибо за использование нашего сервиса!</p>
