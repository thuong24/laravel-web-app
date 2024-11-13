<div class="wrap-side-menu" >
    <nav class="side-menu">
        <ul class="main-menu">
            <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                <span class="topbar-child1">
                    Miễn phí vận chuyển cho đơn hàng tiêu chuẩn trên 1000k
                </span>
            </li>

            <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                <div class="topbar-child2-mobile">
                    <span class="topbar-email">
                        fashe@gmail.com
                    </span>

                    <div class="topbar-language rs1-select2">
                        <select class="selection-1" name="time">
                            <option>VND</option>
                            <option>USD</option>
                        </select>
                    </div>
                </div>
            </li>

            <li class="item-topbar-mobile p-l-10">
                <div class="topbar-social-mobile">
                    <a href="#" class="topbar-social-item fa fa-facebook"></a>
                    <a href="#" class="topbar-social-item fa fa-instagram"></a>
                    <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
                    <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
                    <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
                </div>
            </li>
            @foreach ($listmenumobi as $item_menumobi)
            <x-main-menu-mobile-item :itemmenumobi="$item_menumobi" />
            @endforeach
        </ul>
    </nav>
</div>
