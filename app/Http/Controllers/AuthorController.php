<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{


    public function storeAuthors(Request $request)
    {
        $books = session('books');

        if (!$books) {
            return redirect('/addbook');
        }
        try {
            $bookid = $request->input('book_id');
            $authors = $request->input('authors');
    session(['authors'=>$authors]);
    

            return view('add_translator');
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

    }

    // public function storeAuthors(Request $request)
    // {
    //     $bookid = $request->input('book_id');
    //     $authors = $request->input('authors');

    //     foreach ($authors as $authorName) {
    //         $this->insertAndLinkAuthor($authorName, $bookid);
    //     }

    //     return view('welcome');
    // }

    // private function insertAndLinkAuthor($authorName, $bookid)
    // {
    //     $author = DB::table('author')->where('authorname', $authorName)->first();

    //     if ($author) {
    //         $authorId = $author->authorid;
    //     } else {
    //         $authorId = DB::table('author')->insertGetId([
    //             'authorname' => $authorName
    //         ]);
    //     }

    //     DB::table('book_author')->insert([
    //         'bookid' => $bookid,
    //         'authorid' => $authorId,
    //     ]);
    // }
}
