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
    <nav class="bg-gradient-to-r from-white to-green-50 shadow-md sticky top-0 z-50 border-b-2 border-islamic-green/20" 
         x-data="{ 
            mobileMenuOpen: false, 
            activeDropdown: null,
            toggleDropdown(id) {
                if (this.activeDropdown === id) {
                    this.activeDropdown = null;
                } else {
                    this.activeDropdown = id;
                }
            }
         }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
        <div class="flex justify-between items-center h-16 flex-row-reverse">
            <!-- Search button and Language Switcher -->
            <div class="flex items-center gap-4">
                <!-- Search Button -->
                <button id="search-icon" class="flex items-center justify-center p-2 md:justify-end hover:bg-green-50 rounded-full transition-colors">
                <?php echo get_svg_icon('search', '', 'h-6 w-6 text-islamic-green'); ?>
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
                        class="flex gap-x-2 items-center px-3 py-2 rounded-md border border-green-100 bg-white text-sm font-semibold transition duration-200 focus:outline-none focus:ring-2 focus:ring-islamic-green/30
                        <?php if (count($languages) <= 1) : ?>
                            opacity-60 cursor-not-allowed text-gray-400
                        <?php else : ?>
                            text-gray-700 hover:bg-green-50 hover:border-islamic-green/50
                        <?php endif; ?>"
                    >
                        <?php if (!empty($current_lang['country_flag_url'])): ?>
                            <img src="<?php echo esc_url($current_lang['country_flag_url']); ?>" alt="<?php echo esc_attr($current_lang['language_code']); ?>" class="w-5 h-5 rounded-sm">
                        <?php endif; ?>
                        <span class="uppercase text-xs font-bold"><?php echo isset($current_lang['language_code']) ? esc_html($current_lang['language_code']) : esc_html(substr($current_lang['code'], 0, 2)); ?></span>
                    </button>
                    <div id="lang-switcher-dropdown" class="absolute z-50 left-0 mt-0 pt-2 w-auto min-w-[4rem] bg-white border border-green-100 rounded-md shadow-lg opacity-0 invisible transition duration-200">
                        <?php foreach ( $languages as $lang ) :
                            if ( !$lang['active'] ) : ?>
                                <a href="<?php echo esc_url( $lang['url'] ); ?>" class="flex gap-x-2 items-center justify-center px-3 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-islamic-green rounded-md transition duration-150">
                                    <?php if (!empty($lang['country_flag_url'])): ?>
                                        <img src="<?php echo esc_url($lang['country_flag_url']); ?>" alt="<?php echo esc_attr($lang['language_code']); ?>" class="w-5 h-5 rounded-sm">
                                    <?php endif; ?>
                                    <span class="uppercase text-xs font-bold"><?php echo isset($lang['language_code']) ? esc_html($lang['language_code']) : esc_html(substr($lang['code'], 0, 2)); ?></span>
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
                                class="p-2 text-islamic-green hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-islamic-green/30 rounded-md transition-colors"
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
                    <div class="hidden md:items-center md:my-4 md:flex md:gap-3">
                        <div class="flex-shrink-0 ml-4">
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center group">
                                <div class="bg-islamic-green text-white p-1 rounded-md group-hover:bg-islamic-green/90 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                    </svg>
                                </div>
                                <h1 class="text-xl font-bold text-islamic-green mr-2 group-hover:text-islamic-green/80 transition-colors"><?php bloginfo('name'); ?></h1>
                            </a>
                        </div>
                        <?php
                        // Function to recursively output submenu items
                        function output_submenu_items($submenu_items, $parent_id)
                        {
                        if (isset($submenu_items[$parent_id])) {
                            echo '<div id="dropdown-menu-' . $parent_id . '" 
                                  x-show="activeDropdown == ' . $parent_id . '" 
                                  x-transition:enter="transition ease-out duration-200"
                                  x-transition:enter-start="opacity-0 transform scale-95"
                                  x-transition:enter-end="opacity-100 transform scale-100"
                                  x-transition:leave="transition ease-in duration-150"
                                  x-transition:leave-start="opacity-100 transform scale-100"
                                  x-transition:leave-end="opacity-0 transform scale-95"
                                  @click.outside="if (!$event.target.closest(\'[id^=menu-button-]\')) activeDropdown = null" 
                                  class="absolute right-0 z-10 mt-2 origin-top-right rounded-md bg-white shadow-xl ring-1 ring-islamic-green/5 focus:outline-none border border-green-100 divide-y divide-green-100" 
                                  role="menu" 
                                  tabindex="-1" 
                                  x-cloak>';
                            foreach ($submenu_items[$parent_id] as $submenu_item) {
                            echo '<a href="' . $submenu_item->url . '" class="text-gray-700 block py-3 px-4 text-sm hover:bg-green-50 hover:text-islamic-green transition-colors first:rounded-t-md last:rounded-b-md" role="menuitem" tabindex="-1">' . $submenu_item->title . '</a>';
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
                            echo '<button type="button" 
                                  id="menu-button-' . $item->ID . '" 
                                  @click="toggleDropdown(' . $item->ID . ')" 
                                  :aria-expanded="activeDropdown == ' . $item->ID . ' ? \'true\' : \'false\'" 
                                  aria-haspopup="true" 
                                  class="inline-flex items-center justify-center gap-x-1.5 px-3 py-2 text-base font-semibold text-gray-700 hover:text-islamic-green rounded-md transition-colors duration-200 hover:bg-green-50 relative after:absolute after:bottom-0 after:right-0 after:left-0 after:h-0.5 after:bg-islamic-green after:transform after:scale-x-0 hover:after:scale-x-100 after:transition-transform">' . $item->title . '<svg class="h-5 w-5 text-islamic-green/70" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" /></svg></button>';
                            } else {
                            echo '<a href="' . $item->url . '" class="inline-flex items-center justify-center px-3 py-2 text-base font-semibold text-gray-700 hover:text-islamic-green rounded-md transition-colors duration-200 hover:bg-green-50 relative after:absolute after:bottom-0 after:right-0 after:left-0 after:h-0.5 after:bg-islamic-green after:transform after:scale-x-0 hover:after:scale-x-100 after:transition-transform">' . $item->title . '</a>';
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
                    class="transition scale-125 opacity-0 duration-300 ease-in-out flex justify-center invisible bg-gradient-to-br from-white/95 to-green-50/95 backdrop-blur-sm fixed inset-0 z-50">
                    <div class="max-w-4xl w-full pt-4 sm:pt-16 px-4 sm:px-0 overflow-x-hidden">
                        <div class="flex justify-end mb-3">
                        <?php echo get_svg_icon('x-circle', 'close-overlay-icon', 'text-red-500 hover:text-red-600 cursor-pointer h-8 w-8 transition-colors drop-shadow-sm'); ?>
                        </div>
                        <div class="flex justify-between bg-white border-islamic-green/20 border-2 rounded-lg drop-shadow-lg overflow-hidden">
                        <input id="search-field" placeholder="عبارت مد نظر خود را جستجو کنید..." type="text"
                                class="flex-1 text-xl text-gray-700 py-5 px-6 outline-none focus:bg-green-50/30 transition-colors">
                        <div class="flex items-center bg-islamic-green hover:bg-islamic-green/90 cursor-pointer px-5 transition-colors">
                            <?php echo get_svg_icon('search', '', 'h-6 w-6 text-white'); ?>
                        </div>
                        </div>
                        <!-- Add current language code for JS -->
                        <input type="hidden" id="current-lang-code" value="<?php echo esc_attr(function_exists('ICL_LANGUAGE_CODE') ? ICL_LANGUAGE_CODE : 'fa'); ?>">
                        <div class="mt-7 py-7 px-8 bg-white border-gray-200 border rounded-lg drop-shadow-lg relative before:absolute before:top-0 before:right-0 before:w-2 before:h-full before:bg-islamic-green/80 before:rounded-tr-lg before:rounded-br-lg">
                        <p id="default-message" class="text-gray-400 text-xl p-5 text-center flex flex-col items-center">
                            <?php echo get_svg_icon('document-search', '', 'h-12 w-12 text-islamic-green/40 mb-3'); ?>
                            نتایج در این جا نشان داده می شوند.
                        </p>

                        <p id="no-results-message" class="hidden text-red-600 items-center justify-center p-5 text-center">
                            <?php echo get_svg_icon('exclamation-triangle', '', 'h-8 w-8 text-red-500 block mx-auto mb-3'); ?>
                            <span>نتیجه ای مرتبط با جستجوی شما یافت نشد.</span>
                        </p>

                        <div id="loading-icon" class="hidden text-center text-islamic-green p-8">
                            <?php echo get_svg_icon('arrow-path', '', 'inline-block animate-spin h-10 w-10 text-islamic-green'); ?>
                        </div>

                        <ul id="results-area" class="hidden space-y-4 divide-y divide-green-100">
                        </ul>
                        </div>

                    </div>
                    </div>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden overflow-y-auto max-h-[80vh] bg-white border-t border-green-100 shadow-inner" 
         id="mobile-menu" 
         x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 transform -translate-y-4"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform -translate-y-4"
         x-cloak>
      <div class="py-3 px-4 divide-y divide-green-100">
        <?php
        foreach ($menu as $item) {
          if ($item->menu_item_parent == 0) {
            // Check if the current item has submenu items
            $has_submenu = isset($submenu_items[$item->ID]);

            echo '<div class="relative block text-right py-2">';

            // Output as button only if it has submenu items
            echo '<a href="' . $item->url . '" class="block py-2 px-3 text-base font-bold text-gray-700 hover:text-islamic-green rounded-md bg-white hover:bg-green-50 transition-colors duration-200 border-r-4 border-transparent hover:border-islamic-green flex justify-between items-center">' 
                 . $item->title;
            
            if ($has_submenu) {
              echo '<svg class="h-5 w-5 text-islamic-green/70" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" /></svg>';
            }
            
            echo '</a>';

            // Output dropdown menu if exists for mobile
            if ($has_submenu) {
              echo '<div id="dropdown-menu-' . $item->ID . '" class="pr-6 mt-1 space-y-1" role="menu" aria-orientation="vertical" aria-labelledby="menu-button-' . $item->ID . '" tabindex="-1">';
              foreach ($submenu_items[$item->ID] as $submenu_item) {
                echo '<a href="' . $submenu_item->url . '" class="block py-2 px-3 text-sm text-gray-600 hover:text-islamic-green bg-green-50/50 hover:bg-green-50 rounded-md transition-colors" role="menuitem" tabindex="-1">' . $submenu_item->title . '</a>';
              }
              echo '</div>';
            }

            echo '</div>';
          }
        }
        ?>
      </div>
      <!-- Decorative footer for mobile menu -->
      <div class="mt-4 py-3 px-4 bg-green-50/50 border-t border-green-100 flex justify-between items-center">
        <div class="text-sm text-gray-500">
          <?php echo get_svg_icon('clock', '', 'h-4 w-4 text-islamic-green inline-block ml-1'); ?>
          <?php echo date_i18n('l, j F Y'); ?>
        </div>
        <a href="#" class="text-islamic-green hover:text-islamic-green/80 transition-colors">
          <?php echo get_svg_icon('arrow-up', '', 'h-5 w-5'); ?>
        </a>
      </div>
    </div>
  </nav>

  <template id="li-template">
    <li class="flex flex-col py-3 group">
      <a class="flex items-center text-base text-gray-700 hover:text-islamic-green transition-colors" href="#">
        <?php echo get_svg_icon('document-text', '', 'h-5 w-5 text-islamic-green my-2 ml-3 group-hover:scale-110 transition-transform'); ?>
        <span class="title-text font-semibold group-hover:mr-1 transition-all">نمونه مطلب #1</span>
      </a>
      <p class="text-sm text-gray-500 mr-8 line-clamp-2 mt-1 group-hover:text-gray-700 transition-colors"></p>
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
