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
  });

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

    const uploadBox = document.getElementById('uploadBox');
const fileInput = document.getElementById('fileInput');
const browseBtn = document.getElementById('browseBtn');

// Click area to open file dialog
uploadBox.addEventListener('click', function(e) {
    if (e.target !== browseBtn) {
        fileInput.click();
    }
});

// Click browse button
browseBtn.addEventListener('click', function(e) {
    e.stopPropagation();
    fileInput.click();
});

// Drag and drop
uploadBox.addEventListener('dragover', function(e) {
    e.preventDefault();
    this.classList.add('dragover');
});

uploadBox.addEventListener('dragleave', function() {
    this.classList.remove('dragover');
});

uploadBox.addEventListener('drop', function(e) {
    e.preventDefault();
    this.classList.remove('dragover');
    
    if (e.dataTransfer.files.length) {
        fileInput.files = e.dataTransfer.files;
        alert('File selected: ' + e.dataTransfer.files[0].name);
    }
});

// File selected via input
fileInput.addEventListener('change', function() {
    if (this.files.length) {
        alert('File selected: ' + this.files[0].name);
    }
});