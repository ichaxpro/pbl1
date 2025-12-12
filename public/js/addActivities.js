document.addEventListener('DOMContentLoaded', function() {
    console.log('JavaScript loaded for image selector');
    
    const imageUrlInput = document.getElementById('image_url');
    const toggleDropdownBtn = document.getElementById('toggleDropdown');
    const imagesDropdown = document.getElementById('imagesDropdown');
    const previewContainer = document.getElementById('previewContainer');
    const previewImage = document.getElementById('previewImage');
    const imageOptions = document.querySelectorAll('.image-option');
    
    // Debug logging
    console.log('Elements found:', {
        imageUrlInput: !!imageUrlInput,
        toggleDropdownBtn: !!toggleDropdownBtn,
        imagesDropdown: !!imagesDropdown,
        previewContainer: !!previewContainer,
        previewImage: !!previewImage,
        imageOptions: imageOptions.length
    });
    
    // Toggle dropdown
    if (toggleDropdownBtn) {
        toggleDropdownBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            console.log('Dropdown button clicked');
            
            if (imagesDropdown) {
                const isActive = imagesDropdown.classList.contains('active');
                console.log('Dropdown active before:', isActive);
                
                imagesDropdown.classList.toggle('active');
                console.log('Dropdown active after:', imagesDropdown.classList.contains('active'));
            }
        });
    }
    
    // Select image from dropdown
    imageOptions.forEach(option => {
        option.addEventListener('click', function() {
            const url = this.dataset.url;
            console.log('Image selected:', url);
            
            if (imageUrlInput) {
                imageUrlInput.value = url;
            }
            
            if (imagesDropdown) {
                imagesDropdown.classList.remove('active');
            }
            
            // Show preview
            if (previewImage && previewContainer) {
                console.log('Setting preview image to:', url);
                previewImage.src = url;
                previewContainer.classList.add('active');
                
                // Add error handler for preview
                previewImage.onerror = function() {
                    console.log('Preview image failed to load:', url);
                    this.src = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjE1MCIgdmlld0JveD0iMCAwIDIwMCAxNTAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHJlY3Qgd2lkdGg9IjIwMCIgaGVpZ2h0PSIxNTAiIGZpbGw9IiNFOEU4RTgiLz48cGF0aCBkPSJNNzUgNTBIMTI1VjEwMEg3NVY1MFoiIGZpbGw9IiNDMEMwQzAiLz48cGF0aCBkPSJNNzUgMTAwSDEyNVYxNTBINzVWMTAwWiIgZmlsbD0iI0MwQzBDMCIvPjxwYXRoIGQ9Ik0xMjUgNTBIMTc1VjEwMEgxMjVWNTBaIiBmaWxsPSIjQzBDMEMwIi8+PC9zdmc+';
                    this.alt = 'Image not found';
                };
                
                previewImage.onload = function() {
                    console.log('Preview image loaded successfully');
                };
            }
            
            // Scroll textarea to show content
            if (imageUrlInput) {
                imageUrlInput.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        });
    });
    
    // Hide dropdown when clicking outside
    document.addEventListener('click', function(event) {
        if (imagesDropdown && imagesDropdown.classList.contains('active')) {
            const clickedInside = 
                (imageUrlInput && imageUrlInput.contains(event.target)) ||
                (toggleDropdownBtn && toggleDropdownBtn.contains(event.target)) ||
                (imagesDropdown && imagesDropdown.contains(event.target));
            
            if (!clickedInside) {
                console.log('Click outside, closing dropdown');
                imagesDropdown.classList.remove('active');
            }
        }
    });
    
    // Show preview when typing manually
    if (imageUrlInput) {
        imageUrlInput.addEventListener('input', function() {
            const url = this.value.trim();
            console.log('Manual input:', url);
            
            if (url && previewImage && previewContainer) {
                previewImage.src = url;
                previewContainer.classList.add('active');
            } else if (previewContainer) {
                previewContainer.classList.remove('active');
            }
        });
    }
    
    // Handle image load error (global handler)
    if (previewImage) {
        previewImage.addEventListener('error', function() {
            console.log('Global error handler: Image failed to load');
            this.src = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjE1MCIgdmlld0JveD0iMCAwIDIwMCAxNTAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHJlY3Qgd2lkdGg9IjIwMCIgaGVpZ2h0PSIxNTAiIGZpbGw9IiNFOEU4RTgiLz48cGF0aCBkPSJNNzUgNTBIMTI1VjEwMEg3NVY1MFoiIGZpbGw9IiNDMEMwQzAiLz48cGF0aCBkPSJNNzUgMTAwSDEyNVYxNTBINzVWMTAwWiIgZmlsbD0iI0MwQzBDMCIvPjxwYXRoIGQ9Ik0xMjUgNTBIMTc1VjEwMEgxMjVWNTBaIiBmaWxsPSIjQzBDMEMwIi8+PC9zdmc+';
            this.alt = 'Image not found';
        });
    }
    
    // Auto-show preview if there's old input
    if (imageUrlInput && imageUrlInput.value.trim() && previewImage && previewContainer) {
        console.log('Auto-showing preview for old input:', imageUrlInput.value);
        previewImage.src = imageUrlInput.value;
        previewContainer.classList.add('active');
    }
    
    // Simple form validation
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(e) {
            if (!imageUrlInput.value.trim()) {
                e.preventDefault();
                alert('Please select or enter an image URL');
                imageUrlInput.focus();
                return;
            }
            
            const titleInput = document.getElementById('title');
            if (!titleInput.value.trim()) {
                e.preventDefault();
                alert('Please enter a title');
                titleInput.focus();
                return;
            }
        });
    }
    
    // Close dropdown with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && imagesDropdown) {
            imagesDropdown.classList.remove('active');
        }
    });
    
    // Log initial state
    console.log('Initial setup complete');
});