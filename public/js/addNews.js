// Tunggu DOM siap
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM Content Loaded');
    
    // ============================
    // HELPER FUNCTIONS
    // ============================
    function isValidUrl(string) {
        try {
            new URL(string);
            return true;
        } catch (_) {
            return false;
        }
    }
    
    function showNotification(message, type = 'info') {
        // Buat notification element
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        notification.innerHTML = `
            <span>${message}</span>
            <button class="notification-close">&times;</button>
        `;
        
        // Style untuk notification
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px 20px;
            background: ${type === 'error' ? '#fee2e2' : 
                         type === 'success' ? '#d1fae5' : 
                         type === 'warning' ? '#fef3c7' : '#e0f2fe'};
            color: ${type === 'error' ? '#991b1b' : 
                     type === 'success' ? '#065f46' : 
                     type === 'warning' ? '#92400e' : '#0c4a6e'};
            border: 1px solid ${type === 'error' ? '#fca5a5' : 
                             type === 'success' ? '#a7f3d0' : 
                             type === 'warning' ? '#fcd34d' : '#bae6fd'};
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            min-width: 300px;
            max-width: 400px;
            animation: slideIn 0.3s ease;
        `;
        
        // Close button
        const closeBtn = notification.querySelector('.notification-close');
        closeBtn.style.cssText = `
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: inherit;
            margin-left: 15px;
        `;
        
        closeBtn.addEventListener('click', () => {
            notification.style.animation = 'slideOut 0.3s ease';
            setTimeout(() => notification.remove(), 300);
        });
        
        // Animasi
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideIn {
                from { transform: translateX(100%); opacity: 0; }
                to { transform: translateX(0); opacity: 1; }
            }
            @keyframes slideOut {
                from { transform: translateX(0); opacity: 1; }
                to { transform: translateX(100%); opacity: 0; }
            }
        `;
        document.head.appendChild(style);
        
        // Tambah ke body
        document.body.appendChild(notification);
        
        // Auto remove setelah 5 detik
        setTimeout(() => {
            if (notification.parentNode) {
                notification.style.animation = 'slideOut 0.3s ease';
                setTimeout(() => notification.remove(), 300);
            }
        }, 5000);
    }

    // ============================
    // FUNGSI UNTUK IMAGE PREVIEW
    // ============================
    function showImagePreview(url, container) {
        console.log('Showing image preview for:', url);
        container.innerHTML = '<p>Loading preview...</p>';
        container.classList.add('has-image');
        
        const img = new Image();
        img.onload = function() {
            console.log('Image loaded successfully');
            container.innerHTML = `
                <h4 style="margin-top: 0; margin-bottom: 10px; color: #334155;">Image Preview:</h4>
                <img src="${url}" alt="Preview" class="preview-image">
                <p style="margin-top: 10px; font-size: 12px; color: #64748b;">
                    Dimensions: ${this.naturalWidth} × ${this.naturalHeight}px
                </p>
            `;
        };
        
        img.onerror = function() {
            console.log('Error loading image');
            container.innerHTML = `
                <div class="preview-error">
                    <i class="fas fa-exclamation-triangle"></i>
                    Cannot load image. Please check the URL.
                </div>
            `;
        };
        
        img.src = url;
    }
    
    function showPreviewError(message) {
        const headlinePreview = document.getElementById('headlinePreview');
        if (headlinePreview) {
            console.log('Showing preview error:', message);
            headlinePreview.innerHTML = `
                <div class="preview-error">
                    <i class="fas fa-exclamation-triangle"></i>
                    ${message}
                </div>
            `;
            headlinePreview.classList.add('has-image');
            
            // Hilangkan setelah 5 detik
            setTimeout(() => {
                headlinePreview.classList.remove('has-image');
            }, 5000);
        }
    }
    
    // ============================
    // QUILL EDITOR - HANYA SATU!
    // ============================
    let quill;
    if (typeof Quill === 'undefined') {
        console.error('Quill.js not loaded!');
        showFallbackEditor();
    } else {
        // Inisialisasi Quill editor HANYA SATU KALI
        quill = new Quill('#editor-container', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, false] }],
                    ['bold', 'italic', 'underline'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    ['link'],
                    ['clean']
                ]
            },
            placeholder: 'Write the content here...',
        });
        
        quill.root.style.fontFamily = "'Poppins', sans-serif";
        quill.root.style.fontSize = "17px";
        quill.root.style.lineHeight = "1.6";
        console.log('Quill editor initialized');
    }
    
    // Style textarea title
    const titleTextarea = document.getElementById('title');
    if (titleTextarea) {
        titleTextarea.style.fontFamily = "'Poppins', sans-serif";
        titleTextarea.style.fontSize = "17px";
        titleTextarea.style.lineHeight = "1.6";
    }
    
    // ============================
    // DATE INPUT
    // ============================
    const dateInput = document.getElementById('date');
    if (dateInput) {
        // Set default ke hari ini
        const today = new Date().toISOString().split('T')[0];
        dateInput.value = today;
        console.log('Date input set to:', today);
    }
    
    // ============================
    // HEADLINE IMAGE PREVIEW
    // ============================
    const headlineInput = document.getElementById('headlineImage');
    const previewBtn = document.getElementById('previewBtn');
    const headlinePreview = document.getElementById('headlinePreview');
    
    if (previewBtn && headlineInput && headlinePreview) {
        console.log('Headline image elements found');
        
        previewBtn.addEventListener('click', function() {
            const url = headlineInput.value.trim();
            console.log('Preview button clicked, URL:', url);
            
            if (!url) {
                showPreviewError('Please enter a URL first');
                return;
            }
            
            if (!isValidUrl(url)) {
                showPreviewError('Please enter a valid URL (e.g., https://example.com/image.jpg)');
                return;
            }
            
            showImagePreview(url, headlinePreview);
        });
        
        // Juga preview saat tekan Enter
        headlineInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                console.log('Enter pressed on headline input');
                previewBtn.click();
            }
        });
    }
    
    // ============================
    // MULTIPLE CONTENT IMAGES
    // ============================
    const newImageUrlInput = document.getElementById('newImageUrl');
    const addImageBtn = document.getElementById('addImageBtn');
    const urlListContainer = document.getElementById('urlListContainer');
    const contentImagesInput = document.getElementById('contentImages');
    
    console.log('Content image elements:', {
        newImageUrlInput: !!newImageUrlInput,
        addImageBtn: !!addImageBtn,
        urlListContainer: !!urlListContainer,
        contentImagesInput: !!contentImagesInput
    });
    
    // Array untuk menyimpan URLs
    let contentImageUrls = [];
    
    // Load URLs dari hidden input jika ada (untuk edit)
    if (contentImagesInput && contentImagesInput.value) {
        try {
            contentImageUrls = JSON.parse(contentImagesInput.value);
            console.log('Loaded existing URLs:', contentImageUrls);
            renderUrlList();
        } catch (e) {
            console.error('Error parsing URLs:', e);
        }
    }
    
    // Fungsi untuk menambah URL
    if (addImageBtn && newImageUrlInput) {
        console.log('Setting up addImageBtn event listener');
        addImageBtn.addEventListener('click', addImageUrl);
        
        // Juga tambah saat tekan Enter
        newImageUrlInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                console.log('Enter pressed on newImageUrl input');
                addImageUrl();
            }
        });
    }
    
    function addImageUrl() {
        const url = newImageUrlInput.value.trim();
        console.log('Adding URL:', url);
        
        if (!url) {
            showNotification('Please enter a URL first', 'error');
            return;
        }
        
        if (!isValidUrl(url)) {
            showNotification('Please enter a valid URL', 'error');
            return;
        }
        
        // Cek apakah URL sudah ada
        if (contentImageUrls.includes(url)) {
            showNotification('This URL already exists', 'warning');
            return;
        }
        
        // Tambah ke array
        contentImageUrls.push(url);
        console.log('URL added, current URLs:', contentImageUrls);
        
        // Render ulang list
        renderUrlList();
        
        // Clear input
        newImageUrlInput.value = '';
        
        // Focus kembali ke input
        newImageUrlInput.focus();
        
        showNotification('Image URL added successfully', 'success');
    }
    
    function removeImageUrl(index) {
        console.log('Removing URL at index:', index);
        if (confirm('Are you sure you want to remove this image URL?')) {
            contentImageUrls.splice(index, 1);
            renderUrlList();
            showNotification('Image URL removed', 'info');
        }
    }
    
    function previewImageUrl(url) {
        console.log('Previewing URL:', url);
        // Buka di tab baru untuk preview
        window.open(url, '_blank');
    }
    
    function renderUrlList() {
        console.log('Rendering URL list:', contentImageUrls);
        
        // Update hidden input
        if (contentImagesInput) {
            contentImagesInput.value = JSON.stringify(contentImageUrls);
            console.log('Updated hidden input value:', contentImagesInput.value);
        }
        
        // Clear container
        urlListContainer.innerHTML = '';
        
        // Jika tidak ada URLs, tampilkan empty state
        if (contentImageUrls.length === 0) {
            urlListContainer.innerHTML = `
                <div class="empty-state">
                    <i class="fas fa-image"></i>
                    <p>No images added yet. Add URLs above.</p>
                </div>
            `;
            return;
        }
        
        // Render setiap URL
        contentImageUrls.forEach((url, index) => {
            const urlItem = document.createElement('div');
            urlItem.className = 'url-item';
            urlItem.innerHTML = `
                <div class="url-info">
                    <span class="url-number">${index + 1}</span>
                    <span class="url-text" title="${url}">${url}</span>
                </div>
                <div class="url-actions">
                    <button type="button" class="url-action-btn preview-single-btn" title="Preview">
                        <i class="fas fa-eye"></i>
                    </button>
                    <button type="button" class="url-action-btn delete-btn" title="Remove">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            `;
            
            // Tambah event listeners
            const previewBtn = urlItem.querySelector('.preview-single-btn');
            const deleteBtn = urlItem.querySelector('.delete-btn');
            
            previewBtn.addEventListener('click', () => previewImageUrl(url));
            deleteBtn.addEventListener('click', () => removeImageUrl(index));
            
            urlListContainer.appendChild(urlItem);
        });
    }
    
    // ============================
    // FORM VALIDATION
    // ============================
    const form = document.getElementById('newsForm');
    if (form) {
        form.addEventListener('submit', function(e) {
            console.log('Form submit triggered');
            e.preventDefault();
            
            const title = document.getElementById('title').value.trim();
            const date = document.getElementById('date').value;
            const content = quill ? quill.root.innerHTML : '';
            
            // Simpan HTML ke hidden input
            document.getElementById('content').value = content;
            
            // Validasi title
            if (!title) {
                showNotification('Please enter a title for the news.', 'error');
                document.getElementById('title').focus();
                return false;
            }
            
            // Validasi date
            if (!date) {
                showNotification('Please select a publish date.', 'error');
                document.getElementById('date').focus();
                return false;
            }
            
            // Validasi content
            const cleanContent = content.replace(/<[^>]*>?/gm, '').trim();
            if (!cleanContent || cleanContent === '') {
                showNotification('Please enter content for the news.', 'error');
                if (quill) quill.focus();
                return false;
            }
            
            // Tampilkan loading
            const saveBtn = document.querySelector('.btn.save');
            if (saveBtn) {
                saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Saving...';
                saveBtn.disabled = true;
            }
            
            console.log('Form validation passed, submitting...');
            // Submit form
            setTimeout(() => {
                this.submit();
            }, 1000);
        });
    }
    
    // ============================
    // CANCEL BUTTON
    // ============================
    const cancelBtn = document.querySelector('.btn.cancel');
    if (cancelBtn) {
        cancelBtn.addEventListener('click', function() {
            if (confirm('Are you sure you want to cancel? All unsaved changes will be lost.')) {
                window.history.back();
            }
        });
    }
    
    console.log('All JavaScript initialized successfully');
});

// Fallback jika Quill tidak load
function showFallbackEditor() {
    console.log('Showing fallback editor');
    const editorContainer = document.getElementById('editor-container');
    const contentInput = document.getElementById('content');
    
    if (editorContainer && contentInput) {
        // Ganti dengan textarea biasa
        editorContainer.style.display = 'none';
        
        // Buat textarea baru
        const textarea = document.createElement('textarea');
        textarea.id = 'content-textarea';
        textarea.name = 'content';
        textarea.placeholder = 'Write the content here...';
        textarea.style.width = '100%';
        textarea.style.height = '300px';
        textarea.style.padding = '12px';
        textarea.style.borderRadius = '14px';
        textarea.style.border = '2px solid #cbd5e1';
        textarea.style.fontFamily = "'Poppins', sans-serif";
        textarea.style.fontSize = "14px";
        textarea.style.marginBottom = "20px";
        
        // Sisipkan setelah label content
        const contentLabel = document.querySelector('label[for="content"]');
        if (contentLabel) {
            contentLabel.parentNode.insertBefore(textarea, contentLabel.nextElementSibling);
        }
        
        // Update form submit untuk menggunakan textarea
        const form = document.getElementById('newsForm');
        if (form) {
            form.addEventListener('submit', function(e) {
                const content = textarea.value.trim();
                document.getElementById('content').value = content;
            });
        }
    }
}