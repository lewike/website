@include('sections.page-header')
<main id="main" class="main bg-slate-50"> 
  <div class="container mx-auto py-6 md:py-8">
    @include('partials.page-header')
    <div class="px-2 py-4 md:px-16 md:py-8 shadow rounded bg-white page-content">
    @while(have_posts()) @php(the_post())
      @includeFirst(['partials.content-page', 'partials.content'])
    @endwhile
    </div>
  </div>
</main>
@include('sections.footer')
