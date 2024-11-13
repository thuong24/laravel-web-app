<section class="instagram p-t-20">
    <div class="sec-title p-b-52 p-l-15 p-r-15">
        <h3 class="m-text5 t-center">
            @ Tin mới nhất
        </h3>
    </div>

    <div class="flex-w">
        @foreach ($listpost as $item_post)
        <div class="block4 wrap-pic-w">
            <img src="{{ asset('images/posts/' .$item_post->image)}}" alt="{{ $item_post->image }}" >
            <a href="chi-tiet-bai-viet/{{ $item_post->slug }}" class="block4-overlay sizefull ab-t-l trans-0-4">
                <span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
                    <i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
                    <span class="p-t-2">39</span>
                </span>

                <div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
                    <p class="s-text10 m-b-15 h-size1 of-hidden">
                        {{ $item_post->detail }}
                    </p>

                    <span class="s-text9">
                        {{ $item_post->description }}
                    </span>
                </div>
            </a>
            <div class="block2-txt p-t-20" style="text-align: center; padding-top: 20px;">{{ $item_post->title }}</div>

        </div>
        
        @endforeach

    </div>
</section>