<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/todo', TodoController::class);

// Route::get('/todos', [TodoController::class, 'index'])->name('todo.index');
// Route::post('/todos/create', [TodoController::class, 'store']);
// Route::get('/todos/create', [TodoController::class, 'create']);
// Route::get('/todos/{todo}/edit', [TodoController::class, 'edit']);
// Route::put('/todos/{todo}/update', [TodoController::class, 'update'])->name('todo.update');
// Route::delete('/todos/{todo}/delete', [TodoController::class, 'delete'])->name('todo.delete');

Route::put('/todos/{todo}/complete', [TodoController::class, 'complete'])->name('todo.complete');
Route::put('/todos/{todo}/incomplete', [TodoController::class, 'incomplete'])->name('todo.incomplete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
