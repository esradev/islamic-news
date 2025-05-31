
<!-- Newsletter Section -->
<!-- <section class="py-16 bg-islamic-green text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h3 class="text-3xl md:text-4xl font-bold mb-4">Stay Connected</h3>
        <p class="text-xl mb-8 text-green-100">Subscribe to our newsletter for weekly insights and updates</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center max-w-md mx-auto">
            <input type="email" placeholder="Enter your email" class="flex-1 px-4 py-3 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-islamic-gold">
            <button class="bg-islamic-gold hover:bg-yellow-600 text-white px-8 py-3 rounded-lg font-semibold transition duration-300">Subscribe</button>
        </div>
    </div>
</section> -->


<!-- Footer -->
<footer class="bg-gray-900 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="col-span-1 md:col-span-2">
                <h4 class="text-2xl font-bold text-islamic-gold mb-4"><?php echo esc_html(get_bloginfo('name')); ?></h4>
                <p class="text-gray-300 mb-4"><?php echo esc_html(get_bloginfo('description')); ?></p>
            </div>
            <!-- <div class="col-span-1 md:col-span-2">
                <h4 class="text-2xl font-bold text-islamic-gold mb-4"><?php esc_html_e('Quick Links', 'islamic-news'); ?></h4>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'container' => false,
                    'menu_class' => 'space-y-2',
                    'fallback_cb' => false,
                    'depth' => 1,
                    'link_before' => '<span class="text-gray-400 hover:text-islamic-gold transition duration-300">',
                    'link_after' => '</span>',
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                ));
                ?>
            </div>

        </div>
        <div class="border-t border-gray-700 mt-8 pt-8">
            <p class="text-gray-400 text-sm">
                <?php
                echo '&copy; ' . date('Y') . ' ' . esc_html(get_bloginfo('name')) . '. ';
                _e('All rights reserved.', 'islamic-news');
                ?>
            </p>
        </div> -->
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>

