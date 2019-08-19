<?php

/*
|--------------------------------------------------------------------------
| Web Routes for Magic Link Sign In
|--------------------------------------------------------------------------
*/

Route::group(['namespace' => 'Airranged\LaravelMagicLink\Http\Controllers', 'middleware' => ['web']], function () {
    // Show form for email input
    Route::get(config('magic.magic'), 'Auth\MagicLinkController@show')->name('magiclink');

    // Capture post and send email if that user exists
    Route::post(config('magic.magic'), 'Auth\MagicLinkController@post')->middleware('throttle:10,1')->name('magic_link.post');

    // When a user gets here we sign them in
    Route::get(config('magic.login'), 'Auth\MagicLinkController@autologin')->middleware('signed')->name('autologin');
});
