<?php
/*
    template name: 左侧导航页面
*/
?>

@include('sections.page-header')
  <main id="main" class="main bg-slate-50"> 
    <div class="container mx-auto py-6 md:py-8">
      @include('partials.page-header')
      <div class="page-content flex gap-6">
          <div class="hidden md:block py-6 shadow rounded bg-white w-40">
            @if (has_nav_menu('primary_navigation'))
            {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'left-nav', 'echo' => false]) !!}
            @endif    
          </div>
          <div class="flex-auto mx-2 md:mx-0 px-4 md:px-16 py-4 md:py-8 shadow rounded bg-white">
            @while(have_posts()) @php(the_post())
            @php(the_content())
            @endwhile
          </div>
      </div>
    </div>
  </main>
  @include('sections.footer')