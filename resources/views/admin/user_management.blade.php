<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="{{ asset('css/user_management.css') }}">
    </head>
    <body>
        <div class="page-container">

            <h2 class="page-title">User Management</h2>

            <div class="top-bar" >
                <div class="search-box">
                    <img src="{{ asset('images/search_icon.png') }}" class="search-icon">
                    <input type="text" placeholder="Search..." class="search-text">
                </div>

                <button class="add-btn" onclick="openModalAdd()">
                    <span class="plus-icon">＋</span> Add
                </button>

                <div class="filter-group">
                    <span class="filter-label">Filters:</span>
                    <button class="filter-btn">Type</button>
                    <button class="filter-btn">Status</button>
                </div>
            </div>

            <div class="table-wrapper">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Lorem Ipsum</td>
                            <td>Lorem Ipsum</td>
                            <td>11 November 2025</td>
                            <td><span class="status active">Active</span></td>
                            <td class="actions">
                                <img src="{{ asset('images/edit-icon.png') }}" onclick="openModalEdit()" class="icon-btn">  
                                <img src="{{ asset('images/delete-icon.png') }}" class="icon-btn">
                            </td>
                        </tr>

                        <tr>
                            <td>Lorem Ipsum</td>
                            <td>Lorem Ipsum</td>
                            <td>01 November 2025</td>
                            <td><span class="status inactive">Nonactive</span></td>
                            <td class="actions">
                                <img src="{{ asset('images/edit-icon.png') }}" onclick="openModalEdit()" class="icon-btn">
                                <img src="{{ asset('images/delete-icon.png') }}" class="icon-btn">
                            </td>
                        </tr>

                        <tr>
                            <td>Lorem Ipsum</td>
                            <td>Lorem Ipsum</td>
                            <td>06 November 2025</td>
                            <td><span class="status active">Active</span></td>
                            <td class="actions">
                                <img src="{{ asset('images/edit-icon.png') }}" onclick="openModalEdit()" class="icon-btn">
                                <img src="{{ asset('images/delete-icon.png') }}" class="icon-btn">
                            </td>
                        </tr>

                        <tr>
                            <td>Lorem Ipsum</td>
                            <td>Lorem Ipsum</td>
                            <td>06 November 2025</td>
                            <td><span class="status active">Active</span></td>
                            <td class="actions">
                                <img src="{{ asset('images/edit-icon.png') }}" onclick="openModalEdit()" class="icon-btn">
                                <img src="{{ asset('images/delete-icon.png') }}" class="icon-btn">
                            </td>
                        </tr>

                        <!-- empty rows -->
                        <tr><td colspan="5">&nbsp;</td></tr>
                        <tr><td colspan="5">&nbsp;</td></tr>
                        <tr><td colspan="5">&nbsp;</td></tr>
                        <tr><td colspan="5">&nbsp;</td></tr>
                        <tr><td colspan="5">&nbsp;</td></tr>
                    </tbody>
                </table>
            </div>

            <div class="pagination">
                <button class="page-arrow">◀</button>
                <span class="page-number active">1</span>
                <span class="page-number">2</span>
                <span class="page-number">3</span>
                <span class="page-dots">…</span>
                <button class="page-arrow">▶</button>
            </div>

        </div>
                <!-- MODAL ADD MEMBER -->
        <div id="modalOverlay" class="modal-overlay"></div>

        <div id="editModal" class="modal-box">
            <div class="edit-container">
                <link rel="stylesheet" href="{{ asset('css/edit_member.css') }}">

                <div class="edit-header">
                    <h2>Add Member</h2>
                </div>

                <form class="edit-form">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-input">

                    <label class="form-label">Email</label>
                    <input type="email" class="form-input">

                    <div class="row-2">
                        <div class="select-box">
                            <label class="form-label">Role</label>
                            <select class="form-select">
                                <option>Admin</option>
                                <option>User</option>
                            </select>
                        </div>
                    </div>

                    <button type="button" class="btn-save" onclick="closeModalAdd()">Save</button>
                </form>
            </div>
        </div>


        <!-- MODAL EDIT MEMBER -->
        <div id="modalOverlay2" class="modal-overlay"></div>

        <div id="editModal2" class="modal-box">
            <div class="edit-container">
                <link rel="stylesheet" href="{{ asset('css/edit_member.css') }}">

                <div class="edit-header">
                    <h2>Edit Member</h2>
                </div>

                <form class="edit-form">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-input">

                    <label class="form-label">Email</label>
                    <input type="email" class="form-input">

                    <div class="row-2">
                        <div class="select-box">
                            <label class="form-label">Role</label>
                            <select class="form-select">
                                <option>Admin</option>
                                <option>User</option>
                            </select>
                        </div>

                        <div class="select-box">
                            <label class="form-label">Status</label>
                            <select class="form-select">
                                <option>Active</option>
                                <option>Inactive</option>
                            </select>
                        </div>
                    </div>

                    <button type="button" class="btn-save" onclick="closeModalEdit()">Save</button>
                </form>
            </div>
        </div>


        <script>
        function openModalAdd() {
            document.getElementById("modalOverlay").style.display = "block";
            document.getElementById("editModal").style.display = "block";
        }

        function closeModalAdd() {
            document.getElementById("modalOverlay").style.display = "none";
            document.getElementById("editModal").style.display = "none";
        }

        function openModalEdit() {
            document.getElementById("modalOverlay2").style.display = "block";
            document.getElementById("editModal2").style.display = "block";
        }

        function closeModalEdit() {
            document.getElementById("modalOverlay2").style.display = "none";
            document.getElementById("editModal2").style.display = "none";
        }
        </script>

        </script>
    </body>
</html>