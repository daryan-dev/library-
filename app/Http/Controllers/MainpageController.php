<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainpageController extends Controller
{
    function index()
    {
        try {
            // ================deleting all created sessions================
            session()->forget('authors');
            session()->forget(['bookid', 'title', 'page_num', 'genre', 'description', 'published_at']);


            //================selecting all all books for main page================

            $books = DB::select('SELECT title, page_num, genre, YEAR(published_at) AS year FROM book');
            return view('welcome', ['books' => $books]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        return view('welcome');
    }
}
