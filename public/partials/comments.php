<?php if ( comments_open() ) : ?>
    <div id="cenchat-comments" data-page-id="<?php echo get_the_ID() ?>"></div>
    <script src="https://comments.cenchat.com/embeds/1.0.0/universal.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iframe-resizer/3.5.16/iframeResizer.min.js"></script>
<?php endif; ?>