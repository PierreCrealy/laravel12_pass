<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

use App\Http\Controllers\UserController;
use App\Http\Controllers\MailController;

use App\Livewire\Users\UserIndex;
use App\Livewire\Users\UserCreate;
use App\Livewire\Users\UserEdit;
use App\Livewire\Users\UserDelete;

use App\Livewire\Roles\RoleIndex;
use App\Livewire\Roles\RoleCreate;
use App\Livewire\Roles\RoleEdit;
use App\Livewire\Roles\RoleDelete;

use App\Livewire\Permissions\PermissionIndex;
use App\Livewire\Permissions\PermissionCreate;
use App\Livewire\Permissions\PermissionEdit;
use App\Livewire\Permissions\PermissionDelete;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/mail-preview', function () {
    return view('mails.basic');
})->name('mail-preview');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

//    Route::get('users', UserIndex::class)->name('users.index');

    Route::get('/controller/users', [UserController::class, 'index'])->name('controller.users.index');

    Route::group(['prefix' => 'utilisateurs', 'as' => 'users.'], function () {
        Route::get('/', UserIndex::class)->name('index');
        Route::get('/create', UserCreate::class)->name('create');
        Route::get('/edit/{user}', UserEdit::class)->name('edit');
        Route::get('/delete/{user}', UserDelete::class)->name('delete');
    });

    Route::group(['prefix' => 'roles', 'as' => 'roles.'], function () {
        Route::get('/', RoleIndex::class)->name('index');
        Route::get('/create', RoleCreate::class)->name('create');
        Route::get('/edit/{role}', RoleEdit::class)->name('edit');
        Route::get('/delete/{role}', RoleDelete::class)->name('delete');
    });

    Route::group(['prefix' => 'permissions', 'as' => 'permissions.'], function () {
        Route::get('/', PermissionIndex::class)->name('index');
        Route::get('/create', PermissionCreate::class)->name('create');
        Route::get('/edit/{permission}', PermissionEdit::class)->name('edit');
        Route::get('/delete/{permission}', PermissionDelete::class)->name('delete');
    });

    Route::group(['prefix' => 'mails', 'as' => 'mails.'], function() {
       Route::get('/template', [MailController::class, 'viewTemplate'])->name('view.template');
    });

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
