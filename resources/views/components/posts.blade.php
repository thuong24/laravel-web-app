<section class="blog bgwhite p-t-94 p-b-65">
    <div class="container">
        <div class="sec-title p-b-52">
            <h3 class="m-text5 t-center">
                Bài viết
            </h3>
        </div>

        <div class="row">
            @foreach ($listpost as $item_posts)
            <div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
                <!-- Block3 -->
                <div class="block3">
                    <a href="" class="block3-img dis-block hov-img-zoom">
                        <img src="{{ asset('images/posts/' .$item_posts->image)}}" alt="{{ $item_posts->image }}" width="720px" height="339px">
                    </a>

                    <div class="block3-txt p-t-14">
                        <h4 class="p-b-7">
                            <a href="" class="m-text11">
                                {{ $item_posts->title }}
                            </a>
                        </h4>

                        <span class="s-text6">Bởi</span> <span class="s-text7">{{ $item_posts->topicname }}</span>
                        <span class="s-text6">Vào</span> <span class="s-text7"><span>ngày {{ \Carbon\Carbon::parse($item_posts->created_at)->format('d') }} tháng {{ \Carbon\Carbon::parse($item_posts->created_at)->format('m') }} năm {{ \Carbon\Carbon::parse($item_posts->created_at)->format('Y') }}</span></span>

                        <p class="s-text8 p-t-16">
                            {{ $item_posts->detail }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
