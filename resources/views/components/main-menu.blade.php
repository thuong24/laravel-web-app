<div class="wrap_menu">
    <nav class="menu">
        <ul class="main_menu">
            @foreach ($listmenu as $item_menu)
            <x-main-menu-item :itemmenu="$item_menu" />
            @endforeach     
        </ul>
    </nav>
</div>