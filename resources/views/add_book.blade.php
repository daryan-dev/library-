@extends('layout.main')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@section('content')
    <div class="form-container">
        <form action="addingbook" method="post" enctype="multipart/form-data">
            @csrf
            <h2>Adding book</h2>
            <div class="form-group">
                <label for="title">Book name</label>
                <input type="text" id="title" name="title" value="daryan" required>
            </div>
            <div class="form-group">
                <label for="pagenum">Page number</label>
                <input type="number" id="pagenum" name="pagenum" value=34 required>
            </div>
            <div class="form-group">
                <label for="genre">Genre</label>
                <select id="genre" name="genre" required>
                    <option value="">Select Genre</option>
                    <option value="fiction">Fiction</option>
                    <option value="nonfiction">Non-Fiction</option>
                    <option value="mystery">Mystery</option>
                    <option value="fantasy">Fantasy</option>
                    <option value="science-fiction">Science Fiction</option>
                    <option value="biography">Biography</option>
                    <option value="history">History</option>
                    <option value="romance">Romance</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" placeholder="Enter book description..." required></textarea>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="release_date">Release Date</label>
                    <input type="date" id="date" name="date" required>
                </div>
                <div class="form-group">
                    <label for="cover_image">Cover Image</label>
                    <input type="file" id="cover_images" name="cover_images[]" accept="image/*" multiple>
                </div>
                <div class="form-group">
                    <label for="extra Images">Extra Images</label>
                    <input type="file" id="extra_images" name="extra_images" accept="image/*" multiple>
                </div>
                <div class="form-group">
                    <label for="author">author</label>
                    <select id="" name="authors[]"  multiple>
                        @foreach ($authorlist as $author)
                        <option value="{{$author->authorname}}">{{$author->authorname}}</option>
                        @endforeach
                    </select>


                    <div class="form-group">
                        <label for="translator">translator</label>
                        <select id="" name="translators[]"  multiple>
                            @foreach ($translatorlist as $translator)
                            <option value="{{$translator->translatorname}}">{{$translator->translatorname}}</option>
                            @endforeach
                        </select>
                        <br>
                <button type="submit">Upload</button>
            </div>
        </form>
    </div>
@endsection
