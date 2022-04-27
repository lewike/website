@include('sections.page-header')
<main id="main" class="main bg-slate-50"> 
  <div class="container block pb-4 md:pb-0 md:flex mx-auto gap-6 post-content">
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