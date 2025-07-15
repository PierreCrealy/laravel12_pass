
import $ from 'jquery';

window.App = window.App || {};

(function ($, window, App) {
    'use strict';

    App.credential = {
        init: function () {

            $('.open-credential-modal').on('click', this.openCredentialModal)

        },
        openCredentialModal: function()
        {
            const $btn = $(this)

            $("input[name=id]").val($btn.data('id'))
            $("input[name=name]").val($btn.data('name'))
            $("input[name=value]").val($btn.data('value'))
            $("select[name=repertory_id]").val($btn.data('repertory-id'))


            $("[data-flux-checkbox]").each(function () {
                const $checkbox = $(this);
                if ($checkbox.attr('aria-checked') === 'true') {
                    $checkbox.trigger('click');
                }
            });

            $btn.data('tags').forEach(function (tagId) {
                const $checkbox = $("[data-flux-checkbox][value='" + tagId + "']");
                if ($checkbox.attr('aria-checked') === 'false') {
                    $checkbox.trigger('click');
                }
            });

        },
    };
})($, window, window.App);

$(document).ready(function () {

    if($('body.credentialsPage').length)
    {
        window.App.credential.init();
    }
});
