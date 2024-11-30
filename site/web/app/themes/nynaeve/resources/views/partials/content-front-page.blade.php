@php(the_content())

@if(have_rows('homepage_builder'))
    @while(have_rows('homepage_builder'))
        @php(the_row())

        @if(get_row_layout() == 'about_block')
            <section id="about">
                <div class="row section-head">
                    <div class="twelve columns">
                        <h2 class="section-header">{{ get_sub_field('about_title') }}</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="three columns tab-whole about-pic">
                        <div class="profile-pic">
                            @php($image = get_sub_field('about_profile_picture'))
                            @if(!empty($image))
                                <img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}">
                            @endif
                        </div>
                    </div>
                    <div class="nine columns tab-whole about-content">
                        <p class="lead">{{ get_sub_field('about_lead') }}</p>
                        {!! get_sub_field('about_text') !!}
                    </div>
                </div>
            </section>

        @elseif(get_row_layout() == 'services_intro')
            <section id="services">
                <div class="row section-head">
                    <div class="twelve columns">
                        <h2 class="section-header">{{ get_sub_field('services_title') }}</h2>
                        <p class="lead">{{ get_sub_field('services_introduction_text_block') }}</p>
                    </div>
                </div>

        @elseif(get_row_layout() == 'services_blocks')
            <div class="row">
                <div class="service-list bgrid-half tab-bgrid-whole group">
                    @if(have_rows('services_boxes'))
                        @while(have_rows('services_boxes'))
                            @php(the_row())
                            <div class="bgrid">
                                <span class="icon"><i class="{{ get_sub_field('text_box_icon') }}"></i></span>
                                <div class="service-content">
                                    <h3>{{ get_sub_field('text_box_title') }}</h3>
                                    {!! get_sub_field('text_box') !!}
                                </div>
                            </div>
                        @endwhile
                    @endif
                </div>
            </div>
            </section>

        @elseif(get_row_layout() == 'cta_banner')
            <section id="CTA">
                <div class="row cta-action">
                    <div class="twelve columns">
                        <h2 class="section-header">{{ get_sub_field('cta_title') }}</h2>
                        <p class="lead">{{ get_sub_field('cta_text') }}</p>
                        <a href="{{ get_sub_field('cta_button_url') }}" class="button">{{ get_sub_field('cta_button_text') }}</a>
                    </div>
                </div>
            </section>
        @endif
    @endwhile
@endif

@if($pagination)
    <nav class="page-nav" aria-label="Page">
        {!! $pagination !!}
    </nav>
@endif
