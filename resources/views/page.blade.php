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
    <div class="px-16 py-8 shadow rounded bg-white page-content">
    @while(have_posts()) @php(the_post())
      @includeFirst(['partials.content-page', 'partials.content'])
    @endwhile
    </div>
  </div>
</main>
@include('sections.footer')
