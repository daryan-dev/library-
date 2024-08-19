<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\IsEmpty;

use function PHPUnit\Framework\isEmpty;

class TranslatorController extends Controller
{
    public function store(Request $request)
    {

        //================checking if author has been created================
        $authorsCheck = session('authors');
        if (empty($authorsCheck)) {
            return redirect('/addauthor');
        }


        //================start transaction================

        DB::beginTransaction();


        try {
            // retriving session data
            $translators = $request->input('translators');
            $books = session('books');
            $authors = session('authors');



            // inserting books data
            DB::statement(
                'INSERT INTO book (title, page_num, genre, description, published_at) VALUES (?, ?, ?, ?, ?)',
                [
                    $books['title'],
                    $books['page_num'],
                    $books['genre'],
                    $books['description'] ?? null,
                    $books['published_at']
                ]
            );



            $bookId = DB::selectOne('SELECT LAST_INSERT_ID() AS id')->id;



            // inserting image paths
            $imgPaths = $books['imgpath'];
            if (!empty($imgPaths)) {
                foreach ($imgPaths as $img) {
                    DB::statement('INSERT INTO book_pic (imagepath, bookid, ismain) VALUES (?, ?, ?)', [
                        $img,
                        $bookId,
                        $books['ismain']
                    ]);
                }
            }



            session(['bookid' => $bookId]);
            foreach ($translators as $translator) {
                $this->insertAndLinkTranslator($translator);
            }
            foreach ($authors as $author) {
                $this->insertAndLinkAuthor($author);
            }

            DB::commit();
            return redirect('/');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect('/addbook')->withErrors([$th->getMessage()]);
        }
    }

    private function insertAndLinkTranslator($translatorName)
    {
        $translator = DB::select(
            'SELECT translatorid FROM translator WHERE translatorname = ?',
            [$translatorName]
        );

        if ($translator) {
            $translatorId = $translator[0]->translatorid;
        } else {
            DB::statement(
                'INSERT INTO translator (translatorname) VALUES (?)',
                [$translatorName]
            );
            $translatorId = DB::selectOne('SELECT LAST_INSERT_ID() AS id')->id;
        }
        DB::statement(
            'INSERT INTO book_translator (bookid, translatorid) VALUES (?, ?)',
            [
                session('bookid'),
                $translatorId,
            ]
        );
    }

    private function insertAndLinkAuthor($authorName)
    {
        $author = DB::select(
            'SELECT authorid FROM author WHERE authorname = ?',
            [$authorName]
        );
        if ($author) {
            $authorId = $author[0]->authorid;
        } else {
            DB::statement(
                'INSERT INTO author (authorname) VALUES (?)',
                [$authorName]
            );
            $authorId = DB::selectOne('SELECT LAST_INSERT_ID() AS id')->id;
        }
        DB::statement(
            'INSERT INTO book_author (bookid, authorid) VALUES (?, ?)',
            [
                session('bookid'),
                $authorId,
            ]
        );
    }
}
