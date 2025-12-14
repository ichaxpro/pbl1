<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add News</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/addNews.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Poppins Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Quill CSS -->
    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
</head>

<body>

    <div class="outer-bg">
        <div class="header-logo">
            <img src="{{ asset('images/logo_polinema.png') }}" class="logo" alt="Logo Polinema" />
            <div class="text">
                <p class="title">JURUSAN</p>
                <p class="subtitle1">TEKNOLOGI INFORMASI</p>
                <p class="subtitle2">POLITEKNIK NEGERI MALANG</p>
            </div>
        </div>


        <div class="inner-bg">
            <div class="form-container">

                <h2 class="form-title">Add News</h2>
                <form method="POST" action="{{ route('operator.news.store') }}" id="newsForm" class="form-box">
                    @csrf

                    <label for="title">Title</label>
                    <textarea id="title" name="title" placeholder="Write the title here" required></textarea>

                    <label for="title">Date</label>
                    <input type="date" id="date" name="date" class="form-input date-input">

                    <label for="content">Content</label>
                    <!-- Container untuk Quill editor -->
                    <div id="editor-container"></div>
                    <!-- Hidden input untuk menyimpan HTML -->
                    <input type="hidden" id="content" name="content">

                    <label for="thumbnail_url">
                        Thumbnail URL Image
                        <span class="info-text">(Select from available images)</span>
                    </label>

                    <div class="image-selector-wrapper">
                        <div class="image-input-wrapper">
                            <textarea id="thumbnail_url" name="thumbnail_url" class="url-textarea"
                                placeholder="Select or paste image URL from gallery"
                                rows="2">{{ old('thumbnail_url') }}</textarea>
                            <button type="button" class="dropdown-btn" id="toggleDropdown">
                                <i class="fas fa-images"></i>
                            </button>
                        </div>


                        <!-- Images Dropdown -->
                        <div class="images-dropdown" id="imagesDropdown">
                            <div class="dropdown-header">
                                <i class="fas fa-image"></i>
                                Available Images
                            </div>

                            @if(!empty($galleryUrls) && count($galleryUrls) > 0)
                                @foreach($galleryUrls as $url)
                                    <div class="image-option" data-url="{{ $url }}">
                                        <img src="{{ $url }}" alt="Preview" class="option-preview">
                                        <span class="option-url" title="{{ $url }}">
                                            {{ Str::limit($url, 50) }}
                                        </span>
                                    </div>
                                @endforeach
                            @else
                                <div class="no-images">
                                    <i class="fas fa-image"></i>
                                    <p>No images available in gallery</p>
                                </div>
                            @endif
                        </div>

                        <!-- Preview -->
                        <div class="preview-container" id="previewContainer">
                            <span class="preview-label">Preview:</span>
                            <img id="previewImage" src="" alt="Selected Image" class="preview-image">
                        </div>
                    </div>

                    <div id="galleryModal" class="gallery-modal">
                        <div class="gallery-content">
                            <h3>Select Image from Gallery</h3>

                            <div class="gallery-grid">
                                @foreach ($galleryUrls as $url)
                                    <img src="{{ $url }}" class="gallery-item" data-url="{{ $url }}">
                                @endforeach
                            </div>

                            <button type="button" id="closeGallery">Close</button>
                        </div>
                    </div>

                    <!-- Headline Image URL -->

            </div>

            <!-- thumbnail prev -->
            <!-- <div id="thumbnailPreview" style="margin-top:10px;"></div> -->

            <!-- Content Images URLs (Multiple) -->
            <!-- <div class="form-group">
                        <label for="contentImages">
                            <i class="fas fa-images"></i> Content Images URLs
                            <span class="field-hint">(Add multiple images for content)</span>
                        </label> -->

            <!-- Input untuk menambah URL baru -->
            <!-- <div class="url-input-container">
                            <input type="url" id="newImageUrl" placeholder="https://example.com/image.jpg"
                                class="url-input">
                            <button type="button" id="addImageBtn" class="add-url-btn">
                                <i class="fas fa-plus"></i> Add URL
                            </button>
                        </div> -->

            <!-- Container untuk daftar URL yang sudah ditambahkan -->
            <!-- <div class="url-list-container" id="urlListContainer"> -->
            <!-- URL akan muncul di sini -->
            <!-- <div class="empty-state">
                                <i class="fas fa-image"></i>
                                <p>No images added yet. Add URLs above.</p>
                            </div>
                        </div> -->

            <!-- Hidden input untuk menyimpan semua URLs (akan diisi oleh JavaScript) -->
            <!-- <input type="hidden" id="contentImages" name="content_images"> -->
            <!-- </div> -->


            <!-- Container untuk Quill editor -->
            <!-- <div id="editor-container"></div> -->
            <!-- Hidden input untuk menyimpan HTML -->
            <!-- <input type="hidden" id="content" name="content"> -->

            <div class="btn-group">
                <button type="button" class="btn cancel">Cancel</button>
                <button type="submit" class="btn save">Save</button>
            </div>
            </form>
        </div>
    </div>
    </div>

    <!-- Quill JS -->
    <script src="https://cdn.quilljs.com/1.3.7/quill.js"></script>
    <!-- Custom JS -->
    <script src="{{ asset('js/addNews2.js') }}"></script>

</body>

</html>