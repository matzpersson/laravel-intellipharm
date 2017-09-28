<?php

use Illuminate\Http\Request;
use App\Member;

// -- Members
Route::get('members', 'MemberController@index');
Route::get('members/paginate', 'MemberController@paginate');
Route::get('members/{id}', 'MemberController@show');
Route::post('members', 'MemberController@store');
Route::put('members/{id}', 'MemberController@update');
Route::delete('members/{id}', 'MemberController@delete');

Route::get('signups', 'MemberController@signups');
