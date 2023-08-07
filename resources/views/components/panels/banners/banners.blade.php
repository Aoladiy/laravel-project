@props(['banners'])
<section class="slider">
    <div data-slick-carousel>
        @foreach($banners as $banner)
            <x-panels.banners.banner :banner="$banner" />
        @endforeach
    </div>
</section>
