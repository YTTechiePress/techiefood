<?php

get_header();

?>
<div class="container-fluid full-width-container">
    <img alt="" class="image-fluid" src="<?php header_image(); ?>" />
</div>

<div class="container-fluid pt-2 pb-2">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-6">

             <?php
                $products_cats = array();

                $args = array(
                    'post_type'      => 'product',
                    'posts_per_page' => -1,
                );

                $products = new WP_Query( $args );

                if ( $products->have_posts() ) {

                    while( $products->have_posts() ) {
                        $products->the_post();

                        $products_categories = get_the_terms( get_the_id(), 'product_cat' );

                        foreach( $products_categories as $product_category ) {
                            if ( ! in_array( $product_category->name, $products_cats, true ) ) {
                                array_push( $products_cats, $product_category->name );
                            }
                        }
                    }
                    ?>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <?php
                            $counter = 0;
                            $class   = '';

                            foreach( $products_cats as $key => $products_cat ) {
                                $counter++;
                                if ( $counter == 1 ) {
                                    $class = 'active';
                                } else {
                                    $class = '';
                                }
                                ?>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link <?php echo $class;?>" id="<?php echo $products_cat; ?>-tab" data-toggle="tab" href="#<?php echo $products_cat; ?>" role="tab" aria-controls="<?php echo $products_cat; ?>" aria-selected="false"><?php echo $products_cat; ?></a>
                                    </li>
                                <?php
                            }
                            
                        ?>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <?php
                            $counter = 0;
                            $class   = '';

                            foreach( $products_cats as $key => $products_cat ) {
                                $counter++;
                                if ( $counter == 1 ) {
                                    $class = 'show active';
                                } else {
                                    $class = '';
                                }
                                ?>
                                    <div class="tab-pane fade <?php echo $class;?>" id="<?php echo $products_cat; ?>" role="tabpanel" aria-labelledby="<?php echo $products_cat; ?>-tab">
                                        <?php
                                            $args = array(
                                                'post_type' => 'product',
                                                'posts_per_page' => -1,
                                                'tax_query'      => array(
                                                    array(
                                                        'taxonomy' => 'product_cat',
                                                        'field'    => 'slug',
                                                        'terms'    => array( $products_cat ),
                                                        'operator' => 'IN'
                                                    )
                                                ),
                                            );

                                            $div_products = new WP_Query( $args );

                                            if ( $div_products->have_posts() ) {

                                                while( $div_products->have_posts() ) {
                                                    $div_products->the_post();

                                                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'thumbnail' );

                                                    ?>
                                                        <div class="row">

                                                            <div class="col-4">
                                                                <img src="<?php echo $image[0]; ?>" alt="<?php echo wp_get_attachment_caption( get_the_ID() )?>">
                                                            </div>

                                                            <div class="col-7">
                                                                <h3><?php echo get_the_title(); ?></h3>
                                                                <p><?php echo get_the_title(); ?></p>
                                                            </div>

                                                            <div class="col-1">
                                                                <?php wc_get_template( 'loop/price.php' ); ?>
                                                                <?php wc_get_template( 'loop/add-to-cart.php' ); ?>
                                                            </div>

                                                        </div>
                                                    <?php
                                                       
                                                }
                                            }

                                            wp_reset_postdata();
                                        ?>
                                    
                                    </div>
                                <?php
                            }
                            
                        ?>
                    </div>
                    <?php
                } else {
                    esc_attr_e( 'No products listed in the Admin', 'techiefood' );
                }

                wp_reset_postdata();
            ?>
            
        </div>
        <div class="col-2 orange-background">
            <div class="cartcontents">
                <div class="widget_shopping_cart_content">
                    <?php
                        woocommerce_mini_cart();
                        // wc_get_template( 'cart/mini-cart.php' );
                    ?>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>

<?php

get_footer();