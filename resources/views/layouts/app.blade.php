<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="/css/styles.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="font-sans antialiased">
    <div id="main-wrapper" class="show min-h-screen">
        {{-- @include('layouts.navigation') --}}
        <div class="nav-header text-center !h-[80px] z-30">
            <div class="brand-title">
                <br>
                <h5><b>Management Asset App</b></h5>
            </div>
            <div class="nav-control">
                <div id="hamburger" class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>

        <div class="header border-b-neutral-40 !h-[80px] fixed bg-neutral-10 z-20">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="navbar-collapse justify-end">
                        <ul class="navbar-nav header-right">
                            {{-- @if (session('userdata')['status'] == 'ADMIN') --}}
                            <div class="header-profile flex items-center">
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                            <div>{{ Auth::user()->nama }}</div>

                                            <div class="ms-1 nav-link">
                                                <img src="{{ asset('storage/' . Auth::user()->gambar) }}" alt="Profile Image" />
                                            </div>
                                        </button>
                                    </x-slot>

                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('profile.edit')">
                                            {{ __('Profile') }}
                                        </x-dropdown-link>

                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                                            this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            </div>

                            {{-- @endif --}}
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <div class="dlabnav !fixed">
            <div class="dlabnav-scroll ps">
                {{-- sidebar --}}
                <div class="sidebar-user text-center">
                    <div class="badge-bottom mb-2">
                        <img alt="image" width="100" src="{{ asset('/images/inventory.png') }}">
                    </div>
                    <span class="badge badge-primary">
                        {{ Auth::user()->username }}
                    </span>
                </div>

                <ul class="metismenu" id="menu">
                    @if (Auth::user()->status === 'ADMIN')
                    <li class="mm-active">
                        <a href="{{ route('dashboard.admin') }}">
                            <x-heroicon-s-home class="icon" />
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-list-alt"></i>
                            <span class="nav-text">Master </span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/">Data Pengguna</a></li>
                            <li><a href="/">Data Divisi</a></li>
                            <li><a href="/">Data Vendor</a></li>
                            <li><a href="/">Data Kategori</a></li>
                            <li><a href="/">Data Lokasi</a></li>
                            <li><a href="/">Data Jenis Pemeliharaan</a></li>
                        </ul>
                    </li> --}}

                    <li class="">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="true">
                            <x-heroicon-s-briefcase class="icon" />
                            <span class="nav-text">Aset </span>
                        </a>
                        <ul aria-expanded="false" class="mm-collapse">
                            <li><a href="{{ route('aset.index') }}">Data Aset</a></li>
                            {{-- <li><a href="{{ route('aset.history') }}">History Aset</a></li> --}}
                            {{-- <li><a href="/">Scann QrCode</a></li> --}}
                            {{-- <li><a href="/">Penjadwalan Pemeliharaan</a></li> --}}
                        </ul>
                    </li>
                    @else
                    <li><a href="{{ route('dashboard.user') }}">
                            <x-heroicon-s-home class="icon" />
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    {{-- <li><a href="{{ route('peminjaman.index') }}">
                            <x-heroicon-m-shopping-cart class="icon" />
                            <span class="nav-text">Peminjaman Manual</span>
                        </a>
                    </li> --}}
                    {{-- <li><a href="/">
                            <x-heroicon-s-qr-code class="icon" />
                            <span class="nav-text">Peminjaman Qr-Code</span>
                        </a>
                    </li> --}}
                    {{-- <li><a href="/">
                            <i class="fa fa-file"></i>
                            <span class="nav-text">History Peminjaman</span>
                        </a>
                    </li> --}}
                    @endif
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <x-heroicon-m-shopping-cart class="icon" />
                            <span class="nav-text">Transaksi</span>
                        </a>
                        <ul aria-expanded="false" class="mm-collapse">
                            <li><a href="{{ route('peminjaman.index') }}">Peminjaman</a></li>
                            <li><a href="{{ route('peminjaman.user-data') }}">Data Peminjaman</a></li>
                            {{-- <li><a href="/">History Peminjaman</a></li> --}}
                        </ul>
                    </li>
                    <li><a href="{{ route('logout') }}">
                            <x-heroicon-s-arrow-left-start-on-rectangle class="icon" />
                            <span class="nav-text">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="content-body mt-20">
            <!-- row -->
            <div class="container-fluid">
                {{ $slot }}
            </div>
        </div>

        <!-- Page Content -->
        {{-- <main>
            {{ $slot }}
        </main> --}}
    </div>
    <script>
        document.getElementById('hamburger').addEventListener('click', function () {
                this.classList.toggle('is-active'); // Toggle 'is-active' class on hamburger
                document.getElementById('main-wrapper').classList.toggle('menu-toggle'); // Toggle 'menu-toggle' class on main-wrapper
            });

        document.addEventListener('DOMContentLoaded', function () {
        const menuItems = document.querySelectorAll('.metismenu > li');

        menuItems.forEach((item) => {
        item.addEventListener('click', function (e) {
        e.stopPropagation(); // Prevent event bubbling

        // Toggle mm-active on the clicked item
        item.classList.toggle('mm-active');

        // Toggle mm-show on the nested <ul> inside this item
            const subMenu = item.querySelector('ul');
            if (subMenu) {
            subMenu.classList.toggle('mm-show');
            }

            // Close other open menus (optional)
            menuItems.forEach((otherItem) => {
            if (otherItem !== item && otherItem.classList.contains('mm-active')) {
            otherItem.classList.remove('mm-active');
            const otherSubMenu = otherItem.querySelector('ul');
            if (otherSubMenu) {
            otherSubMenu.classList.remove('mm-show');
            }
            }
            });
            });
            });
            });
    </script>
</body>

</html>
