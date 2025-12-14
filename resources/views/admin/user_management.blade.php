<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{ asset('css/user_management.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body class="bg-gray-50 min h-screen">

    <!-- Responsive Layout -->
    <div class="flex w-full min-h-screen">

        <!-- Sidebar (hidden on small screens) -->
        <aside class="w-64 h-screen border-r sticky top-0">
            @include('admin.sidebar')
        </aside>

        <div class="flex-1 flex flex-col">
            <!-- Topbar -->
            <div class="w-full">
                @include('admin.topbar')
            </div>
        </div>


        <main class="flex-1 overflow-y-auto px-8 py-6">
            <div class="max-w-full pl-3">

                <div class="page-container">

                    <h2 class="page-title">User Management</h2>

         <div class="top-bar flex justify-between items-center gap-4">
    <!-- Search + Add -->
<div class="flex items-center gap-2">
    <form action="{{ route('user.management') }}" method="GET">
        <input type="text" name="search" value="{{ $search }}" placeholder="Search..."
            class="add-btn text-left">
    </form>

    <button class="add-btn" onclick="openModalAdd()">
        <span class="plus-icon">＋</span> Add
    </button>
</div>

    <!-- Filter di kanan -->
    <form action="{{ route('user.management') }}" method="GET" class="flex gap-2 items-center">
        <select name="role" class="form-select">
            <option value="">All Types</option>
            <option value="admin" {{ $filterRole == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="operator" {{ $filterRole == 'operator' ? 'selected' : '' }}>Operator</option>
        </select>

        <select name="status" class="form-select">
            <option value="">All Status</option>
            <option value="active" {{ $filterStatus == 'active' ? 'selected' : '' }}>Active</option>
            <option value="nonactive" {{ $filterStatus == 'nonactive' ? 'selected' : '' }}>Nonactive</option>
        </select>

        <button type="submit" class="filter-btn">Filter</button>
    </form>
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
                                @foreach ($members as $member)
                                    <tr>
                                        <td>{{ $member->name }}</td>
                                        <td>{{ $member->email }}</td>
                                        <td>{{ ucfirst($member->role) }}</td>
                                        <td>
                                            <span class="status {{ $member->status == 'active' ? 'active' : 'inactive' }}">
                                                {{ ucfirst($member->status) }}
                                            </span>
                                        </td>

                                        <td class="actions">
                                            <img src="{{ asset('images/edit-icon.png') }}" class="icon-btn"
                                                onclick="openEditModal('{{ $member->id }}', '{{ $member->name }}', '{{ $member->email }}', '{{ $member->role }}', '{{ $member->status }}')">

                                            <form action="{{ route('user.delete', $member->id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <img src="{{ asset('images/delete-icon.png') }}" class="icon-btn"
                                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <!-- <tbody>
                                <tr>
                                    <td>Lorem Ipsum</td>
                                    <td>Lorem Ipsum</td>
                                    <td>11 November 2025</td>
                                    <td><span class="status active">Active</span></td>
                                    <td class="actions">
                                        <img src="{{ asset('images/edit-icon.png') }}" onclick="openModalEdit()"
                                            class="icon-btn">
                                        <img src="{{ asset('images/delete-icon.png') }}" class="icon-btn">
                                    </td>
                                </tr>

                                <tr>
                                    <td>Lorem Ipsum</td>
                                    <td>Lorem Ipsum</td>
                                    <td>01 November 2025</td>
                                    <td><span class="status inactive">Nonactive</span></td>
                                    <td class="actions">
                                        <img src="{{ asset('images/edit-icon.png') }}" onclick="openModalEdit()"
                                            class="icon-btn">
                                        <img src="{{ asset('images/delete-icon.png') }}" class="icon-btn">
                                    </td>
                                </tr>

                                <tr>
                                    <td>Lorem Ipsum</td>
                                    <td>Lorem Ipsum</td>
                                    <td>06 November 2025</td>
                                    <td><span class="status active">Active</span></td>
                                    <td class="actions">
                                        <img src="{{ asset('images/edit-icon.png') }}" onclick="openModalEdit()"
                                            class="icon-btn">
                                        <img src="{{ asset('images/delete-icon.png') }}" class="icon-btn">
                                    </td>
                                </tr>

                                <tr>
                                    <td>Lorem Ipsum</td>
                                    <td>Lorem Ipsum</td>
                                    <td>06 November 2025</td>
                                    <td><span class="status active">Active</span></td>
                                    <td class="actions">
                                        <img src="{{ asset('images/edit-icon.png') }}" onclick="openModalEdit()"
                                            class="icon-btn">
                                        <img src="{{ asset('images/delete-icon.png') }}" class="icon-btn">
                                    </td>
                                </tr> -->

                            <!-- empty rows -->
                            <!-- <tr>
                                    <td colspan="5">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="5">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="5">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="5">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="5">&nbsp;</td>
                                </tr>
                            </tbody> -->
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="pagination mt-4">
                        {{ $members->links('pagination::tailwind') }}
                    </div>
                    <!-- <div class="pagination">
                        <button class="page-arrow">◀</button>
                        <span class="page-number active">1</span>
                        <span class="page-number">2</span>
                        <span class="page-number">3</span>
                        <span class="page-dots">…</span>
                        <button class="page-arrow">▶</button>
                    </div> -->

                </div>
            </div>

        </main>



        <!-- MODAL ADD MEMBER -->
        <div id="modalOverlay" class="modal-overlay"></div>

        <div id="editModal" class="modal-box">
            <div class="edit-container">
                <link rel="stylesheet" href="{{ asset('css/edit_member.css') }}">

                <div class="edit-header">
                    <button class="close-btn" onclick="closeModalAdd()">×</button>
                    <h2>Add Member</h2>
                </div>

                <form action="{{ route('user.store') }}" method="POST" class="edit-form" enctype="multipart/form-data">
                    @csrf

                    @if ($errors->any())
                        <div class="bg-red-100 text-red-700 p-2 rounded">
                            {{ $errors->first() }}
                        </div>
                    @endif


                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-input" required>

                    <label class="form-label">Sinta Link</label>
                    <input type="url" name="sinta_link" class="form-input"
                        placeholder="https://sinta.kemdikbud.go.id/authors/xxxx">

                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-input" required>

                    <div class="row-2">
                        <div class="select-box">
                            <label class="form-label">Role</label>
                            <select name="role" class="form-select" required>
                                <option value="admin">Admin</option>
                                <option value="operator">Operator</option>
                            </select>
                        </div>

                        <div class="select-box">
                            <label class="form-label">Position</label>
                            <select name="position_id" class="form-select" required>
                                <option value="d209da0d-b183-4f24-9f79-547c79eb6afe">Head Lab</option>
                                <option value="c1b51b18-7cd4-46dc-85d5-bbab8dc1ac9d">Researcher</option>
                            </select>
                        </div>
                    </div>


                    <label class="form-label">Photo</label>
                    <input type="file" name="photo" class="form-input" accept="image/*">

                    <button type="submit" class="btn-save">Save</button>
                </form>

            </div>
        </div>


        <!-- MODAL EDIT MEMBER -->
        <div id="modalOverlay2" class="modal-overlay"></div>

        <div id="editModal2" class="modal-box">
            <div class="edit-container">
                <link rel="stylesheet" href="{{ asset('css/edit_member.css') }}">

                <div class="edit-header">
                    <button class="close-btn" onclick="closeModalEdit()">×</button>
                    <h2>Edit Member</h2>
                </div>

                <form class="edit-form" method="POST" action="#" id="editForm">
                    @csrf
                    <input type="hidden" name="id" id="edit_id">

                    <label>Name</label>
                    <input type="text" name="name" id="edit_name" class="form-input">

                    <label>Email</label>
                    <input type="email" name="email" id="edit_email" class="form-input">

                    <label>Role</label>
                    <select name="role" id="edit_role" class="form-select">
                        <option value="admin">Admin</option>
                        <option value="operator">Operator</option>
                    </select>

                    <label>Status</label>
                    <select name="status" id="edit_status" class="form-select">
                        <option value="active">Active</option>
                        <option value="nonactive">Inactive</option>
                    </select>

                    <button type="submit" class="btn-save">Save</button>
                </form>
                <!-- <form class="edit-form">
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
                </form> -->
            </div>
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

        function openEditModal(id, name, email, role, status) {
            document.getElementById("modalOverlay2").style.display = "block";
            document.getElementById("editModal2").style.display = "block";

            document.getElementById("edit_id").value = id;
            document.getElementById("edit_name").value = name;
            document.getElementById("edit_email").value = email;
            document.getElementById("edit_role").value = role;
            document.getElementById("edit_status").value = status;
        }

        function closeModalEdit() {
            document.getElementById("modalOverlay2").style.display = "none";
            document.getElementById("editModal2").style.display = "none";
        }


        function openModalEdit() {
            document.getElementById("modalOverlay2").style.display = "block";
            document.getElementById("editModal2").style.display = "block";
        }

        function closeModalEdit() {
            document.getElementById("modalOverlay2").style.display = "none";
            document.getElementById("editModal2").style.display = "none";
        }

        document.getElementById("editForm").addEventListener("submit", function (e) {
            e.preventDefault();
            let id = document.getElementById("edit_id").value;
            this.action = "/user-management/update/" + id;
            this.submit();
        });

    </script>
    @if ($errors->any())
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                openModalAdd();
            });
        </script>
    @endif


</body>

</html>