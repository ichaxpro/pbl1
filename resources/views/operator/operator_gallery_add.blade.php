<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload New Image</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/operator_gallery_add.css') }}">

    <style>
        /* Gaya dasar untuk memastikan layout utama flex bekerja */
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            background: #F4F9FA;
        }

        .flex.w-full.min-h-screen {
            display: flex;
        }
    </style>
</head>

<main class="flex-1 overflow-y-auto px-8 py-6">
    <div class="main-content">
        <div class="content-body">
            <div class="content-form">
                <div class="add-publication-container">

                    <h2>Upload New Image</h2>

                    <form action="/operator/gallery/store" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group file-upload-group">
                            <div class="file-upload-area">
                                <div class="drag-text">Drag here to Upload</div>
                                <div class="or-text">Or</div>
                                <label for="image_file" class="btn-browse-file">Browse File</label>

                                <input type="file" id="image_file" name="image_file[]" accept="image/*" required
                                    multiple style="display: none;">
                            </div>
                        </div>

                        <div class="form-actions">
                            <a href="/operator/gallery" class="btn-cancel">Cancel</a>
                            <button type="submit" class="btn-submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- Tampilkan flash message sukses -->
    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

</main>

</div>
</div>
</body>

</html>