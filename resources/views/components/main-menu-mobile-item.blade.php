@if (count($listmenumobi_sub)==0)
<li class="item-menu-mobile">
    <a href="/{{ $menumobi->link }}">{{ $menumobi->name }}</a>
</li>
@else
<li class="item-menu-mobile">
    <a href="{{ $menumobi->link }}">{{ $menumobi->name }}</a>
    <ul class="sub_menu">
        @foreach ($listmenumobi_sub as $itemmenumobi_sub)
        <li><a href="/{{ $itemmenumobi_sub->link }}">{{ $itemmenumobi_sub->name }}</a></li>
        @endforeach

    </ul>
</li>
@endif
