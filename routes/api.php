<?php




Route::group([

    //'middleware' => 'api',
    'prefix' => 'auth'

], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('register', 'AuthController@register');

});



Route::ApiResource('/class','Api\SclassController');
Route::ApiResource('/subject','Api\SubjectController');
Route::ApiResource('/section','Api\SectionController');
Route::ApiResource('/student','Api\StudentController');
