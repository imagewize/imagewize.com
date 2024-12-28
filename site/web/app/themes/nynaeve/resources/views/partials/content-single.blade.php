<article @php(post_class('h-entry container mx-auto max-w-5xl'))>
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div class="lg:col-span-2">
      <header>
        <h1 class="p-name font-open-sans font-semibold text-2xl text-black mb-8 antialiased mt-10">
          {!! $title !!}
        </h1>

        @include('partials.entry-meta')
      </header>

      <div class="e-content mt-3">
        @php(the_content())
      </div>

      @if ($pagination)
        <footer>
          <nav class="page-nav" aria-label="Page">
            {!! $pagination !!}
          </nav>
        </footer>
      @endif

      @php(comments_template())
    </div>

    <div class="lg:col-span-1 mt-10">
      @include('sections.sidebar')
    </div>
  </div>
</article>
