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

Route::get('/','AuthenticationController@login')->name('authentication.login');
Route::post('/login', 'AuthenticationController@user_login')->name('login');

Route::group(['middleware'=>'auth'],function(){

    Route::get('/logout', 'AuthenticationController@user_logout')->name('logout');

    Route::get('/union/select_union_admin', 'UnionController@select_union_admin')->name('union.select_union_admin');
    Route::get('/union/select_assoc_admin', 'UnionController@select_assoc_admin')->name('union.select_assoc_admin');
    Route::get('/union/associations_members_number', 'UnionController@associations_members_number')->name('union.associations_members_number');
    Route::get('/union/{name}', 'UnionController@index')->name('union.index');

    Route::get('/association', 'AssociationController@index')->name('association.index');
    Route::get('/association/create', 'AssociationController@create')->name('association.create');
    Route::post('/association/store', 'AssociationController@store')->name('association.store');
    Route::get('/association/edit/{id}','AssociationController@edit')->name('association.edit');
    Route::post('/association/update','AssociationController@update')->name('association.update');
    Route::get('/association/destroy/{id}','AssociationController@destroy')->name('association.destroy');

    Route::get('/member/create', 'MemberController@create')->name('member.create');
    Route::get('/member/union_members', 'MemberController@union_members')->name('member.union_members');
    Route::post('/member/store', 'MemberController@store')->name('member.store');
    Route::post('/member/members_count', 'MemberController@members_count')->name('member.members_count');
    Route::get('/member/assoc_members/{status}', 'MemberController@assoc_members')->name('member.assoc_members');
    Route::get('/member/all_assoc_members', 'MemberController@all_assoc_members')->name('member.all_assoc_members');
    Route::get('/member/edit/{id}', 'MemberController@edit')->name('member.edit');
    Route::post('/member/update', 'MemberController@update')->name('member.update');
    Route::get('/member/destroy/{id}', 'MemberController@destroy')->name('member.destroy');

    Route::get('/user/create', 'UserController@create')->name('user.create');
    Route::post('/user/store', 'UserController@store')->name('user.store');
    Route::post('/user/union_admin', 'UserController@union_admin')->name('user.union_admin');
    Route::post('/user/assoc_admin', 'UserController@assoc_admin')->name('user.assoc_admin');
    Route::get('/user/index','UserController@index')->name('user.index');
    Route::get('/user/edit/{id}', 'UserController@edit')->name('user.edit');
    Route::post('/user/update', 'UserController@update')->name('user.update');
    Route::get('/user/destroy/{id}', 'UserController@destroy')->name('user.destroy');

    Route::get('/diwan/index', 'DiwanController@index')->name('diwan.index');
    Route::get('/diwan/create', 'DiwanController@create')->name('diwan.create');
    Route::post('/diwan/store', 'DiwanController@store')->name('diwan.store');

    Route::get('/fee/index/{fee_type}', 'FeeController@index')->name('fee.index');
    Route::get('/fee/create/{member_id}', 'FeeController@create')->name('fee.create');
    Route::post('/fee/store', 'FeeController@store')->name('fee.store');

});

