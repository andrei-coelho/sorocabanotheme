<div class="container">
    
    <div class="row">
        
        <div class="col-12 col-lg-9">

            <?php while($query->have_posts()): $query->the_post();  if(get_post_type() == "page") continue; ?>

            <a href="<?php the_permalink(); ?>">

                <div class="noticia-simples-item-list">

                    <div class="row border-bottom pb-2 mt-2">
                        <div class="col-12 col-md-4 img-not-simples" style="background-image:url('<?php echo get_the_post_thumbnail_url(); ?>')"></div>
                        <div class="col-12 col-md-8">
                            <span><?php 
                                $cats = get_the_category();
                                $catI = count($cats)-1;
                                echo $cats[$catI]->name;
                            ?></span>
                            <h5 class="text-primary"><?php the_title(); ?></h5>
                            <p class="text-dark"><?php echo get_the_excerpt(); ?></p>
                            
                        </div>

                    </div>

                </div>

            </a>

            <?php endwhile; ?>
            
        </div>

        <div class="col-12 col-lg-3 mt-2">

            <div class="categories-news w-100 p-2 bg-white">

                <h5 class="ps-4">+ Sobre</h5>
                <ul>
                    <li><a href="#"><span class="fs-5" style="color:#FF6633">• Economia</span></a></li>
                    <li><a href="#"><span class="fs-5" style="color:#990000">• Prefeitura</span></a></li>
                    <li><a href="#"><span class="fs-5" style="color:#99CC66">• Meio Ambiente</span></a></li>
                    <li><a href="#"><span class="fs-5" style="color:#FF0066">• COVID-19</span></a></li>
                </ul>

            </div>

            <div class="right-ads mt-2">
                <!-- promo ads -->
                <img class="d-block mx-auto" src="<?php bloginfo('template_url') ?>/img/ads/banner2.jpg" alt="">

            </div>

        </div>
    
    </div>
    

</div>