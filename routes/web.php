<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminUserController; // Importante: Agrega el controlador de administrador
use App\Http\Controllers\SuperAdminController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');


// Mostrar formulario de solicitud de restablecimiento de contraseña
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');

// Manejar solicitud de restablecimiento de contraseña
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Restablecer contraseña
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('/all-tasks', [TaskController::class, 'showAllTasks'])->name('tasks.showAll');

// Rutas protegidas por superadmin
Route::middleware(['auth'])->group(function () {
    Route::get('/superadmin/dashboard', [SuperAdminController::class, 'dashboard'])->name('superadmin.dashboard');
    Route::get('/superadmin/users', [SuperAdminController::class, 'listUsers'])->name('superadmin.users');
    Route::get('/superadmin/reports', [SuperAdminController::class, 'generateReports'])->name('superadmin.reports');
    // Ruta para cambiar el rol de un usuario (solo para superadmins)
    Route::post('/usuarios/{id}/cambiar-rol', [UserController::class, 'cambiarRol'])->name('usuarios.cambiar-rol');
    Route::get('/usuarios/{id}/editar', [UserController::class, 'edit'])->name('editar-usuario');
    
    
    
    // Rutas para la administración de usuarios
    Route::get('/admin/users/create', [AdminUserController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users', [AdminUserController::class, 'store'])->name('admin.users.store');

    Route::post('/admin/tasks', [TaskController::class, 'store'])->name('admin.tasks.store'); // Ruta para almacenar la tarea
    Route::get('/admin/tasks/create', [TaskController::class, 'create'])->name('admin.tasks.create');

    // Ruta para eliminar una tarea
    
    Route::delete('/tasks/{taskId}', [TaskController::class, 'delete'])->name('tasks.delete');




});
