<?php
/*
 * Template Name: front-page Template
 * Description: Custom template for the homepage.
 */
get_header();
?>

    <main id="primary" class="site-main">

        <div class="custom-block-header flex-column" style="background-image:url('<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/header.jpg');">
            <span class="hyper-title"><?php echo get_theme_mod('header_title'); ?></span>
            <h1><?php echo get_theme_mod('header_description'); ?></h1>
        </div>

        <div class="blocks-content">

            <section class="block-container">

                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2>Property Listings</h2>
                        </div>
                    </div>
                        <div class="row">
                            <?php
                            // Query the latest properties in the "Villa" and "House" categories
                            $args = array(
                                'post_type'      => 'property',
                                'posts_per_page' => 4,
                                'tax_query'      => array(
                                    'taxonomy' => 'category',
                                    'field'    => 'slug',
                                    'terms'    => array( 'villa', 'house' ), // Using 'IN' operator to retrieve properties in either 'Villa' or 'House' categories
                                    'operator' => 'IN', // Use 'IN' operator to retrieve properties in either category
                                ),
                            );
                            $property_query = new WP_Query( $args );

                            // Loop through the properties
                            if ( $property_query->have_posts() ) :
                                while ( $property_query->have_posts() ) : $property_query->the_post();
                                    ?>
                                    <div class="col-sm-6 post-column">
                                        <article class="post-item h-100">
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                                <?php the_post_thumbnail('large', ['class' => 'img-fluid wp-post-image', 'loading' => 'lazy']); ?>
                                            </a>
                                            <header>
                                                <ul class="post-categories">
                                                    <?php
                                                    $categories = get_the_category();
                                                    if ($categories) {
                                                        foreach ($categories as $category) {
                                                            echo '<li><a href="' . esc_url(get_category_link($category->term_id)) . '" rel="category tag">' . esc_html($category->name) . '</a></li>';
                                                        }
                                                    }
                                                    ?>
                                                </ul>
                                                <h2><?php the_title(); ?></h2>
                                            </header>
                                            <div class="post-excerpt">
                                                <?php the_excerpt(); ?>
                                            </div>
                                            <footer>
                                                <a class="post-url" href="<?php the_permalink(); ?>">See More <i class="fa fa-long-arrow-right"></i></a>
                                            </footer>
                                        </article>
                                    </div>
                                <?php
                                endwhile;
                                wp_reset_postdata(); // Reset post data after the loop
                            else :
                                // If no properties found
                                echo '<p>No properties found.</p>';
                            endif;
                            ?>
                        </div><!-- /.row -->
                    </div><!-- /.property-listings -->

                </div>
            </section><!-- .listings -->

            <section class="block-container">

                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2>Tips form our blog</h2>
                        </div>
                    </div>
                    <div class="row">
                        <?php

                        $args = array(
                            'post_type'      => 'post',
                            'posts_per_page' => 6,
                            'category'       => get_category_by_slug( 'tips' )->term_id
                        );
                        $posts_query = new WP_Query( $args );


                        // Loop through posts
                        if ( $posts_query->have_posts() ) :
                            while ( $posts_query->have_posts() ) : $posts_query->the_post();
                                ?>
                                <div class="col-sm-6 col-md-4 post-column">
                                    <article class="post-item h-100">
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                            <?php the_post_thumbnail('large', ['class' => 'img-fluid wp-post-image', 'loading' => 'lazy']); ?>
                                        </a>
                                        <header>
                                            <ul class="post-categories">
                                                <li><a href="<?php echo esc_url(get_category_link(get_cat_ID('Tips'))); ?>" rel="category tag">Tips</a></li>
                                            </ul>
                                            <h2><?php the_title(); ?></h2>
                                            <span class="post-date"><i class="fa fa-calendar"></i><?php echo get_the_date('F j, Y'); ?></span>
                                        </header>
                                        <div class="post-excerpt">
                                            <?php the_excerpt(); ?>
                                        </div>
                                        <footer>
                                            <a class="post-url" href="<?php the_permalink(); ?>">Read More <i class="fa fa-long-arrow-right"></i></a>
                                        </footer>
                                    </article>
                                </div>
                            <?php
                            endwhile;
                            wp_reset_postdata(); // Reset post data after the loop
                        else :
                            // If no posts found
                            echo '<p>No posts found.</p>';
                        endif;
                        ?>
                    </div><!-- /.row -->

                </div>
            </section><!-- .blog-posts -->

        </div><!-- .blocks-content -->

        <section class="contact-area">
            <div class="container-lg">
                <div class="row">
                    <div class="col-sm-12">
                        <h3>Contact Form</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-7">
                        <form name="contactForm" id="contact-form" method="post" action="admin-post.php">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="fname">Your firstname *</label>
                                    <input type="text" class="form-control" id="fname" name="First name" placeholder="Enter your firstname" required>
                                    <small class="field-msg error" data-error="requiredName">Your Name is required</small>
                                </div>
                                <div class="col-sm-6">
                                    <label for="lname">Your lastName *</label>
                                    <input type="text" class="form-control" id="lname" name="Last name" placeholder="Enter your lastname" required>
                                    <small class="field-msg error" data-error="requiredNameLast">Your Last Name is required</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="email">Your email *</label>
                                    <input type="text" class="form-control" id="email" name="Email" placeholder="Enter your email" required>
                                    <small class="field-msg error" data-error="invalidEmail">The Email address is not valid</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="message">Your message for us *</label>
                                    <textarea id="message" class="form-control" name="Message" rows="5" placeholder="Enter your message" required></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="submit" class="btn-submit" value="Send Message">
                                    <!-- <span id="status"></span> -->
                                    <small class="field-msg js-form-submission">Submission in process, please wait</small>
                                    <small class="field-msg success js-form-success">Message Successfully submitted, thank you!</small>
                                    <small class="field-msg error js-form-error">There was a problem with the Contact Form, please try again!</small>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-12 col-md-5">
                        <div class="details">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatum placeat vitae, corrupti et tenetur, nesciunt tempore culpa veniam omnis odio adipisci earum quibusdam itaque tempora velit error suscipit sunt delectus accusamus? Quaerat molestias, sint officia dicta modi dignissimos nam quae quasi ipsa veritatis expedita accusamus at reiciendis laboriosam perferendis? Asperiores ipsam molestiae autem, excepturi rerum, rem soluta atque quisquam quis.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- #main -->

<?php

get_footer();
?>
