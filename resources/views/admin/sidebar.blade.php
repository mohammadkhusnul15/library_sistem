<div class="col-md-3">
    @foreach($laravelAdminMenus->menus as $section)
        @if($section->items)
            @if ($section->section != "Tools" && $section->section != "Resources")
            <div class="card">
                <div class="card-header">
                    {{ $section->section }}
                </div>

                <div class="card-body">
                    <ul class="nav flex-column" role="tablist">
                        @foreach($section->items as $menu)
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" href="{{ url($menu->url) }}">
                                    {{ $menu->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
        @endif
    @endforeach

    <div class="card">
        <div class="card-header">
            Library
        </div>

        <div class="card-body">
            <ul class="nav flex-column" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="{{ url('admin/books') }}">
                        Books
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
