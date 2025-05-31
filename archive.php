<?php get_header(); ?>

<!-- Page Header -->
<section class="bg-gradient-to-r from-islamic-green to-green-800 text-white py-20 shadow-lg rounded-b-3xl mb-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-3xl md:text-3xl font-extrabold mb-3 tracking-tight drop-shadow-lg">
                <?php
                if (is_category()) {
                    single_cat_title('', true);
                } else {
                    the_archive_title();
                }
                ?>
            </h1>
            <?php if (get_the_archive_description()) : ?>
                <div class="text-lg md:text-xl text-green-100/90 font-light mx-auto mt-2 drop-shadow">
                    <?php the_archive_description(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Filter and Search Section -->
<section class="py-8 bg-white border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row justify-between items-center gap-4">
            <div class="flex flex-wrap gap-2">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="bg-islamic-green text-white px-4 py-2 rounded-full text-sm font-medium<?php if (!is_category()) echo ' bg-islamic-green'; ?>">All Posts</a>
                <?php
                // Replace with your desired category IDs 
                $category_ids = [135, 149, 50]; // TODO: get these from a settings page or options
                $categories = get_categories([
                    'include' => $category_ids,
                    'hide_empty' => true
                ]);
                foreach ($categories as $cat) : ?>
                    <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>"
                       class="bg-gray-200 text-gray-700 hover:bg-islamic-green hover:text-white px-4 py-2 rounded-full text-sm font-medium transition duration-300<?php if (is_category($cat->term_id)) echo ' bg-islamic-green text-white'; ?>">
                        <?php echo esc_html($cat->name); ?>
                    </a>
                <?php endforeach; ?>
            </div>
            <!-- <div class="flex items-center gap-4">
                <form method="get" action="<?php echo esc_url(home_url('/')); ?>" class="relative">
                    <input type="text" name="s" placeholder="Search articles..." value="<?php the_search_query(); ?>" class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-islamic-green focus:border-transparent">
                    <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </form>
                <select class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-islamic-green">
                    <option>Latest First</option>
                    <option>Oldest First</option>
                    <option>Most Popular</option>
                </select>
            </div> -->
        </div>
    </div>
</section>

<!-- Blog Posts Grid -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <div class="space-y-8">
                    <?php if (have_posts()) : ?>
                        <?php
                        // Show archive title and description
                        if (is_category() || is_tag() || is_author() || is_date()) : ?>
                            <header class="mb-8">
                                <h1 class="text-3xl font-bold text-gray-900 mb-2">
                                    <?php the_archive_title(); ?>
                                </h1>
                                <div class="text-gray-600">
                                    <?php the_archive_description(); ?>
                                </div>
                            </header>
                        <?php endif; ?>

                        <?php while (have_posts()) : the_post(); ?>
                            <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                                <div class="md:flex">
                                    <div class="md:w-1/3">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail('medium', ['class' => 'w-full h-48 md:h-full object-cover']); ?>
                                        <?php else : ?>
                                            <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/post-image-callback.jpg')); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-48 md:h-full object-cover">
                                        <?php endif; ?>
                                    </div>
                                    <div class="p-6 md:w-2/3">
                                        <div class="flex items-center mb-3">
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
                                                echo '<span class="' . esc_attr($color) . ' text-white px-3 py-1 rounded-full text-sm font-medium">' . esc_html($cat->name) . '</span>';
                                            }
                                            ?>
                                            <span class="text-gray-500 text-sm ml-3"><?php echo get_the_date(); ?></span>
                                            <span class="text-gray-500 text-sm ml-3">•</span>
                                            <span class="text-gray-500 text-sm ml-3"><?php echo islamic_news_reading_time(get_the_content()); ?> min read</span>
                                        </div>
                                        <h3 class="text-xl font-semibold text-gray-900 mb-3 hover:text-islamic-green transition duration-300">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>
                                        <p class="text-gray-600 mb-4"><?php echo get_the_excerpt(); ?></p>
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center">
                                                <?php echo get_avatar(get_the_author_meta('ID'), 32, '', '', ['class' => 'w-8 h-8 rounded-full mr-2']); ?>
                                                <span class="text-sm text-gray-700"><?php the_author(); ?></span>
                                            </div>
                                            <a href="<?php the_permalink(); ?>" class="text-islamic-green hover:text-islamic-gold font-medium">Read More →</a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        <?php endwhile; ?>

                        <!-- Pagination -->
                        <div class="flex justify-center mt-12">
                            <?php
                            $pagination = paginate_links([
                                'total' => $wp_query->max_num_pages,
                                'current' => max(1, get_query_var('paged')),
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
                        <p>No posts found.</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <div class="space-y-8">
                    <!-- Popular Posts -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Popular Posts</h3>
                        <div class="space-y-4">
                            <?php
                            $popular = new WP_Query([
                                'posts_per_page' => 3,
                                'meta_key' => 'post_views_count',
                                'orderby' => 'meta_value_num',
                                'order' => 'DESC',
                                'ignore_sticky_posts' => 1
                            ]);
                            if ($popular->have_posts()) :
                                while ($popular->have_posts()) : $popular->the_post(); ?>
                                    <div class="flex items-start space-x-3">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail([80, 60], ['class' => 'w-20 h-15 object-cover rounded']); ?>
                                        <?php else : ?>
                                            <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/post-image-callback.jpg')); ?>" alt="<?php the_title_attribute(); ?>" class="w-20 h-15 object-cover rounded">
                                        <?php endif; ?>
                                        <div class="flex-1">
                                            <h4 class="text-sm font-semibold text-gray-900 hover:text-islamic-green transition duration-300">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h4>
                                            <p class="text-xs text-gray-500 mt-1"><?php echo get_the_date(); ?></p>
                                        </div>
                                    </div>
                                <?php endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>
                        </div>
                    </div>

                    <!-- Categories -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Categories</h3>
                        <div class="space-y-2">
                            <?php
                            $cats = get_categories(['hide_empty' => true]);
                            foreach ($cats as $cat) : ?>
                                <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>" class="flex justify-between items-center text-gray-700 hover:text-islamic-green transition duration-300">
                                    <span><?php echo esc_html($cat->name); ?></span>
                                    <span class="text-sm text-gray-500"><?php echo $cat->count; ?></span>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Newsletter Signup -->
                    <div class="bg-islamic-green text-white rounded-lg p-6">
                        <h3 class="text-xl font-bold mb-4">Stay Updated</h3>
                        <p class="text-green-100 mb-4">Subscribe to our newsletter for weekly insights and updates</p>
                        <div class="space-y-3">
                            <form action="#" method="post">
                                <input type="email" placeholder="Enter your email" class="w-full px-4 py-2 rounded text-gray-900 focus:outline-none focus:ring-2 focus:ring-islamic-gold" required>
                                <button class="w-full bg-islamic-gold hover:bg-yellow-600 text-white py-2 rounded font-semibold transition duration-300" type="submit">Subscribe</button>
                            </form>
                        </div>
                    </div>

                    <!-- Tags -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Popular Tags</h3>
                        <div class="flex flex-wrap gap-2">
                            <?php
                            $tags = get_tags(['orderby' => 'count', 'order' => 'DESC', 'number' => 10]);
                            foreach ($tags as $tag) : ?>
                                <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm hover:bg-islamic-green hover:text-white transition duration-300 cursor-pointer"><?php echo esc_html($tag->name); ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
// Helper function for reading time
function islamic_news_reading_time($content) {
    $words = str_word_count(strip_tags($content));
    $minutes = ceil($words / 200);
    return $minutes;
}
?>

<?php get_footer(); ?>
