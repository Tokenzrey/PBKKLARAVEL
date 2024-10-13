<x-app-layout>
    <div class="row mb-4">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class=" mt-2 mt-sm-0">
                        <a href="{{ route('aset.index') }}">
                            <i class="fa fa-arrow-circle-left"></i>
                        </a>
                    </div>
                    <div class="text-center">
                        <div class="clearfix"></div>
                        <div>
                            @if ($aset->gambar != null)
                            <img class="avatar-lg img-thumbnail" src="{{ asset('storage/' . $aset['gambar']) }}" alt=""
                                width="170px" />
                            @else
                            <img class="avatar-lg rounded-circle img-thumbnail" src="{{ asset('simas/images/ava.png') }}"
                                alt="" width="100px" />
                            @endif
                        </div>
                        <h5 class="mt-3 mb-1">
                            {{ $aset->nama }}
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <div class="profile-tab">
                        <div class="custom-tab-1">
                            <ul class="nav nav-tabs">
                                @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                                @endif
                                @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif
                                @php
                                $kat = old('kategori_id');
                                $ad = old('anggaran_dana_id');
                                $jp = old('jenis_pemeliharaan_id');
                                $rua = old('ruang_id');
                                $sup = old('vendor_id');
                                @endphp
                            </ul>
                            <div class="tab-content">
                                <div id="detail-aset" class="tab-pane fade active show">
                                    <div class="profile-personal-info">
                                        <h4 class="text-primary mt-5 mb-4"><u>Detail Aset {{ $aset->nama }}</u></h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5 class="mt-2">Kode Aset :
                                                    {{ $aset->kode }}
                                                </h5>
                                            </div>
                                            <div class="col-md-6">
                                                <h5 class="mt-2">Nama Aset :
                                                    {{ $aset->nama }}
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5 class="mt-2">Brand Aset :
                                                    {{ $aset->brand }}
                                                </h5>
                                            </div>
                                            <div class="col-md-6">
                                                <h5 class="mt-2">Vendor :
                                                    {{ $aset->vendor->nama }}
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5 class="mt-2">Nama Penerima :
                                                    {{ $aset->nama_penerima }}
                                                </h5>
                                            </div>
                                            <div class="col-md-6">
                                                <h5 class="mt-2">Kategori :
                                                    {{ $aset->kategori->nama }}
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5 class="mt-2"> Tanggal Pembelian:
                                                    {{ $aset->tanggal_pembelian }}
                                                </h5>
                                            </div>
                                            <div class="col-md-6">
                                                <h5 class="mt-2">Tempat Peletakan :
                                                    {{ $aset->tempat }}
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5 class="mt-2">Kondisi :
                                                    {{ $aset->kondisi }}
                                                </h5>
                                            </div>
                                            <div class="col-md-6">
                                                <h5 class="mt-2">Jenis Pemeliharaan :
                                                    {{ $aset->jenis_pemeliharaan->nama }}
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5 class="mt-2">Lokasi Aset :
                                                    {{ $aset->ruang->nama }}
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="row">

                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h5 class="mt-2">Deskripsi :
                                                    {{ $aset->deskripsi }}
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>