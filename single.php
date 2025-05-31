<?php get_header(); ?>

<!-- Breadcrumb -->
<section class="bg-white border-b">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2">
                <li>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="text-gray-500 hover:text-islamic-green transition duration-300">Home</a>
                </li>
                <li>
                    <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </li>
                <li>
                    <?php
                    $categories = get_the_category();
                    if ( ! empty( $categories ) ) {
                        foreach ( $categories as $index => $cat ) {
                            if ( $index > 0 ) {
                                echo '<span class="mx-1 text-gray-400">/</span>';
                            }
                            echo '<a href="' . esc_url( get_category_link( $cat->term_id ) ) . '" class="text-gray-500 hover:text-islamic-green transition duration-300">' . esc_html( $cat->name ) . '</a>';
                        }
                    }
                    ?>
                </li>
                <li>
                    <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </li>
                <li>
                    <span class="text-gray-900 font-medium">Current post</span>
                </li>
            </ol>
        </nav>
    </div>
</section>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<!-- Article Content -->
<article class="py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Article Header -->
        <header class="mb-8">
            <div class="flex items-center mb-4">
                <?php
                $categories = get_the_category();
                if ( ! empty( $categories ) ) {
                    echo '<span class="bg-islamic-green text-white px-4 py-2 rounded-full text-sm font-medium">' . esc_html( $categories[0]->name ) . '</span>';
                }
                ?>
                <span class="text-gray-500 text-sm my-4"><?php echo get_the_date(); ?></span>
                <span class="text-gray-500 text-sm my-4">•</span>
                <span class="text-gray-500 text-sm my-4">
                    <?php
                    $word_count = str_word_count( strip_tags( get_the_content() ) );
                    $reading_time = ceil( $word_count / 200 );
                    echo $reading_time . ' min read';
                    ?>
                </span>
            </div>
            <h1 class="text-4xl md:text-3xl font-bold text-gray-900 mb-6 leading-tight"><?php the_title(); ?></h1>
            <?php if ( has_excerpt() ) : ?>
                <p class="text-xl text-gray-600 leading-relaxed"><?php the_excerpt(); ?></p>
            <?php endif; ?>
        </header>

        <!-- Author Info -->
        <!-- <div class="flex items-center mb-8 p-6 bg-white rounded-lg shadow-md">
            <?php echo get_avatar( get_the_author_meta( 'ID' ), 80, '', get_the_author(), array( 'class' => 'w-20 h-20 rounded-full mr-6' ) ); ?>
            <div class="flex-1">
                <h3 class="text-lg font-semibold text-gray-900"><?php the_author(); ?></h3>
                <?php if ( get_the_author_meta( 'description' ) ) : ?>
                    <p class="text-gray-600 mb-2"><?php echo esc_html( get_the_author_meta( 'description' ) ); ?></p>
                <?php endif; ?>
                <p class="text-sm text-gray-500">
                    <?php
                    $author_id = get_the_author_meta( 'ID' );
                    $author_bio = get_user_meta( $author_id, 'bio', true );
                    if ( $author_bio ) {
                        echo esc_html( $author_bio );
                    }
                    ?>
                </p>
            </div>
            <div class="flex space-x-3">
                <?php
                $twitter = get_the_author_meta( 'twitter' );
                $linkedin = get_the_author_meta( 'linkedin' );
                if ( $twitter ) : ?>
                    <a href="<?php echo esc_url( $twitter ); ?>" class="text-gray-400 hover:text-islamic-green transition duration-300" target="_blank" rel="noopener">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                        </svg>
                    </a>
                <?php endif; ?>
                <?php if ( $linkedin ) : ?>
                    <a href="<?php echo esc_url( $linkedin ); ?>" class="text-gray-400 hover:text-islamic-green transition duration-300" target="_blank" rel="noopener">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                    </a>
                <?php endif; ?>
            </div>
        </div> -->

        <!-- Featured Image -->
        <?php if ( has_post_thumbnail() ) : ?>
            <div class="mb-8">
            <?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-96 object-cover rounded-lg shadow-lg' ) ); ?>
            <?php if ( get_post(get_post_thumbnail_id())->post_excerpt ) : ?>
                <p class="text-sm text-gray-500 mt-2 text-center"><?php echo esc_html( get_post(get_post_thumbnail_id())->post_excerpt ); ?></p>
            <?php endif; ?> 
            </div>
        <?php else : ?>
            <div class="mb-8">
            <img src="<?php echo esc_url( get_theme_file_uri('/assets/images/post-image-callback.jpg') ); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-96 object-cover rounded-lg shadow-lg">
            </div>
        <?php endif; ?>

        <!-- Article Content -->
        <div class="prose max-w-none">
            <div class="text-gray-700 leading-relaxed space-y-6"> 
                <?php the_content(); ?>
            </div>
        </div>

        <!-- Article Tags -->
        <?php $post_tags = get_the_tags(); ?>
        <?php if ( $post_tags ) : ?>
        <div class="mt-8 pt-6 border-t border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900 mb-3">Tags:</h3>
            <div class="flex flex-wrap gap-2">
                <?php foreach ( $post_tags as $tag ) : ?>
                    <span class="bg-islamic-green text-white px-3 py-1 rounded-full text-sm"><?php echo esc_html( $tag->name ); ?></span>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>

        <!-- Share Article -->
        <!-- <div class="mt-8 pt-6 border-t border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900 mb-3">Share this article:</h3>
            <div class="flex space-x-4">
                <?php
                $post_url = urlencode( get_permalink() );
                $post_title = urlencode( get_the_title() );
                ?>
                <a href="https://twitter.com/intent/tweet?url=<?php echo $post_url; ?>&text=<?php echo $post_title; ?>" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300 flex items-center" target="_blank" rel="noopener">
                    Twitter
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $post_url; ?>" class="bg-blue-800 text-white px-4 py-2 rounded-lg hover:bg-blue-900 transition duration-300 flex items-center" target="_blank" rel="noopener">
                    Facebook
                </a>
                <a href="https://wa.me/?text=<?php echo $post_title . '%20' . $post_url; ?>" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300 flex items-center" target="_blank" rel="noopener">
                    WhatsApp
                </a>
                <a href="mailto:?subject=<?php echo $post_title; ?>&body=<?php echo $post_url; ?>" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition duration-300 flex items-center">
                    Share
                </a>
            </div>
        </div> -->
    </div>
</article>

<!-- Related Articles -->
<section class="py-16 bg-white border-t">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-islamic-green mb-8 text-center">Related Articles</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php
            $related_query = new WP_Query( array(
                'category__in'   => wp_get_post_categories( get_the_ID() ),
                'post__not_in'   => array( get_the_ID() ),
                'posts_per_page' => 3,
                'ignore_sticky_posts' => 1,
            ) );
            if ( $related_query->have_posts() ) :
                while ( $related_query->have_posts() ) : $related_query->the_post(); ?>
                    <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'medium', array( 'class' => 'w-full h-48 object-cover' ) ); ?>
                        <?php else : ?>
                            <img src="<?php echo esc_url( get_theme_file_uri('/assets/images/post-image-callback.jpg') ); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-48 object-cover">
                        <?php endif; ?>
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <?php
                                $cat = get_the_category();
                                if ( ! empty( $cat ) ) {
                                    echo '<span class="bg-orange-500 text-white px-3 py-1 rounded-full text-sm font-medium">' . esc_html( $cat[0]->name ) . '</span>';
                                }
                                ?>
                                <span class="text-gray-500 text-sm my-3"><?php echo get_the_date(); ?></span>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-3 hover:text-islamic-green transition duration-300">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p class="text-gray-600 text-sm mb-4"><?php echo wp_trim_words( get_the_excerpt(), 18, '...' ); ?></p>
                            <a href="<?php the_permalink(); ?>" class="text-islamic-green hover:text-islamic-gold font-medium text-sm">Read More →</a>
                        </div>
                    </article>
                <?php endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>