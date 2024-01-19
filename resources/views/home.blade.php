<x-auth.layout>
    <x-slot name="title">Beranda</x-slot>
    <div class="card">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card-body">
                    <h4 class="card-title display-6 mb-4 text-truncate lh-sm">Hallo {{ Auth()->user()->name }}!🎉</h4>
                    <p class="mb-0">Selamat menjalankan tugas dan semoga harimu menyenangkan.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 position-relative text-center">
                <img src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/img/illustrations/man-with-laptop-light.png"
                    class="card-img-position bottom-0 w-50 end-0 scaleX-n1-rtl" alt="View Profile">
            </div>
        </div>
    </div>

    <div class="card my-3">
        <div class="card-widget-separator-wrapper">
            <div class="card-body card-widget-separator">
                <div class="row gy-4 gy-sm-1">
                    <div class="col-md">
                        <div
                            class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                            <div>
                                <h3 class="mb-1">{{ $books }}</h3>
                                <p class="mb-0">JUmlah Buku</p>
                            </div>
                            <span class="badge bg-label-secondary rounded p-2 me-sm-4">
                                <i class='bx bxs-book-content'></i> </span>
                        </div>
                        <hr class="d-none d-sm-block d-lg-none me-4">
                    </div>
                    <div class="col-md">
                        <div
                            class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                            <div>
                                <h3 class="mb-1">{{ $generalbooks }}</h3>
                                <p class="mb-0">Buku Umum</p>
                            </div>
                            <span class="badge bg-label-secondary rounded p-2 me-sm-4">
                                <i class='bx bxs-book-alt'></i> </span>
                        </div>
                        <hr class="d-none d-sm-block d-lg-none me-4">
                    </div>
                    <div class="col-md">
                        <div
                            class="d-flex justify-content-between align-items-start border-end pb-3 pb-sm-0 card-widget-3">
                            <div>
                                <h3 class="mb-1">{{ $textbooks }}</h3>
                                <p class="mb-0">Buku Paket</p>
                            </div>
                            <span class="badge bg-label-secondary rounded p-2 me-sm-4">
                                <i class='bx bx-book-alt'></i> </span>
                        </div>
                        <hr class="d-none d-sm-block d-lg-none me-4">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card my-3">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title m-0 me-2">Rekap Data Perpustakaan</h5>
        </div>
        <div class="card-body row g-3">
            <div class="row">
                <div class="col-md mb-5">
                    <div class="demo-vertical-spacing">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{ $books }}%;"
                                aria-valuenow="{{ $books }}" aria-valuemin="0" aria-valuemax="100">
                                {{ $books }}</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $members }}%;"
                                aria-valuenow="{{ $members }}" aria-valuemin="0" aria-valuemax="100">
                                {{ $members }}</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" style="width: {{ $officers }}%;"
                                aria-valuenow="{{ $officers }}" aria-valuemin="0" aria-valuemax="100">
                                {{ $officers }}</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-secondary" role="progressbar"
                                style="width: {{ $transactions }}%;" aria-valuenow="{{ $transactions }}"
                                aria-valuemin="0" aria-valuemax="100">
                                {{ $transactions }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex justify-content-around align-items-center">
                    <div>
                        <div class="d-flex align-items-baseline">
                            <span class="text-primary me-2"><i class="bx bxs-circle"></i></span>
                            <div>
                                <p class="mb-2">Total Buku</p>
                                <h5> {{ $books }} Buku
                                </h5>
                            </div>
                        </div>
                        <div class="d-flex align-items-baseline my-3">
                            <span class="text-success me-2"><i class="bx bxs-circle"></i></span>
                            <div>
                                <p class="mb-2">Total Anggota</p>
                                <h5> {{ $members }} Anggota
                                </h5>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="d-flex align-items-baseline">
                            <span class="text-info me-2"><i class="bx bxs-circle"></i></span>
                            <div>
                                <p class="mb-2">Total Petugas</p>
                                <h5> {{ $officers }} Anggota
                                </h5>
                            </div>
                        </div>
                        <div class="d-flex align-items-baseline my-3">
                            <span class="text-secondary me-2"><i class="bx bxs-circle"></i></span>
                            <div>
                                <p class="mb-2">Total Peminjaman</p>
                                <h5> {{ $transactions }} Peminjaman
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-auth.layout>
