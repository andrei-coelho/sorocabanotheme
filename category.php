<?php 

    $category_id = get_query_var('cat');
    
    $query = new WP_Query([
        "cat" => $category_id,
        "posts_per_page" => 6,
        'order' => 'DESC'
    ]);
    get_header();
    $api_post_offset = 6;
    $api_category_name =  get_cat_name($category_id);
    include "inc/list_noticias.php";
    get_footer();

