jQuery(document).ready(function () {
    var meta_options = [
        { meta_box: '#inafx-meta-box-quote', meta_option: '#post-format-quote', meta_type: 'quote' },
        { meta_box: '#inafx-meta-box-link', meta_option: '#post-format-link', meta_type: 'link' },
        { meta_box: '#inafx-meta-box-gallery', meta_option: '#post-format-gallery', meta_type: 'gallery' },
        { meta_box: '#inafx-meta-box-audio', meta_option: '#post-format-audio', meta_type: 'audio' },
        { meta_box: '#inafx-meta-box-video', meta_option: '#post-format-video', meta_type: 'video' }
    ];

    jQuery.each(meta_options, function (index, value) {
        jQuery(meta_options[index].meta_box).css('display', 'none');
    });

    jQuery.each(meta_options, function (index, value) {
        if (jQuery(meta_options[index].meta_option).is(':checked')) {
            jQuery(meta_options[index].meta_box).css('display', 'block');
        }
    });

    var meta_selection = jQuery('#post-formats-select input');
    meta_selection.change(function () {
        var current_selection = jQuery(this).val();
        jQuery.each(meta_options, function (index, value) {
            jQuery(meta_options[index].meta_box).css('display', 'none');

            if (current_selection == meta_options[index].meta_type) {
                jQuery(meta_options[index].meta_box).css('display', 'block');
            }

        });
    });
});
