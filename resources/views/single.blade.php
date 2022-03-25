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
  <div class="container flex mx-auto gap-6 post-content">
    <div class="flex-auto">
      @while(have_posts()) @php(the_post())
        @includeFirst(['partials.content-single-' . get_post_type(), 'partials.content-single'])
      @endwhile
    </div>
    <div class="sidebar">
      @if (get_post_type() == 'post')
      @include('sections.post-sidebar')
      @else
      @include('sections.sidebar')
      @endif
    </div>
  </div>
</main>
@include('sections.footer')