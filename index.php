<?php get_header(); ?>

<div class="container">

    <div class="row">
        <div class="col-12">
             <!-- topo da noticia e da home -->
             <ins class="adsbygoogle"
                style="display:block"
                data-ad-client="ca-pub-3525801060658547"
                data-ad-slot="8306961393"
                data-ad-format="auto"
                data-full-width-responsive="true"></ins>
        </div>
    </div>

    <?php

        $query = new WP_Query([
            "posts_per_page" => 5,
            'order' => 'DESC',
            'post_type' => 'post'
        ]);
    
    ?>

    <div class="row pt-2">

        <div class="col-12 col-lg-6 pt-4">
           <?php 
            while($query->have_posts()){
                $query->the_post(); 
            ?>
            <a href="<?php the_permalink() ?>" class="p-1 not-link">
            
            <span class="p-2 bg-primary text-white"><?php 
                $cats = get_the_category();
                $catI = count($cats)-1;
                echo $cats[$catI]->name;
            ?></span>
            <img class="w-100 mt-2" src="<?php the_post_thumbnail_url(); ?>">
            <h2 class="mt-3 text-dark"><?php 
                // criar um crop para cortar o título se ele passar de 103 caracteres    
                the_title(); 
            ?></h2>    
            
            </a> 

            <?php break; } ?>
        </div>
        
        <div class="col-12 col-lg-6 bg-primary">
            <!-- duas noticias aqui -->
            <div class="row p-3">
                <?php 
                    $count = 0;
                    while($query->have_posts()){
                        if($count == 2) break;
                        $query->the_post(); 
                ?>
               
                <a href="<?php the_permalink() ?>" class="p-1 not-link">
                <div class="col-12 noticia-principal p-0"
                    style="background-image:url('<?php echo get_the_post_thumbnail_url(); ?>'"
                >
                    <div class="not-background p-3">
                        
                        <div class="not-separator w-100"></div>
                        <span class="p-2 bg-primary text-white"><?php 
                            $cats = get_the_category();
                            $catI = count($cats)-1;
                            echo $cats[$catI]->name;
                        ?></span>
                        <h2 class="text-white titulo-chamada-destaque mt-3"><?php 
                            // criar um crop para cortar o título se ele passar de 103 caracteres    
                            the_title(); 
                        ?></h2>

                    </div>    

                </div></a> 

                <?php $count++; } ?>

            </div>

        </div>

    </div>

</div>

<div class="container-fluid mt-3"></div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>+ <a href="<?php echo get_site_url();  ?>/category/noticias/">Notícias</a>...</h1>
        </div>
    </div>
</div>

<?php 

    $api_post_offset   = 5;
    // $api_category_name = 3;
    // $api_category_name =  "noticias";
    include("inc/list_noticias.php"); 

?>

<?php get_footer(); ?>