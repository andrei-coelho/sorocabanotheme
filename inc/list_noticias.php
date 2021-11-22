<div class="container">
    
    <div class="row">
    
        <div class="col-12 col-lg-9">

            <div id="mais-noticias-sorocabanas">

                <div class="noticia-simples-item-list">
                    <ins class="adsbygoogle"
                        style="display:block"
                        data-ad-format="fluid"
                        data-ad-layout-key="-fb+5w+4e-db+86"
                        data-ad-client="ca-pub-3525801060658547"
                        data-ad-slot="2889616207"></ins>
                </div>

                <?php 
                $postc = 0;
                while($query->have_posts()): $query->the_post();  if(get_post_type() == "page") continue; $postc++; ?>

                <a href="<?php the_permalink(); ?>">

                    <div class="noticia-simples-item-list">

                        <div class="row border-top pt-2 mt-2">
                            <div class="col-12 col-md-4 img-not-simples" style="background-image:url('<?php echo get_the_post_thumbnail_url(); ?>')"></div>
                            <div class="col-12 col-md-8">
                                <span class="p-1 bg-primary text-white"><?php 
                                    $cats = get_the_category();
                                    $catI = count($cats)-1;
                                    echo $cats[$catI]->name;
                                ?></span>
                                <h5 class="text-primary mt-1"><?php the_title(); ?></h5>
                                <p class="text-dark"><?php echo get_the_excerpt(); ?></p>
                                
                            </div>

                        </div>

                    </div>

                </a>

                <?php if($postc === 3): $postc = 0; ?>
                <div class="noticia-simples-item-list">
                    
                    <ins class="adsbygoogle"
                        style="display:block"
                        data-ad-format="fluid"
                        data-ad-layout-key="-fb+5w+4e-db+86"
                        data-ad-client="ca-pub-3525801060658547"
                        data-ad-slot="2889616207"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
                <?php endif; endwhile; ?>
            </div>
            
            <div class="col-12 py-2">
            <button id="spinnerMaisNoticiasSorocabanas" class="btn btn-primary w-100" style="display:none;" type="button" disabled>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                aguarde...
            </button>
                <button id="btnMaisNoticiasSorocabanas" type="button" class="btn btn-primary w-100">VEJA MAIS ...</button>
            </div>

        </div>

        <div class="col-12 col-lg-3 mt-2">
            <!-- menu para outras categorias
            <div class="categories-news w-100 p-2 bg-white">

                <h5 class="ps-4">+ Sobre</h5>
                <ul>
                    <li><a href="#"><span class="fs-5" style="color:#FF6633">• Economia</span></a></li>
                    <li><a href="#"><span class="fs-5" style="color:#990000">• Prefeitura</span></a></li>
                    <li><a href="#"><span class="fs-5" style="color:#99CC66">• Meio Ambiente</span></a></li>
                    <li><a href="#"><span class="fs-5" style="color:#FF0066">• COVID-19</span></a></li>
                </ul>

            </div>
            -->
            <div class="right-ads mt-2">
                <!-- promo ads -->
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

<script>

    const   maisNoticiasDiv = document.getElementById("mais-noticias-sorocabanas"),
            btnMaisNoticias = document.getElementById("btnMaisNoticiasSorocabanas"),
            spinnerNLoading = document.getElementById("spinnerMaisNoticiasSorocabanas"),

            __hide_spn = _ => spinnerNLoading.style.display = "none",
            __show_spn = _ => spinnerNLoading.style.display = "block",
            __hide_btn = _ => btnMaisNoticias.style.display = "none",
            __show_btn = _ => btnMaisNoticias.style.display = "block",
            
            confNews = { 
                method: 'GET',
                mode: 'cors',
                cache: 'default'
            },

            config_post_assinc = {
                posts_per_page: 
                    <?php 
                       isset($api_post_per_page) 
                    ?  (function($api_post_per_page){echo $api_post_per_page;})($api_post_per_page) 
                    :  (function(){echo 3;})();
                    ?>,
                category_name:
                    "<?php 
                       isset($api_category_name) 
                    ?  (function($api_category_name){echo $api_category_name;})($api_category_name) 
                    :  (function(){echo "noticias";})();
                    ?>",
                offset:
                    <?php 
                       isset($api_post_offset) 
                    ?  (function($api_post_offset){echo $api_post_offset;})($api_post_offset) 
                    :  (function(){echo 3;})();
                    ?>,
                not_in:
                    <?php 
                       isset($api_not_in) 
                    ?  (function($api_not_in){echo $api_not_in;})($api_not_in) 
                    :  (function(){echo 0;})();
                    ?>,

            };

    var search_status = false;

    <?php if(isset($api_search)): ?>
    config_post_assinc['s'] = "<?php echo $api_search; ?>";
    search_status = true;
    <?php endif; ?>

    var URL_API  = `<?php bloginfo('url'); ?>/wp-json/sapi/v0/posts`;
        URL_API  += `?posts_per_page=${config_post_assinc.posts_per_page}`;
        URL_API  += `&category_name=${config_post_assinc.category_name}`;
    
    if(search_status){
        URL_API  += `&s=${config_post_assinc.s}`;
    }

    var post_actual_page = 1;
    
    btnMaisNoticias.addEventListener("click", e => {
        
        e.preventDefault();
        __show_spn();
        __hide_btn();

        post_actual_page++;
        const newLink = `${URL_API}&paged=${post_actual_page}&offset=${config_post_assinc.offset}&not_in=${config_post_assinc.not_in}`;

        console.log(newLink);

        fetch(newLink,confNews)
        .then(function(response) {
            return response.json();
        })
        .then(function(json) {
            
            __hide_spn();
            if(json.length == 0) return;
            __show_btn();

            config_post_assinc.offset += config_post_assinc.posts_per_page;
            maisNoticiasDiv.innerHTML += ___create_news_sorocabanas_in_list(json);

        });

    })


    const __template_new_sorocabano = (link, category, image,  title, excerpt) => {
        return `
        <a href="${link}">
            <div class="noticia-simples-item-list">
                <div class="row border-bottom pb-2 mt-2">
                    <div class="col-12 col-md-4 img-not-simples" style="background-image:url('${image}')"></div>
                    <div class="col-12 col-md-8">
                        <span class="p-1 bg-primary text-white">${category}</span>
                        <h5 class="text-primary mt-1">${title}</h5>
                        <p class="text-dark">
                            ${excerpt}
                        </p>
                    </div>
                </div>
            </div>
        </a>
        `;
    }


    const __template_ads_list = _ => 
    `<div class="noticia-simples-item-list">
        <ins class="adsbygoogle"
            style="display:block"
            data-ad-format="fluid"
            data-ad-layout-key="-fb+5w+4e-db+86"
            data-ad-client="ca-pub-3525801060658547"
            data-ad-slot="2889616207"></ins>
    </div>`;


    function ___create_news_sorocabanas_in_list(data){

        let template = "";

        data.forEach(el => {
            template += 
                __template_new_sorocabano(
                    el.link, 
                    el.category,
                    el.image,
                    el.title,
                    el.excerpt
                );
        });

        template += __template_ads_list();
        return template;
    }
    
</script>