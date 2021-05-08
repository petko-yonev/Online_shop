jQuery(document).ready(function () {
    jQuery(".periphery").hover(function () {
        jQuery(".show_periphery").addClass("dropdown_content");
        jQuery(".show_hardware").removeClass("dropdown_content");
        jQuery(".show_computers").removeClass("dropdown_content");
        jQuery(".show_monitors").removeClass("dropdown_content");
        jQuery(".show_stools_and_desks").removeClass("dropdown_content");
    });
    jQuery(".hardware").hover(function () {
        jQuery(".show_periphery").removeClass("dropdown_content");
        jQuery(".show_hardware").addClass("dropdown_content");
        jQuery(".show_computers").removeClass("dropdown_content");
        jQuery(".show_monitors").removeClass("dropdown_content");
        jQuery(".show_stools_and_desks").removeClass("dropdown_content");
    });
    jQuery(".computers").hover(function () {
        jQuery(".show_periphery").removeClass("dropdown_content");
        jQuery(".show_hardware").removeClass("dropdown_content");
        jQuery(".show_computers").addClass("dropdown_content");
        jQuery(".show_monitors").removeClass("dropdown_content");
        jQuery(".show_stools_and_desks").removeClass("dropdown_content");
    });
    jQuery(".monitors").hover(function () {
        jQuery(".show_periphery").removeClass("dropdown_content");
        jQuery(".show_hardware").removeClass("dropdown_content");
        jQuery(".show_computers").removeClass("dropdown_content");
        jQuery(".show_monitors").addClass("dropdown_content");
        jQuery(".show_stools_and_desks").removeClass("dropdown_content");
    });
    jQuery(".stools_and_desks").hover(function () {
        jQuery(".show_periphery").removeClass("dropdown_content");
        jQuery(".show_hardware").removeClass("dropdown_content");
        jQuery(".show_computers").removeClass("dropdown_content");
        jQuery(".show_monitors").removeClass("dropdown_content");
        jQuery(".show_stools_and_desks").addClass("dropdown_content");
    });
    jQuery(".wrap").hover(function () {
        jQuery(".show_periphery").removeClass("dropdown_content");
        jQuery(".show_hardware").removeClass("dropdown_content");
        jQuery(".show_computers").removeClass("dropdown_content");
        jQuery(".show_monitors").removeClass("dropdown_content");
        jQuery(".show_stools_and_desks").removeClass("dropdown_content");
    });
});