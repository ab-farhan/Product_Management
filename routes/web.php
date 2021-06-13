<?php

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

/*Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();

Route::get('/', 'DashboardController@index')->name('');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('dashboard', 'DashboardController@index')->name('');

Route::get('dashboard/user', 'UserController@index')->name('');
Route::get('dashboard/user/add', 'UserController@add')->name('');
Route::get('dashboard/user/edit/{user}', 'UserController@edit')->name('');
Route::get('dashboard/user/view/{user}', 'UserController@view')->name('');
Route::post('dashboard/user/submit', 'UserController@insert')->name('');
Route::post('dashboard/user/update', 'UserController@update')->name('');
Route::post('dashboard/user/softdelete', 'UserController@softdelete')->name('');
Route::post('dashboard/user/restore', 'UserController@restore')->name('');
Route::post('dashboard/user/delete', 'UserController@delete')->name('');

Route::get('dashboard/account', 'AccountController@index')->name('');
Route::get('dashboard/account/profile', 'AccountController@profile')->name('');
Route::post('dashboard/account/requisition/submit', 'AccountController@requisition_insert')->name('');

Route::get('dashboard/employee', 'EmployeeController@index')->name('');
Route::get('dashboard/employee/add', 'EmployeeController@add')->name('');
Route::get('dashboard/employee/edit/{slug}', 'EmployeeController@edit')->name('');
Route::get('dashboard/employee/view/{slug}', 'EmployeeController@view')->name('');
Route::post('dashboard/employee/submit', 'EmployeeController@insert')->name('');
Route::post('dashboard/employee/update', 'EmployeeController@update')->name('');
Route::post('dashboard/employee/softdelete', 'EmployeeController@softdelete')->name('');
Route::post('dashboard/employee/restore', 'EmployeeController@restore')->name('');
Route::post('dashboard/employee/delete', 'EmployeeController@delete')->name('');

Route::get('dashboard/product', 'ProductController@index')->name('');
Route::get('dashboard/product/add', 'ProductController@add')->name('');
Route::get('dashboard/product/edit/{slug}', 'ProductController@edit')->name('');
Route::get('dashboard/product/view/{slug}', 'ProductController@view')->name('');
Route::post('dashboard/product/submit', 'ProductController@insert')->name('');
Route::post('dashboard/product/update', 'ProductController@update')->name('');
Route::post('dashboard/product/softdelete', 'ProductController@softdelete')->name('');
Route::post('dashboard/product/restore', 'ProductController@restore')->name('');
Route::post('dashboard/product/delete', 'ProductController@delete')->name('');

Route::get('dashboard/product/category', 'ProductCategoryController@index')->name('');
Route::get('dashboard/product/category/add', 'ProductCategoryController@add')->name('');
Route::get('dashboard/product/category/edit/{slug}', 'ProductCategoryController@edit')->name('');
Route::get('dashboard/product/category/view/{slug}', 'ProductCategoryController@view')->name('');
Route::post('dashboard/product/category/submit', 'ProductCategoryController@insert')->name('');
Route::post('dashboard/product/category/update', 'ProductCategoryController@update')->name('');
Route::post('dashboard/product/category/softdelete', 'ProductCategoryController@softdelete')->name('');
Route::post('dashboard/product/category/restore', 'ProductCategoryController@restore')->name('');
Route::post('dashboard/product/category/delete', 'ProductCategoryController@delete')->name('');

Route::get('dashboard/product/purchase', 'ProductPurchaseController@index')->name('');
Route::get('dashboard/product/purchase/add', 'ProductPurchaseController@add')->name('');
Route::get('dashboard/product/purchase/edit/{slug}', 'ProductPurchaseController@edit')->name('');
Route::get('dashboard/product/purchase/view/{slug}', 'ProductPurchaseController@view')->name('');
Route::post('dashboard/product/purchase/submit', 'ProductPurchaseController@insert')->name('');
Route::post('dashboard/product/purchase/update', 'ProductPurchaseController@update')->name('');
Route::post('dashboard/product/purchase/softdelete', 'ProductPurchaseController@softdelete')->name('');
Route::post('dashboard/product/purchase/restore', 'ProductPurchaseController@restore')->name('');
Route::post('dashboard/product/purchase/delete', 'ProductPurchaseController@delete')->name('');

Route::get('dashboard/product/requisition', 'ProductRequisitionController@index')->name('');
Route::get('dashboard/product/requisition/view/{slug}', 'ProductRequisitionController@view')->name('');
Route::post('dashboard/product/requisition/softdelete', 'ProductRequisitionController@softdelete')->name('');
Route::post('dashboard/product/requisition/restore', 'ProductRequisitionController@restore')->name('');
Route::post('dashboard/product/requisition/delete', 'ProductRequisitionController@delete')->name('');

Route::get('dashboard/product/distribution', 'ProductDistributionController@index')->name('');
Route::get('dashboard/product/distribution/request/{slug}', 'ProductDistributionController@request')->name('');
Route::get('dashboard/product/distribution/view/{slug}', 'ProductDistributionController@view')->name('');
Route::post('dashboard/product/distribution/request/submit', 'ProductDistributionController@request_insert')->name('');
Route::post('dashboard/product/distribution/softdelete', 'ProductDistributionController@softdelete')->name('');
Route::post('dashboard/product/distribution/restore', 'ProductDistributionController@restore')->name('');
Route::post('dashboard/product/distribution/delete', 'ProductDistributionController@delete')->name('');

Route::get('dashboard/product/damage', 'ProductDamageController@index')->name('');
Route::get('dashboard/product/damage/add', 'ProductDamageController@add')->name('');
Route::get('dashboard/product/damage/edit/{slug}', 'ProductDamageController@edit')->name('');
Route::get('dashboard/product/damage/view/{slug}', 'ProductDamageController@view')->name('');
Route::post('dashboard/product/damage/submit', 'ProductDamageController@insert')->name('');
Route::post('dashboard/product/damage/update', 'ProductDamageController@update')->name('');
Route::post('dashboard/product/damage/softdelete', 'ProductDamageController@softdelete')->name('');

Route::get('dashboard/product/stock', 'ProductStockController@index')->name('');
Route::get('dashboard/product/stock/view/{slug}', 'ProductStockController@view')->name('');

Route::get('dashboard/profile', 'ProfileController@index')->name('');

Route::get('dashboard/invoice', 'DashboardController@invoice')->name('');

Route::get('dashboard/permission', 'DashboardController@permission')->name('');

Route::get('dashboard/recycle', 'RecycleController@index')->name('');
Route::get('dashboard/recycle/user', 'RecycleController@user')->name('');
Route::get('dashboard/recycle/employee', 'RecycleController@empolyee')->name('');
Route::get('dashboard/recycle/product', 'RecycleController@product')->name('');
Route::get('dashboard/recycle/product/category', 'RecycleController@productCategory')->name('');
Route::get('dashboard/recycle/product/purchase', 'RecycleController@productpurchase')->name('');
Route::get('dashboard/recycle/product/requisition', 'RecycleController@productrequisition')->name('');
Route::get('dashboard/recycle/product/distribution', 'RecycleController@productDistribution')->name('');
