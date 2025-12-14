<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operator Gallery</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> -->

    <!-- <link rel="stylesheet" href="{{ asset('css/topbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/operator_gallery.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Tambahkan font Inter agar tampilan konsisten (jika belum ada) */
        body {
            font-family: 'Inter', sans-serif;
        }

        /* Contoh sederhana untuk sidebar yang tidak lengkap */
        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            padding: 20px;
        }

        .brand {
            color: white;
            margin-bottom: 30px;
        }

        .logo-placeholder {
            width: 50px;
            height: 50px;
            background-color: #3498db;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        body {
            display: flex;
        }
    </style>
</head>


<body class="bg-gray-50 min-h-screen">

    <!-- Responsive Layout -->
    <div class="flex w-full min-h-screen">

        <!-- Sidebar (hidden on small screens) -->
        <aside class="w-64 h-screen border-r flex flex-col sticky top-0">
            @include('operator.sidebaroperator')
        </aside>

        <div class="flex-1 flex flex flex-col min-h screen">

            <style>
                body {
                    margin: 0;
                    padding: 0;
                    background: #F4F9FA;
                    font-family: 'Inter', sans-serif;
                }
            </style>


            <body class="bg-gray-50 min-h-screen">

                <!-- Responsive Layout -->
                <div class="fle w-full min-h-screen">

                    <div class="flex-1 flex flex-col min-h screen">
                        <!-- Topbar -->
                        <div class="w-full">
                            @include('operator.topbar')
                        </div>
                    </div>
                    <main class="flex-1 overflow-y-auto px-8 py-6 ml-10">
                        <div class="main-content">
                            <div class="content-body">
                                <h1>Gallery</h1>

                                <div class="actions-toolbar">
                                    <div class="search-input">
                                        <span class="icon-placeholder-small"></span>
                                        <input type="text" placeholder="Search...">
                                    </div>
                                    <a href="/operator/gallery/create" class="btn-add"
                                        style="text-decoration: none; display: flex; align-items: center; justify-content: center; padding: 0 16px;">+
                                        Add</a>
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
                                            @foreach ($paginated as $index => $img)
                                                <tr>
                                                    <td>{{ $loop->iteration + ($paginated->currentPage() - 1) * $paginated->perPage() }}
                                                    </td>
                                                    <td class="text-blue-600 underline break-all">{{ $img->url }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($img->created_at)->format('d M Y') }}</td>
                                                    <td class="action-cell flex gap-2">
                                                        <!-- COPY BUTTON -->
                                                         <button type="submit" style="background:none;border:none;" onclick="copyToClipboard('{{ $img->url }}')">
                                                            <img src="{{ asset('images/Copy.png') }}" class="icon-btn" alt="copy">
                                                        </button>
                                                        <!-- <button onclick="copyToClipboard('{{ $img->url }}')"
                                                            class="btn-action btn-copy" title="Copy URL">📋</button> -->

                                                        <!-- DELETE BUTTON -->
                                                        <form action="{{ route('gallery.delete', $img->id) }}" method="POST"
                                                            onsubmit="return confirm('Delete this image?')">
                                                            @csrf
                                                            @method('DELETE')
                                    
                                                            <button type="submit" style="background:none;border:none;">
                                                                <img src="{{ asset('images/delete-icon.png') }}" class="icon-btn" alt="Delete">
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>

                        <div class="mt-4">

                            {{ $paginated->links('pagination::tailwind') }}

                        </div>
                        
            </body>
            <script>
                function copyToClipboard(text) {
                    navigator.clipboard.writeText(text)
                        .then(() => alert('URL copied!'))
                        .catch(err => alert('Failed to copy'));
                }
            </script>


</html>