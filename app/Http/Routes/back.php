<?php

// GENERAL ROUTES

Route::get('/', [
    'as' => 'myProfile',
    'uses' => 'AdminController@myProfile',
]);

Route::get('checkout', function () {
    return view('back.checkout');
});

Route::get('confirmar-compra', function () {
    return view('back.shopConfirm');
});

Route::post('uploadFile', [
    'uses' => 'AdminController@uploadFile',
    'as' => 'uploadFile'
]);

Route::post('uploadProfileFile', [
    'uses' => 'AdminController@uploadProfileFile',
    'as' => 'uploadProfileFile'
]);

Route::post('updateUser', [
    'uses' => 'AdminController@updateUser',
    'as' => 'updateUser'
]);

Route::post('uploadUserFileFields', [
    'uses' => 'AdminController@uploadUserFileFields',
    'as' => 'uploadUserFileFields'
]);

Route::post('deleteService', [
    'uses' => 'ServiceController@delete',
    'as' => 'deleteProduct'
]);

Route::post('deleteServiceByProvider', [
    'uses' => 'ServiceController@deleteServiceByProvider',
    'as' => 'deleteProductByProvider'
]);

Route::get('editar-servicio/{id}', [
    'uses' => 'ServiceController@edit',
    'as' => 'editProduct'
]);

Route::post('editar-servicio/{id}', [
    'uses' => 'ServiceController@update',
    'as' => 'editServicePost'
]);

Route::post('insertOutlay', [
    'uses' => 'BuyController@insertOutlay',
    'as' => 'insertOutlay'
]);

Route::post('buyAction', [
    'uses' => 'BuyController@buyAction',
    'as' => 'buyAction'
]);

Route::post('updateOutlateState/{id}', [
    'uses' => 'BuyController@updateOutlateState',
    'as' => 'updateOutlateState'
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

Route::get('productos-eliminados', [
    'as' => 'showProductsDeleted',
    'uses' => 'UserController@showProductsDeleted'
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

// ADMIN ROUTES

Route::get('desembolso', [
    'uses' => 'BuyController@outlayList',
    'as' => 'outlayList',
    'roles' => 3
]);

Route::get('perfil/{id}', [
    'as' => 'profile',
    'uses' => 'AdminController@profile',
    'roles' => 3
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

// USERS ROUTES

Route::get('postular-servicio', [
    'as' => 'addService',
    'uses' => 'ServiceController@add',
    'roles' => [1, 2]
]);

Route::post('postular-servicio', [
    'as' => 'newService',
    'uses' => 'ServiceController@create',
    'roles' => [1, 2]
]);

Route::post('updateStateService', [
    'uses' => 'AdminController@updateStateService',
    'as' => 'updateStateService',
    'roles' => 2
]);

Route::get('subir-archivos', [
    'as' => 'uploadFiles',
    'uses' => 'AdminController@uploadFiles',
    'roles' => 1
]);

Route::get('servicios-usuario/{id}', [
    'as' => 'servicesUser',
    'uses' => 'ServiceController@servicesUser',
    'roles' => [3]
]);

Route::get('servicio/{id}', [
    'as' => 'serviceDetail',
    'uses' => 'ServiceController@serviceDetail',
    'roles' => [3]
]);

Route::get('transacciones', [
    'as' => 'tradeList',
    'uses' => 'BuyController@tradeList',
]);