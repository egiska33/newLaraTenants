<?php
Route::get('/', function () { return redirect('/admin/home'); });

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

// Social Login Routes..
Route::get('login/{driver}', 'Auth\LoginController@redirectToSocial')->name('auth.login.social');
Route::get('{driver}/callback', 'Auth\LoginController@handleSocialCallback')->name('auth.login.social_callback');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('houses', 'Admin\HousesController');
    Route::post('houses_mass_destroy', ['uses' => 'Admin\HousesController@massDestroy', 'as' => 'houses.mass_destroy']);
    Route::resource('bills', 'Admin\BillsController');
    Route::post('bills_mass_destroy', ['uses' => 'Admin\BillsController@massDestroy', 'as' => 'bills.mass_destroy']);
    Route::resource('tasks', 'Admin\TasksController');
    Route::post('tasks_mass_destroy', ['uses' => 'Admin\TasksController@massDestroy', 'as' => 'tasks.mass_destroy']);
    Route::resource('messages', 'Admin\MessagesController');
    Route::post('messages_mass_destroy', ['uses' => 'Admin\MessagesController@massDestroy', 'as' => 'messages.mass_destroy']);
    Route::resource('documents', 'Admin\DocumentsController');
    Route::post('documents_mass_destroy', ['uses' => 'Admin\DocumentsController@massDestroy', 'as' => 'documents.mass_destroy']);

});
Route::group(['middleware' => ['auth'], 'prefix'=> 'landlord' ], function (){
    Route::get('/houses', 'Admin\HousesController@index')->name('view.house');
    Route::get('/houses/create', 'Admin\HousesController@create')->name('landlord.houses.create');
    Route::post('/houses/store', 'Admin\HousesController@store')->name('landlord.houses.store');
    Route::get('houses/{id}', 'Admin\HousesController@show')->name('landlord.house.show');
    Route::get('house/{id}/create', 'ProfileController@create')->name('landlord.tenant.create');
    Route::post('house/{id}/create', 'ProfileController@addTenant')->name('tenants.store');
    Route::get('houses/update/{id}/delete/{tenant}', 'ProfileController@update')->name('delete.tenant');
    Route::get('houses/tenant/{id}', 'Admin\UsersController@show')->name('show.tenant');
    Route::get('houses/{id}/bills', 'Landlord\BillsController@index')->name('show.landlord.bill');
    Route::get('houses/{id}/tasks', 'Landlord\TasksController@index')->name('show.landlord.task');
    Route::get('houses/{id}/messages', 'Landlord\MessagesController@index')->name('show.landlord.message');
    Route::get('houses/{id}/documents', 'Landlord\DocumentsController@index')->name('show.landlord.document');
});
