<?php get_header(); ?>

<div class="container">
    <div class="row justify-content-center py-2">
        <div class="col-12 col-md-9">
            <a href="#">
                <!-- promo ads -->
                <img class="d-block mx-auto w-100" src="<?php bloginfo('template_url') ?>/img/ads/banner3.jpg" alt="">

            </a>
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

                <img class="d-block mx-auto" src="<?php bloginfo('template_url') ?>/img/ads/banner2.jpg" alt="">

            </div>
        </div>
    </div>

</div>

<?php endwhile; ?>

<?php 
    $query = new WP_Query([
        'cat' => $catId,
        'post__not_in' => [get_the_ID()],
        "posts_per_page" => 4,
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
            'post__not_in' => [get_the_ID()],
            "posts_per_page" => 4,
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

<?php  include("inc/list_noticias.php");?>

<?php get_footer(); ?>