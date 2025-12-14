document.addEventListener('DOMContentLoaded', function () {
    console.log('DOM Content Loaded');
    const imageInput = document.getElementById('thumbnail_url');
    const toggleBtn = document.getElementById('toggleDropdown');
    const dropdown = document.getElementById('imagesDropdown');
    const preview = document.getElementById('previewImage');
    const previewContainer = document.getElementById('previewContainer');
    const options = document.querySelectorAll('.image-option');



    // ============================
    // NOTIFICATION
    // ============================
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
            border-radius: 10px;
            z-index: 9999;
            display: flex;
            gap: 10px;
            align-items: center;
        `;

        notification.querySelector('.notification-close')
            .addEventListener('click', () => notification.remove());

        document.body.appendChild(notification);

        setTimeout(() => notification.remove(), 5000);
    }

    // ============================
    // QUILL (ONE INSTANCE)
    // ============================
    let quill;

    if (typeof Quill !== 'undefined') {
        quill = new Quill('#editor-container', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ header: [1, 2, 3, false] }],
                    ['bold', 'italic', 'underline'],
                    [{ list: 'ordered' }, { list: 'bullet' }],
                    ['link', 'image'],
                    ['clean']
                ]
            },
            placeholder: 'Write the content here...'
        });

        quill.root.style.fontFamily = "'Poppins', sans-serif";
        quill.root.style.fontSize = "16px";
    } else {
        console.error('Quill not loaded');
    }

    // ============================
    // OVERRIDE IMAGE BUTTON SAFELY
    // ============================
    if (quill) {
        const toolbar = quill.getModule('toolbar');
        if (toolbar) {
            toolbar.addHandler('image', openGallery);
        }
    }

    // ============================
    // GALLERY MODAL (QUILL IMAGE)
    // ============================
    const galleryModal = document.getElementById('galleryModal');
    const closeGalleryBtn = document.getElementById('closeGallery');
    const galleryItems = document.querySelectorAll('.gallery-item');

    function openGallery() {
        if (galleryModal) {
            galleryModal.classList.add('active');
        }
    }

    function closeGallery() {
        if (galleryModal) {
            galleryModal.classList.remove('active');
        }
    }

    // Close button
    if (closeGalleryBtn) {
        closeGalleryBtn.addEventListener('click', closeGallery);
    }

    // Click image → insert into Quill
    galleryItems.forEach(item => {
        item.addEventListener('click', () => {
            if (!quill) return;

            const imageUrl = item.dataset.url;
            const range = quill.getSelection(true);

            quill.insertEmbed(range.index, 'image', imageUrl);
            quill.setSelection(range.index + 1);

            closeGallery();
        });
    });

    // Close modal by clicking backdrop
    if (galleryModal) {
        galleryModal.addEventListener('click', (e) => {
            if (e.target === galleryModal) {
                closeGallery();
            }
        });
    }

    // ============================
    // DATE DEFAULT
    // ============================
    const dateInput = document.getElementById('date');
    if (dateInput) {
        dateInput.value = new Date().toISOString().split('T')[0];
    }

    // ============================
    // THUMBNAIL DROPDOWN PREVIEW
    // ============================
    // const thumbnailSelect = document.getElementById('thumbnailSelect');
    // const headlinePreview = document.getElementById('headlinePreview');

    // if (thumbnailSelect && headlinePreview) {
    //     thumbnailSelect.addEventListener('change', function () {
    //         const selected = this.selectedOptions[0];
    //         const imageUrl = selected?.dataset.url;

    //         if (!imageUrl) {
    //             headlinePreview.innerHTML = '';
    //             return;
    //         }

    //         headlinePreview.innerHTML = `
    //             <h4 style="margin-bottom:8px;">Image Preview</h4>
    //             <img src="${imageUrl}" 
    //                  style="max-width:300px;border-radius:10px;">
    //         `;
    //     });
    // }

    // ============================
    // IMAGE DROPDOWN (NEWS)
    // ============================

    if (toggleBtn && dropdown) {
        toggleBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            dropdown.classList.toggle('active');
        });
    }

    options.forEach(option => {
        option.addEventListener('click', () => {
            const url = option.dataset.url;
            imageInput.value = url;
            dropdown.classList.remove('active');

            if (preview && previewContainer) {
                preview.src = url;
                previewContainer.classList.add('active');
            }
        });
    });

    document.addEventListener('click', (e) => {
        if (!dropdown.contains(e.target) && !toggleBtn.contains(e.target)) {
            dropdown.classList.remove('active');
        }
    });

    // ============================
    // FORM VALIDATION & SUBMIT
    // ============================
    const form = document.getElementById('newsForm');

    if (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            const title = document.getElementById('title').value.trim();
            const date = document.getElementById('date').value;
            const content = quill ? quill.root.innerHTML : '';

            document.getElementById('content').value = content;

            if (!title) {
                showNotification('Title is required', 'error');
                return;
            }

            if (!date) {
                showNotification('Date is required', 'error');
                return;
            }

            const cleanContent = content.replace(/<[^>]*>/g, '').trim();
            if (!cleanContent) {
                showNotification('Content cannot be empty', 'error');
                return;
            }

            const saveBtn = document.querySelector('.btn.save');
            if (saveBtn) {
                saveBtn.innerHTML = 'Saving...';
                saveBtn.disabled = true;
            }

            this.submit();
        });
    }

    // ============================
    // CANCEL BUTTON
    // ============================
    const cancelBtn = document.querySelector('.btn.cancel');
    if (cancelBtn) {
        cancelBtn.addEventListener('click', () => {
            if (confirm('Cancel and discard changes?')) {
                window.history.back();
            }
        });
    }

    console.log('Add News JS initialized');
});
