<x-app-layout>

    <x-bladewind::table searchable="true" search_placeholder="Search assets" name="tabel_aset" has_border='true'>
        <x-slot name="header">
            <th>ID</th>
            <th>Status</th>
            <th>User (ID)</th>
            <th>Waktu Diajukan</th>
            <th>Nama Aset (ID)</th>
            <th>Kategori</th>
            <th>Tanggal Pinjam</th>
            <th>Keperluan</th>
        </x-slot>
        @foreach ($history_peminjaman as $peminjaman)
            <?php
            if ($peminjaman['status'] == 'PROSES'):
                $colour = '#3872C3';
            elseif ($peminjaman['status'] == 'DITERIMA'):
                $colour = '#6ABC90';
            elseif ($peminjaman['status'] == 'SELESAI'):
                $colour = '#9A82BB';
            else:
                $colour = '#E94759';
            endif;
            ?>
            <tr>
                <td class="w-20">{{ $peminjaman->id }}</td>
                <td class="w-48">
                    <div class="flex gap-3">      
                        <div >
                            <button onclick="showModal('edit-status-{{ $peminjaman->id }}')" class="text-center text-white p-3 w-24 rounded-xl" style="background-color: {{ $colour }};">
                                {{ $peminjaman->status }}
                            </button>
                        </div>
                        <x-bladewind::modal name="edit-status-{{ $peminjaman->id }}" title="Edit Status" ok_button_label="Save" close_after_action="false" ok_button_action="submitForm('status-form-{{ $peminjaman->id }}')">
                            <form action="{{ route('peminjaman.update') }}" method="POST" class="status-form" id="status-form-{{ $peminjaman->id }}">
                                @csrf
                                <div>
                                    <x-input-label for="status" :value="('Status')" />
                                    <select id="status" name="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-[#00B5DA] focus:border-[#00B5DA]">
                                        <option value="DITERIMA" {{ old('status', $peminjaman->status) == 'DITERIMA' ? 'selected' : '' }}>DITERIMA</option>
                                        <option value="PROSES" {{ old('status', $peminjaman->status) == 'PROSES' ? 'selected' : '' }}>PROSES</option>
                                        <option value="DITOLAK" {{ old('status', $peminjaman->status) == 'DITOLAK' ? 'selected' : '' }}>DITOLAK</option>
                                        <option value="SELESAI" {{ old('status', $peminjaman->status) == 'SELESAI' ? 'selected' : '' }}>SELESAI</option>
                                    </select>
                                    
                                    <x-input-error class="mt-2" :messages="$errors->get('status')" />
                                </div>
                                <input type="hidden" name="id" value="{{ $peminjaman->id }}">
                                <input type="hidden" name="id_aset" value="{{ $peminjaman->aset->id }}">
                                <input type="hidden" name="tanggal_pinjam" value="{{ $peminjaman->tanggal_pinjam }}">
                            </form>
                        </x-bladewind::modal>
                    </div>  
                </td>
                <td>{{ $peminjaman->user->username }} ({{ $peminjaman->user->id }})</td>
                <td>{{ date('d F Y, H:i', strtotime($peminjaman->created_at)) }}</td>
                <td>{{ $peminjaman->aset->nama }} ({{ $peminjaman->aset->id }})</td>
                <td>{{ $peminjaman->aset->kategori->nama }}</td>
                <td>{{ date('d F Y', strtotime($peminjaman->tanggal_pinjam)) }}</td>
                <td>{{ $peminjaman->keperluan }}</td>
                <td>
                    <form action="{{ route('peminjaman.destroy', $peminjaman->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600">
                            <x-icon name="heroicon-s-trash" class="h-6"/>
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </x-bladewind::table>
    <script>
        function submitForm(formID) {
            if (validateForm(formID)) {
                alert('Status Saved!');
                document.getElementById(formID).submit();
                hideModal('edit-status-' + formID.split('-').pop());
            } else {
                alert('Please fill all required fields.');
            }
        }
    </script>
</x-app-layout>