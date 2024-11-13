@if (count($listmenu_sub)==0)
<li>
    <a href="/{{ $menu->link }}">{{ $menu->name }}</a>
</li>
@else
<li>
    <a href="{{ $menu->link }}">{{ $menu->name }}</a>
    <ul class="sub_menu">
        @foreach ($listmenu_sub as $itemmenu_sub)
        <li><a href="/{{ $itemmenu_sub->link }}">{{ $itemmenu_sub->name }}</a></li>
        @endforeach
 
    </ul>
</li>
@endif