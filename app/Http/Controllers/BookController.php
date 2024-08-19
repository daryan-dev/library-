<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\throwException;

class BookController extends Controller
{

    protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function index()
    {
        // ================get stored author names ================
        $authorlist = DB::select('SELECT authorname FROM author');
        return view('add_book', ['authorlist' => $authorlist]);
    }

    // ZYAD KRDNI KTEB BO
    public function addBook(Request $request)
    {


        try {

            $validated = $request->validate([
                'title' => 'required|max:50',
                'pagenum' => 'required|integer',
                'genre' => 'required|max:50',
                'date' => 'date|before:today',
                'description' => 'nullable|string',
            ]);



            // ================uploading image================
            $paths = $this->uploadImageGetPath();




            $isChecked = $request->has('ismain') ? true : false;




            $books = [
                'bookid' => $request->input('bookid'),
                'title' => $validated['title'],
                'page_num' => $validated['pagenum'],
                'genre' => $validated['genre'],
                'description' => $validated['description'] ?? null,
                'published_at' => $validated['date'],
                'imgpath' => $paths,
                'ismain' => $isChecked
            ];
            session(['books' => $books]);



            // ================checking if author is selected================
            if($this->checkIfAuthorSelected()){
                return redirect('/addtranslator');
            }else {
            return view('add_author');
            }



        } catch (\Throwable $th) {
            return  $th->getMessage();
        }
    }


    private function checkIfAuthorSelected() {
        $authors = $this->request->input('authors', []);
        if (!empty($authors)) {
            session(['authors' => $authors]);
            return true;
        }
        return false;
    }




    private function uploadImageGetPath()
    {
        if ($this->request->hasFile('cover_images')) {
            foreach ($this->request->file('cover_images') as $file) {
                $filename = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/image', $filename);
                $paths[] = $path;
                return $paths;
            }
        }
    }
}
