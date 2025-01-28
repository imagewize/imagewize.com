@if(have_rows('page_builder'))
    @while(have_rows('page_builder'))
        @php(the_row())

        @if(get_row_layout() == 'page_intro_block')
            <section class="py-24 bg-bgGray">
                <div class="container mx-auto max-w-5xl px-4">
                    <div class="prose text-textBodyGray text-base leading-loose font-open-sans">
                        {!! get_sub_field('intro_text') !!}
                    </div>
                </div>
            </section>
        @endif
    @endwhile
@endif

<div class="page-container mb-16 font-open-sans text-textBodyGray text-base leading-loose">
  @php(the_content())

  @if ($pagination)
    <nav class="page-nav" aria-label="Page">
      {!! $pagination !!}
    </nav>
  @endif
</div>
