<?php

use Illuminate\Support\Facades\Route;

Route::get('test',function (){
    return view('doctor.dashboard');
});

Route::name('doctor.')->namespace('Doctor')->prefix('doctor')->group(function (){

    //Auth Routes for Guest
    Route::namespace('Auth')->middleware('guest:doctor')->group(function (){
        Route::get('login','LoginController@showLoginForm')->name('login');
        Route::get('register','RegistrationController@showRegistrationForm')->name('register');
        Route::post('register','RegistrationController@registrationProcess')->name('register');
        Route::get('verify/{token}','RegistrationController@verifyDoctorAccount')->name('verify');
        Route::post('login','LoginController@loginProcess')->name('login');
    });
    //Authenticate Routes
    Route::middleware('auth:doctor')->group(function (){
        #Auth Folder
        Route::namespace('Auth')->group(function (){
            Route::post('logout','LoginController@logout')->name('logout');
            Route::get('change-password','ChangePasswordController@showChangePasswordForm')->name('change-password');
            Route::patch('change-password','ChangePasswordController@processChangePassword')->name('change-password');
        });
#Outside of Folder

        Route::get('dashboard','DashboardController@index')->name('dashboard');
        Route::get('update-profile','ProfileController@showUpdateProfileForm')->name('update-profile');
        Route::patch('update-profile','ProfileController@updateProfile')->name('update-profile');

        #Appointment Routes
        Route::get('appointments','AppointmentController@index')->name('appointments');
        Route::get('approve/appointment/{id}/patient/{patient}','AppointmentController@approveAppointment')->name('approve.appointment');
        Route::get('seen/appointment/{id}/patient/{patient}','AppointmentController@seenAppointment')->name('seen.appointment');
        Route::get('cancel/appointment/{id}/patient/{patient}','AppointmentController@cancelAppointment')->name('cancel.appointment');

    });
});



