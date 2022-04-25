## Необходимо создать проект на Laravel (REST API), только Backend! Предметная область для данных на Ваше усмотрение. Особенности реализации:

***1. Проект содержит базу данных из двух таблиц со связью многие ко многим;***

***2. Работа с базой должна осуществляться через паттерн репозиторий;***

***4. Необходимо реализовать простую аутентификацию через ключ (не используя доп. пакеты passport, jwt etc.);***

***5. API должно предоставлять доступ к данным с возможностью сортировки и поиску по нескольким полям;***

***6. В процессе работы с данными необходимо использовать атрибут pivot для моделей и включить его в запросы по поиску.***


*В качестве результата ссылка на GitLab/GitHub/Bitbucket на выбор, сам репозиторий назвать TestWork428149
А также Postman-коллекция, README с описанием и необходимыми действиями для развертывания проекта.*

## Запуск

нужно,  чтобы был установлен Docker и Linux Ubuntu

копируем -  `git clone https://github.com/klim2020/mello-test-quiz`

запускаем докер контейнеры - `sh sl up -d`

скачиваем зависимости `sh sl composer install`

запускаем миграции `sh sl artisan migrate`

запускаем посевы с тестовыми данными  `sh sl artisan database:seed`

заходим в Postman и  импортируем коллекцию в корневой дирректории `Mello test quiz.postman_collection.json`
