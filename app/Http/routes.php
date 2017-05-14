<?php

Route::get("login",[
	"as"=>"login",
	"uses"=>"UsersController@login"
]);

Route::get("auth/twitter/login",[
	"as"=>"auth.twitter.login",
	"uses"=>"Auth\AuthController@redirectToProvider"
]);

Route::get("auth/twitter/callback",[
	"as"=>"auth.twitter.callback",
	"uses"=>"Auth\AuthController@handleProviderCallback"
]);

Route::get("auth/twitter/logout",[
	"as"=>"auth.twitter.logout",
	"uses"=>"Auth\AuthController@getLogout"
]);

Route::get("/",[
	"as"=>"index",
	"uses"=>"UsersController@index"
]);

Route::post("books/register",[
	"as"=>"books.register",
	"uses"=>"BooksController@register"
]);

Route::post("books/show",[
	"as"=>"books.show",
	"uses"=>"BooksController@show"
]);

Route::post("books/delete",[
	"as"=>"books.delete",
	"uses"=>"BooksController@delete"
]);

Route::post("books/state",[
	"as"=>"books.state",
	"uses"=>"BooksController@state"
]);

Route::get("users/user_id",[
	"as"=>"users.id",
	"uses"=>"UsersController@user_id"
]);