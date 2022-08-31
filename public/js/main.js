$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });



    getAcademyRecords();

    $(document).on("change", "#academy-list input[type=checkbox]", function () {

        if($("#academy-list input[type=checkbox]").is(':checked')) {
            $("#all").prop("checked", false);
        } else if (!$("#academy-list input[type=checkbox]").not('#all').is(':checked')) {
            $("#all").prop("checked", true);
        } else if ($("#academy-list input[type=checkbox]").is(':checked') && $("#all").is(':checked')) {
            $("#academy-list input[type=checkbox]".prop("checked", false));
        }
        let checked = $.map($("#academy-list input:checkbox:checked"), function (e) {
            return e.value;
        });
        data = {
            academy: checked,
        };

        getProjectRecords(data);
    });

    function getAcademyRecords() {
        $.ajax({
            url: "/academies/all",
            method: "POST",
            success: function (response) {
                $("#academy-list").html(response);
                let checked = $.map($("#academy-list input:checkbox:checked"), function (e) {
                    return e.value;
                });
                data = {
                    academy: checked,
                };
                getProjectRecords(data);
            },
        });
    }

    function getProjectRecords(request) {
        $.ajax({
            url: "/projects/all",
            method: "POST",
            data: request,
            success: function (response) {
                $("#project-list").empty().html(response);
                getPaginationData(request);
            },
        });
    }

    function getPaginationData(request) {
        $(document).on("click", "a[rel*='next'], a[rel*='prev']", function (event) {
            event.preventDefault();
            event.stopPropagation();
            event.stopImmediatePropagation();

            var page = $(this).attr("href").split("page=")[1];

            $.ajax({
                url: "/projects/all?page=" + page,
                data: request,
                method: "POST",
                success: function(data) {
                    $("#project-list").empty().html(data);
                }
            });
        });
    }
});

$(document).ajaxStop(function () {
    // Show More
    let maxLength = 256;
    $(".show-read-more").each(function () {
        var myStr = $(this).text();
        if ($.trim(myStr).length > maxLength) {
            var newStr = myStr.substring(0, maxLength);
            var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
            $(this).empty().html(newStr);
            $(this).append(
                ' <a href="javascript:void(0);" class="read-more underline custom-orange self-end">Show more</a>'
            );
            $(this).append(
                '<span class="more-text hidden">' + removedStr + "</span>"
            );
        }
    });
    $(document).on("click", ".read-more", function () {
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
