@php(the_content())

@if(have_rows('homepage_builder'))
    @while(have_rows('homepage_builder'))
        @php(the_row())

        @if(get_row_layout() == 'about_block')
            <section id="about" class="py-16">
                <div class="container mx-auto px-4">
                    <div class="mb-12">
                        <h2 class="text-3xl font-bold text-center">{{ get_sub_field('about_title') }}</h2>
                    </div>
                    <div class="flex flex-col md:flex-row gap-8">
                        <div class="md:w-1/4 w-full">
                            <div class="rounded-full overflow-hidden">
                                @php($image = get_sub_field('about_profile_picture'))
                                @if(!empty($image))
                                    <img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}" class="w-full">
                                @endif
                            </div>
                        </div>
                        <div class="md:w-3/4 w-full">
                            <p class="text-xl mb-6">{{ get_sub_field('about_lead') }}</p>
                            <div class="prose">{!! get_sub_field('about_text') !!}</div>
                        </div>
                    </div>
                </div>
            </section>

        @elseif(get_row_layout() == 'services_intro')
            <section id="services" class="py-16 bg-gray-50">
                <div class="container mx-auto px-4">
                    <div class="mb-12">
                        <h2 class="text-3xl font-bold text-center">{{ get_sub_field('services_title') }}</h2>
                        <p class="text-xl mt-4 text-center">{{ get_sub_field('services_introduction_text_block') }}</p>
                    </div>

        @elseif(get_row_layout() == 'services_blocks')
                <div class="grid md:grid-cols-2 gap-8">
                    @if(have_rows('services_boxes'))
                        @while(have_rows('services_boxes'))
                            @php(the_row())
                            <div class="bg-white p-6 rounded-lg shadow">
                                <span class="text-3xl text-primary-600 mb-4 block"><i class="{{ get_sub_field('text_box_icon') }}"></i></span>
                                <div>
                                    <h3 class="text-xl font-semibold mb-3">{{ get_sub_field('text_box_title') }}</h3>
                                    <div class="prose">{!! get_sub_field('text_box') !!}</div>
                                </div>
                            </div>
                        @endwhile
                    @endif
                </div>
            </section>

        @elseif(get_row_layout() == 'cta_banner')
            <section id="CTA" class="py-16 bg-primary-600 text-white">
                <div class="container mx-auto px-4 text-center">
                    <h2 class="text-3xl font-bold mb-6">{{ get_sub_field('cta_title') }}</h2>
                    <p class="text-xl mb-8">{{ get_sub_field('cta_text') }}</p>
                    <a href="{{ get_sub_field('cta_button_url') }}" class="inline-block px-8 py-3 bg-white text-primary-600 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                        {{ get_sub_field('cta_button_text') }}
                    </a>
                </div>
            </section>
        @endif
    @endwhile
@endif

@if($pagination)
    <nav class="page-nav mt-8" aria-label="Page">
        {!! $pagination !!}
    </nav>
@endif
