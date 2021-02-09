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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Dashboard
Route::get('/home', 'HomeController@index')->name('home');

//User
Route::get('user/user_view', 'UserController@viewUsers');
Route::post('user/create', 'UserController@addUser');
Route::patch('user/update/{id}', 'UserController@updateUser');
Route::delete('user/delete/{id}', 'UserController@deleteUser');

//change password
Route::get('/user/change_password', 'UserController@changePassword');
Route::post('/change-password', 'UserController@changePasswordStore');

//Expense
Route::get('/expense/view', 'ExpensesController@viewPageExpenses');
Route::post('/expense/create', 'ExpensesController@addExpense');
Route::patch('expense/update/{id}', 'ExpensesController@updateExpense');
Route::delete('/expense/delete/{id}', 'ExpensesController@deleteExpense');

//ExpenseCategory
Route::get('/expense_category/category_view','ExpenseCategoryController@viewPageExpenseCategory');
Route::post('/expense_category/create', 'ExpenseCategoryController@addExpenseCategory');
Route::patch('/expense_category/update/{id}', 'ExpenseCategoryController@updateExpenseCategory');
Route::delete('/expense_category/delete/{id}', 'ExpenseCategoryController@deleteExpenseCategory');

//Roles
Route::get('/role/role_view','RoleController@viewRoles');
Route::post('/role/create','RoleController@addRole');
Route::patch('/role/update/{id}', 'RoleController@updateRole');
Route::delete('role/delete/{id}', 'RoleController@deleteRole');


