$(document).ready(function () {
  // sweetalert2 Delete Confirmation Button
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
        htmlContainer: "text-white",
      },
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!",
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.replace(href);
      }
    });
  });

  $(".deleteBtnBook").click(function (e) {
    e.preventDefault();
    href = e.target.href;
    Swal.fire({
      title: "Are you sure?",
      text: "Deleting this book will delete all user reviews and notes for this book!",
      icon: "warning",
      iconColor: "#ffef94",
      background: "#343a40",
      showCancelButton: true,
      confirmButtonColor: "#ffef94",
      customClass: {
        confirmButton: "text-dark",
        title: "text-white",
        htmlContainer: "text-white",
      },
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!",
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.replace(href);
      }
    });
  });

  $(".deleteBtnPerm").click(function (e) {
    e.preventDefault();
    href = e.target.href;
    Swal.fire({
      title: "Are you sure?",
      text: "This action is irreversable!",
      icon: "warning",
      iconColor: "#ffef94",
      background: "#343a40",
      showCancelButton: true,
      confirmButtonColor: "#ffef94",
      customClass: {
        confirmButton: "text-dark",
        title: "text-white",
        htmlContainer: "text-white",
      },
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!",
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.replace(href);
      }
    });
  });

  // Quote API
  fetch("http://api.quotable.io/random")
    .then((data) => {
      return data.json();
    })
    .then((quote) => {
      let data = `<h2>"${quote.content}"</h2>
  <p class="fst-italic m-0">-${quote.author}</p>`;
      $(".quoteDiv").html(data);
    })
    .catch((err) => {
      console.log(err);
    });

  // AJAX notes
  $("#noteSubmit").submit(function (e) {
    let form = $("#noteSubmit");
    e.preventDefault();
    if ($("#note").val().length == 0) {
      $("#note").after(
        "<div class='alert alert-danger text-center mt-2 mb-0' id='noteValidation'>Your note is empty!</div>"
      );
      setTimeout(function () {
        $("#noteValidation").remove();
      }, 2000);
    } else {
      $.ajax({
        type: form.attr("method"),
        url: form.attr("action"),
        data: form.serialize(),
        success: function () {
          $("#note").after(
            "<div class='alert alert-success text-center mt-2 mb-0' id='noteValidation'>Added your note successfully!</div>"
          );
          setTimeout(function () {
            $("#noteValidation").remove();
          }, 2000);
          $("#note").val("");
          $.ajax({
            url: `${appUrl}actions/notes/show.php?id=${id}`,
            method: "GET",
            success: function (response) {
              $("#noteContainer").html(response);
            },
          });
        },
      });
    }
  });

  const appUrl = "http://localhost/project-2/src/";
  const url = new URL(window.location.href);
  const id = url.searchParams.get("id");

  $.ajax({
    url: `${appUrl}actions/notes/show.php?id=${id}`,
    method: "GET",
    success: function (response) {
      $("#noteContainer").html(response);
    },
  });

  $(document).on("click", ".deleteNote", function () {
    $.ajax({
      url: `${appUrl}actions/notes/delete.php`,
      method: "POST",
      data: { id: $(this).data("id") },
      success: function () {
        $("#note").after(
          "<div class='alert alert-success text-center mt-2 mb-0' id='noteValidation'>Deleted your note successfully!</div>"
        );
        setTimeout(function () {
          $("#noteValidation").remove();
        }, 2000);
        $.ajax({
          url: `${appUrl}actions/notes/show.php?id=${id}`,
          method: "GET",
          success: function (response) {
            $("#noteContainer").html(response);
          },
        });
      },
    });
  });
});
