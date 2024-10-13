<x-app-layout>
    <!-- Tambah Data -->
    <x-bladewind::button onclick="showModal('form-modal')">+ Tambah Data</x-bladewind::button>
    <x-bladewind::modal name="form-modal" title="Tambah Data Aset" ok_button_label="Save" close_after_action="false" class="w-1/2" size="xl">

        <form class="profile-form" action="{{ route('aset.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-bladewind::input name="nama_penerima" label="Nama Penerima" required="true" placeholder="Masukkan nama"/>
            <div class="grid grid-cols-2 gap-4">
                <x-bladewind::dropdown
                    placeholder="Pilih Vendor"
                    name="vendor_id"
                    label="Vendor"
                    label_key="nama"
                    value_key="id"
                    required="true"
                    :data="$vendor" />

                <x-bladewind::input type="date" name='tanggal_pembelian' label="Tanggal Pembelian" required="true"/>
            </div>
            <x-bladewind::input name="nama" label="Nama Aset" required="true" />
            <x-bladewind::input type="file" name="gambar" label="Gambar Aset" required="true" />
            <div class="grid grid-cols-2 gap-4">
                    <x-bladewind::input name="brand" label="Brand" required="true" placeholder="Masukkan Brand Aset"/>
                    <x-bladewind::dropdown
                        placeholder="Pilih Jenis Pemeliharaan"
                        name="jenis_pemeliharaan_id"
                        label="Jenis Pemeliharaan"
                        label_key="nama"
                        value_key="id"
                        required="true"
                        :data="$jenis_pemeliharaan" />
            </div>

            <div class="grid grid-cols-2 gap-4">
                    <x-bladewind::dropdown
                        placeholder="Pilih Lokasi"
                        name="ruang_id"
                        label="Lokasi"
                        label_key="nama"
                        value_key="id"
                        required="true"
                        :data="$ruang" />
                    <x-bladewind::dropdown
                        placeholder="Pilih Kategori Aset"
                        name="kategori_id"
                        label="Kategori Aset"
                        label_key="nama"
                        value_key="id"
                        required="true"
                        :data="$kategori" />
            </div>
            <div class="grid grid-cols-2 gap-4">
                <x-bladewind::input name="tempat" label="Penempatan Aset" required="true" placeholder="Masukkan Penempatan Aset" />
                <x-bladewind::input name="kondisi" label="Kondisi Aset" required="true" placeholder="Masukkan Kondisi Aset" />
            </div>
            <x-bladewind::input name="deskripsi" label="Deskripsi Aset" required="true" placeholder="Masukkan Serial Number Aset" />
            <button type="submit" class="btn btn-primary">Save</button>
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
                    <x-icon-link icon="heroicon-s-eye" name="tampilkan_detail" 
                                href="{{ route('aset.show', ['id' => $asset->id]) }}" />
                    
                    <!-- Trigger Modal -->
                    <x-icon-button icon="heroicon-m-pencil-square" 
                                onclick="showModal('edit-asset-{{ $asset->id }}')" />

                    <!-- Modal for Each Asset -->
                    <x-bladewind::modal name="edit-asset-{{ $asset->id }}" 
                                        title="Edit Asset" 
                                        ok_button_label="Save" 
                                        close_after_action="false" 
                                        class="w-1/2" 
                                        size="xl">
                        <form class="profile-form" 
                            action="{{ route('aset.update', $asset->id) }}" 
                            method="POST" 
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <x-bladewind::input name="kode_edit_{{ $asset->id }}" 
                                                label="Kode" 
                                                value="{{ $asset->kode }}" />

                            <x-bladewind::input name="nama_penerima_edit_{{ $asset->id }}" 
                                                label="Nama Penerima"
                                                value="{{ $asset->nama_penerima }}" 
                                                required="true" 
                                                placeholder="Masukkan nama" />

                            <div class="grid grid-cols-2 gap-4">
                                <x-bladewind::dropdown placeholder="Pilih Vendor" 
                                                        name="vendor_id_edit_{{ $asset->id }}"
                                                        selected_value="{{ $asset->vendor_id }}" 
                                                        label="Vendor" 
                                                        label_key="nama" 
                                                        value_key="id" 
                                                        required="true" 
                                                        :data="$vendor" />

                                <x-bladewind::input type="date" 
                                                    name="tanggal_pembelian_edit_{{ $asset->id }}"
                                                    value="{{ $asset->tanggal_pembelian }}" 
                                                    label="Tanggal Pembelian" 
                                                    required="true" />
                            </div>

                            <x-bladewind::input name="nama_edit_{{ $asset->id }}"
                                                value="{{ $asset->nama}}" 
                                                label="Nama Aset" 
                                                required="true" />

                            <x-bladewind::input type="file" 
                                                name="gambar_edit_{{ $asset->id }}"
                                                value="{{ $asset->gambar }}" 
                                                label="Gambar Aset" />

                            <div class="grid grid-cols-2 gap-4">
                                <x-bladewind::input name="brand_edit_{{ $asset->id }}" 
                                                    label="Brand"
                                                    value="{{ $asset->brand }}" 
                                                    required="true" 
                                                    placeholder="Masukkan Brand Aset" />

                                <x-bladewind::dropdown placeholder="Pilih Jenis Pemeliharaan" 
                                                        name="jenis_pemeliharaan_id_edit_{{ $asset->id }}" 
                                                        label="Jenis Pemeliharaan"
                                                        selected_value="{{ $asset->jenis_pemeliharaan_id }}" 
                                                        label_key="nama" 
                                                        value_key="id" 
                                                        required="true" 
                                                        :data="$jenis_pemeliharaan" />
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <x-bladewind::dropdown placeholder="Pilih Lokasi" 
                                                        name="ruang_id_edit_{{ $asset->id }}" 
                                                        label="Lokasi"
                                                        selected_value="{{ $asset->ruang_id }}" 
                                                        label_key="nama" 
                                                        value_key="id" 
                                                        required="true" 
                                                        :data="$ruang" />

                                <x-bladewind::dropdown placeholder="Pilih Kategori Aset" 
                                                        name="kategori_id_edit_{{ $asset->id }}" 
                                                        label="Kategori Aset"
                                                        selected_value="{{ $asset->kategori_id }}" 
                                                        label_key="nama"
                                                        value_key="id" 
                                                        required="true" 
                                                        :data="$kategori" />
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <x-bladewind::input name="tempat_edit_{{ $asset->id }}" 
                                                    label="Penempatan Aset"
                                                    value="{{ $asset->tempat }}" 
                                                    required="true" 
                                                    placeholder="Masukkan Penempatan Aset" />

                                <x-bladewind::input name="kondisi_edit_{{ $asset->id }}" 
                                                    label="Kondisi Aset"
                                                    value="{{ $asset->kondisi }}" 
                                                    required="true" 
                                                    placeholder="Masukkan Kondisi Aset" />
                            </div>

                            <x-bladewind::input name="deskripsi_edit_{{ $asset->id }}" 
                                                label="Deskripsi Aset"
                                                value="{{ $asset->deskripsi }}" 
                                                required="true" 
                                                placeholder="Masukkan Serial Number Aset" />

                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </x-bladewind::modal>

                    <x-icon-link icon="heroicon-s-trash" name="hapus_data" 
                                href="{{ route('aset.destroy', ['id' => $asset->id]) }}" />
                </td>
            </tr>
        @endforeach
    </x-bladewind::table>
</x-app-layout>