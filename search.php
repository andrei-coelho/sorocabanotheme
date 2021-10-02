<?php get_header() ?>

<?php if(!have_posts()): ?>

    <div class="container py-4">
        <div class="row justify-content-center pb-4">
            <div class="col-12 col-lg-3 d-none d-lg-block">
                <div class="right-top-ads">
                    <!-- promo ads -->
                    <img class="d-block mx-auto mt-2" src="<?php bloginfo('template_url') ?>/img/ads/banner1.jpg" alt="">
            
                </div>
            </div>
            <div class="col-12 col-lg-6 text-center">
                <img class="w-100" src="<?php bloginfo('template_url') ?>/img/404.png">
                <p>Não foi encontrado nenhum resultado para a busca <b><?php echo $_GET['s']; ?></b></p>
                <a href="<?php bloginfo('url') ?>" class="btn btn-primary">Voltar para home</a>
            </div>
            <div class="col-12 col-lg-3" >
                <div class="right-top-ads">
                    <!-- promo ads -->
                    <img class="d-block mx-auto mt-2" src="<?php bloginfo('template_url') ?>/img/ads/banner1.jpg" alt="">
            
                </div>
            </div>
        </div>
    </div>

    <?php else: 
    $query = new WP_Query([
        "s" => $_GET['s'],
        "posts_per_page" => 10,
        'order' => 'DESC'
    ]);
    ?> 

    <div class="container">
        <div class="row">
            <div class="col-12 my-3">
                <h3>Resultados da busca <b>"<?php echo $_GET['s'] ?>"</b></h3>
            </div>
        </div>
    </div>

    <?php
    include "inc/list_noticias.php"; 
    endif; ?>

<?php get_footer() ?>