# Установка

1. Скачать файлы:
   `https://github.com/max-prot/wall-history-test.git`

2. Переместить в директорию, где удобно хранить файлы.

   **ИЛИ** перейдите в созданную с помощью git директорию: `cd wall-history-test`

3. Установить зависимости:

   `composer install`

   **ИЛИ** при локальном размещении:

   `php composer.phar install`

> :information_source: Если нет Composer - установите его:
>- Глобально (Рекомендуется): [Как установить Composer в Windows](https://www.hostinger.ru/rukovodstva/kak-ustanovit-composer#-Composer-Windows)
>- Локально: [Command-line installation](https://getcomposer.org/download/)

4. Запустите настройку окружения с помощью команды:

   `php init`

   Выберите: `[0] Development`

5. Задайте настройки БД — имя базы данных, имя и пароль пользователя: 
- `config/db.php`

6. Произведите миграции:
- `php yii migrate`

