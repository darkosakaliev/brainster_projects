$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        url: "/projects/all",
        method: "POST",
        success: function (response) {
            $("#project-list").html(response);
        },
    });

    $.ajax({
        url: "/academies/all",
        method: "POST",
        success: function (response) {
            $("#academy-list").html(response);
        },
    });

    // Pagination
    $(document).on("click", "a[rel*='next'], a[rel*='prev']", function (event) {
        event.preventDefault();

        var page = $(this).attr("href").split("page=")[1];

        getData(page);
    });

    function getData(page) {
        $.ajax({
            url: "/projects/all?page=" + page,
            method: "POST",
        })
            .done(function (data) {
                console.log(data);
                $("#project-list").empty().html(data);
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                alert("No response from server");
            });
    }

    $(document).ajaxStop(function () {
        // Show More
        let maxLength = 256;
        $(".show-read-more").each(function () {
            var myStr = $(this).text();
            if ($.trim(myStr).length > maxLength) {
                var newStr = myStr.substring(0, maxLength);
                var removedStr = myStr.substring(
                    maxLength,
                    $.trim(myStr).length
                );
                $(this).empty().html(newStr);
                $(this).append(
                    ' <a href="javascript:void(0);" class="read-more underline custom-orange self-end">Show more</a>'
                );
                $(this).append(
                    '<span class="more-text hidden">' + removedStr + "</span>"
                );
            }
        });
        $(".read-more").click(function () {
            $(this).siblings(".more-text").contents().unwrap();
            $(this).remove();
        });

        // Modal
        $(".openModal").on("click", function () {
            $("#modal").removeClass("hidden");
            $("#overlay").removeClass("hidden");
            let id = $(this).data("id");
            console.log(id);
        });

        $("#closeModal, #overlay").on("click", function () {
            $("#modal").addClass("hidden");
            $("#overlay").addClass("hidden");
        });

        // Project Buttons
        $(".projectDiv").on("mouseenter", function () {
            $(this).find(".buttonWrapper").removeClass("hidden").addClass("flex");
        });

        $(".projectDiv").on("mouseleave", function () {
            $(this).find(".buttonWrapper").removeClass("flex").addClass("hidden");
        });
    });
});
