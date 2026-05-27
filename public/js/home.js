function toggleProfileDropdown() {
  document.getElementById("profileDropdownMenu").classList.toggle("hidden");
}
document.addEventListener("click", function (e) {
  const wrapper = document.getElementById("profileWrapper");
  if (wrapper && !wrapper.contains(e.target)) {
    document.getElementById("profileDropdownMenu").classList.add("hidden");
  }
});

function increaseQty(button) {
  const form = button.closest('form');
  const quantityInput = form.querySelector('input[name="quantity"]');
  let quantity = parseInt(quantityInput.value) || 1;
  quantityInput.value = quantity + 1;
  form.submit();
}

function decreaseQty(button) {
  const form = button.closest('form');
  const quantityInput = form.querySelector('input[name="quantity"]');
  let quantity = parseInt(quantityInput.value) || 1;
  if (quantity > 1) {
    quantityInput.value = quantity - 1;
    form.submit();
  }
}

