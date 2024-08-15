<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

Task
1. Создать новый проект на Laravel
2. Сделать модель и миграции для Контакта(Contact). Контакт содержит в себе имя, фамилию и отчество.
2. Сделать модель и миграцию для Заявки(Application). Заявка состоит из текста заявки, ip адреса и contact_id.
2. Реализовать страницу для отправки заявок. После отправки заявки должно происходить её запись в базу c разделением данных на две сущности. После записи должная создаваться Job для записи в логи JSON-сериализации заявки.
3. Создать модель и миграции для Администраторов (Manager). Администратор содержит в себе логин и пароль (обязательно хэшированный). Реализовать небольшую форму для авторизации и консольную команду для создания пользователя.
4. Сделать страницу с выводом всех заявок, открыть доступ к ней только для авторизованных Администраторов c помощью своего Middleware. Также сделать фильтрацию по ip адресам, которые перечислены в .env
