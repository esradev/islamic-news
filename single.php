<?php get_header(); ?>

<!-- Islamic Decorative Header -->
<div class="w-full bg-islamic-green py-2">
    <div class="max-w-7xl mx-auto">
        <div class="islamic-pattern h-8 opacity-20"></div>
    </div>
</div>

<!-- Breadcrumb -->
<section class="bg-white border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="flex items-center gap-x-2 flex-wrap">
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

<!-- Main Content Area with Sidebar -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Main Content Column -->
        <main class="w-full lg:w-2/3">
            <article class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-100">
                <!-- Featured Image -->
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="relative">
                        <?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-96 object-cover' ) ); ?>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-6">
                            <div class="flex items-center mb-4 gap-x-3">
                                <?php
                                $categories = get_the_category();
                                if ( ! empty( $categories ) ) {
                                    echo '<span class="bg-islamic-green text-white px-4 py-2 rounded-full text-sm font-medium">' . esc_html( $categories[0]->name ) . '</span>';
                                }
                                ?>
                                <span class="text-white text-sm"><?php echo get_the_date(); ?></span>
                                <span class="text-white text-sm">•</span>
                                <span class="text-white text-sm">
                                    <?php
                                    $word_count = str_word_count( strip_tags( get_the_content() ) );
                                    $reading_time = ceil( $word_count / 200 );
                                    echo $reading_time . ' min read';
                                    ?>
                                </span>
                            </div>
                            <h1 class="text-3xl md:text-4xl font-bold text-white mb-3 leading-tight text-shadow"><?php the_title(); ?></h1>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="relative">
                        <img src="<?php echo esc_url( get_theme_file_uri('/assets/images/post-image-callback.jpg') ); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-96 object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-6">
                            <div class="flex items-center mb-4 gap-x-3">
                                <?php
                                $categories = get_the_category();
                                if ( ! empty( $categories ) ) {
                                    echo '<span class="bg-islamic-green text-white px-4 py-2 rounded-full text-sm font-medium">' . esc_html( $categories[0]->name ) . '</span>';
                                }
                                ?>
                                <span class="text-white text-sm"><?php echo get_the_date(); ?></span>
                                <span class="text-white text-sm">•</span>
                                <span class="text-white text-sm">
                                    <?php
                                    $word_count = str_word_count( strip_tags( get_the_content() ) );
                                    $reading_time = ceil( $word_count / 200 );
                                    echo $reading_time . ' min read';
                                    ?>
                                </span>
                            </div>
                            <h1 class="text-3xl md:text-4xl font-bold text-white mb-3 leading-tight text-shadow"><?php the_title(); ?></h1>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Article Header for mobile view -->
                <header class="lg:hidden p-6 border-b border-gray-100">
                    <h1 class="text-2xl font-bold text-gray-900 mb-4"><?php the_title(); ?></h1>
                    <?php if ( has_excerpt() ) : ?>
                        <p class="text-lg text-gray-600 leading-relaxed"><?php the_excerpt(); ?></p>
                    <?php endif; ?>
                </header>

                <!-- Author Info -->
                <div class="flex items-center p-6 bg-gray-50 border-b border-gray-100">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 60, '', get_the_author(), array( 'class' => 'w-12 h-12 rounded-full mx-4 border-2 border-islamic-green' ) ); ?>
                    <div>
                        <h3 class="text-md font-semibold text-gray-900"><?php the_author(); ?></h3>
                        <p class="text-sm text-gray-500">Author</p>
                    </div>
                </div>

                <!-- Article Content -->
                <div class="p-6">
                    <?php if ( has_excerpt() && !wp_is_mobile() ) : ?>
                        <div class="mb-6 p-4 bg-gray-50 border-l-4 border-islamic-green rounded">
                            <p class="text-lg text-gray-700 italic"><?php the_excerpt(); ?></p>
                        </div>
                    <?php endif; ?>

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
                                <a href="<?php echo get_tag_link($tag->term_id); ?>" class="bg-gray-100 hover:bg-islamic-green hover:text-white text-gray-700 px-3 py-1 rounded-full text-sm transition duration-300"><?php echo esc_html( $tag->name ); ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Share Article -->
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Share this article:</h3>
                        <div class="flex flex-wrap gap-3">
                            <?php
                            $post_url = urlencode( get_permalink() );
                            $post_title = urlencode( get_the_title() );
                            ?>
                            <a href="https://twitter.com/intent/tweet?url=<?php echo $post_url; ?>&text=<?php echo $post_title; ?>" class="bg-[#1DA1F2] text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition duration-300 flex items-center gap-x-2" target="_blank" rel="noopener">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                                <span>Twitter</span>
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $post_url; ?>" class="bg-[#3b5998] text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition duration-300 flex items-center gap-x-2" target="_blank" rel="noopener">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.5 3.44 9.5 5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4z"/></svg>
                                <span>Facebook</span>
                            </a>
                            <a href="https://wa.me/?text=<?php echo $post_title . '%20' . $post_url; ?>" class="bg-[#25D366] text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition duration-300 flex items-center gap-x-2" target="_blank" rel="noopener">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                                <span>WhatsApp</span>
                            </a>
                            <a href="mailto:?subject=<?php echo $post_title; ?>&body=<?php echo $post_url; ?>" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition duration-300 flex items-center gap-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                <span>Email</span>
                            </a>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Comments Section -->
            <div class="mt-8 bg-white rounded-lg shadow-lg overflow-hidden border border-gray-100">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="text-xl font-bold text-islamic-green">Comments</h3>
                </div>
                
                <div class="p-6">
                    <?php if (comments_open() || get_comments_number()) : ?>
                        <div class="comments-area">
                            <?php
                            // Custom comment display callback
                            function islamic_theme_comment($comment, $args, $depth) {
                                $GLOBALS['comment'] = $comment; ?>
                                <div id="comment-<?php comment_ID(); ?>" class="comment mb-6 pb-6 <?php echo $depth > 1 ? 'mx-12 border-l-4 border-islamic-green pl-6' : 'border-b border-gray-100'; ?>">
                                    <div class="flex items-start">
                                        <?php echo get_avatar($comment, 60, '', '', array('class' => 'rounded-full mx-4')); ?>
                                        <div class="flex-1">
                                            <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-2">
                                                <h4 class="font-semibold text-gray-900"><?php comment_author(); ?></h4>
                                                <span class="text-sm text-gray-500"><?php comment_date('F j, Y \a\t g:i a'); ?></span>
                                            </div>
                                            <div class="comment-content text-gray-700 mb-3">
                                                <?php comment_text(); ?>
                                            </div>
                                            <div class="reply text-sm">
                                                <?php comment_reply_link(array_merge($args, array(
                                                    'depth' => $depth,
                                                    'max_depth' => $args['max_depth'],
                                                    'reply_text' => '<span class="text-islamic-green hover:text-islamic-gold transition duration-300">Reply</span>'
                                                ))); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            
                            // List the comments
                            wp_list_comments(array(
                                'style' => 'div',
                                'callback' => 'islamic_theme_comment',
                                'avatar_size' => 60,
                            ));
                            
                            // If there are no comments yet
                            if (!have_comments()) {
                                echo '<p class="text-center text-gray-500 my-8">Be the first to share your thoughts!</p>';
                            }
                            
                            // Show comment pagination if needed
                            if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
                                <nav class="comment-navigation flex justify-between my-6">
                                    <div class="nav-previous"><?php previous_comments_link('← Older Comments'); ?></div>
                                    <div class="nav-next"><?php next_comments_link('Newer Comments →'); ?></div>
                                </nav>
                            <?php endif; ?>
                        </div>
                        
                        <?php
                        // Comment form with Islamic styling
                        comment_form(array(
                            'title_reply' => '<span class="text-xl font-bold text-islamic-green">Leave a Comment</span>',
                            'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title mt-8 mb-4">',
                            'title_reply_after' => '</h3>',
                            'comment_field' => '<div class="comment-form-comment mb-4"><label for="comment" class="block text-sm font-medium text-gray-700 mb-2">Your Comment</label><textarea id="comment" name="comment" rows="6" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-islamic-green focus:border-islamic-green transition duration-300" required></textarea></div>',
                            'fields' => array(
                                'author' => '<div class="comment-form-author mb-4"><label for="author" class="block text-sm font-medium text-gray-700 mb-2">Name <span class="text-red-500">*</span></label><input id="author" name="author" type="text" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-islamic-green focus:border-islamic-green transition duration-300" required /></div>',
                                'email' => '<div class="comment-form-email mb-4"><label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email <span class="text-red-500">*</span></label><input id="email" name="email" type="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-islamic-green focus:border-islamic-green transition duration-300" required /></div>',
                                'url' => '<div class="comment-form-url mb-4"><label for="url" class="block text-sm font-medium text-gray-700 mb-2">Website</label><input id="url" name="url" type="url" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-islamic-green focus:border-islamic-green transition duration-300" /></div>',
                            ),
                            'class_submit' => 'bg-islamic-green hover:bg-islamic-gold text-white font-bold py-2 px-6 rounded-md transition duration-300',
                            'comment_notes_before' => '<p class="comment-notes text-sm text-gray-600 mb-4">Your email address will not be published. Required fields are marked <span class="text-red-500">*</span></p>',
                            'submit_button' => '<button name="%1$s" type="submit" id="%2$s" class="%3$s">%4$s</button>',
                        ));
                    else:
                        echo '<p class="text-center text-gray-500 my-8">Comments are closed for this post.</p>';
                    endif; ?>
                </div>
            </div>
        </main>
        
        <!-- Sidebar -->
        <aside class="w-full lg:w-1/3 space-y-8">
            <!-- About Author Widget -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-100">
                <div class="p-6 border-b border-gray-100 bg-islamic-green">
                    <h3 class="text-xl font-bold text-white">About the Author</h3>
                </div>
                <div class="p-6 text-center">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 120, '', get_the_author(), array( 'class' => 'w-24 h-24 rounded-full mx-auto border-4 border-islamic-green' ) ); ?>
                    <h4 class="font-bold text-lg mt-4 mb-2 text-gray-900"><?php the_author(); ?></h4>
                    <?php if ( get_the_author_meta( 'description' ) ) : ?>
                        <p class="text-gray-600 mb-4"><?php echo esc_html( get_the_author_meta( 'description' ) ); ?></p>
                    <?php else: ?>
                        <p class="text-gray-600 mb-4">Author at <?php echo get_bloginfo('name'); ?></p>
                    <?php endif; ?>
                    
                    <div class="flex justify-center gap-x-3 mt-4">
                        <?php
                        $twitter = get_the_author_meta( 'twitter' );
                        $linkedin = get_the_author_meta( 'linkedin' );
                        if ( $twitter ) : ?>
                            <a href="<?php echo esc_url( $twitter ); ?>" class="text-gray-400 hover:text-islamic-green transition duration-300" target="_blank" rel="noopener">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                            </a>
                        <?php endif; ?>
                        <?php if ( $linkedin ) : ?>
                            <a href="<?php echo esc_url( $linkedin ); ?>" class="text-gray-400 hover:text-islamic-green transition duration-300" target="_blank" rel="noopener">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Popular Categories -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-100">
                <div class="p-6 border-b border-gray-100 bg-islamic-green">
                    <h3 class="text-xl font-bold text-white">Popular Categories</h3>
                </div>
                <div class="p-6">
                    <ul class="space-y-3">
                        <?php
                        $categories = get_categories(array(
                            'orderby' => 'count',
                            'order' => 'DESC',
                            'number' => 5,
                        ));
                        
                        foreach ($categories as $category) : ?>
                            <li class="border-b border-gray-100 pb-2 last:border-0">
                                <a href="<?php echo get_category_link($category->term_id); ?>" class="flex justify-between items-center text-gray-700 hover:text-islamic-green transition duration-300">
                                    <span><?php echo $category->name; ?></span>
                                    <span class="bg-gray-100 text-gray-700 px-2 py-1 rounded-full text-xs"><?php echo $category->count; ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            
            <!-- Recent Posts -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-100">
                <div class="p-6 border-b border-gray-100 bg-islamic-green">
                    <h3 class="text-xl font-bold text-white">Recent Posts</h3>
                </div>
                <div class="p-6">
                    <?php
                    $recent_posts = new WP_Query(array(
                        'posts_per_page' => 4,
                        'post__not_in' => array(get_the_ID()),
                    ));
                    
                    if ($recent_posts->have_posts()) :
                        while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                            <div class="flex mb-4 pb-4 border-b border-gray-100 last:border-0 last:pb-0 last:mb-0">
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>" class="shrink-0">
                                        <?php the_post_thumbnail('thumbnail', array('class' => 'w-16 h-16 object-cover rounded')); ?>
                                    </a>
                                <?php endif; ?>
                                <div class="mx-4">
                                    <h4 class="font-medium text-gray-900 hover:text-islamic-green transition duration-300">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h4>
                                    <span class="text-xs text-gray-500"><?php echo get_the_date(); ?></span>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata();
                    endif; ?>
                </div>
            </div>
            
            <!-- Popular Tags -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-100">
                <div class="p-6 border-b border-gray-100 bg-islamic-green">
                    <h3 class="text-xl font-bold text-white">Popular Tags</h3>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-2">
                        <?php
                        $tags = get_tags(array(
                            'orderby' => 'count',
                            'order' => 'DESC',
                            'number' => 15,
                        ));
                        
                        if ($tags) :
                            foreach ($tags as $tag) : ?>
                                <a href="<?php echo get_tag_link($tag->term_id); ?>" class="bg-gray-100 hover:bg-islamic-green hover:text-white text-gray-700 px-3 py-1 rounded-full text-sm transition duration-300 mb-2">
                                    <?php echo $tag->name; ?>
                                </a>
                            <?php endforeach;
                        endif; ?>
                    </div>
                </div>
            </div>
            
            <!-- Islamic Quote Widget -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-100">
                <div class="p-6 border-b border-gray-100 bg-islamic-green">
                    <h3 class="text-xl font-bold text-white">Quote of the Day</h3>
                </div>
                <div class="p-6 bg-gray-50">
                    <?php
                    // Array of Islamic quotes
                    $quotes = array(
                        '"Verily with hardship comes ease." - Quran 94:5',
                        '"The best of people are those who are most beneficial to people." - Prophet Muhammad (PBUH)',
                        '"Speak good or remain silent." - Prophet Muhammad (PBUH)',
                        '"Be in this world as if you were a stranger or a traveler." - Prophet Muhammad (PBUH)',
                        '"The greatest jihad is to battle your own soul." - Prophet Muhammad (PBUH)',
                    );
                    
                    // Get a random quote
                    $random_quote = $quotes[array_rand($quotes)];
                    ?>
                    
                    <div class="text-center p-4">
                        <svg class="w-10 h-10 text-islamic-green mx-auto mb-4 opacity-20" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                        </svg>
                        <p class="text-gray-700 italic font-medium"><?php echo $random_quote; ?></p>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</div>

<!-- Related Articles -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-center mb-12">
            <div class="h-0.5 bg-gray-200 flex-1 mx-6"></div>
            <h2 class="text-3xl font-bold text-islamic-green text-center">Related Articles</h2>
            <div class="h-0.5 bg-gray-200 flex-1 mx-6"></div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $related_query = new WP_Query( array(
                'category__in'   => wp_get_post_categories( get_the_ID() ),
                'post__not_in'   => array( get_the_ID() ),
                'posts_per_page' => 3,
                'ignore_sticky_posts' => 1,
            ) );
            if ( $related_query->have_posts() ) :
                while ( $related_query->have_posts() ) : $related_query->the_post(); ?>
                    <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300 border border-gray-100 group">
                        <div class="relative overflow-hidden">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'medium', array( 'class' => 'w-full h-56 object-cover transition duration-500 group-hover:scale-105' ) ); ?>
                            <?php else : ?>
                                <img src="<?php echo esc_url( get_theme_file_uri('/assets/images/post-image-callback.jpg') ); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-56 object-cover transition duration-500 group-hover:scale-105">
                            <?php endif; ?>
                            <div class="absolute top-4 right-4">
                                <?php
                                $cat = get_the_category();
                                if ( ! empty( $cat ) ) {
                                    echo '<span class="bg-islamic-green text-white px-3 py-1 rounded-full text-sm font-medium">' . esc_html( $cat[0]->name ) . '</span>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-3 text-sm text-gray-500">
                                <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <?php echo get_the_date(); ?>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-3 group-hover:text-islamic-green transition duration-300">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p class="text-gray-600 text-sm mb-4"><?php echo wp_trim_words( get_the_excerpt(), 18, '...' ); ?></p>
                            <a href="<?php the_permalink(); ?>" class="inline-flex items-center text-islamic-green hover:text-islamic-gold font-medium text-sm transition duration-300">
                                Read More
                                <svg class="w-4 h-4 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                        </div>
                    </article>
                <?php endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Islamic Pattern Footer -->
<div class="w-full bg-islamic-green py-2">
    <div class="max-w-7xl mx-auto">
        <div class="islamic-pattern h-8 opacity-20"></div>
    </div>
</div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>