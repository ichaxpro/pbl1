<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Activities</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/add_activities.css') }}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
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
                <h2 class="form-title">Add Activities</h2>

                <form action="{{ route('activity.store') }}" method="POST" class="form-box">
                    @csrf
                    <label for="image_url">
                        URL Image
                        <span class="info-text">(Select from available images)</span>
                    </label>
                    
                    <div class="image-selector-wrapper">
                        <div class="image-input-wrapper">
                            <textarea 
                                id="image_url" 
                                name="image_url" 
                                class="url-textarea" 
                                placeholder="Select or paste image URL from gallery"
                                rows="2"
                            >{{ old('image_url') }}</textarea>
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
                                        <img src="{{ $url }}" alt="Preview" class="option-preview" onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCA0MCA0MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIGZpbGw9IiNFOEU4RTgiLz48cGF0aCBkPSJNMTUgMTVIMjVWMjVIMTVWMTVaIiBmaWxsPSIjQzBDMEMwIi8+PHBhdGggZD0iTTE1IDI1SDI1VjM1SDE1VjI1WiIgZmlsbD0iI0MwQzBDMCIvPjxwYXRoIGQ9Ik0yNSAxNUgzNVYyNUgyNVYxNVoiIGZpbGw9IiNDMEMwQzAiLz48L3N2Zz4='">
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

                    <label for="title">Title</label>
                    <textarea id="title" name="title" placeholder="Write the title here"></textarea>

                    <div class="btn-group">
                        <a href="{{ route('operator.approval_status') }}" class="btn cancel">
                            Cancel
                        </a>
                        <!-- HAPUS ONCLICK DARI SAVE BUTTON! -->
                        <button type="submit" class="btn save">
                            Save
                        </button>
                    </div>
            </div>
        </div>
    </div>
<script src="{{ asset('js/addActivities.js') }}"></script>
</body>
</html>