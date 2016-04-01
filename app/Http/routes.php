<?php

 /*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function() {
    // this doesn't do anything other than to
    // tell you to go to /fire
    return "go to /fire";
});

/*Route::post('fire', function (Request $request) {
    // this fires the event
    event(new App\Events\EventName('test' . $request));
});*/


Route::post('fire', 'eventController@fireEvent');



Route::get('test', function () {
    // this checks for the event
    return view('test');
});