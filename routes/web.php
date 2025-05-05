<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\HomeController;
use App\Models\Appointment;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function() {
    Route::get('/',                 'index')->name('home');
    Route::get('/about-us',         'abouts')->name('about');
    Route::get('/services',         'services')->name('services');
    Route::get('/case-studies',     'caseStudies')->name('case-studies');

    Route::get('/blogs',            'blogs')->name('blog');
    Route::get('/teams',            'teams')->name('team');
    Route::get('/faq',              'faqs')->name('faq');
    Route::get('/pricing',          'pricing')->name('pricing');
    Route::get('/contact-us',       'contacts')->name('contact');
});

Route::controller(AppointmentController::class)->group(function() {
    Route::get('request/appointment',               'appointmentPage')->name('appointment.page');
    Route::post('request/appointment',              'appointmentInsert')->name('appointment.store');
    Route::get('appointment/{id}',                  'appointmentDetails')->name('appointment.details');
    Route::get('appointment/edit/{id}',             'editAppointment')->name('appointment.edit');
    Route::post('appointment/update/{id}',          'updateAppointment')->name('appointment.update');
    Route::get('appointment/delete/{id}',           'deleteAppointment')->name('appointment.delete');
    Route::get('appointment/confirm/{id}',          'confirmAppointment')->name('appointment.confirm');
    Route::get('appointment/cancel/{id}',           'cancelAppointment')->name('appointment.cancel');
    Route::get('appointment/complete/{id}',         'completeAppointment')->name('appointment.complete');
    Route::get('appointment/decline/{id}',          'declineAppointment')->name('appointment.decline');
    Route::get('appointment/print/{id}',            'printAppointment')->name('appointment.print');
});

// Authentication Route inclode in [auth.php] file
require __DIR__.'/auth.php';
