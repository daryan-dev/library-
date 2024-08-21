<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class BookDetailController extends Controller
{
 function index($id) {
$bookdetail=DB::selectOne('
Select
    title,
    page_num,
    genre,
    description,
    published_at
FROM
    book
WHERE
bookid=?',
[$id]);


$authors=DB::select('
SELECT
    author.authorname
FROM
    author
INNER JOIN
    book_author on author.authorid = book_author.authorid

WHERE  book_author.bookid = ?
',[$id]);

$translators=DB::select('
SELECT
    translator.translatorname
FROM
    translator
INNER JOIN
    book_translator on translator.translatorid = book_translator.translatorid

WHERE  book_translator.bookid = ?
',[$id]);


return view('book_detail',[
    'bookdetail'=>$bookdetail,
    'authors'=>$authors,
    'translators'=>$translators
]);
 }
}
