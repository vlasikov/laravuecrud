Тестовое задание:
Cделать форму обратной связи с выбором куда отправлять заявку (текстовый файл, mysql) и возможностью добавлять места для хранения заявок (использовать паттерн фабрика).
Поля: имя, телефон, само обращение.
Что необходимо использовать:
- PHP 7
- Composer
- ООП (для создания заявки и места для хранения заявки)
- Фронтенд (желательно vuejs)
________________________________________________________

файлы:

vue шаблоны:
resources/js/components/tasks/TasksIndex.vue
resources/js/components/tasks/TasksCreate.vue

главная страница
resources/views/index.blade.php

модели данных, для БД и файла
app/Task.php
app/TaskForFile.php

паттерн фабрика
app/TaskFactory.php

контроллер
app/Http/Controllers/Api/V1/TasksController.php

настройки vuejs
resources/js/app.js