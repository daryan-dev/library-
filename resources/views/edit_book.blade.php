<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="mb-4">Edit Book</h1>

        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row mb-4">
                <div class="col-md-4">
                    <label for="coverImage" class="form-label">Cover Image</label>
                    <input type="file" class="form-control" id="coverImage" name="cover_image">
                 
                </div>
                <div class="col-md-8">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" required>

                    <label for="pageNum" class="form-label mt-3">Page Number</label>
                    <input type="number" class="form-control" id="pageNum" name="page_num" value="{{ $book->page_num }}" required>

                    <label for="genre" class="form-label mt-3">Genre</label>
                    <input type="text" class="form-control" id="genre" name="genre" value="{{ $book->genre }}" required>

                    <label for="releaseDate" class="form-label mt-3">Release Date</label>
                    <input type="date" class="form-control" id="releaseDate" name="published_at" value="{{ $book->published_at }}" required>
                </div>
            </div>

            <div class="mb-4">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required>{{ $book->description }}</textarea>
            </div>

            <div class="mb-4">
                <label class="form-label">Other Images</label>
                <input type="file" class="form-control" name="additional_images[]" multiple>
                <small class="form-text text-muted">Select additional images (if any). Mark main cover image in the form below.</small>
            </div>

            <div class="mb-4">
                <label class="form-label">Main Cover Image</label>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="mainCover" name="main_cover" value="1"  >
                    <label class="form-check-label" for="mainCover">Is this the main cover image?</label>
                </div>
            </div>

            <div class="mb-4">
                <h3>Authors</h3>
                @foreach ($authors as $author)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="author{{ $author->id }}" name="authors[]" value="{{ $author->id }}" {{ in_array($author->id, $selectedAuthors) ? 'checked' : '' }}>
                        <label class="form-check-label" for="author{{ $author->id }}">{{ $author->authorname }}</label>
                    </div>
                @endforeach
            </div>

            <div class="mb-4">
                <h3>Translators</h3>
                @foreach ($translators as $translator)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="translator{{ $translator->id }}" name="translators[]" value="{{ $translator->id }}" {{ in_array($translator->id, $selectedTranslators) ? 'checked' : '' }}>
                        <label class="form-check-label" for="translator{{ $translator->id }}">{{ $translator->translatorname }}</label>
                    </div>
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
