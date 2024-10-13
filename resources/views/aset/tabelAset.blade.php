<x-app-layout>
    <!-- Tambah Data -->
    <x-bladewind::button onclick="showModal('form-modal')">+ Tambah Data</x-bladewind::button>
    <x-bladewind::modal name="form-modal" title="Tambah Data Aset" ok_button_label="Save" close_after_action="false"
        ok_button_action="submitForm()">

        <form class="profile-form">
            <x-bladewind::input name="nama_penerima" label="Nama Penerima" required="true" placeholder="Masukkan nama"/>
            <div class="grid grid-cols-2 gap-4">
                    <x-bladewind::input name="vendor" label="Vendor" required="true"/>
                    <x-bladewind::input type="date" name="tanggal_pembelian" label="Tanggal Pembelian" required="true"/>
            </div>
            <x-bladewind::input name="nama_aset" label="Nama Aset" required="true" />
            <x-bladewind::input type="file" name="gambar_aset" label="Gambar Aset" required="true" />
        </form>
    </x-bladewind::modal>

    <x-bladewind::table searchable="true" search_placeholder="Search assets" name="tabel_aset" has_border='true'>
        <x-slot name="header">
            <th>ID</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Gambar</th>
            <th>Kondisi</th>
            <th>Lokasi</th>
            <th>Aksi</th>
        </x-slot>
        @foreach ($aset as $asset)
            <tr>
                <td>{{ $asset->id }}</td>
                <td>{{ $asset->kode }}</td>
                <td>{{ $asset->nama }}</td>
                <td><img alt="image" width="100" src="{{ asset('storage/' . $asset->gambar) }}"></td>
                <td>{{ $asset->kondisi }}</td>
                <td>{{ $asset->tempat }}</td>
                <td>
                    <x-icon-link icon="heroicon-o-qr-code" name="Tunjukkan QR Code" href="/aset/qrcode?id={{ $asset->id }}"/>
                    <x-icon-link icon="heroicon-s-eye" name="tampilkan_detail" href="/aset/show/{{ $asset->id }}"/>
                    <x-icon-button icon="heroicon-m-pencil-square" onclick="showModal('edit-asset')"/>
                    <x-bladewind::modal name="edit-asset" title="Edit Asset" ok_button_label="Save" close_after_action="false" ok_button_action="submitForm()">
                        <form class="profile-form">
                            <x-bladewind::input name="first_name" label="First Name" required="true" />
                            <x-bladewind::input name="last_name" label="Last Name" required="true" />
                            <x-bladewind::input name="email" label="Email" required="true" />
                        </form>
                    </x-bladewind::modal>
                    <x-icon-link icon="heroicon-s-trash" name="hapus_data" href="/vendor/delete/{{ $asset->id }}"/>
                </td>
            </tr>
        @endforeach
    </x-bladewind::table>

    <script>
        function submitForm() {
            if (validateForm('.profile-form')) {
                alert('Profile submitted successfully!');
                hideModal('form-modal');
            } else {
                alert('Please fill all required fields.');
            }
        }
    </script>
</x-app-layout>