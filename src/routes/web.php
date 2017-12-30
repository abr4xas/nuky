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

Route::group(['prefix' => 'dash','middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index');

    //Google Analytics
    Route::get('analytics', 'AnalyticsController@index')->name('analytics');
    Route::get('analytics-mobile', 'AnalyticsController@mobile')->name('analytics-mobile');
    Route::get('analytics-returning', 'AnalyticsController@newreturningsessions')->name('analytics-returning');
    Route::get('analytics-operating', 'AnalyticsController@operatingsystem')->name('analytics-operating');
    Route::get('analytics-traffic', 'AnalyticsController@traffic')->name('analytics-traffic');
    Route::get('analytics-time-on-site', 'AnalyticsController@timeonsite')->name('analytics-time-on-site');
    Route::get('analytics-referring-sites', 'AnalyticsController@referringsites')->name('analytics-referring-sites');
    Route::get('analytics-search-engines', 'AnalyticsController@searchengines')->name('analytics-search-engines');
    Route::get('analytics-keywords', 'AnalyticsController@keywords')->name('analytics-keywords');
    Route::get('analytics-topcontent', 'AnalyticsController@topcontent')->name('analytics-topcontent');
    Route::get('analytics-top-landing-pages', 'AnalyticsController@toplandingpages')->name('analytics-top-landing-pages');
    Route::get('analytics-top-exit-pages', 'AnalyticsController@topexitpages')->name('analytics-top-exit-pages');
});