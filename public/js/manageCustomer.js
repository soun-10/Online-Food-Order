document.addEventListener("DOMContentLoaded", function () {
  const viewButtons = document.querySelectorAll("[data-customer-id]");
  viewButtons.forEach((button) => {
    button.addEventListener("click", function (e) {
      const customerId = this.getAttribute("data-customer-id");
      const customerName = this.getAttribute("data-customer-name");
      const customerEmail = this.getAttribute("data-customer-email");
      const customerPhone = this.getAttribute("data-customer-phone");
      const customerRegistered = this.getAttribute("data-customer-registered");

      document.getElementById("modal-customer-id").textContent = customerId;
      document.getElementById("modal-customer-name").textContent = customerName;
      document.getElementById("modal-customer-email").textContent =
        customerEmail;
      document.getElementById("modal-customer-phone").textContent =
        customerPhone;
      document.getElementById("modal-customer-registered").textContent =
        customerRegistered;
    });
  });
});
