<x-auth.layout>
    <x-slot name="title">Transaction Library</x-slot>
    @include('layouts.table')

    <div class="card mb-4">
        <div class="card-widget-separator-wrapper">
            <div class="card-body card-widget-separator">
                <div class="row gy-4 gy-sm-1">
                    <div class="col-sm col-lg">
                        <div
                            class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                            <div>
                                <h6 class="mb-2">Berjalan</h6>
                                <h4 class="mb-2">{{ $walking->count() }}</h4>
                            </div>
                            <div class="avatar me-4">
                                <span class="avatar-initial rounded bg-label-secondary">
                                    <i class="bx bx-laptop bx-sm"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm col-lg">
                        <div
                            class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                            <div>
                                <h6 class="mb-2">Terlambat</h6>
                                <h4 class="mb-2">{{ $penalty->count() }}</h4>
                            </div>
                            <div class="avatar me-4">
                                <span class="avatar-initial rounded bg-label-secondary">
                                    <i class="bx bx-gift bx-sm"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm col-lg">
                        <div
                            class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                            <div>
                                <h6 class="mb-2">Selesai</h6>
                                <h4 class="mb-2">{{ $finished->count() }}</h4>
                            </div>
                            <div class="avatar me-4">
                                <span class="avatar-initial rounded bg-label-secondary">
                                    <i class="bx bx-wallet bx-sm"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <h5 class="card-header mb-0 pb-0">Tambah Peminjaman Buku</h5>
        @include('transaction.store')
    </div>

    <div class="nav-align-top mb-3">
        <ul class="nav nav-tabs nav-fill" role="tablist">
            <li class="nav-item">
                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                    data-bs-target="#navs-justified-walking" aria-controls="navs-justified-walking"
                    aria-selected="false"><i class="tf-icons mdi mdi-timer-sand-complete mdi-20px me-1"></i>
                    Berjalan
                </button>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                    data-bs-target="#navs-justified-penalty" aria-controls="navs-justified-penalty"
                    aria-selected="false"><i class="tf-icons mdi mdi-alert-box-outline mdi-20px me-1"></i>
                    Terlambat
                </button>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                    data-bs-target="#navs-justified-finished" aria-controls="navs-justified-finished"
                    aria-selected="false"><i class="tf-icons mdi mdi-tag-check mdi-20px me-1"></i>
                    Selesai
                </button>
            </li>
        </ul>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="tab-content p-0">
                <div class="tab-pane fade show active" id="navs-justified-walking" role="tabpanel">
                    <div class="card-body">
                        @include('transaction.table.walking')
                    </div>
                </div>
                <div class="tab-pane fade" id="navs-justified-penalty" role="tabpanel">
                    <div class="card-body">
                        @include('transaction.table.penalty')
                    </div>
                </div>
                <div class="tab-pane fade" id="navs-justified-finished" role="tabpanel">
                    <div class="card-body">
                        @include('transaction.table.finished')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-auth.layout>
