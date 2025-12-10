<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add News</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/addNews.css') }}"/>
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
                <form action="/add-news" method="POST" class="form-box" id="newsForm">
                    @csrf <!-- Untuk Laravel -->

                    <label for="title">Title</label>
                    <textarea id="title" name="title" placeholder="Write the title here"></textarea>

                    <label for="title">Date</label>
                    <input type="date" id="date" name="date" class="form-input date-input">

                    <label for="content">Content</label>
                    <!-- Container untuk Quill editor -->
                    <div id="editor-container"></div>
                    <!-- Hidden input untuk menyimpan HTML -->
                    <input type="hidden" id="content" name="content">

                    <!-- Headline Image URL -->
                    <div class="form-group">
                        <label for="headlineImage">
                            <i class="fas fa-image"></i> Headline Image URL
                            <span class="field-hint">(Main image for the news)</span>
                        </label>
                        <div class="url-input-container">
                            <input type="url" id="headlineImage" 
                                   placeholder="https://example.com/image.jpg" 
                                   class="url-input single-url">
                            <button type="button" class="preview-btn" data-target="headlineImage">
                                <i class="fas fa-eye"></i> Preview
                            </button>
                        </div>
                        <div class="preview-container" id="headlinePreview"></div>
                    </div>

                    <!-- Content Images URLs (Multiple) -->
                    <div class="form-group">
                        <label for="contentImages">
                            <i class="fas fa-images"></i> Content Images URLs
                            <span class="field-hint">(Add multiple images for content)</span>
                        </label>
                        
                        <!-- Input untuk menambah URL baru -->
                        <div class="url-input-container">
                            <input type="url" id="newImageUrl" 
                                   placeholder="https://example.com/image.jpg" 
                                   class="url-input">
                            <button type="button" id="addImageBtn" class="add-url-btn">
                                <i class="fas fa-plus"></i> Add URL
                            </button>
                        </div>
                        
                        <!-- Container untuk daftar URL yang sudah ditambahkan -->
                        <div class="url-list-container" id="urlListContainer">
                            <!-- URL akan muncul di sini -->
                            <div class="empty-state">
                                <i class="fas fa-image"></i>
                                <p>No images added yet. Add URLs above.</p>
                            </div>
                        </div>
                        
                        <!-- Hidden input untuk menyimpan semua URLs (akan diisi oleh JavaScript) -->
                        <input type="hidden" id="contentImages" name="content_images">
                    </div>

                    
                    <!-- Container untuk Quill editor -->
                    <div id="editor-container"></div>
                    <!-- Hidden input untuk menyimpan HTML -->
                    <input type="hidden" id="content" name="content">

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
    <script src="{{ asset('js/addNews.js') }}"></script>
    
</body>
</html>