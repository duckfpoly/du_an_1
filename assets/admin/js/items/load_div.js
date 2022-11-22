// LoadLess
function load_less(array, btn_less, btn_more, view_cut) {
    $(btn_less).click(function (e) {
        e.preventDefault();
        $(array).slice(view_cut, $(array).lenght).addClass("d-none");
        $(btn_more).removeClass("d-none");
        $(btn_less).addClass("d-none");
    });
}
// load more
function load_more(array, btn_more, btn_less, view) {
    $(array).addClass("d-none");
    $(array).slice(0, view).removeClass("d-none");
    if ($(array).length <= view) {
        $(btn_more).addClass("d-none");
    }
    else {
        $(btn_more).on("click", function (e) {
            e.preventDefault();
            $(array + ":hidden").slice(0, view).removeClass("d-none");
            if ($(array + ":hidden").length == 0) {
                $(btn_more).addClass("d-none");
                $(btn_less).removeClass("d-none");
            }
        });
    }
}

// LoadLess
function load_less_2(array, btn_less, btn_more, view_cut) {
    $(btn_less).click(function (e) {
        e.preventDefault();
        $(array).slice(view_cut, $(array).lenght).slideUp();
        $(btn_more).removeClass("d-none");
        $(btn_less).addClass("d-none");
    });
}
function load_less_scroll(array, btn_less, btn_more, view_cut, height) {
    $(btn_less).click(function (e) {
        e.preventDefault();
        $("html, body").animate(
            {
                scrollTop: height,
            },
            0
        );
        $(array).slice(view_cut, $(array).lenght).slideUp();
        $(btn_more).removeClass("d-none");
        $(btn_less).addClass("d-none");
    });
}
// load more
function load_more_2(array, btn_more, btn_less, view) {
    $(array).hide();
    $(array).slice(0, view).show();
    if ($(array).length <= view) {
        $(btn_more).addClass("d-none");
    }
    else {
        $(btn_more).on("click", function (e) {
            e.preventDefault();
            $(array + ":hidden").slice(0, view).slideDown();
            if ($(array + ":hidden").length == 0) {
                $(btn_more).addClass("d-none");
                $(btn_less).removeClass("d-none");
            }
        });
    }
}