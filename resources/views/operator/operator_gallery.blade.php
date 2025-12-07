<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operator Page</title>
    <!-- Asumsi 'css/operator_gallery.css' berisi kode CSS yang sudah diperbarui -->
    <link rel="stylesheet" href="{{ asset('css/operator_gallery.css') }}">
    <style>
        /* Tambahkan font Inter agar tampilan konsisten (jika belum ada) */
        body { font-family: 'Inter', sans-serif; }
        /* Contoh sederhana untuk sidebar yang tidak lengkap */
        .sidebar { width: 250px; background-color: #2c3e50; padding: 20px; }
        .brand { color: white; margin-bottom: 30px; }
        .logo-placeholder { width: 50px; height: 50px; background-color: #3498db; border-radius: 5px; margin-bottom: 10px; }
        body { display: flex; }
    </style>
</head>
<body>

    <div class="main-content">
        <div class="content-body">
            <h1>Gallery</h1>

            <div class="actions-toolbar">
                <div class="search-input">
                    <span class="icon-placeholder-small"></span>
                    <input type="text" placeholder="Search...">
                </div>
                <button class="btn-add">+ Add</button>
            </div>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>URL Image</th>
                            <th>Upload Date</th>
                            <th style="width: 100px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Contoh Baris Data dengan Tombol Copy dan Delete -->
                        <tr>
                            <td>1</td>
                            <td>Lorem Ipsum</td>
                            <td>11 November 2025</td>
                            <td class="action-cell">
                                <!-- Tombol COPY -->
                                <button class="btn-action btn-copy" title="Copy URL">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16 1H4C2.9 1 2 1.9 2 3V17H4V3H16V1ZM19 5H8C6.9 5 6 5.9 6 7V21C6 22.1 6.9 23 8 23H19C20.1 23 21 22.1 21 21V7C21 5.9 20.1 5 19 5ZM8 21V7H19V21H8Z" fill="currentColor"/>
                                    </svg>
                                </button>
                                <!-- Tombol DELETE -->
                                <button class="btn-action btn-delete" title="Delete Item">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5 4H19V6H5V4ZM6 7V19C6 20.1 6.9 21 8 21H16C17.1 21 18 20.1 18 19V7H6ZM10 9V17H12V9H10ZM14 9V17H16V9H14ZM9 2H15V4H9V2Z" fill="currentColor"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <!-- Baris data lainnya -->
                        <tr>
                            <td>2</td>
                            <td>Lorem Ipsum</td>
                            <td>01 November 2025</td>
                            <td class="action-cell">
                                <button class="btn-action btn-copy" title="Copy URL">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16 1H4C2.9 1 2 1.9 2 3V17H4V3H16V1ZM19 5H8C6.9 5 6 5.9 6 7V21C6 22.1 6.9 23 8 23H19C20.1 23 21 22.1 21 21V7C21 5.9 20.1 5 19 5ZM8 21V7H19V21H8Z" fill="currentColor"/>
                                    </svg>
                                </button>
                                <button class="btn-action btn-delete" title="Delete Item">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5 4H19V6H5V4ZM6 7V19C6 20.1 6.9 21 8 21H16C17.1 21 18 20.1 18 19V7H6ZM10 9V17H12V9H10ZM14 9V17H16V9H14ZM9 2H15V4H9V2Z" fill="currentColor"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Lorem Ipsum</td>
                            <td>06 November 2025</td>
                            <td class="action-cell">
                                <button class="btn-action btn-copy" title="Copy URL">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16 1H4C2.9 1 2 1.9 2 3V17H4V3H16V1ZM19 5H8C6.9 5 6 5.9 6 7V21C6 22.1 6.9 23 8 23H19C20.1 23 21 22.1 21 21V7C21 5.9 20.1 5 19 5ZM8 21V7H19V21H8Z" fill="currentColor"/>
                                    </svg>
                                </button>
                                <button class="btn-action btn-delete" title="Delete Item">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5 4H19V6H5V4ZM6 7V19C6 20.1 6.9 21 8 21H16C17.1 21 18 20.1 18 19V7H6ZM10 9V17H12V9H10ZM14 9V17H16V9H14ZM9 2H15V4H9V2Z" fill="currentColor"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Lorem Ipsum</td>
                            <td>06 November 2025</td>
                            <td class="action-cell">
                                <button class="btn-action btn-copy" title="Copy URL">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16 1H4C2.9 1 2 1.9 2 3V17H4V3H16V1ZM19 5H8C6.9 5 6 5.9 6 7V21C6 22.1 6.9 23 8 23H19C20.1 23 21 22.1 21 21V7C21 5.9 20.1 5 19 5ZM8 21V7H19V21H8Z" fill="currentColor"/>
                                    </svg>
                                </button>
                                <button class="btn-action btn-delete" title="Delete Item">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5 4H19V6H5V4ZM6 7V19C6 20.1 6.9 21 8 21H16C17.1 21 18 20.1 18 19V7H6ZM10 9V17H12V9H10ZM14 9V17H16V9H14ZM9 2H15V4H9V2Z" fill="currentColor"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>

                        <?php for($i=0; $i<6; $i++): ?>
                        <tr class="empty-row">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
            </div>

            <div class="pagination">
                <a href="#">&lt;</a>
                <a href="#" class="page-active">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">&gt;</a>
            </div>

        </div>
    </div>

</body>
</html>