<?php 

    $query = new WP_Query([
        "cat" => get_query_var('cat'),
        "posts_per_page" => 10,
        'order' => 'DESC'
    ]);
    get_header();
    include "inc/list_noticias.php";
    get_footer();

