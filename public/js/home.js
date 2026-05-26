function toggleProfileDropdown() {
  document.getElementById("profileDropdownMenu").classList.toggle("hidden");
}
document.addEventListener("click", function (e) {
  const wrapper = document.getElementById("profileWrapper");
  if (wrapper && !wrapper.contains(e.target)) {
    document.getElementById("profileDropdownMenu").classList.add("hidden");
  }
});

let qty = 1;
let pricePerItem = 5;
let delivery = 2;

function updatePrice() {
  document.getElementById("qty").innerText = qty;

  let subtotal = qty * pricePerItem;
  let total = subtotal + delivery;

  document.getElementById("priceText").innerText = "$" + subtotal;
  document.getElementById("subtotal").innerText = "$" + subtotal;
  document.getElementById("total").innerText = "$" + total;
}

function increaseQty() {
  qty++;
  updatePrice();
}

function decreaseQty() {
  if (qty > 1) {
    qty--;
    updatePrice();
  }
}
