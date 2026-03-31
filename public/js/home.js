function toggleProfileDropdown() {
  document.getElementById("profileDropdownMenu").classList.toggle("hidden");
}
document.addEventListener("click", function (e) {
  const wrapper = document.getElementById("profileWrapper");
  if (wrapper && !wrapper.contains(e.target)) {
    document.getElementById("profileDropdownMenu").classList.add("hidden");
  }
});
