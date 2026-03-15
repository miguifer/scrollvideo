/* Scroll Video — Admin JS */
(function ($) {
    'use strict';

    var i18n = window.scrollvideoAdmin || {};

    /* ── Select shortcode text on focus ──────────────────── */
    $(document).on('focus', '#sv_shortcode_field', function () {
        this.select();
    });

    /* ── Media uploader for video field ─────────────────── */
    $(document).on('click', '.sv-upload-btn', function (e) {
        e.preventDefault();

        var targetId = $(this).data('target');
        var $input   = $('#' + targetId);

        var frame = wp.media({
            title: i18n.mediaTitle || 'Select or Upload Video',
            library: { type: 'video' },
            multiple: false
        });

        frame.on('select', function () {
            var attachment = frame.state().get('selection').first().toJSON();
            $input.val(attachment.url);
        });

        frame.open();
    });

    /* ── Copy shortcode to clipboard ────────────────────── */
    $(document).on('click', '.sv-copy-shortcode', function () {
        var $field = $('#sv_shortcode_field');
        var $btn   = $(this);
        if (!$field.length) return;

        var text = $field.val();
        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(text).then(function () {
                $btn.text(i18n.copied || 'Copied!');
                setTimeout(function () { $btn.text(i18n.copyLabel || 'Copy Shortcode'); }, 2000);
            });
        } else {
            $field[0].select();
            document.execCommand('copy');
            $btn.text(i18n.copied || 'Copied!');
            setTimeout(function () { $btn.text(i18n.copyLabel || 'Copy Shortcode'); }, 2000);
        }
    });

})(jQuery);
