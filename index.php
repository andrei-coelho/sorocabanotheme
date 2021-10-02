<?php get_header(); ?>


<div class="container">

    <div class="row pt-2">
        
        <div class="col-12 col-lg-7 bg-primary">
            <!-- duas noticias aqui -->
            <div class="row p-3">
                <?php 
                    $query = new WP_Query([
                        "posts_per_page" => 10,
                        'order' => 'DESC'
                    ]);
                    $count = 0;
                    while($query->have_posts()){
                        if($count == 2) break;
                        $query->the_post(); 
                        if(get_post_type() == "page") continue;  
                ?>
               
                    <a href="<?php the_permalink() ?>" class="p-1 not-link"><div class="col-12 noticia-principal p-0"
                        style="background-image:url('<?php echo get_the_post_thumbnail_url(); ?>'"
                    >
                        <div class="not-background p-3">
                            
                            <div class="not-separator w-100"></div>
                            <span class="p-2 bg-primary text-white"><?php 
                                $cats = get_the_category();
                                $catI = count($cats)-1;
                                echo $cats[$catI]->name;
                            ?></span>
                            <h4 class="text-white shadow mt-3"><?php the_title(); ?></h4>

                        </div>    

                    </div></a> 

                <?php 
                        $count++;
                    }
                ?>


            </div>

        </div>
        
        <div class="col-12 col-lg-5 ">
            <!-- promo ads -->
            <div class="right-top-ads">
                <img class="d-block mx-auto mt-2" src="<?php bloginfo('template_url') ?>/img/ads/banner1.jpg" alt="">
        
            </div>
            
        </div>

    </div>

</div>

<div class="container-fluid mt-3"></div>

<?php include("inc/list_noticias.php") ?>

<?php get_footer(); ?>