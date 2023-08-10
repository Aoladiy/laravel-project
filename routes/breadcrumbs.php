<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Главная', route('home'));
});

Breadcrumbs::for('catalog', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Каталог', route('catalog'));
});

Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('catalog');
    $trail->push($category, route('catalog', $category));
});

Breadcrumbs::for('product', function (BreadcrumbTrail $trail, $name) {
    $trail->parent('catalog');
    $trail->push($name, route('product', $name));
});

Breadcrumbs::for('articles', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Новости', route('articles'));
});

Breadcrumbs::for('article', function (BreadcrumbTrail $trail, $article) {
    $trail->parent('home');
    $trail->push($article, route('article', $article));
});

Breadcrumbs::for('salons', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Салоны', route('salons'));
});

Breadcrumbs::for('about', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('О компании', route('about'));
});

Breadcrumbs::for('clients', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Для клиентов', route('clients'));
});

Breadcrumbs::for('contacts', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Контактная информация', route('contacts'));
});

Breadcrumbs::for('finance', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Финансовый отдел', route('finance'));
});

Breadcrumbs::for('sale', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Условия продаж', route('sale'));
});
