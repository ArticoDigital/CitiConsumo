<?php

Route::get('/', [
    'uses' => function () {
        return view('back.dashboard');
    },
]);

Route::get('mi-perfil', [
    'as' => 'myProfile',
    'uses' => 'AdminController@myProfile',
]);

Route::get('desembolso', function () {
    return view('back.outlay');
});

Route::get('checkout', function () {
    return view('back.checkout');
});

Route::get('confirmar-compra', function () {
    return view('back.shopConfirm');
});

Route::get('postular-servicio', [
    'as' => 'addService',
    'uses' => 'AdminController@addService',
    'roles' => [1, 2]
]);

Route::post('postular-servicio', [
    'as' => 'newService',
    'uses' => 'AdminController@newService',
    'roles' => [1, 2]
]);


Route::get('subir-archivos', [
    'as' => 'uploadFiles',
    'uses' => 'AdminController@uploadFiles',
    'roles' => 1
]);

Route::post('uploadFile', [
    'uses' => 'AdminController@uploadFile',
    'as' => 'uploadFile'
]);

Route::get('perfil/{id}', [
    'as' => 'profile',
    'uses' => 'AdminController@profile',
    'roles' => 3
]);


Route::post('updateUser', [
    'uses' => 'AdminController@updateUser',
    'as' => 'updateUser'
]);

Route::post('uploadUserFileFields', [
    'uses' => 'AdminController@uploadUserFileFields',
    'as' => 'uploadUserFileFields'
]);

Route::get('usuarios-clientes', [
    'uses' => 'UserController@showClient',
    'as' => 'showClient',
    'roles' => 3
]);
Route::get('usuarios-proveedor', [
    'uses' => 'UserController@showProvider',
    'as' => 'showProvider',
    'roles' => 3
]);
Route::get('usuarios-proveedor-activar', [
    'uses' => 'UserController@showProviderActive',
    'as' => 'showProviderActive',
    'roles' => 3
]);
Route::get('usuarios-proveedor-eliminados', [
    'uses' => 'UserController@showProviderDelete',
    'as' => 'showProviderDelete',
    'roles' => 3
]);

Route::post('usuarios-proveedor-activar', [
    'uses' => 'UserController@enabledProvider',
    'as' => 'enabledProvider',
]);

Route::post('usuarios-proveedor-desactivar', [
    'uses' => 'UserController@disabledProvider',
    'as' => 'disableProvider',

]);

Route::post('usuarios-proveedor-eliminar', [
    'uses' => 'UserController@deleteProvider',
    'as' => 'deleteProvider',
]);
Route::post('usuarios-proveedor-reactivar', [
    'uses' => 'UserController@reenableProvider',
    'as' => 'reenableProvider',
]);

Route::get('productos-proveedores', [
    'as' => 'showProductsInactived',
    'uses' => 'UserController@showProductsInactived'
]);

Route::post('product/deleteProduct/{id}', [
    'as' => 'deleteProductProvider',
    'uses' => 'UserController@deleteProductProvider'
]);

Route::post('usuarios-proveedor-reactivar', [
    'uses' => 'UserController@reenableProvider',
    'as' => 'reenableProvider',
]);

Route::post('uploadTempFiles', [
    'as' => 'uploadTempFiles',
    'uses' => 'AdminController@uploadTempFiles'
]);

/************* ProductController **************/

Route::post('deleteProduct', [
    'uses' => 'ProductController@delete',
    'as' => 'deleteProduct'
]);

Route::post('insertOutlay', [
    'uses' => 'BuyController@insertOutlay',
    'as' => 'insertOutlay'
]);