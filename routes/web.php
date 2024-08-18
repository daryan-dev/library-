<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MainpageController;
use App\Http\Controllers\TranslatorController;
use Illuminate\Support\Facades\Route;

Route::get('/',[MainpageController::class,'index']);


Route::get('/addbook',[BookController::class,'index']);

Route::view('/addauthor','add_author');

Route::view('/addtranslator','add_translator');

Route::post('/addingbook',[BookController::class,'addbook']);

Route::post('/storeauthors', [AuthorController::class, 'storeAuthors']);

Route::post('/storetranslator', [TranslatorController::class, 'store']);
