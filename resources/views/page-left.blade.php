<?php
/*
    template name: 左侧导航页面
*/
?>

<header id="header" class="z-10 drop-shadow-sm bg-white">
    <div class="flex container mx-auto justify-between sticky-bar items-center">
      <a class="brand" href="{{ home_url('/') }}">
        <img src="@asset('/images/weblogo.png')" alt="" class="logo">
      </a>
  
    @if (has_nav_menu('primary_navigation'))
      <nav class="nav-primary py-5" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav items-center', 'echo' => false]) !!}
      </nav>
    @endif
    </div>
  </header>
  
  <main id="main" class="main bg-slate-50"> 
    <div class="container mx-auto py-8">
      @include('partials.page-header')
      <div class="page-content flex gap-6">
          <div class="py-6 shadow rounded bg-white w-40">
            @if (has_nav_menu('primary_navigation'))
            {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'left-nav', 'echo' => false]) !!}
            @endif    
          </div>
          <div class="flex-auto px-16 py-8 shadow rounded bg-white">
            @while(have_posts()) @php(the_post())
            @php(the_content())
            @endwhile
          </div>
      </div>
    </div>
  </main>
  @include('sections.footer')