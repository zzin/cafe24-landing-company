<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <?php wp_head(); ?>
  <script>
  try {
    if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
      document.documentElement.classList.add('dark')
    } else {
      document.documentElement.classList.remove('dark')
    }
  } catch (_) {}
  </script>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <div id="page" class="site" data-aos="header-eff" data-aos-duration="50" data-aos-easing="ease-in-out" data-aos-anchor-placement="top-top" data-aos-offset="200">
    <a class="skip-link screen-reader-text" href="#primary">
      <?php esc_html_e('Skip to content', '_s'); ?>
    </a>

    <header id="masthead" class="site-header">
      <div class="site-header--wrap">
        <div class="site-header--branding">
          <h1 class="site-title">
            <?php the_custom_logo(); ?>
          </h1>
        </div><!-- .site-branding -->
        <nav id="site-navigation" class="main-navigation">
          <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
            <span></span><span></span><span></span>
          </button>
          <?php wp_nav_menu([
            'theme_location' => 'menu-1',
            'menu_id' => 'primary-menu',
          ]); ?>
          <div class="toggle-mode select-none opacity-0 transition-opacity z-30">
            <label for="toggleTheme" class="flex items-center cursor-pointer">
              <div class="relative">
                <input type="checkbox" id="toggleTheme" class="sr-only">
                <div class="block border border-white/50 bg-white/40 w-14 h-8 rounded-full dark:bg-gray-950/90 dark:border-black"></div>
                <svg xmlns="http://www.w3.org/2000/svg" class="absolute h-4 w-4 top-2 left-2 stroke-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="absolute h-4 w-4 top-2 right-2 stroke-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                </svg>
                <div class="dot absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition overflow-hidden dark:bg-black">
                  <div class="dot-inner flex w-12 h-6 items-center absolute py-1 transition duration-500 delay-75">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-1 stroke-violet-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-1 stroke-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                  </div>
                </div>
              </div>
            </label>
          </div>
        </nav><!-- #site-navigation -->
      </div>
    </header><!-- #masthead -->