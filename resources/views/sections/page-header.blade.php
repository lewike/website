<header id="header" class="z-40 drop-shadow-sm bg-white">
    <div class="flex container mx-auto justify-between sticky-bar items-center">
      <a class="brand" href="{{ home_url('/') }}">
        <img src="@asset('/images/weblogo.png')" alt="" class="logo">
      </a>
      <div class="block md:hidden pr-6 mobile-menu">
        <div class="border-2 border-gray-800 h-0 w-8 mb-2"></div>
        <div class="border-2 border-gray-800 h-0 w-8 mb-2"></div>
        <div class="border-2 border-gray-800 h-0 w-8"></div>
      </div>
    @if (has_nav_menu('primary_navigation'))
      <nav class="nav-primary py-5 hidden md:block" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav items-center', 'echo' => false]) !!}
      </nav>
    @endif
    </div>
  </header>