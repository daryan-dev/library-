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
        $translatorlist = DB::select('SELECT translatorname FROM translator');
        return view('add_book', [
            'authorlist' => $authorlist,
            'translatorlist' => $translatorlist,
        ]);
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
            if ($this->request->hasFile('cover_images')) {
                foreach ($this->request->file('cover_images') as $file) {
                    $filename = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('public/image', $filename);
                    $path[]=$filename;
                }
            }
            if ($this->request->hasFile('main_image')) {
                    $filename = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('public/image', $filename);
                    $main_image=$filename;
                }

            $books = [
                'bookid' => $request->input('bookid'),
                'title' => $validated['title'],
                'page_num' => $validated['pagenum'],
                'genre' => $validated['genre'],
                'description' => $validated['description'] ?? null,
                'published_at' => $validated['date'],
                'cover_image'=>$path,
                'main_image'=>$main_image
            ];
            session(['books' => $books]);



            // ================checking if author is selected================
            if(!$this->checkIfAuthorSelected()){
                return view('add_author');
            }

            if($this->checkIfTranslatorSelected()){
                return redirect('/storetranslator');
            }else {
            return view('add_translator');
            }


        } catch (\Throwable $th) {
            return  $th->getMessage();
        }
    }


    private function checkIfTranslatorSelected() {
        $translators = $this->request->input('translators', []);
        if (!empty($translators)) {
            session(['translators' => $translators]);
            return true;
        }
        return false;
    }

    private function checkIfAuthorSelected() {
        $authors = $this->request->input('authors', []);
        if (!empty($authors)) {
            session(['authors' => $authors]);
            return true;
        }
        return false;
    }


}
