<?php

use App\Models\Doctor;
use Illuminate\Support\Facades\Route;


Route::get('/','HomeController@index')->name('home');
//view single doctor
Route::get('view-doctor/{slug}','HomeController@getDoctorDetails')->name('doctor.details');

//appoint a doctor
Route::post('appointment/{id}','AppointmentController@storeAppointment')->name('appointment')->middleware('auth:patient');
