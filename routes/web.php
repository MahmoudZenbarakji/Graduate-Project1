<?php

use App\Http\Controllers\FrontEndControllers\ApplicantController;
use App\Http\Controllers\FrontEndControllers\HomeController;
use App\Http\Controllers\FrontEndControllers\JobController;
use App\Http\Controllers\FrontEndControllers\JobDetailsController;

Route::get('/' , [HomeController::class, 'index'])->name('home_page'); // we must find name for this route -> this route is for home page in the website
//Route::get('/', [HomeController::class, 'index']);

Route::get('/jobs', [JobController::class, 'index'])->name('jobs');
Route::get('/jobs/{id}', [JobController::class, 'show'])->name('job');



Route::get('/job_seekers', [ApplicantController::class, 'index'])->name('job_seekers');
Route::get('/job_seekers/{id}', [ApplicantController::class, 'show'])->name('job_seeker');





Route::get('/jobs', [JobController::class, 'index'])->name('jobs');


Route::get('/job_seekers_details' , function(){
    return view('frontend.job_seeker_details');
})->name('job_seeker_details');

Route::get('/companies' ,  function(){
    return view('frontend.companies');
})->name('companies');

Route::get('/company_details' ,  function(){
    return view('frontend.company_details');
})->name('company_details');

Route::get('/contact' ,  function(){
    return view('frontend.contact');
})->name('contact');





Route::redirect('/dashboard', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Salary
    Route::delete('salaries/destroy', 'SalaryController@massDestroy')->name('salaries.massDestroy');
    Route::resource('salaries', 'SalaryController');

    // Job Type
    Route::delete('job-types/destroy', 'JobTypeController@massDestroy')->name('job-types.massDestroy');
    Route::resource('job-types', 'JobTypeController');

    // Countries
    Route::delete('countries/destroy', 'CountriesController@massDestroy')->name('countries.massDestroy');
    Route::resource('countries', 'CountriesController');

    // City
    Route::delete('cities/destroy', 'CityController@massDestroy')->name('cities.massDestroy');
    Route::resource('cities', 'CityController');

    // Industry
    Route::delete('industries/destroy', 'IndustryController@massDestroy')->name('industries.massDestroy');
    Route::resource('industries', 'IndustryController');

    // Company
    Route::delete('companies/destroy', 'CompanyController@massDestroy')->name('companies.massDestroy');
    Route::post('companies/media', 'CompanyController@storeMedia')->name('companies.storeMedia');
    Route::post('companies/ckmedia', 'CompanyController@storeCKEditorImages')->name('companies.storeCKEditorImages');
    Route::resource('companies', 'CompanyController');

    // Transaction
    Route::delete('transactions/destroy', 'TransactionController@massDestroy')->name('transactions.massDestroy');
    Route::resource('transactions', 'TransactionController');

    // Payment
    Route::delete('payments/destroy', 'PaymentController@massDestroy')->name('payments.massDestroy');
    Route::resource('payments', 'PaymentController');

    // Chats
    Route::delete('chats/destroy', 'ChatsController@massDestroy')->name('chats.massDestroy');
    Route::resource('chats', 'ChatsController');

    // Nationality
    Route::delete('nationalities/destroy', 'NationalityController@massDestroy')->name('nationalities.massDestroy');
    Route::resource('nationalities', 'NationalityController');

    // Cv
    Route::delete('cvs/destroy', 'CvController@massDestroy')->name('cvs.massDestroy');
    Route::post('cvs/media', 'CvController@storeMedia')->name('cvs.storeMedia');
    Route::post('cvs/ckmedia', 'CvController@storeCKEditorImages')->name('cvs.storeCKEditorImages');
    Route::resource('cvs', 'CvController');

    // Job
    Route::delete('jobs/destroy', 'JobController@massDestroy')->name('jobs.massDestroy');
    Route::resource('jobs', 'JobController');

    // Review
    Route::delete('reviews/destroy', 'ReviewController@massDestroy')->name('reviews.massDestroy');
    Route::resource('reviews', 'ReviewController');

    // Application
    Route::delete('applications/destroy', 'ApplicationController@massDestroy')->name('applications.massDestroy');
    Route::resource('applications', 'ApplicationController');

    // Category
    Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoryController');

    // Skills
    Route::delete('skills/destroy', 'SkillsController@massDestroy')->name('skills.massDestroy');
    Route::resource('skills', 'SkillsController');

    // Applicant
    Route::delete('applicants/destroy', 'ApplicantController@massDestroy')->name('applicants.massDestroy');
    Route::post('applicants/media', 'ApplicantController@storeMedia')->name('applicants.storeMedia');
    Route::post('applicants/ckmedia', 'ApplicantController@storeCKEditorImages')->name('applicants.storeCKEditorImages');
    Route::resource('applicants', 'ApplicantController');

    // Educations
    Route::delete('educations/destroy', 'EducationsController@massDestroy')->name('educations.massDestroy');
    Route::resource('educations', 'EducationsController');

    // Work Expenriences
    Route::delete('work-expenriences/destroy', 'WorkExpenriencesController@massDestroy')->name('work-expenriences.massDestroy');
    Route::resource('work-expenriences', 'WorkExpenriencesController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
