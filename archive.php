<?php get_header(); ?>

<?php
// Reusable article template for grid posts
function islamic_news_grid_article($post) {
    ?>
    <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-900 px-8 pt-80 pb-8 sm:pt-48 lg:pt-80 h-full">
        <?php if ($post['has_thumb']): ?>
            <img src="<?php echo esc_url($post['thumbnail']); ?>" alt="<?php echo esc_attr($post['title']); ?>" class="absolute inset-0 -z-10 size-full object-cover">
        <?php else: ?>
            <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/post-image-callback.jpg')); ?>" alt="<?php echo esc_attr($post['title']); ?>" class="absolute inset-0 -z-10 size-full object-cover">
        <?php endif; ?>
        <div class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
        <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-gray-900/10 ring-inset"></div>
        <div class="flex flex-wrap items-center gap-y-1 overflow-hidden text-sm/6 text-gray-300">
            <!-- You can add post meta here if needed -->
        </div>
        <h3 class="mt-3 text-lg/6 font-semibold text-white">
            <a href="<?php echo esc_url($post['permalink']); ?>">
                <span class="absolute inset-0"></span>
                <?php echo esc_html($post['title']); ?>
            </a>
        </h3>
        <p class="text-gray-200 mt-2"><?php echo esc_html($post['excerpt']); ?></p>
    </article>
    <?php 
}
?>


<!-- Islamic Decorative Header -->
<div class="w-full bg-islamic-green py-2">
    <div class="max-w-7xl mx-auto">
        <div class="islamic-pattern h-8 opacity-20"></div>
    </div>
</div>

<!-- Blog Posts Grid -->
<section class="py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Archive Title, Count, and Description -->
                <div class="mb-10">
                    <h1 class="text-3xl font-extrabold text-gray-900 mb-2 flex items-center gap-3">
                        <?php 
                        if (is_category()) {
                            single_cat_title('', true);
                        } else {
                            the_archive_title();
                        } 
                        ?>
                        <span class="inline-flex items-center justify-center bg-islamic-green text-white text-base font-semibold rounded-full px-3 py-1">
                            <?php echo $wp_query->found_posts; ?> <?php echo islamic_news_translate('Posts'); ?>
                        </span>
                    </h1>
                    <?php if (get_the_archive_description()) : ?>
                        <div class="text-gray-600 text-lg mb-2">
                            <?php echo get_the_archive_description(); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="space-y-8">
                    <?php
                    // Archive posts
                    // Query the current archive posts
                    $featured_args = [
                        'posts_per_page' => 1,
                        'ignore_sticky_posts' => 1,
                        'post_type' => get_post_type(),
                        'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
                    ];

                    // If this is a category/tag/taxonomy archive, filter by term
                    if (is_category() || is_tag() || is_tax()) {
                        $featured_args['tax_query'] = [
                            [
                                'taxonomy' => get_queried_object()->taxonomy,
                                'field'    => 'term_id',
                                'terms'    => get_queried_object_id(),
                            ]
                        ];
                    }

                    $featured_query = new WP_Query($featured_args);
                    if ($featured_query->have_posts()) :
                        while ($featured_query->have_posts()) : $featured_query->the_post(); ?>
                            <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large', ['class' => 'w-full h-64 object-cover']); ?>
                                <?php else : ?>
                                    <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/post-image-callback.jpg')); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-64 object-cover">
                                <?php endif; ?>
                                <div class="p-6">
                                    <div class="flex items-center mb-3">
                                        <span class="bg-islamic-green text-white px-3 py-1 rounded-full text-sm font-medium"><?php echo islamic_news_translate('Featured'); ?></span>
                                        <span class="text-gray-500 text-sm mx-3"><?php echo get_the_date(); ?></span>
                                        <span class="text-gray-500 text-sm mx-3">•</span>
                                        <span class="text-gray-500 text-sm mx-3"><?php echo islamic_news_reading_time(get_the_content()); ?> min read</span>
                                    </div>
                                    <h2 class="text-2xl font-bold text-gray-900 mb-3 hover:text-islamic-green transition duration-300">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h2>
                                    <p class="text-gray-600 mb-4"><?php echo get_the_excerpt(); ?></p>
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <?php echo get_avatar(get_the_author_meta('ID'), 40, '', '', ['class' => 'w-10 h-10 rounded-full mx-3']); ?>
                                            <div>
                                                <p class="text-sm font-medium text-gray-900"><?php the_author(); ?></p>
                                                <p class="text-sm text-gray-500"><?php echo get_the_author_meta('description'); ?></p>
                                            </div>
                                        </div>
                                        <a href="<?php the_permalink(); ?>" class="bg-islamic-green hover:bg-green-800 text-white px-4 py-2 rounded-lg font-medium transition duration-300"><?php echo islamic_news_read_article_text(); ?></a>
                                    </div>
                                </div>
                            </article>
                        <?php endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>

                    <!-- Regular Posts -->
                    <?php
                    // Exclude featured post from main loop
                    $exclude_ids = [];
                    if (isset($featured_query) && $featured_query->have_posts()) {
                        foreach ($featured_query->posts as $fp) {
                            $exclude_ids[] = $fp->ID;
                        }
                    }
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    // Query current archive posts for the main grid (excluding featured)
                    $args = [
                        'post__not_in' => $exclude_ids,
                        'posts_per_page' => 5,
                        'post_type' => get_post_type(),
                        'paged' => $paged
                    ];

                    // If this is a category/tag/taxonomy archive, filter by term
                    if (is_category() || is_tag() || is_tax()) {
                        $args['tax_query'] = [
                            [
                                'taxonomy' => get_queried_object()->taxonomy,
                                'field'    => 'term_id',
                                'terms'    => get_queried_object_id(),
                            ]
                        ];
                    }

                    $main_query = new WP_Query($args);
                    if ($main_query->have_posts()) :
                        while ($main_query->have_posts()) : $main_query->the_post(); ?>
                            <article class="bg-white rounded-xl shadow-sm hover:shadow-md overflow-hidden transition-all duration-300 border border-gray-100">
                                <div class="md:flex">
                                    <div class="md:w-2/5 relative overflow-hidden">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="h-full transform hover:scale-105 transition duration-500">
                                                <?php the_post_thumbnail('medium', ['class' => 'w-full h-56 md:h-full object-cover']); ?>
                                            </div>
                                        <?php else : ?>
                                            <div class="h-full transform hover:scale-105 transition duration-500">
                                                <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/post-image-callback.jpg')); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-56 md:h-full object-cover">
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="p-6 md:p-8 md:w-3/5">
                                        <div class="flex flex-wrap items-center gap-3 mb-4">
                                            <?php
                                            $cats = get_the_category();
                                            if ($cats) {
                                                $cat = $cats[0];
                                                $cat_colors = [
                                                    'Quran & Hadith' => 'bg-islamic-green',
                                                    'Spirituality' => 'bg-orange-500',
                                                    'Education' => 'bg-purple-500',
                                                    'Global News' => 'bg-red-500',
                                                    'Culture' => 'bg-green-500'
                                                ];
                                                $color = isset($cat_colors[$cat->name]) ? $cat_colors[$cat->name] : 'bg-gray-400';
                                                echo '<span class="' . esc_attr($color) . ' text-white px-3 py-1 rounded-full text-xs font-medium">' . esc_html($cat->name) . '</span>';
                                            }
                                            ?>
                                            <div class="flex items-center text-gray-400 text-xs">
                                                <span class="flex items-center">
                                                    <svg class="w-4 h-4 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                    </svg>
                                                    <?php echo get_the_date(); ?>
                                                </span>
                                                <span class="mx-2">•</span>
                                                <span class="flex items-center">
                                                    <svg class="w-4 h-4 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    <?php echo islamic_news_reading_time(get_the_content()); ?> min read
                                                </span>
                                            </div>
                                        </div>
                                        <h3 class="text-xl font-bold text-gray-800 mb-3 hover:text-islamic-green transition duration-300 leading-snug">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>
                                        <p class="text-gray-600 mb-5 line-clamp-2"><?php echo get_the_excerpt(); ?></p>
                                        <div class="flex items-center justify-between pt-2 border-t border-gray-100">
                                            <div class="flex items-center">
                                                <?php echo get_avatar(get_the_author_meta('ID'), 32, '', '', ['class' => 'w-8 h-8 rounded-full mx-3 ring-2 ring-gray-100']); ?>
                                                <span class="text-sm font-medium text-gray-700"><?php the_author(); ?></span>
                                            </div>
                                            <a href="<?php the_permalink(); ?>" class="inline-flex items-center text-islamic-green hover:text-islamic-gold font-medium text-sm group">
                                                <?php echo islamic_news_read_more_text(); ?>
                                                <svg class="w-4 h-4 mx-1 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        <?php endwhile;
                        // Pagination
                        ?>
                        <div class="flex justify-center mt-12">
                            <?php
                            $pagination = paginate_links([
                                'total' => $main_query->max_num_pages,
                                'prev_text' => 'Previous',
                                'next_text' => 'Next',
                                'mid_size' => 2,
                                'type' => 'array',
                            ]);
                            if ($pagination) {
                                echo '<nav class="inline-flex rounded-md shadow-sm" aria-label="Pagination">';
                                echo '<ul class="flex gap-2">';
                                foreach ($pagination as $link) {
                                    // Add Tailwind classes to <a> and <span> elements
                                    if (strpos($link, 'current') !== false) {
                                        // Current page
                                        $link = str_replace(
                                            '<span',
                                            '<span class="z-10 bg-islamic-green border-islamic-green text-white relative inline-flex items-center px-4 py-2 border text-sm font-semibold rounded"',
                                            $link
                                        );
                                    } elseif (strpos($link, 'next') !== false || strpos($link, 'prev') !== false) {
                                        // Next/Prev
                                        $link = str_replace(
                                            '<a',
                                            '<a class="relative inline-flex items-center px-3 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-100 rounded transition"',
                                            $link
                                        );
                                    } else {
                                        // Other page numbers
                                        $link = str_replace(
                                            '<a',
                                            '<a class="relative inline-flex items-center px-3 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-islamic-green hover:text-white rounded transition"',
                                            $link
                                        );
                                    }
                                    echo '<li>' . $link . '</li>';
                                }
                                echo '</ul>';
                                echo '</nav>';
                            }
                            ?>
                        </div>
                    <?php else : ?>
                        <p><?php echo islamic_news_translate('No posts found.'); ?></p>
                    <?php endif;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <div class="space-y-8 sticky top-10">
                    <!-- Popular Posts -->
                    <div class="bg-white rounded-lg shadow-md p-6 relative overflow-hidden">
                        <!-- Islamic Geometric Pattern Overlay -->
                        <div class="absolute inset-0 opacity-5 pointer-events-none bg-repeat" style="background-image: url('<?php echo esc_url(get_theme_file_uri('/assets/images/islamic-pattern.png')); ?>'); background-size: 200px;"></div>
                        
                        <!-- Islamic Decorative Border -->
                        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-islamic-green/20 via-islamic-gold/60 to-islamic-green/20"></div>
                        
                        <h3 class="text-xl font-bold text-gray-900 mb-5 flex items-center">
                            <span class="inline-block w-5 h-5 mx-2 text-islamic-green">
                                <?php echo get_svg_icon('heart', '', 'w-6 h-6'); ?>
                            </span>
                            <?php echo islamic_news_translate('Popular Posts'); ?>
                        </h3>
                        
                        <div class="space-y-4">
                            <?php
                            $popular = new WP_Query([
                                'posts_per_page' => 5,
                                'meta_key' => 'post_views_count',
                                'orderby' => 'meta_value_num',
                                'order' => 'DESC',
                                'ignore_sticky_posts' => 1
                            ]);
                            if ($popular->have_posts()) :
                                while ($popular->have_posts()) : $popular->the_post(); ?>
                                    <div class="flex items-start gap-x-4 group p-3 rounded-lg transition-all duration-300 hover:bg-green-50/70 border-l-2 border-transparent hover:border-islamic-green">
                                        <div class="relative overflow-hidden rounded-lg">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <div class="transform transition duration-500 group-hover:scale-105">
                                                    <?php the_post_thumbnail([80, 60], ['class' => 'w-20 h-15 object-cover rounded-lg shadow-sm']); ?>
                                                </div>
                                            <?php else : ?>
                                                <div class="transform transition duration-500 group-hover:scale-105">
                                                    <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/post-image-callback.jpg')); ?>" alt="<?php the_title_attribute(); ?>" class="w-20 h-15 object-cover rounded-lg shadow-sm">
                                                </div>
                                            <?php endif; ?>
                                            <div class="absolute top-0 right-0 bg-islamic-green text-white text-xs px-1.5 py-0.5 rounded-bl-lg">
                                                <?php echo islamic_news_reading_time(get_the_content()); ?>m
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="text-sm font-semibold text-gray-900 leading-tight group-hover:text-islamic-green transition duration-300">
                                                <a href="<?php the_permalink(); ?>" class="block"><?php the_title(); ?></a>
                                            </h4>
                                            <div class="flex items-center mt-2 text-xs text-gray-500">
                                                <svg class="w-3 h-3 mr-1 text-islamic-green" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                                </svg>
                                                <span><?php echo get_the_date(); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>
                        </div>
                    </div>

                    <!-- Categories -->
                    <div class="bg-white rounded-lg shadow-md p-6 relative overflow-hidden">
                        <!-- Islamic Geometric Pattern Overlay -->
                        <div class="absolute inset-0 opacity-5 pointer-events-none bg-repeat" style="background-image: url('<?php echo esc_url(get_theme_file_uri('/assets/images/islamic-pattern.png')); ?>'); background-size: 200px;"></div>
                        
                        <!-- Islamic Decorative Border -->
                        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-islamic-green/20 via-islamic-gold/60 to-islamic-green/20"></div>
                        
                        <h3 class="text-xl font-bold text-gray-900 mb-5 flex items-center">
                            <span class="inline-block w-5 h-5 mx-2 text-islamic-green">
                                <?php echo get_svg_icon('tag', '', 'w-6 h-6'); ?>
                            </span>
                            <?php echo islamic_news_translate('Categories'); ?>
                        </h3>
                        
                        <div class="space-y-2.5">
                            <?php
                            $cats = get_categories(['hide_empty' => true]);
                            foreach ($cats as $cat) : ?>
                                <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>" 
                                   class="flex justify-between items-center p-2.5 rounded-md hover:bg-green-50 border-r-0 border-t-0 border-b-0 border-l-2 border-transparent hover:border-islamic-green group transition-all duration-300">
                                    <span class="flex items-center text-gray-700 group-hover:text-islamic-green font-medium">
                                        <svg class="w-3.5 h-3.5 mx-2 text-islamic-green/70 group-hover:text-islamic-green transition-all" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        <?php echo esc_html($cat->name); ?>
                                    </span>
                                    <span class="flex items-center justify-center text-xs text-white bg-islamic-green rounded-full w-6 h-6 group-hover:bg-islamic-gold transition-colors duration-300">
                                        <?php echo $cat->count; ?>
                                    </span>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Newsletter Signup -->
                    <!-- <div class="bg-islamic-green text-white rounded-lg p-6">
                        <h3 class="text-xl font-bold mb-4">Stay Updated</h3>
                        <p class="text-green-100 mb-4">Subscribe to our newsletter for weekly insights and updates</p>
                        <div class="space-y-3">
                            <form action="#" method="post">
                                <input type="email" placeholder="Enter your email" class="w-full px-4 py-2 rounded text-gray-900 focus:outline-none focus:ring-2 focus:ring-islamic-gold" required>
                                <button class="w-full bg-islamic-gold hover:bg-yellow-600 text-white py-2 rounded font-semibold transition duration-300" type="submit">Subscribe</button>
                            </form>
                        </div>
                    </div> -->

                    <!-- Tags -->
                    <!-- <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Popular Tags</h3>
                        <div class="flex flex-wrap gap-2">
                            <?php
                            $tags = get_tags(['orderby' => 'count', 'order' => 'DESC', 'number' => 10]);
                            foreach ($tags as $tag) : ?>
                                <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm hover:bg-islamic-green hover:text-white transition duration-300 cursor-pointer"><?php echo esc_html($tag->name); ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Islamic Pattern Footer -->
<div class="w-full bg-islamic-green py-2">
    <div class="max-w-7xl mx-auto">
        <div class="islamic-pattern h-8 opacity-20"></div>
    </div>
</div>

<?php
// Helper function for reading time
function islamic_news_reading_time($content) {
    $words = str_word_count(strip_tags($content));
    $minutes = ceil($words / 200);
    return $minutes;
}
?>

<?php get_footer(); ?>
