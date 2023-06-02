$(document).ready(function () {
    const tabLinks = $(".nav-link").slice(5);// Explite the header links

    tabLinks.each((index, tabLink) => {
        $(tabLink).click(() => {
            // Hide all tab panes
            $('.tab-pane').each((index, tabPane) => {
                $(tabPane).removeClass('show active');
            });

            // Show the corresponding tab pane
            $('.tab-pane').eq(index).addClass('show active');
            // Highlight the corresponding tab link
            tabLinks.each((index, tabLink) => {
                $(tabLink).removeClass('active');
            });
            $(tabLink).addClass('active');
        });
    });

});