document.querySelectorAll('[data-modal-target="view-modal"]').forEach(btn => {
    btn.addEventListener('click', () => {
        const name = btn.dataset.name;
        const initials = name.split(' ').map(w => w[0]).join('').toUpperCase().slice(0, 2);

        document.getElementById('id').textContent         = btn.dataset.id;
        document.getElementById('name').textContent       = name;
        document.getElementById('email').textContent      = btn.dataset.email;
        document.getElementById('phone').textContent      = btn.dataset.phone;
        document.getElementById('registered').textContent = btn.dataset.registered;
    });
});