function toggleProfileDropdown() {
  document.getElementById("profileDropdownMenu").classList.toggle("hidden");
}

// Close dropdown when clicking outside
document.addEventListener("click", function (e) {
  const wrapper = document.getElementById("profileWrapper");
  if (wrapper && !wrapper.contains(e.target)) {
    document.getElementById("profileDropdownMenu").classList.add("hidden");
  }
});
