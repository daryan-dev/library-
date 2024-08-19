<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{


    public function storeAuthors(Request $request)
    {
        // ================checking if book info has been filled================
        $books = session('books');
        if (!$books) {
            return redirect('/addbook');
        }

        //================creating authors session================
        try {
            $authors = $request->input('authors');
    session(['authors'=>$authors]);


            return view('add_translator');
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

    }
}
