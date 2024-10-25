<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/kanbanboard', \App\Livewire\KanbanBoard::class)->name('kanban');

Route::get('/createkanban', \App\Livewire\CreateKanban::class)->name('createkanban');

Route::get('/editkanban/{id}', \App\Livewire\EditKanban::class)->name('editkanban');
