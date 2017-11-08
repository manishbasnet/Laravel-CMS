<?php
/**
 * Created by PhpStorm.
 * User: Manish
 * Date: 10/18/2017
 * Time: 8:30 PM
 */


Route::get('/example', function (){
    return view('welcome');
});


Route::group(['middleware'=>['web']], function(){



});






?>