window.openEditModal = function (
    id,
    name,
    username,
    email,
    role,
    campus
) {
    const modal = document.getElementById('editModal');

    if (!modal) return;

    modal.classList.remove('hidden');
    modal.classList.add('flex');

    document.getElementById('edit_name').value = name;
    document.getElementById('edit_username').value = username;
    document.getElementById('edit_email').value = email;
    document.getElementById('edit_role').value = role;
    document.getElementById('edit_campus').value = campus;

    document.getElementById('editForm').action = '/users/' + id;
};

window.closeEditModal = function () {
    const modal = document.getElementById('editModal');

    if (!modal) return;

    modal.classList.add('hidden');
    modal.classList.remove('flex');
};