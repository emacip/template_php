<?php if ( inafx_theme_option( 'opt_show_post_social_share' ) != 0 ) : ?>
<!-- ## post-social start ## -->
<div class="row post-social">
    <div class="col-sm-12">
        <!-- ## inline list start ## -->
        <ul class="list-inline">
            <?php
                $permalink = get_permalink( get_the_ID() );
                $title = get_the_title();
            ?>
            <?php if ( inafx_theme_option( 'opt_show_social_facebook' ) != 0 ) : ?>
            <!-- ## facebook ## -->
            <li><a class="fa fa-facebook" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php echo $permalink;?>','Facebook','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" href="http://www.facebook.com/sharer.php?u=<?php echo $permalink;?>"></a></li>
            <?php endif; ?>
            <?php if ( inafx_theme_option( 'opt_show_social_twitter' ) != 0 ) : ?>
            <!-- ## twitter ## -->
            <li><a class="fa fa-twitter" onclick="window.open('http://twitter.com/share?url=<?php echo $permalink; ?>&amp;text=<?php echo str_replace(" ", "%20", $title); ?>','Twitter share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" href="http://twitter.com/share?url=<?php echo $permalink; ?>&amp;text=<?php echo str_replace(" ", "%20", $title); ?>"></a></li>
            <?php endif; ?>
            <?php if ( inafx_theme_option( 'opt_show_social_googleplus' ) != 0 ) : ?>
            <!-- ## google-plus ## -->
            <li><a class="fa fa-google-plus" onclick="window.open('https://plus.google.com/share?url=<?php echo $permalink; ?>','Google plus','width=585,height=666,left='+(screen.availWidth/2-292)+',top='+(screen.availHeight/2-333)+''); return false;" href="https://plus.google.com/share?url=<?php echo $permalink; ?>"></a></li>
            <?php endif; ?>
            <?php if ( inafx_theme_option( 'opt_show_social_digg' ) != 0 ) : ?>
            <!-- ## digg ## -->
            <li><a class="fa fa-digg" onclick="window.open('http://www.digg.com/submit?url=<?php echo $permalink; ?>','Digg','width=715,height=330,left='+(screen.availWidth/2-357)+',top='+(screen.availHeight/2-165)+''); return false;" href="http://www.digg.com/submit?url=<?php echo $permalink; ?>"></a></li>
            <?php endif; ?>
            <?php if ( inafx_theme_option( 'opt_show_social_reddit' ) != 0 ) : ?>
            <!-- ## reddit ## -->
            <li><a class="fa fa-reddit" onclick="window.open('http://reddit.com/submit?url=<?php echo $permalink; ?>&amp;title=<?php echo str_replace(" ", "%20", $title); ?>','Reddit','width=617,height=514,left='+(screen.availWidth/2-308)+',top='+(screen.availHeight/2-257)+''); return false;" href="http://reddit.com/submit?url=<?php echo $permalink; ?>&amp;title=<?php echo str_replace(" ", "%20", $title); ?>"></a></li>
            <?php endif; ?>
            <?php if ( inafx_theme_option( 'opt_show_social_linkedin' ) != 0 ) : ?>
            <!-- ## linkedin ## -->
            <li><a class="fa fa-linkedin" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $permalink; ?>','Linkedin','width=863,height=500,left='+(screen.availWidth/2-431)+',top='+(screen.availHeight/2-250)+''); return false;" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $permalink; ?>"></a></li>
            <?php endif; ?>
            <?php if ( inafx_theme_option( 'opt_show_social_pinterest' ) != 0 ) : ?>
            <!-- ## pinterest ## -->
            <li><a class="fa fa-pinterest" href="javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;http://assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)());"></a></li>
            <?php endif; ?>
            <?php if ( inafx_theme_option( 'opt_show_social_stumbleupon' ) != 0 ) : ?>
            <!-- ## stumbleupon ## -->
            <li><a class="fa fa-stumbleupon" onclick="window.open('http://www.stumbleupon.com/submit?url=<?php echo $permalink; ?>&amp;title=<?php echo str_replace(" ", "%20", $title); ?>','Stumbleupon','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" href="http://www.stumbleupon.com/submit?url=<?php echo $permalink; ?>&amp;title=<?php echo str_replace(" ", "%20", $title); ?>"></a></li>
            <?php endif; ?>
            <?php if ( inafx_theme_option( 'opt_show_social_delicious' ) != 0 ) : ?>
            <!-- ## delicious ## -->
            <li><a class="fa fa-delicious" href="#" onclick="window.open('http://delicious.com/save?v=5&amp;noui&amp;jump=close&amp;url='+encodeURIComponent(location.href)+'&amp;title='+encodeURIComponent(document.title), 'delicious','toolbar=no,width=550,height=550'); return false;"></a></li>
            <?php endif; ?>
            <?php if ( inafx_theme_option( 'opt_show_social_mail' ) != 0 ) : ?>
            <!-- ## mail ## -->
            <li><a class="fa fa-envelope-o" href="mailto:?Subject=<?php echo str_replace(" ", "%20", $title); ?>&amp;Body=<?php echo $permalink; ?>"></a></li>
            <?php endif; ?>
        </ul>
        <!-- ## inline list end ## -->
    </div>
</div>
<!-- ## post-social end ## -->
<?php endif; ?>