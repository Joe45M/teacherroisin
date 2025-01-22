<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin', \App\Livewire\Admin\AdminHome::class)
    ->name('admin.home');


Route::get('/admin/student/{user:id}', \App\Livewire\Admin\ViewStudent::class)
    ->name('admin.view-student');


Route::get('/admin/blueprints', \App\Livewire\Admin\AdminBlueprints::class)
    ->name('admin.blueprints');

Route::get('/admin/blueprints/{blueprint:id}', \App\Livewire\Admin\AdminEditBlueprint::class)
    ->name('admin.blueprints.edit');

Route::get('/admin/blueprints/{blueprint:id}', \App\Livewire\Admin\AdminEditBlueprint::class)
    ->name('admin.blueprints.edit');

Route::get('/admin/calendar', \App\Livewire\AdminCalendarPage::class)
    ->name('admin.calendar');

Route::get('/admin/classes', \App\Livewire\Admin\ClassList::class)
    ->name('admin.class-list');

Route::get('/admin/transactions', \App\Livewire\Admin\AdminTransactions::class)
    ->name('admin.transactions');
