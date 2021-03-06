<?php get_header(); ?>

<div class="container">
    <div class="row justify-content-center py-2">
        <div class="col-12 col-md-9">
            <ins class="adsbygoogle"
                style="display:block"
                data-ad-client="ca-pub-3525801060658547"
                data-ad-slot="8306961393"
                data-ad-format="auto"
                data-full-width-responsive="true"></ins>
        </div>
    </div>
</div>

<?php while(have_posts()): the_post(); ?>

<div class="container">

    <div class="row justify-content-center border-bottom  mb-3">

        <div class="col-12 col-md-9 text-center py-3 ">
            <span class="bg-primary p-2 text-white"><?php 
                $cats = get_the_category();
                $catI = count($cats)-1;
                $objCat = $cats[$catI];
                $category = $objCat->name;
                $catId = $objCat->term_id;
                echo $category;
            ?></span>
            <h1 class="mt-2"><?php the_title(); ?></h1>
            <p class="fs-5"><?php echo get_the_excerpt(); ?></p>
            <small><?php the_time('d/m/Y'); ?></small>
        </div>

    </div>

    <div class="row">

        <div class="col-12 p-0">
            <img class="w-100" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
        </div>

    </div>

    <div class="row pt-3">
        <div class="col-12 col-md-8 fs-5">
            <?php the_content(); ?>
        </div>
        <div class="ol-12 col-md-4">
            <div class="right-ads mt-2">

            <ins class="adsbygoogle"
                    style="display:block"
                    data-ad-client="ca-pub-3525801060658547"
                    data-ad-slot="1964203883"
                    data-ad-format="auto"
                    data-full-width-responsive="true"></ins>
            </div>
        </div>
    </div>

</div>

<?php endwhile; ?>

<?php 

    $idPost = get_the_ID();

    $query = new WP_Query([
        'cat' => $catId,
        'post__not_in' => [$idPost],
        "posts_per_page" => 3,
        'order' => 'DESC'
    ]);

    if(!$query->have_posts()){

        $prt = $objCat->parent;
        while ($prt != 0) {
            $parent = get_term($objCat->parent);
            $prt = $parent->parent;
        }

        $objCat = $parent;

        $query = new WP_Query([
            'post__not_in' => [$idPost],
            "posts_per_page" => 3,
            'order' => 'DESC'
        ]);

        $maisDe = $objCat -> name;
    
    } else {
        $maisDe = $category;
    }

?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>+ <a href="<?php echo get_category_link($objCat);  ?>"><?php echo $maisDe; ?></a>...</h1>
        </div>
    </div>
</div>

<?php  

    $api_post_offset = $query->post_count;
    $api_not_in = $idPost;
    $api_category_name = $maisDe;
    include("inc/list_noticias.php");

?>

<?php get_footer(); ?>