<?php
namespace CAdmin;

use Illuminate\Support\Facades\Route;

class CAdminRoute
{
    public static function auth()
    {
        Route::get('login', 'Auth\LoginController@showLoginForm')->name('cAdmin.login');
        Route::post('login', 'Auth\LoginController@login');
        Route::get('logout', 'Auth\LoginController@logout')->name('cAdmin.logout');
        Route::get('permission_denied', 'HomeController@permissionDenied')->name('cAdmin.permission_denied');
    }

    public static function manage()
    {
        Route::group(['middleware' => 'auth'], function() {
            Route::get('home', 'HomeController@index')->name('cAdmin.home');

            Route::get('profile/password', 'ProfileController@password')->name('cAdmin.profile.password');
            Route::post('profile/updatePassword', 'ProfileController@updatePassword')->name('cAdmin.profile.updatePassword');

            Route::get('admin', 'AdminController@index')->name('cAdmin.admin.index');
            Route::get('admin/create', 'AdminController@create')->name('cAdmin.admin.create');
            Route::post('admin/store', 'AdminController@store')->name('cAdmin.admin.store');
            Route::get('admin/{id}/edit', 'AdminController@edit')->name('cAdmin.admin.edit');
            Route::post('admin/update', 'AdminController@update')->name('cAdmin.admin.update');
            Route::post('admin/update_role', 'AdminController@updateRole')->name('cAdmin.admin.updateRole');
            Route::get('admin/{id}/edit_account', 'AdminController@editAccount')->name('cAdmin.admin.editAccount');
            Route::post('admin/updateAccount', 'AdminController@updateAccount')->name('cAdmin.admin.updateAccount');

            Route::get('role', 'RoleController@index')->name('cAdmin.role.index');
            Route::get('role/create', 'RoleController@create')->name('cAdmin.role.create');
            Route::post('role/store', 'RoleController@store')->name('cAdmin.role.store');
            Route::get('role/{id}/edit', 'RoleController@edit')->name('cAdmin.role.edit');
            Route::post('role/update', 'RoleController@update')->name('cAdmin.role.update');
            Route::post('role/update_permission', 'RoleController@updatePermission')->name('cAdmin.role.updatePermission');

            Route::get('permission', 'PermissionController@index')->name('cAdmin.permission.index');

        });
    }
}