<?php get_header() ?>

<style>
    .wp-block-contact-form-7-contact-form-selector {
        text-align:center;
        width: 300px !important;
        margin-right: auto !important;
        margin-left: auto !important;
        padding: 10px;
    }
    .wp-block-contact-form-7-contact-form-selector p, 
    input, textarea, .wpcf7-form-control{
        width: 290px !important;
        text-align: left;
    }
    .wpcf7-submit {
        text-align: center;
        background-color: #C4170C;
        color: white;
        border: none;
        border-radius: 10px;
        padding-top: 4px;
        padding-bottom: 4px;
    }
</style>

    <div class="container py-3 text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <?php
                    if ( have_posts() ) : 
                        while ( have_posts() ) : 
                            the_post();
                            the_content();
                        endwhile; 
                    endif; 
                ?>
            </div>
        </div>
    </div>

<?php get_footer() ?>