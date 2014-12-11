<!-- ## entry-content start ## -->
<div class="col-sm-12 entry-content">
<?php
    $content = get_the_content();
    if (has_excerpt()) {
        the_excerpt();
    } else {
        echo $content;
    }
?>
</div>
<!-- ## entry-content end ## -->