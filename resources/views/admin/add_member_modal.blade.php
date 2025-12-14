<!-- MODAL OVERLAY -->
<div id="addMemberOverlay" class="fixed inset-0 bg-black/50 hidden z-40"></div>

<!-- MODAL BOX -->
<div id="addMemberModal"
    class="fixed inset-0 flex items-center justify-center hidden z-50">

    <div class="bg-white rounded-xl w-full max-w-lg p-6 relative">
        <button onclick="closeAddMember()"
            class="absolute top-3 right-3 text-xl">&times;</button>

        <h2 class="text-xl font-semibold mb-4">Add Member</h2>

        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data"
            class="space-y-4">
            @csrf

            <div>
                <label class="text-sm">Name</label>
                <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="text-sm">Email</label>
                <input type="email" name="email" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="text-sm">Role</label>
                <select name="role" class="w-full border rounded px-3 py-2" required>
                    <option value="admin">Admin</option>
                    <option value="operator">Operator</option>
                </select>
            </div>

            <div>
                <label class="text-sm">Position</label>
                <select name="position_id" class="w-full border rounded px-3 py-2" required>
                    <option value="d209da0d-b183-4f24-9f79-547c79eb6afe">Head Lab</option>
                    <option value="c1b51b18-7cd4-46dc-85d5-bbab8dc1ac9d">Researcher</option>
                </select>
            </div>

            <div>
                <label class="text-sm">Sinta Link</label>
                <input type="url" name="sinta_link"
                    class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="text-sm">Photo</label>
                <input type="file" name="photo" accept="image/*">
            </div>

            <div class="flex justify-end pt-4">
                <button type="submit"
                    class="bg-blue-600 text-white px-5 py-2 rounded">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>
