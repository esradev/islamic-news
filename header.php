<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#16a34a" />

    <!-- TODO: move these to the theme it self -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@100..900&display=swap" rel="stylesheet">

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> 
    <?php wp_head(); ?>
</head>
<body class="bg-gray-50 text-gray-900 text-right dir-rtl" <?php body_class(); ?>>
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50" x-data="{ mobileMenuOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
        <div class="flex justify-between items-center h-16 flex-row-reverse">
            <!-- Search button End -->
            <!-- Language Switcher Start -->
            <div class="flex items-center gap-4">
                <!-- Search Button -->
                <button id="search-icon" class="flex items-center justify-center p-2 md:justify-end">
                <?php echo get_svg_icon('search', '', 'h-6 w-6 text-gray-700'); ?>
                </button>
                <?php 
                $languages = array();
                if ( function_exists( 'icl_get_languages' ) ) {
                    $languages = icl_get_languages();
                }
                error_log( 'Languages: ' . print_r( $languages, true ) );
                error_log('languages count: ' . count( $languages ) );

                if ( !empty( $languages ) ) :
                    $current_lang = '';
                    foreach ( $languages as $lang ) {
                        if ( $lang['active'] ) {
                            $current_lang = $lang;
                            break;
                        }
                    }
                ?>
                <div class="relative group" id="lang-switcher-group">
                    <button
                        id="lang-switcher-btn"
                        type="button"
                        tabindex="0"
                        aria-haspopup="true"
                        aria-expanded="false"
                        <?php if (count($languages) <= 1) : ?>
                            disabled aria-disabled="true" title="نسخه دیگری از زبان وجود ندارد"
                        <?php endif; ?>
                        class="flex items-center px-3 py-2 rounded-md border border-gray-200 bg-white text-sm font-semibold transition focus:outline-none
                        <?php if (count($languages) <= 1) : ?>
                            opacity-60 cursor-not-allowed text-gray-400
                        <?php else : ?>
                            text-gray-700 hover:bg-gray-100
                        <?php endif; ?>"
                    >
                        <?php if (!empty($current_lang['country_flag_url'])): ?>
                            <img src="<?php echo esc_url($current_lang['country_flag_url']); ?>" alt="<?php echo esc_attr($current_lang['native_name']); ?>" class="w-5 h-5 my-2">
                        <?php endif; ?>
                        <span><?php echo esc_html($current_lang['native_name']); ?></span>
                        <svg class="w-4 h-4 my-1 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div id="lang-switcher-dropdown" class="absolute z-50 left-0 mt-0 pt-2 w-36 bg-white border border-gray-200 rounded-md shadow-lg opacity-0 invisible transition">
                        <?php foreach ( $languages as $lang ) :
                            if ( !$lang['active'] ) : ?>
                                <a href="<?php echo esc_url( $lang['url'] ); ?>" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">
                                    <?php if (!empty($lang['country_flag_url'])): ?>
                                        <img src="<?php echo esc_url($lang['country_flag_url']); ?>" alt="<?php echo esc_attr($lang['native_name']); ?>" class="w-5 h-5 my-2">
                                    <?php endif; ?>
                                    <span><?php echo esc_html($lang['native_name']); ?></span>
                                </a>
                            <?php endif;
                        endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
                
                <!-- Language Switcher End -->
            </div>
                        
            <div class="flex h-16 justify-between">
                     <!-- Mobile menu button -->
                    <div class="flex items-center md:hidden">
                        <button id="mobile-menu-button" type="button"
                                class="text-gray-700 hover:text-islamic-green focus:outline-none focus:text-islamic-green"
                                aria-controls="mobile-menu" 
                                aria-expanded="false"
                                @click="mobileMenuOpen = !mobileMenuOpen">
                                <span class="sr-only">Open main menu</span>
                                <span x-show="!mobileMenuOpen" x-cloak>
                                    <?php echo get_svg_icon('bars-3', 'mobile-menu-open-icon', 'h-6 w-6'); ?>
                                </span>
                                <span x-show="mobileMenuOpen" x-cloak>
                                    <?php echo get_svg_icon('x-circle', 'mobile-menu-close-icon', 'h-6 w-6'); ?>
                                </span>
                        </button>
                    </div>

                    <div class="flex px-2 md:px-0">
                    <div class="hidden md:items-center md:my-4 md:flex md:gap-2">
                        <div class="flex-shrink-0">
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <h1 class="text-2xl font-bold text-islamic-green"><?php bloginfo('name'); ?></h1>
                            </a>
                        </div>
                        <?php
                        // Function to recursively output submenu items
                        function output_submenu_items($submenu_items, $parent_id)
                        {
                        if (isset($submenu_items[$parent_id])) {
                            echo '<div id="dropdown-menu-' . $parent_id . '" class="hidden absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" tabindex="-1">';
                            foreach ($submenu_items[$parent_id] as $submenu_item) {
                            echo '<a href="' . $submenu_item->url . '" class="text-gray-800 block p-3 text-sm" role="menuitem" tabindex="-1">' . $submenu_item->title . '</a>';
                            // Check if the submenu item has further submenu items
                            output_submenu_items($submenu_items, $submenu_item->ID);
                            }
                            echo '</div>';
                        }
                        }

                        // Get menu items based on menu location 'primary'
                        $locations = get_nav_menu_locations();
                        $menu = [];
                        if (isset($locations['primary'])) {
                            $menu_obj = wp_get_nav_menu_object($locations['primary']);
                            if ($menu_obj) {
                                $menu = wp_get_nav_menu_items($menu_obj->term_id);
                            }
                        }
                        $submenu_items = [];

                        // Collect submenu items
                        foreach ($menu as $item) {
                        if ($item->menu_item_parent != 0) {
                            $submenu_items[$item->menu_item_parent][] = $item;
                        }
                        }

                        // Output menu items
                        foreach ($menu as $item) {
                        if ($item->menu_item_parent == 0) {
                            // Check if the current item has submenu items
                            $has_submenu = isset($submenu_items[$item->ID]);

                            echo '<div class="relative inline-block text-right">';

                            // Output as button only if it has submenu items
                            if ($has_submenu) {
                            echo '<button type="button" id="menu-button-' . $item->ID . '" aria-expanded="false" aria-haspopup="true" class="inline-flex w-full justify-center gap-x-1.5 bg-white px-3 py-2 text-base font-semibold text-gray-900 hover:bg-gray-50 text-gray-700 hover:text-islamic-green px-3 py-2 rounded-md text-sm font-medium">' . $item->title . '<svg class="-my-1 h-5 w-5 text-gray-700" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" /></svg></button>';
                            } else {
                            echo '<a href="' . $item->url . '" class="inline-flex w-full justify-center gap-x-1.5 bg-white px-3 py-2 text-base font-semibold text-gray-900 hover:bg-gray-50 text-gray-700 hover:text-islamic-green px-3 py-2 rounded-md text-sm font-medium">' . $item->title . '</a>';
                            }

                            // Output dropdown menu if exists
                            if ($has_submenu) {
                            output_submenu_items($submenu_items, $item->ID);
                            }

                            echo '</div>';
                        }
                        }
                        ?>


                    </div>
                    </div>


                    <!-- Search Overlay -->
                    <div id="search-overlay"
                    class="transition scale-125 opacity-0 duration-300 ease-in-out flex justify-center invisible bg-white/90 backdrop-blur-sm fixed inset-0 z-50">
                    <div class="max-w-4xl w-full pt-4 sm:pt-16 px-4 sm:px-0 overflow-x-hidden">
                        <div class="flex justify-end mb-3">
                        <?php echo get_svg_icon('x-circle', 'close-overlay-icon', 'text-red-400 hover:text-red-600 cursor-pointer h-8 w-8'); ?>
                        </div>
                        <div class="flex justify-between bg-white border-gray-200 border drop-shadow-md">
                        <input id="search-field" placeholder="عبارت مد نظر خود را جستجو کنید..." type="text"
                                                                class="flex-1 text-xl text-gray-500 py-5 px-6 outline-none">
                        <div class="flex items-center bg-islamic-green hover:bg-islamic-green cursor-pointer px-5">
                            <?php echo get_svg_icon('search', '', 'h-6 w-6 text-white'); ?>
                        </div>
                        </div>
                        <!-- Add current language code for JS -->
                        <input type="hidden" id="current-lang-code" value="<?php echo esc_attr(function_exists('ICL_LANGUAGE_CODE') ? ICL_LANGUAGE_CODE : 'fa'); ?>">
                        <div class="mt-7 py-7 px-8 bg-white border-gray-200 drop-shadow-md">
                        <p id="default-message" class="text-gray-400 text-xl p-5 text-center">نتایج در این جا نشان داده می شوند.
                        </p>

                        <p id="no-results-message" class="hidden text-red-600 items-center">
                            <?php echo get_svg_icon('exclamation-triangle', '', 'h-6 w-6 text-red-600 inline-block my-2'); ?>
                            <span>نتیجه ای مرتبط با جستجوی شما یافت نشد.</span>
                        </p>

                        <div id="loading-icon" class="hidden text-center text-islamic-green">
                            <?php echo get_svg_icon('arrow-path', '', 'inline-block animate-spin h-8 w-8 text-islamic-green'); ?>
                        </div>

                        <ul id="results-area" class="hidden space-y-4">
                        </ul>
                        </div>

                    </div>
                    </div>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden overflow-y-auto max-h-[80vh]" 
         id="mobile-menu" 
         x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 transform scale-95"
         x-transition:enter-end="opacity-100 transform scale-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 transform scale-100"
         x-transition:leave-end="opacity-0 transform scale-95">
      <div class="space-y-1 pb-3 pt-2">
        <?php
        foreach ($menu as $item) {
          if ($item->menu_item_parent == 0) {
            // Check if the current item has submenu items
            $has_submenu = isset($submenu_items[$item->ID]);

            echo '<div class="relative block text-right min-w-full">';

            // Output as button only if it has submenu items
            echo '<a href="' . $item->url . '" class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-bold text-gray-600 hover:border-gray-300 hover:bg-gray-50 hover:text-gray-800">' . $item->title . '</a>';


            // Output dropdown menu if exists for mobile
            if ($has_submenu) {
              echo '<div id="dropdown-menu-' . $item->ID . '" class="text-gray-800 block p-3 text-lg my-2"  role="menu" aria-orientation="vertical" aria-labelledby="menu-button-' . $item->ID . '" tabindex="-1">';
              foreach ($submenu_items[$item->ID] as $submenu_item) {
                echo '<a href="' . $submenu_item->url . '" class="text-gray-800 block p-3 text-lg" role="menuitem" tabindex="-1">' . $submenu_item->title . '</a>';
              }
            }

            echo '</div>';
          }
        }
        ?>
      </div>
    </div>
  </nav>

  <template id="li-template">
    <li class="flex flex-col">
      <a class="flex items-center text-base text-islamic-green hover:text-islamic-green" href="#">
        <?php echo get_svg_icon('document-text', '', 'h-5 w-5 text-islamic-green my-2'); ?>
        <span class="title-text">نمونه مطلب #1</span>
      </a>
    </li>
  </template>

  <script>
  // Language Switcher Dropdown Toggle
  (function() {
    const btn = document.getElementById('lang-switcher-btn');
    const dropdown = document.getElementById('lang-switcher-dropdown');
    if (btn && dropdown) {
      btn.addEventListener('click', function(e) {
        e.stopPropagation();
        const isOpen = dropdown.classList.contains('opacity-100');
        if (isOpen) {
          dropdown.classList.remove('opacity-100', 'visible');
          dropdown.classList.add('opacity-0', 'invisible');
          btn.setAttribute('aria-expanded', 'false');
        } else {
          dropdown.classList.remove('opacity-0', 'invisible');
          dropdown.classList.add('opacity-100', 'visible');
          btn.setAttribute('aria-expanded', 'true');
        }
      });
      // Close dropdown when clicking outside
      document.addEventListener('click', function(e) {
        if (!btn.contains(e.target) && !dropdown.contains(e.target)) {
          dropdown.classList.remove('opacity-100', 'visible');
          dropdown.classList.add('opacity-0', 'invisible');
          btn.setAttribute('aria-expanded', 'false');
        }
      });
    }
  })();
  </script>
