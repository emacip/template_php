<?php
    $edit_link = get_edit_post_link();
    if ( !empty($edit_link) ) :
?>
<!-- ## entry-edit link start ## -->
<div class="col-sm-12 entry-edit">
    <a class="btn btn-warning btn-edit-link" href="<?php echo $edit_link; ?>"><span class="fa fa-edit"></span> <?php echo theme_locals( 'edit' ); ?></a>
</div>
<!-- ## entry-edit link end ## -->
<?php endif; ?>