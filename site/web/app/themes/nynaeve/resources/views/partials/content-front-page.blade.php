@php(the_content())

@if(have_rows('homepage_builder'))
    @while(have_rows('homepage_builder'))
        @php(the_row())

        @if(get_row_layout() == 'about_block')
            <section id="about" class="py-24 bg-bgGray">
                <div class="container mx-auto max-w-5xl px-4">
                    <div class="flex flex-col md:flex-row gap-8">
                        <div class="md:w-1/4 w-full">
                            <div id="about-profile" class="rounded-full overflow-hidden w-24 h-24 border-8 border-borderGray mx-auto">
                                @php($image = get_sub_field('about_profile_picture'))
                                @if(!empty($image))
                                    <img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}" class="w-full h-full object-cover">
                                @endif
                            </div>
                        </div>
                        <div class="md:w-3/4 w-full">
                            <h2 id="about-header" class="text-3xl font-open-sans font-semi-bold mb-6">{{ get_sub_field('about_title') }}</h2>
                            <p class="text-xl leading-relaxed font-light mb-6 text-textBodyGray font-open-sans">{{ get_sub_field('about_lead') }}</p>
                            <div class="prose text-textBodyGray text-base leading-loose font-open-sans">{!! get_sub_field('about_text') !!}</div>
                        </div>
                    </div>
                </div>
            </section>

        @elseif(get_row_layout() == 'services_intro')
            <section id="services" class="py-16 bg-gray-50">
                <div class="container mx-auto max-w-4xl px-4">
                    <div class="mb-12">
                        <h2 class="text-3xl font-bold text-center font-open-sans">{{ get_sub_field('services_title') }}</h2>
                        <p class="mx-auto  max-w-2xl text-xl leading-relaxed my-8 text-center text-textBodyGray font-open-sans font-light container">
                          {{ get_sub_field('services_introduction_text_block') }}
                        </p>
                    </div>

        @elseif(get_row_layout() == 'services_blocks')
                <div class="grid md:grid-cols-2 gap-8">
                    @if(have_rows('services_boxes'))
                        @while(have_rows('services_boxes'))
                            @php(the_row())
                            <div class="bg-white p-6 rounded-lg">
                                <span class="text-3xl text-primary-600 mb-4 block"><i class="{{ get_sub_field('text_box_icon') }}">
                                </i></span>
                                <div>
                                    <h3 class="text-xl font-semibold mb-3">{{ get_sub_field('text_box_title') }}</h3>
                                    <div class="prose text-textBodyGray font-open-sans leading-loose">{!! get_sub_field('text_box') !!}</div>
                                </div>
                            </div>
                        @endwhile
                    @endif
                </div>
            </section>

        @elseif(get_row_layout() == 'cta_banner')
            <section id="CTA" class="py-16 bg-ctaBlue text-white">
                <div class="container mx-auto max-w-2xl px-4 text-center">
                    <h2 class="text-3xl font-open-sans font-bold my-6">{{ get_sub_field('cta_title') }}</h2>
                    <p class="text-lg font-open-sans mb-8">{{ get_sub_field('cta_text') }}</p>
                    <a href="{{ get_sub_field('cta_button_url') }}" class="inline-flex items-center justify-center h-16 w-full max-w-80 px-8 py-3 
                    bg-ctaButtonBlue hover:bg-ctaButtonBlueHover text-white rounded-lg font-semibold">
                        {{ get_sub_field('cta_button_text') }}
                    </a>
                </div>
            </section>
            <section id="reviews" class="bg-orange-500 py-24">
              <div class="container mx-auto max-w-xl">
                <h2 class="text-3xl font-open-sans font-bold text-white text-center mb-10">
                  Client Reviews.</h2>
              </div>
              <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 text-white">
                <!-- Review 1 -->
                <div class="text-center">
                  <img
                    src="@asset('images/profiles/dall-e-profile-stylish-male.webp')"
                    alt="Profile 1"
                    class="w-24 h-24 mx-auto rounded-full mb-4"
                  />
                  <p class="text-lg font-base font-open-sans">"This service is fantastic! Highly recommend to anyone."</p>
                </div>
                <!-- Review 2 -->
                <div class="text-center">
                  <img
                    src="@asset('images/profiles/dall-e-profile-female.webp')"
                    alt="Profile 2"
                    class="w-24 h-24 mx-auto rounded-full mb-4"
                  />
                  <p class="text-lg font-base font-open-sans">"Amazing experience. The quality exceeded my expectations."</p>
                </div>
                <!-- Review 3 -->
                <div class="text-center">
                  <img
                    src="@asset('images/profiles/dall-e-profile image-male.webp')"
                    alt="Profile 3"
                    class="w-24 h-24 mx-auto rounded-full mb-4"
                  />
                  <p class="text-lg font-base font-open-sans">"Outstanding support and attention to detail. Five stars!"</p>
                </div>
              </div>
            </section

        @endif
    @endwhile
@endif

@if($pagination)
    <nav class="page-nav mt-8" aria-label="Page">
        {!! $pagination !!}
    </nav>
@endif
