<!-- <pre>{{ print_r($asets->toArray()) }}</pre> -->
<!-- <pre>{{ print_r($kategori->toArray()) }}</pre> -->

<!-- <pre>{{ print_r(session()->all()) }}</pre> -->
<!-- <pre>{{ print_r(Auth::user()->status) }}</pre>   -->


<!-- @if (Auth::user()->status == 'ADMIN')
    <h2>
        Transaksi <i class="fa fa-solid fa-arrow-right"></i> Peminjaman
    </h2>
@else
<h2>
    Peminjaman <i class="fa fa-solid fa-arrow-right"></i> Manual
</h2>
@endif -->

@php
    $kat = old('kategori_id');
    $rua = old('ruang_id');
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f6f6;
            margin: 0;
            padding: 20px;
        }

        .search-container {
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .search-container input[type="text"] {
            width: 300px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .search-container button {
            background-color: #00a9e0;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-left: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .card {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 0 auto;
            text-align: center;
        }

        .card img {
            width: 100%;
            border-radius: 10px;
        }

        .card .item-title {
            font-size: 20px;
            font-weight: bold;
            margin-top: 10px;
        }

        .card .details {
            margin: 15px 0;
        }

        .details a {
            color: #00a9e0;
            text-decoration: none;
        }

        .card button {
            background-color: #00a9e0;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<x-app-layout>
    <body>

        <div class="search-container">
            <form action="" method="get">
                <div class="input">
                    <div class="input-group mb-3">
                        <input type="text" id="keyword_search" name="keyword_search" class="form-control" placeholder="Search"
                            value="{{ request('keyword_search') }}">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>

        </div>
        @foreach ($asets as $asset)
            <div class="card">
                <div class="item-title">{{ $asset -> nama }}</div>
                <img src="https://via.placeholder.com/300x200" alt="Komputer Image">
                <div class="details">
                    <p><a href="#">Kategori</a> {{ $asset -> kategori_nama }}</p>
                    <p><a href="#">Lokasi</a> {{ $asset -> ruang_nama }}</p>
                    <p><a href="#">Tempat</a> {{ $asset -> tempat }}</p>
                </div>

                <!-- BladeWind button to open modal -->
                <section>
                    <x-bladewind::button onclick="showModal('form-modal')">Pinjam</x-bladewind::button>
                    <!-- Modal form to post data -->
                    <x-bladewind::modal name="form-modal" title="Pinjam Barang" ok_button_label="Pinjam" close_after_action="false"
                        ok_button_action="submitForm()">
                        
                        <!-- Form starts here -->
                        <form action="{{ route('peminjaman.store') }}" method="POST" class="profile-form" id="peminjaman-form">
                            @csrf <!-- CSRF protection -->
                            <!-- Example fields, modify as needed -->
                            <x-bladewind::input name="tanggal_pinjam" label="Tanggal Peminjaman" required="true" type="date"/>
                            <x-bladewind::input name="keperluan" label="Keperluan" required="true" />
                            <input type="hidden" name="aset_id" value="{{ $asset->id }}">
                            <button type="submit" class="hidden-submit-button" style="display: none;">Pinjam</button>
                        </form>
                    </x-bladewind::modal>
                </section>
            </div>
        @endforeach
    </body>

    <!-- JavaScript to handle the modal form submission -->
    <script>
        function submitForm() {
            if (validateForm('.profile-form')) {
                // Submit the form
                document.getElementById('peminjaman-form').submit();
            } else {
                alert('Please fill all required fields.');
            }
        }
    </script>
</x-app-layout>
</html>


 


