<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul class="sidebar-vertical">
                <?php
                $menus = [
                    // admin
                    (object) [
                        'name' => 'Beranda',
                        'icon' => 'la la-dashboard',
                        'link' => '/managements/dashboard',
                        'childs' => [],
                    ],
                    (object) [
                        'title' => 'Management',
                    ],
                    (object) [
                        'name' => 'Pengguna',
                        'icon' => 'la la-users',
                        'link' => '/managements/users',
                        'childs' => [],
                    ],

                    (object) [
                        'title' => 'Akun',
                    ],
                    (object) [
                        'name' => 'Ganti Password',
                        'icon' => 'la la-unlock-alt',
                        'link' => '/profile',
                        'childs' => [],
                    ],
                    (object) [
                        'name' => 'Logout',
                        'icon' => 'la la-sign-out-alt',
                        'link' => '/logout',
                        'childs' => [],
                    ],
                ];
                ?>

                @foreach ($menus as $menu)
                    @if (isset($menu->title))
                        <li class="menu-title">
                            <span>{{ $menu->title }}</span>
                        </li>
                        @continue
                    @endif

                    <li class="{{ Request::is($menu->link . '*') ? 'active' : '' }}">
                        <a href="{{ isset($menu->childs) && count($menu->childs) ? '#' : $menu->link }}">
                            <i class="{{ $menu->icon }}"></i>
                            <span> {{ $menu->name }}</span>
                            @if (isset($menu->childs) && count($menu->childs))
                                <span class="menu-arrow"></span>
                            @endif
                        </a>
                        @if (isset($menu->childs) && count($menu->childs) > 0)
                            <ul style="display: none">
                                @foreach ($menu->childs as $child)
                                    @php($haveChild = isset($child->childs) && count($child->childs) > 0)
                                    <li>
                                        <a class="{{ Request::is($child->link) ? 'active text-white' : '' }}"
                                            href="{{ $child->link }}">
                                            {{ $child->name }}
                                            @if($haveChild)
                                                <span class="menu-arrow"></span>
                                            @endif
                                        </a>
                                        @if ($haveChild)
                                            <ul style="display: none;">
                                                @foreach ($child->childs as $subChild)
                                                    <li><a href="javascript:void(0);"><span>{{ $subChild->name }}</span></a></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
