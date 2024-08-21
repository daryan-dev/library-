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
            <div class="row mb-4">
                <div class="col-md-4">
                    <label for="coverImage" class="form-label">Cover Image</label>
                    <input type="file" class="form-control" id="coverImage" name="cover_image">
                </div>
                <div class="col-md-8">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="Book Title" required>

                    <label for="pageNum" class="form-label mt-3">Page Number</label>
                    <input type="number" class="form-control" id="pageNum" name="page_num" value="123" required>

                    <label for="genre" class="form-label mt-3">Genre</label>
                    <input type="text" class="form-control" id="genre" name="genre" value="Fiction" required>

                    <label for="releaseDate" class="form-label mt-3">Release Date</label>
                    <input type="date" class="form-control" id="releaseDate" name="published_at" value="2023-08-21" required>
                </div>
            </div>

            <div class="mb-4">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required>Book description goes here...</textarea>
            </div>

            <div class="mb-4">
                <h3>Authors</h3>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="author1" name="authors[]" value="1">
                    <label class="form-check-label" for="author1">Author 1</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="author2" name="authors[]" value="2">
                    <label class="form-check-label" for="author2">Author 2</label>
                </div>
            </div>

            <div class="mb-4">
                <h3>Translators</h3>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="translator1" name="translators[]" value="1">
                    <label class="form-check-label" for="translator1">Translator 1</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="translator2" name="translators[]" value="2">
                    <label class="form-check-label" for="translator2">Translator 2</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
