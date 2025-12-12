document.addEventListener('DOMContentLoaded', function () {
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
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        notification.innerHTML = `
            <span>${message}</span>
            <button class="notification-close">&times;</button>
        `;

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

        document.body.appendChild(notification);

        setTimeout(() => {
            if (notification.parentNode) {
                notification.style.animation = 'slideOut 0.3s ease';
                setTimeout(() => notification.remove(), 300);
            }
        }, 5000);
    }

    // ============================
    // QUILL EDITOR
    // ============================
    let quill;
    if (typeof Quill !== 'undefined') {
        quill = new Quill('#editor-container', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, false] }],
                    ['bold', 'italic', 'underline'],
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                    ['link'],
                    ['clean']
                ]
            },
            placeholder: 'Write the content here...',
        });

        quill.root.style.fontFamily = "'Poppins', sans-serif";
        quill.root.style.fontSize = "17px";
        quill.root.style.lineHeight = "1.6";
    } else {
        console.error("Quill not loaded!");
    }

    // ============================
    // STYLE TITLE TEXTAREA
    // ============================
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
        dateInput.value = new Date().toISOString().split('T')[0];
    }

    // ============================
    // HEADLINE IMAGE PREVIEW
    // ============================
    const headlineInput = document.getElementById('headlineImage');
    const previewBtn = document.getElementById('previewBtn');
    const headlinePreview = document.getElementById('headlinePreview');

    function showPreviewError(msg) {
        showNotification(msg, 'error');
    }

    function showImagePreview(url, container) {
        container.innerHTML = `<img src="${url}" style="width:100%; border-radius:10px;">`;
    }

    if (previewBtn && headlineInput && headlinePreview) {
        previewBtn.addEventListener('click', function () {
            const url = headlineInput.value.trim();

            if (!url) return showPreviewError('Please enter a URL first');
            if (!isValidUrl(url)) return showPreviewError('Invalid URL');

            showImagePreview(url, headlinePreview);
        });

        headlineInput.addEventListener('keypress', function (e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                previewBtn.click();
            }
        });
    }

    // ============================
    // FILE UPLOAD
    // ============================
    const uploadBox = document.getElementById('uploadBox');
    const fileInput = document.getElementById('fileInput');
    const browseBtn = document.getElementById('browseBtn');

    if (uploadBox && fileInput && browseBtn) {

        uploadBox.addEventListener('click', (e) => {
            if (e.target !== browseBtn) fileInput.click();
        });

        browseBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            fileInput.click();
        });

        uploadBox.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadBox.classList.add('dragover');
        });

        uploadBox.addEventListener('dragleave', () => {
            uploadBox.classList.remove('dragover');
        });

        uploadBox.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadBox.classList.remove('dragover');

            if (e.dataTransfer.files.length) {
                fileInput.files = e.dataTransfer.files;
                uploadBox.querySelector(".upload-text").textContent =
                    e.dataTransfer.files[0].name;
            }
        });

        fileInput.addEventListener('change', function () {
            if (fileInput.files.length) {
                uploadBox.querySelector(".upload-text").textContent =
                    fileInput.files[0].name;
            }
        });
    }

    // ============================
    // FORM SUBMISSION
    // ============================
    const form = document.getElementById('pubForm');
    if (form) {
        form.addEventListener('submit', function () {
            document.getElementById('contents').value = quill.root.innerHTML;
        });
    }

});
