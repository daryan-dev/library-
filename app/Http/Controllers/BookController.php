<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\throwException;

class BookController extends Controller
{
    public function index()
    {
        $authorlist = DB::select('SELECT authorname FROM author');
        return view('add_book', ['authorlist' => $authorlist]);
    }

    public function addbook(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|max:50',
                'pagenum' => 'required|integer',
                'genre' => 'required|max:50',
                'date' => 'date|before:today',
                'description' => 'nullable|string',
            ]);


            $paths = [];
            if ($request->hasFile('cover_images')) {
                foreach ($request->file('cover_images') as $file) {
                    $filename = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $path = $file->storeAs('public/image', $filename);
                    $paths[] = $path;
                }
            }

                $isChecked = $request->has('my_checkbox') ? true : false;

            $books = [
                'bookid' => $request->input('bookid'),
                'title' => $validated['title'],
                'page_num' => $validated['pagenum'],
                'genre' => $validated['genre'],
                'description' => $validated['description'] ?? null,
                'published_at' => $validated['date'],
                'imgpath' => json_encode($paths),
                'ismain'=>$isChecked
            ];



            session(['books' => $books]);

            $authors = $request->input('authors', []);
            if (!empty($authors)) {
                return redirect('/addtranslator');
            }
            return view('add_author');
        } catch (\Throwable $th) {
            return  $th->getMessage();
        }
    }

}
