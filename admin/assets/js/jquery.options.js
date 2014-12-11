jQuery(document).ready(function ($) {
    var inafx_options = inafx_theme.inafx_options_var;
    var hidden_opt_header_ephemera_posts = $('<input name="' + inafx_options + '[opt_header_ephemera_posts][]" id="opt_header_ephemera_posts-select" type="hidden" value="' + redux.options.opt_header_ephemera_posts + '" />')
    $('#' + inafx_options + '-opt_header_ephemera_posts').append(hidden_opt_header_ephemera_posts);
    $('#' + inafx_options + '-opt_header_ephemera_posts > strong').remove();
    hidden_opt_header_ephemera_posts.select2(
        {
            multiple: true,
            width: '450px',
            minimumInputLength: 3,
            ajax: {
                url: inafx_theme.ajaxurl + '?action=inafx_hook_themeoptions_ajax_search',
                dataType: 'json',
                data: function (term, page) {
                    return {
                        q: term,
                        page_limit: 10
                    };
                },
                results: function (data, page) {
                    return { results: data };
                }
            },
            initSelection: function (element, callback) {
                var id = $(element).val();

                if (id !== "") {
                    $.ajax(inafx_theme.ajaxurl + '?action=inafx_hook_themeoptions_ajax_search', {
                        data: {
                            posts: id
                        },
                        dataType: "json"
                    }).done(function (data) { callback(data); });
                }
            }
        }
    );

    hidden_opt_header_ephemera_posts.select2("container").find("ul.select2-choices").sortable({
        containment: 'parent',
        start: function () { hidden_opt_header_ephemera_posts.select2("onSortStart"); },
        update: function () { hidden_opt_header_ephemera_posts.select2("onSortEnd"); }
    });

});
