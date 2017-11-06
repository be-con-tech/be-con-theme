@php($row_count = 1)
@if(have_rows('sections'))
    @while(have_rows('sections'))
        @php(the_row())
        @if(get_row_layout() == 'text_section')
            <section id="section-{{ $row_count }}" class="section text">
                <div class="wrapper">
                    <div class="row">
                        <div class="col-md-3 col-xs-12">
                            <h2><span>{{ get_sub_field(headline) }}</span></h2>
                        </div>
                        <div class="col-md-9 col-xs-12">
                            {{ get_sub_field('content') }}
                            @if(get_sub_field('button_text') && get_sub_field('button_link'))
                                <div class="button-row">
                                    <a href="{{ get_sub_field('button_link') }}" class="button">{{ get_sub_field('button_text') }}</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
        @elseif(get_row_layout() == 'half_section')
            <section id="section-{{ $row_count }}" class="section sidebyside {{ get_sub_field('background_color') }}">
                <div class="wrapper">
                    <div class="col-md-6 col-xs-12">
                        {{ get_sub_field('left_content') }}
                    </div>
                    <div class="col-md-6 col-xs-12">
                        {{ get_sub_field('right_content') }}
                    </div>
                </div>
            </section>
        @endif
        @php($row_count++)
    @endwhile
@else
    @include('partials.content-page')
@endif