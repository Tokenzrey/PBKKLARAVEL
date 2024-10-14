<x-app-layout>
    <div class="flex-grow-0 flex-shrink-0 w-full xl:h-fit pb-10">
        <div class="flex max-xl:flex-wrap gap-4">
            <div class="flex-grow-0 flex-shrink-0 w-1/2">
                <div class="flex xl:flex-wrap gap-4 xl:h-full">
                    <div class="flex-grow-0 flex-shrink-0 w-full">
                        <div class="card relative bg-primary-secondary p-10">
                            <div class="flex justify-between flex-grow flex-shrink">
                                <div class="col-xl-7 col-sm-6">
                                    <x-typography as="h4" weight="bold" variant="h5" class="text-neutral-10">
                                        Selamat Datang
                                    </x-typography>

                                    <x-typography as="span" variant="p2" class="block mt-6 text-neutral-10">
                                        Terus pantau dan kelola aset agar dapat terkelola dengan baik
                                    </x-typography>

                                    <x-button-link href="{{ route('aset.index') }}" class="text-neutral-10 border-0 !rounded-full mt-8"
                                        variant="warning">
                                        Lihat Daftar Aset
                                    </x-button-link>
                                </div>
                                <div class="col-xl-5 col-sm-6">
                                    <img src="{{ asset('/images/chart.png') }}" alt=""
                                        class="sd-shape transform scale-110 animate-move-element">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-grow-0 flex-shrink-0 w-full">
                        <div class="card p-0 max-xl:h-full max-xl:flex max-xl:justify-center" >
                            <div class="card-body p-10">
                                <div class="flex flex-wrap">
                                    <div class="flex-grow-0 flex-shrink-0 w-full col-sm-12">
                                        @php
                                        $aa = 0;
                                        $bb = 0;
                                        @endphp
                                        @foreach ($viewTotalPeminjaman as $x)
                                        @if ($x->status == 'PROSES')
                                        @php
                                        $aa = $x->jumlah;
                                        @endphp
                                        @elseif ($x->status == 'DITERIMA')
                                        @php
                                        $bb = $x->jumlah;
                                        @endphp
                                        @endif
                                        @endforeach
                                        @php
                                        $hsl = $aa + $bb;
                                        $hslpersenanbaru = ($hsl * 100) / $jml_aset;
                                        @endphp

                                        <x-typography as="span" variant="t" weight="semibold"
                                            class="text-center block mb-2">
                                            Total
                                            <x-typography as="span" variant="t" weight="bold" class="text-primary-secondary">
                                                {{ $jml_peminjaman }}
                                            </x-typography>
                                             peminjaman <br>
                                            <div class="flex gap-2 justify-center my-2">
                                                <x-typography as="b" variant="bt">Go to</x-typography>
                                                <x-heroicon-s-arrow-right class="w-[16px]" />
                                            </div>

                                            <x-unstyled-link href="{{ route('peminjaman.user-data') }}" as="p" variant="t" weight="bold" class="text-primary-secondary">
                                                Data Peminjaman
                                            </x-unstyled-link>
                                        </x-typography>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-grow-0 flex-shrink-0 w-full xl:w-1/2 xl:h-full">
                <div class="">
                    <div class="flex-grow-0 flex-shrink-0 w-full">
                        <div class="card p-5">
                            <canvas id="myChart" height="430px" aria-label="Hello ARIA World" role="img"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('vendor/chart.js/Chart.bundle.min.js') }}"></script>
    <script>
        const kategori = {!! json_encode(array_keys($kategoriAsset_count)) !!}; // Mengambil nama kategori sebagai label
        const data = {
            labels: kategori,
            datasets: [{
                data: Object.values({!! json_encode($kategoriAsset_count) !!}), // Mengambil jumlah aset sebagai data
                backgroundColor: [
                    '#E01E37',
                    '#00B4D8',
                    '#FAD643',
                    '#52B788',
                ]
            }]
        };

        // Opsi untuk chart
        const options = {
            responsive: true,
            title: {
                display: true,
                text: 'Jumlah aset per kategori',
                fontSize: 32,
                fontColor: '#000',
                padding: 44
            }
        };

        // Inisialisasi chart
        const ctx = document.getElementById('myChart').getContext('2d');
        const myPieChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: options
        });
    </script>

</x-app-layout>
