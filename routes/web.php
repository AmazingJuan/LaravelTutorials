<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

Route::get('/about', function () {
    $data1 = 'About us - Online Store';
    $data2 = 'About us';
    $description = 'This is an about page ...';
    $author = 'Developed by: Juan Avendaño';

    return view('home.about')
        ->with('title', $data1)
        ->with('subtitle', $data2)
        ->with('description', $description)
        ->with('author', $author);
})->name('home.about');

Route::get('/contact', function () {
    $data1 = 'Contact - Online Store';
    $data2 = 'Contact';
    $description = 'This is a contact page ...';
    $email = 'juan.avendano@cocaine.ninja';
    $number = '+576663234511';
    $address = '10085 Big Pine Dr, Rancho Cucamonga, CA 91737, USA';

    return view('home.contact')
        ->with('title', $data1)
        ->with('subtitle', $data2)
        ->with('description', $description)
        ->with('email', $email)
        ->with('number', $number)
        ->with('address', $address);
})->name('home.contact');

Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('product.index');
Route::get('/products/create', 'App\Http\Controllers\ProductController@create')->name('product.create');
Route::post('/products/save', 'App\Http\Controllers\ProductController@save')->name('product.save');
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name('product.show');
