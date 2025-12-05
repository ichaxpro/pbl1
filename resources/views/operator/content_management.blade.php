<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content Management</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/content_management.css') }}"/>
</head>
<body>

<div class="page">
    <h1 class="page-title">Content Management</h1>

    <div class="top-bar">
        <div class="search-box">
            <i class="icon-search">🔍</i>
            <input type="text" placeholder="Search...">
        </div>

        <button class="btn-add">
            <span>＋</span> Add
        </button>

        <div class="filters">
            <span class="filter-label">Filters:</span>
            <button class="filter-btn">Type</button>
            <button class="filter-btn">Status</button>
        </div>
    </div>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Upload Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Lorem Ipsum</td>
                    <td>Lorem Ipsum</td>
                    <td>11 November 2025</td>
                    <td><span class="badge accepted">Accepted</span></td>
                    <td class="actions">
                        <button class="edit">✏️</button>
                        <button class="delete">🗑️</button>
                    </td>
                </tr>

                <tr>
                    <td>Lorem Ipsum</td>
                    <td>Lorem Ipsum</td>
                    <td>01 November 2025</td>
                    <td><span class="badge rejected">Rejected</span></td>
                    <td class="actions">
                        <button class="edit">✏️</button>
                        <button class="delete">🗑️</button>
                    </td>
                </tr>

                <tr>
                    <td>Lorem Ipsum</td>
                    <td>Lorem Ipsum</td>
                    <td>06 November 2025</td>
                    <td><span class="badge requested">Requested</span></td>
                    <td class="actions">
                        <button class="edit">✏️</button>
                        <button class="delete">🗑️</button>
                    </td>
                </tr>

                <tr>
                    <td>Lorem Ipsum</td>
                    <td>Lorem Ipsum</td>
                    <td>06 November 2025</td>
                    <td><span class="badge requested">Requested</span></td>
                    <td class="actions">
                        <button class="edit">✏️</button>
                        <button class="delete">🗑️</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="pagination">
        <span class="prev">❮</span>
        <span class="page-number active">1</span>
        <span class="page-number">2</span>
        <span class="page-number">3</span>
        <span class="next">❯</span>
    </div>

</div>

</body>
</html>
