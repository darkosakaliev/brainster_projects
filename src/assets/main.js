$(".deleteBtn").click(function (e) {
  e.preventDefault();
  href = e.target.href;
  Swal.fire({
    title: "Are you sure?",
    text: "You will still be able to restore this action. :)",
    icon: "warning",
    iconColor: "#ffef94",
    background: "#343a40",
    showCancelButton: true,
    confirmButtonColor: "#ffef94",
    customClass: {
    	confirmButton: "text-dark",
        title: "text-white",
        htmlContainer: "text-white"
    },
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.isConfirmed) {
        window.location.replace(href);
    }
  });
});
