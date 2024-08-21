<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Detail Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-4">
                <img src="https://images.unsplash.com/photo-1529158062015-cad636e205a0?q=80&w=1953&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="img-fluid rounded" alt="Book Cover">
            </div>
            <div class="col-md-8">
                <div class="d-flex justify-content-between align-items-start">
                    <h1 class="mb-3">{{ $bookdetail->title }}</h1>
                    <a  href="" class="btn btn-primary">
                        Edit
                    </a>
                </div>
                <ul class="list-unstyled">
                    <li><strong>Pages:</strong> {{ $bookdetail->page_num }}</li>
                    <li><strong>Genre:</strong> {{ $bookdetail->genre }}</li>
                    <li><strong>Release Date:</strong> {{ $bookdetail->published_at }}</li>
                </ul>
                <p class="mt-4">{{ $bookdetail->description }}</p>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <h2>Other Images</h2>
                <div id="bookImagesCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://images.unsplash.com/photo-1497633762265-9d179a990aa6?q=80&w=2073&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="Image 1">
                            <div class="carousel-caption d-none d-md-block">
                                <p>Main Cover</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://images.unsplash.com/photo-1497633762265-9d179a990aa6?q=80&w=2073&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="Image 2">
                            <div class="carousel-caption d-none d-md-block">
                                <p>Back Cover</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#bookImagesCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#bookImagesCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-6">
                <h3>Authors</h3>
                <ul class="list-group">
                    @foreach ($authors as $author)
                        <li class="list-group-item">{{ $author->authorname }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-6">
                <h3>Translators</h3>
                <ul class="list-group">
                    @foreach ($translators as $translator)
                        <li class="list-group-item">{{ $translator->translatorname }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
