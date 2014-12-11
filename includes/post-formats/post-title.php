<?php
    if( is_singular() ) :
        inafx_set_post_views( get_the_ID() );
    endif;
?>
<!-- ## post-header start ## -->
<header class="post-header">
    <!-- ## post-title ## -->
    <h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
</header>
<!-- ## post-header end ## -->