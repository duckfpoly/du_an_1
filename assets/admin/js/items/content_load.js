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