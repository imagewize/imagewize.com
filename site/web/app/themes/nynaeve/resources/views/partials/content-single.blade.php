<article @php(post_class('h-entry container mx-auto'))>
  <header>
    <h1 class="p-name font-open-sans font-semibold text-2xl text-black mb-8 antialiased">
      {!! $title !!}
    </h1>

    @include('partials.entry-meta')
  </header>

  <div class="e-content">
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
</article>
