<div class="edit-container">
    <head>
        <link rel="stylesheet" href="{{ asset('css/edit_member.css') }}">
    </head>
    <body>
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

            <button class="btn-save">Save</button>

        </form>
    </body>
</div>
