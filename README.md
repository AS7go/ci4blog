# Изучение CodeIgniter4 на примере Блога

Этот проект представляет собой учебное пособие по CodeIgniter4, основанное на видеоуроках и документации. Цель - создание блога с использованием CodeIgniter4, XAMPP или Docker, PHP, MySQL, phpMyAdmin и Bootstrap 5.

## Содержание

- [Изучение CodeIgniter4 на примере Блога](#изучение-codeigniter4-на-примере-блога)
  - [Содержание](#содержание)
  - [Первоисточники](#первоисточники)
  - [Установка и настройка CodeIgniter4](#установка-и-настройка-codeigniter4)
  - [Реализация в Ubuntu 22.04 через Docker](#реализация-в-ubuntu-2204-через-docker)
    - [Установка виртуального сервера](#установка-виртуального-сервера)
    - [Установка CodeIgniter4](#установка-codeigniter4)
    - [Создание базы данных и миграции](#создание-базы-данных-и-миграции)
    - [Конфигурация](#конфигурация)
  - [Запуск контейнера в терминале Ubuntu](#запуск-контейнера-в-терминале-ubuntu)
  - [Доступ к ресурсам этого проекта](#доступ-к-ресурсам-этого-проекта)
  - [Предупреждения](#предупреждения)

## Первоисточники

* ### Автор выложил все уроки (по этой и другим темам) бесплатно (с возможностью спонсорства) на своем канале [Ссылка на канал](www.youtube.com/@andrievskii) , за что ему огромное спасибо. У него очень хорошие объяснения, много разных тем, и я рекомендую его канал для обучения.
* **Видеокурс:** [Ссылка на видеокурс](https://www.youtube.com/@andrievskii/playlists)
* **CodeIgniter4 Руководство пользователя:** [Ссылка на руководство пользователя](https://codeigniter.com/user_guide/index.html)
* **Первый видеоурок (из 13) по этой теме:** [Ссылка на первый урок](https://www.youtube.com/watch?v=UqSa7JofzwU&list=PLMB6wLyKp7lVhP9tA-ws317TdB3NITiyU) Остальные уроки в его плейлисте.

## Установка и настройка CodeIgniter4

* Описание процесса установки и настройки CodeIgniter4 в соответствии с руководством пользователя.

## Реализация в Ubuntu 22.04 через Docker

### Установка виртуального сервера

* Использование Docker для создания виртуального сервера с `php:8.2-apache`, MySQL и phpMyAdmin.
* Содержимое `docker-compose.yml`:

    ```yaml
    version: "3.8"

    services:
      web:
        build: .
        container_name: ci4_web
        restart: always
        ports:
          - "80:80"
        volumes:
          - .:/var/www/html
          - ./logs:/var/www/html/writable/logs
        depends_on:
          - db

      db:
        image: mysql:8
        container_name: ci4_db
        restart: always
        environment:
          MYSQL_ROOT_PASSWORD: root
          MYSQL_DATABASE: blog
          MYSQL_USER: user
          MYSQL_PASSWORD: root
        ports:
          - "3306:3306"
        volumes:
          - db_data:/var/lib/mysql

      phpmyadmin:
        image: phpmyadmin/phpmyadmin
        container_name: ci4_phpmyadmin
        restart: always
        environment:
          PMA_HOST: db
          MYSQL_ROOT_PASSWORD: root
        ports:
          - "8081:80"

    volumes:
      db_data:
    ```

* Содержимое `Dockerfile`:

    ```dockerfile
    FROM php:8.2-apache

    WORKDIR /var/www/html

    RUN apt-get update && apt-get install -y \
        libpng-dev libjpeg-dev libfreetype6-dev libzip-dev unzip locales \
        libicu-dev \
        && docker-php-ext-configure gd --with-freetype --with-jpeg \
        && docker-php-ext-install gd pdo pdo_mysql zip mysqli intl

    RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf \
        && a2enmod rewrite

    RUN mkdir -p /var/www/html/writable /var/www/html/logs \
        && chown -R www-data:www-data /var/www/html \
        && chmod -R 775 /var/www/html/writable \
        && chmod -R 775 /var/www/html/logs

    EXPOSE 80

    CMD ["apache2-foreground"]
    ```

* Команды Docker:

    ```bash
    docker-compose up --build
    docker-compose up -d --build
    docker-compose up -d
    docker-compose down
    ```

### Установка CodeIgniter4

* Описание процесса установки CodeIgniter4 в Руководстве пользователя: [Ссылка на руководство пользователя](https://codeigniter.com/user_guide/index.html)

### Создание базы данных и миграции

* !База данных из файла когфигурации MYSQL_DATABASE: blog не используется.
* Создание базы данных `study` и таблиц `tasks`, `user`.
* Файл экспорта базы данных: `БД_проекта_study.sql`.
* Пример команд для миграций Docker (ci4_web - имя контейнера):

    ```bash
    php spark make:migration create_user_table
    docker exec -it ci4_web php spark migrate
    docker exec -it ci4_web php spark migrate:rollback
    ```

### Конфигурация

* Переименуйте .env_example в .env или введите Изменения в Ваш файлах конфигурации:

    * `.env`:

        ```ini
        CI_ENVIRONMENT = development
        ...
        app.baseURL = 'http://localhost/'
        ...
        database.default.hostname = db
        database.default.database = study
        database.default.username = root
        database.default.password = root
        ```

    * `app/Config/App.php`:

        ```php
        public string $baseURL = 'http://localhost:80/';
        ```

    * `app/Config/Filters.php`:

        ```php
        public array $globals = [
            'before' => [
                // 'honeypot',
                'csrf', // раскомментировал, если будут баги закомментировать, потом разбираться
                // 'invalidchars',
            ],
            'after' => [
                // 'honeypot',
                // 'secureheaders',
            ],
        ];
        ```

## Запуск контейнера в терминале Ubuntu

1.  **Перейдите в директорию проекта:**

    ```bash
    cd projects/ci4blog/
    ```

    (! Предполагается, что проект находится в `~/projects/ci4blog/`, иначе перейдите в Вашу директорию и запускайте команды там)

2.  **Запустите контейнеры Docker:**

    ```bash
    docker-compose up -d
    ```

    Эта команда запустит контейнеры в фоновом режиме.

3.  **Остановите контейнеры Docker:**

    ```bash
    docker-compose down
    ```

    Эта команда остановит и удалит контейнеры. Если вы всё сделали правильно, при повторном запуске всё вернётся к исходному состоянию.

## Доступ к ресурсам этого проекта

* **Веб-сайт:**

    Откройте браузер и перейдите по адресу: `http://localhost/`

* **phpMyAdmin:**

    Откройте браузер и перейдите по адресу: `http://localhost:8081/`

    * **Имя пользователя:** `root`
    * **Пароль:** `root`



## Предупреждения

> [!WARNING]
> * Материал предоставлен только для образовательных целей.
> * Логины, пароли простые для примера (меняем на свои).
> * Дополнительные вопросы и решения можно найти в ИИ чат-ботах, на форумах.
> * В Ubuntu, возможно, придётся изменить права доступа к папкам и файлам, например writable и logs, если вы видите ошибки 'доступ запрещен', 'недоступен' или 'не найден'.
> * Автор не несет ответственности за ваши ошибки и проблемы с ПО.

---

**Дополнения:**

* Рабочий пример `docker-compose.yml` и `Dockerfile` находится в корневом каталоге проекта.
* Подробная инструкция для Windows с сервером XAMPP представлена в видеоуроках.
* В Ubuntu 22.04 вместо XAMPP используется Docker локальный сервер. Остальное по CodeIgniter4 одинаково, кроме команд с учетом версий и особенностей Docker контейнера. Пример команд выше.