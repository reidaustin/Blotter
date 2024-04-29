<?php

use App\Models\Admin;
use Illuminate\Support\Facades\Route;



//Admin Routes
Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::group(['middleware' => 'AdminGuest'], function () {
        //login Routes
        Route::get('login', ['as' => 'admin.login', 'uses' => '\App\Http\Controllers\Admin\LoginController@login']);
        Route::post('login/process', ['as' => 'admin.login.process', 'uses' => '\App\Http\Controllers\Admin\LoginController@attempt']);
    });

    Route::group(['middleware' => "AdminAuth"], function () {
        //Profile Routes
        Route::get('profile', ['as' => 'admin.profile', 'uses' => '\App\Http\Controllers\Admin\ProfileController@profile']);
        Route::post('profile/update', ['as' => 'admin.profile.update', 'uses' => '\App\Http\Controllers\Admin\ProfileController@updateAdminProfile']);
        //Dashboard Route
        Route::get('dashboard', ['as' => 'admin.dashboard', 'uses' => '\App\Http\Controllers\Admin\LoginController@dashboard']);
        //Logout Route
        Route::get('logout', ['as' => 'admin.logout', 'uses' => '\App\Http\Controllers\Admin\LoginController@logout']);
        //Daily Blotter Routes
        Route::get('blotter/{id}', ['as' => 'admin.blotter', 'uses' => '\App\Http\Controllers\Admin\DailyBlotterController@view_blotter']);
        Route::get('add/blotter/{id}', ['as' => 'admin.add.blotter', 'uses' => '\App\Http\Controllers\Admin\DailyBlotterController@add_blotter']);
        Route::post('store/blotter', ['as' => 'admin.store.blotter', 'uses' => '\App\Http\Controllers\Admin\DailyBlotterController@blotter_store']);
        Route::get('edit/blotter/{id}', ['as' => 'admin.edit.blotter', 'uses' => '\App\Http\Controllers\Admin\DailyBlotterController@edit_blotter']);
        Route::get('delete/{id}', ['as' => 'admin.delete', 'uses' => '\App\Http\Controllers\Admin\DailyBlotterController@blotter_delete']);
        Route::get('onlyview/blotter/{id}', ['as' => 'admin.onlyview.blotter', 'uses' => '\App\Http\Controllers\Admin\DailyBlotterController@onlyview_blotter']);
        Route::post('update/blotter', ['as' => 'admin.update.blotter', 'uses' => '\App\Http\Controllers\Admin\DailyBlotterController@blotter_update']);
        Route::post('blotter/pdf', ['as' => 'admin.blotter.pdf', 'uses' => '\App\Http\Controllers\Admin\DailyBlotterController@view_blotter_pdf']);
        Route::post('locked/blotter', ['as' => 'admin.locked.blotter', 'uses' => '\App\Http\Controllers\Admin\DailyBlotterController@blotter_locked']);
        Route::post('blotter/stat', ['as' => 'admin.blotter.stat', 'uses' => '\App\Http\Controllers\Admin\DailyBlotterController@view_stat_pdf']);
        Route::get('single/blotter/pdf/{id}', ['as' => 'admin.single.blotter.pdf', 'uses' => '\App\Http\Controllers\Admin\DailyBlotterController@view_single_blotter_pdf']);


        //Blotter Comment Routes
        Route::post('blotter/comment', ['as' => 'admin.blotter.comment', 'uses' => '\App\Http\Controllers\Admin\BlotterCommentController@blotter_comment_store']);
        Route::get('view/comment/{id}', ['as' => 'admin.view.comment', 'uses' => '\App\Http\Controllers\Admin\BlotterCommentController@view_comments']);


        //Tour Routes
        Route::get('tour', ['as' => 'admin.tour', 'uses' => '\App\Http\Controllers\Admin\TourController@view_tour']);
        Route::get('add/tour', ['as' => 'admin.add.tour', 'uses' => '\App\Http\Controllers\Admin\TourController@add_tour']);
        Route::post('store/tour', ['as' => 'admin.store.tour', 'uses' => '\App\Http\Controllers\Admin\TourController@store_tour']);
        Route::get('edit/tour/{id}', ['as' => 'admin.edit.tour', 'uses' => '\App\Http\Controllers\Admin\TourController@edit_tour']);
        Route::get('delete/tour/{id}', ['as' => 'admin.delete.tour', 'uses' => '\App\Http\Controllers\Admin\TourController@tour_delete']);
        Route::post('update/tour', ['as' => 'admin.update.tour', 'uses' => '\App\Http\Controllers\Admin\TourController@update_tour']);
        Route::get('locked/tour', ['as' => 'admin.locked.tour', 'uses' => '\App\Http\Controllers\Admin\TourController@locked_tour']);
        Route::post('own/inci', ['as' => 'admin.own.inci', 'uses' => '\App\Http\Controllers\Admin\TourController@view_tour_there_incidient']);
        Route::get('tour/export', ['as' => 'admin.tour.export', 'uses' => '\App\Http\Controllers\Admin\TourController@export']);




        //Officer Routes
        Route::get('officer', ['as' => 'admin.officer', 'uses' => '\App\Http\Controllers\Admin\OfficerController@view_officer']);
        Route::get('add/officer', ['as' => 'admin.add.officer', 'uses' => '\App\Http\Controllers\Admin\OfficerController@add_officer']);
        Route::post('store/officer', ['as' => 'admin.store.officer', 'uses' => '\App\Http\Controllers\Admin\OfficerController@store_officer']);
        Route::get('edit/officer/{id}', ['as' => 'admin.edit.officer', 'uses' => '\App\Http\Controllers\Admin\OfficerController@edit_officer']);
        Route::get('delete/officer/{id}', ['as' => 'admin.delete.officer', 'uses' => '\App\Http\Controllers\Admin\OfficerController@delete_officer']);
        Route::post('update/officer', ['as' => 'admin.update.officer', 'uses' => '\App\Http\Controllers\Admin\OfficerController@update_officer']);

        //TourCommander Routes
        Route::get('commander', ['as' => 'admin.commander', 'uses' => '\App\Http\Controllers\Admin\TourCommanderController@view_commander']);
        Route::get('add/commander', ['as' => 'admin.add.commander', 'uses' => '\App\Http\Controllers\Admin\TourCommanderController@add_commander']);
        Route::post('store/commander', ['as' => 'admin.store.commander', 'uses' => '\App\Http\Controllers\Admin\TourCommanderController@store_commander']);
        Route::get('edit/commander/{id}', ['as' => 'admin.edit.commander', 'uses' => '\App\Http\Controllers\Admin\TourCommanderController@edit_commander']);
        Route::get('delete/commander/{id}', ['as' => 'admin.delete.commander', 'uses' => '\App\Http\Controllers\Admin\TourCommanderController@delete_commander']);
        Route::post('update/commander', ['as' => 'admin.update.commander', 'uses' => '\App\Http\Controllers\Admin\TourCommanderController@update_commander']);

        //Supervisor Routes
        Route::get('supervisor', ['as' => 'admin.supervisor', 'uses' => '\App\Http\Controllers\Admin\SupervisorController@view_supervisor']);
        Route::get('add/supervisor', ['as' => 'admin.add.supervisor', 'uses' => '\App\Http\Controllers\Admin\SupervisorController@add_supervisor']);
        Route::post('store/supervisor', ['as' => 'admin.store.supervisor', 'uses' => '\App\Http\Controllers\Admin\SupervisorController@store_supervisor']);
        Route::get('edit/supervisor/{id}', ['as' => 'admin.edit.supervisor', 'uses' => '\App\Http\Controllers\Admin\SupervisorController@edit_supervisor']);
        Route::get('delete/supervisor/{id}', ['as' => 'admin.delete.supervisor', 'uses' => '\App\Http\Controllers\Admin\SupervisorController@delete_supervisor']);
        Route::post('update/supervisor', ['as' => 'admin.update.supervisor', 'uses' => '\App\Http\Controllers\Admin\SupervisorController@update_supervisor']);

        //Legend Route
        Route::get('legend', ['as' => 'admin.legend', 'uses' => '\App\Http\Controllers\Admin\UserController@legend']);

        //User Routes
        Route::get('user', ['as' => 'admin.user', 'uses' => '\App\Http\Controllers\Admin\UserController@view_users']);
        Route::get('add/user', ['as' => 'admin.add.user', 'uses' => '\App\Http\Controllers\Admin\UserController@add_user']);
        Route::post('store/user', ['as' => 'admin.store.user', 'uses' => '\App\Http\Controllers\Admin\UserController@add_user_process']);
        Route::get('edit/user/{id}', ['as' => 'admin.edit.user', 'uses' => '\App\Http\Controllers\Admin\UserController@edit_user']);
        Route::get('delete/user/{id}', ['as' => 'admin.delete.user', 'uses' => '\App\Http\Controllers\Admin\UserController@user_delete']);
        Route::post('update/user', ['as' => 'admin.update.user', 'uses' => '\App\Http\Controllers\Admin\UserController@update_user_process']);
    });
});


//Officer Routes
// Route::prefix('officer')->namespace('Officer')->group(function () {
    Route::group(['middleware' => 'OfficerGuest'], function () {
        //Register Routes
    Route::get('register', ['as' => 'register', 'uses' => '\App\Http\Controllers\Officer\RegisterController@officer_register']);
    Route::post('register/process', ['as' => 'register.process', 'uses' => '\App\Http\Controllers\Officer\RegisterController@officer_register_process']);

    //login Routes
    Route::get('login', ['as' => 'login', 'uses' => '\App\Http\Controllers\Officer\LoginController@officer_login']);
    Route::post('login/process', ['as' => 'login.process', 'uses' => '\App\Http\Controllers\Officer\LoginController@attempt']);

    });

    Route::group(['middleware' => "OfficerAuth"], function () {
        //Profile Routes
        Route::get('change/password', ['as' => 'change.password', 'uses' => '\App\Http\Controllers\Officer\ProfileController@change_password']);
        Route::post('change/password/process', ['as' => 'change.password.process', 'uses' => '\App\Http\Controllers\Officer\ProfileController@changepassword_process']);
        //Dashboard Route
        Route::get('dashboard', ['as' => 'dashboard', 'uses' => '\App\Http\Controllers\Officer\LoginController@officer_dasboard']);
        //Logout Route
        Route::get('logout', ['as' => 'logout', 'uses' => '\App\Http\Controllers\Officer\LoginController@logout']);
        //Daily Blotter Routes
        Route::get('blotter/{id}', ['as' => 'blotter', 'uses' => '\App\Http\Controllers\Officer\TourBlotterController@view_blotter']);
        Route::get('add/blotter/{id}', ['as' => 'add.blotter', 'uses' => '\App\Http\Controllers\Officer\TourBlotterController@add_blotter']);
        Route::post('store/blotter', ['as' => 'store.blotter', 'uses' => '\App\Http\Controllers\Officer\TourBlotterController@blotter_store']);
        Route::get('edit/blotter/{id}', ['as' => 'edit.blotter', 'uses' => '\App\Http\Controllers\Officer\TourBlotterController@edit_blotter']);
        Route::get('delete/blotter/{id}', ['as' => 'delete.blotter', 'uses' => '\App\Http\Controllers\Officer\TourBlotterController@blotter_delete']);
        Route::get('onlyview/blotter/{id}', ['as' => 'onlyview.blotter', 'uses' => '\App\Http\Controllers\Officer\TourBlotterController@onlyview_blotter']);
        Route::post('update/blotter', ['as' => 'update.blotter', 'uses' => '\App\Http\Controllers\Officer\TourBlotterController@blotter_update']);
        Route::post('blotter/pdf', ['as' => 'blotter.pdf', 'uses' => '\App\Http\Controllers\Officer\TourBlotterController@view_blotter_pdf']);
        Route::post('locked/blotter', ['as' => 'locked.blotter', 'uses' => '\App\Http\Controllers\Officer\TourBlotterController@blotter_locked']);
        Route::get('single/pdf/{id}', ['as' => 'single.pdf', 'uses' => '\App\Http\Controllers\Officer\TourBlotterController@view_single_pdf']);

        //Blotter Comment Routes
        Route::post('blotter/comment', ['as' => 'blotter.comment', 'uses' => '\App\Http\Controllers\Officer\TourBlotterController@blotter_comment_store']);
        Route::get('view/comment/{id}', ['as' => 'view.comment', 'uses' => '\App\Http\Controllers\Officer\TourBlotterController@view_comments']);

        //User Legend Route
        Route::get('legend', ['as' => 'legend', 'uses' => '\App\Http\Controllers\Officer\TourBlotterController@user_legend']);

        //Tour Routes
        Route::get('tour', ['as' => 'tour', 'uses' => '\App\Http\Controllers\Officer\TourBlotterController@view_tour']);
        Route::get('add/tour', ['as' => 'add.tour', 'uses' => '\App\Http\Controllers\Officer\TourBlotterController@add_tour']);
        Route::post('store/tour', ['as' => 'store.tour', 'uses' => '\App\Http\Controllers\Officer\TourBlotterController@store_tour']);
        Route::get('edit/tour/{id}', ['as' => 'edit.tour', 'uses' => '\App\Http\Controllers\Officer\TourBlotterController@edit_tour']);
        Route::get('delete/tour/{id}', ['as' => 'delete.tour', 'uses' => '\App\Http\Controllers\Officer\TourBlotterController@tour_delete']);
        Route::post('update/tour', ['as' => 'update.tour', 'uses' => '\App\Http\Controllers\Officer\TourBlotterController@update_tour']);

        //Officer Routes
        Route::get('officer', ['as' => 'officer', 'uses' => '\App\Http\Controllers\Officer\TourBlotterController@view_officer']);
        Route::get('add/officer', ['as' => 'add.officer', 'uses' => '\App\Http\Controllers\Officer\TourBlotterController@add_officer']);
        Route::post('store/officer', ['as' => 'store.officer', 'uses' => '\App\Http\Controllers\Officer\TourBlotterController@store_officer']);
        Route::get('edit/officer/{id}', ['as' => 'edit.officer', 'uses' => '\App\Http\Controllers\Officer\TourBlotterController@edit_officer']);
        Route::get('delete/officer/{id}', ['as' => 'delete.officer', 'uses' => '\App\Http\Controllers\Officer\TourBlotterController@delete_officer']);
        Route::post('update/officer', ['as' => 'update.officer', 'uses' => '\App\Http\Controllers\Officer\TourBlotterController@update_officer']);

        //TourCommander Routes
        Route::get('commander', ['as' => 'commander', 'uses' => '\App\Http\Controllers\Officer\TourBlotterController@view_commander']);
        Route::get('add/commander', ['as' => 'add.commander', 'uses' => '\App\Http\Controllers\Officer\TourBlotterController@add_commander']);
        Route::post('store/commander', ['as' => 'store.commander', 'uses' => '\App\Http\Controllers\Officer\TourBlotterController@store_commander']);
        Route::get('edit/commander/{id}', ['as' => 'edit.commander', 'uses' => '\App\Http\Controllers\Officer\TourBlotterController@edit_commander']);
        Route::get('delete/commander/{id}', ['as' => 'delete.commander', 'uses' => '\App\Http\Controllers\Officer\TourBlotterController@delete_commander']);
        Route::post('update/commander', ['as' => 'update.commander', 'uses' => '\App\Http\Controllers\Officer\TourBlotterController@update_commander']);

        //Supervisor Routes
        Route::get('supervisor', ['as' => 'supervisor', 'uses' => '\App\Http\Controllers\Officer\TourBlotterController@view_supervisor']);
        Route::get('add/supervisor', ['as' => 'add.supervisor', 'uses' => '\App\Http\Controllers\Officer\TourBlotterController@add_supervisor']);
        Route::post('store/supervisor', ['as' => 'store.supervisor', 'uses' => '\App\Http\Controllers\Officer\TourBlotterController@store_supervisor']);
        Route::get('edit/supervisor/{id}', ['as' => 'edit.supervisor', 'uses' => '\App\Http\Controllers\Officer\TourBlotterController@edit_supervisor']);
        Route::get('delete/supervisor/{id}', ['as' => 'delete.supervisor', 'uses' => '\App\Http\Controllers\Officer\TourBlotterController@delete_supervisor']);
        Route::post('update/supervisor', ['as' => 'update.supervisor', 'uses' => '\App\Http\Controllers\Officer\TourBlotterController@update_supervisor']);

        //Locked Tour Routes
        Route::get('locked/tours', ['as' => 'locked.tours', 'uses' => '\App\Http\Controllers\Officer\TourBlotterController@view_locked_tour']);


    });

// });


