<nav>
    <ul {!! $options !!}>
        @foreach ($menu_nodes as $key => $row)
            <li class="@if($row->has_child)  has-dropdown @endif {{ $row->css_class }} @if ($row->url == Request::url()) current @endif">
                <a href="{{ $row->url }}" target="{{ $row->target }}">
                    <i class='{{ trim($row->icon_font) }}'></i> <span>{{ $row->name }}</span>
                </a>
                @if ($row->has_child)
                    {!! Menu::generateMenu([
                        'slug' => $menu->slug,
                        'parent_id' => $row->id
                    ]) !!}
                @endif
            </li>
        @endforeach
    </ul>
</nav>