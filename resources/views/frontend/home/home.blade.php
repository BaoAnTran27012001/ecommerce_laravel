@extends('frontend.layouts.master')

@section('content')



    {{-- Banner Slider Start --}}
    @include('frontend.home.sections.banner-slider')
    {{-- Banner Slider End --}}



    {{-- Top Category Product Start --}}
    @include('frontend.home.sections.top-category-products')
    {{-- Top Category Product End --}}




    {{-- Brand Slider Start --}}
    @include('frontend.home.sections.brand-slider')
    {{-- Brand Slider End --}}


    {{-- Single Banner Start --}}
    @include('frontend.home.sections.single-banner')
    {{-- Single Banner End --}}


    {{-- Hot Deal Start --}}
    @include('frontend.home.sections.hot-deal')
    {{-- Hot Deal End --}}





    {{-- Category Product Slider One Start --}}
    @include('frontend.home.sections.category-products-slider-one')
    {{-- Category Product Slider One End --}}



    {{-- Category Product Slider Two Start --}}
    @include('frontend.home.sections.category-products-slider-two')
    {{-- Category Product Slider Two End --}}



@endsection
