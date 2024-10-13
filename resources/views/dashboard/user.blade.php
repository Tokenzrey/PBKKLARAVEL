<x-app-layout>
    <div class="flex-grow-0 flex-shrink-0 w-full xl:h-fit pb-10">
        <div class="flex max-xl:flex-wrap gap-4">
            <div class="flex-grow-0 flex-shrink-0 w-full">
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

                                <x-button-link href="/" class="text-neutral-10 border-0 !rounded-full mt-8"
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
                <div class="flex-grow-0 flex-shrink-0 w-full mt-4">
                    <div class="card p-0 max-xl:h-full max-xl:flex max-xl:justify-center">
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
                                        <x-typography as="span" variant="t" weight="bold"
                                            class="text-primary-secondary">
                                            {{ $jml_peminjaman }}
                                        </x-typography>
                                        yang melakukan peminjaman <br>
                                        <div class="flex gap-2 justify-center my-2">
                                            <x-typography as="b" variant="bt">Go to</x-typography>
                                            <x-heroicon-s-arrow-right class="w-[16px]" />
                                        </div>

                                        <x-unstyled-link href="/" as="p" variant="t" weight="bold"
                                            class="text-primary-secondary">
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
    </div>

</x-app-layout>
