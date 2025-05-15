<?php

use App\Http\Controllers\TodolistController;
use Illuminate\Support\Facades\Route;

Route:: get('/', [TodolistController::class, 'index'])->name('home');
// Route:: get('/todolist/update', [TodolistController::class, 'update'])->name('todolist.update');

Route::get('/todolist/tambah', [TodolistController::class, 'create'])->name('todolist.create');
Route::post('/todolist/tambah/data', [TodolistController::class, 'store'])->name('todolist.store');

Route::get('/todolist/edit/{id}', [TodolistController::class, 'edit'])->name('todolist.edit');
Route::put('/todolist/edit/data/{id}', [TodolistController::class, 'update'])->name('todolist.update');

Route::delete('/deleteTask/{id}', [TodolistController::class, 'destroy'])->name('todolist.destroy');

// Route::get('/', function () {
//     return view('home', [
//         'Task1' => 'Bangun Pagi',
//         'Task2' => 'Mandi',

//     ]);
// });
