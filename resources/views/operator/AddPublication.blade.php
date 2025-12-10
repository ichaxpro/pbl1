<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add News</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/addPublication.css') }}"/>
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
                
                <h2 class="form-title">Add Publication</h2>
                <form action="/add-news" method="POST" class="form-box" id="newsForm">
                    @csrf <!-- Untuk Laravel -->

                    <label for="title">Title</label>
                    <textarea id="title" name="title" placeholder="Write the title here"></textarea>

                    <label for="title">Author</label>
                    <textarea id="title" name="title" placeholder="Write the title here"></textarea>

                    <label for="title">Institution</label>
                    <textarea id="title" name="title" placeholder="Write the title here"></textarea>

                    <label for="title">Date</label>
                    <input type="date" id="date" name="date" class="form-input date-input">

                    

                    <label for="content">Abstract</label>
                    <!-- Container untuk Quill editor -->
                    <div id="editor-container"></div>
                    <!-- Hidden input untuk menyimpan HTML -->
                    <input type="hidden" id="content" name="content">



                    

                    
                    <!-- Container untuk Quill editor -->
                    <div id="editor-container"></div>
                    <!-- Hidden input untuk menyimpan HTML -->
                    <input type="hidden" id="content" name="content">

                    <div class="upload-box" id="uploadBox">
        <div class="upload-icon">📁</div>
        <div class="upload-text">Drag here to Upload</div>
        <div class="upload-or">Or</div>
        <button class="browse-btn" id="browseBtn">Browse File</button>
    </div>
    
    <input type="file" id="fileInput" class="file-input">
                    
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
    <script src="{{ asset('js/addPublication.js') }}"></script>
    
</body>
</html>