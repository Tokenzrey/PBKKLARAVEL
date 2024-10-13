<!-- <pre>{{ print_r($history_peminjaman->toArray()) }}</pre> -->

<h1>anj</h1>

<x-app-layout>

    <x-bladewind::table searchable="true" search_placeholder="Search assets" name="tabel_aset" has_border='true'>
        <x-slot name="header">
            <th>No</th>
            <th>Status</th>
            <th>Tanggal Diajukan</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Tanggal Pinjam</th>
            <th>Keperluan</th>
        </x-slot>
        @php
            $no = 1;
        @endphp
        @foreach ($history_peminjaman as $peminjaman)
            <?php
            if ($peminjaman['status'] == 'PROSES'):
                $bg = 'bg-primary-main';
            elseif ($peminjaman['status'] == 'DITERIMA'):
                $bg = 'bg-success-main';
            elseif ($peminjaman['status'] == 'SELESAI'):
                $bg = 'bg-purple-10';
            else:
                $bg = 'bg-danger-main';
            endif;
            ?>
            <tr>
                <td class="w-20">{{ $no++ }}</td>
                <td class="w-36">
                    <div class="{{ $bg }} text-center text-white p-3 w-24 rounded-xl">
                        {{ $peminjaman->status }}
                    </div>
                </td>
                <td>{{ date('d F Y', strtotime($peminjaman->created_at)) }}</td>
                <td>{{ $peminjaman->aset->nama }}</td>
                <td>{{ $peminjaman->aset->kategori->nama }}</td>
                <td>{{ date('d F Y', strtotime($peminjaman->tanggal_pinjam)) }}</td>
                <td>{{ $peminjaman->keperluan }}</td>
            </tr>
        @endforeach
    </x-bladewind::table>

</x-app-layout>