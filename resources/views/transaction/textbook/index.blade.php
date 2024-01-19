<x-auth.layout>
    <x-slot name="title">Peminjaman Buku Paket</x-slot>
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
        <h5 class="card-header mb-0 pb-0">Tambah Peminjaman Buku Paket</h5>
        @include('transaction.textbook.store')
    </div>

    {{-- <div class="nav-align-top mb-3">
        <ul class="nav nav-tabs nav-fill" role="tablist">
            <li class="nav-item">
                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                    data-bs-target="#navs-justified-walking" aria-controls="navs-justified-walking"
                    aria-selected="false"><i class="tf-icons mdi mdi-timer-sand-complete mdi-20px me-1"></i>
                    Berjalan
                    @if ($walking->count() > 0)
                        <span class="badge bg-primary">{{ $walking->count() }}</span>
                    @endif
                </button>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                    data-bs-target="#navs-justified-penalty" aria-controls="navs-justified-penalty"
                    aria-selected="false"><i class="tf-icons mdi mdi-alert-box-outline mdi-20px me-1"></i>
                    Terlambat
                    @if ($penalty->count() > 0)
                        <span class="badge bg-danger">{{ $penalty->count() }}</span>
                    @endif
                </button>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                    data-bs-target="#navs-justified-finished" aria-controls="navs-justified-finished"
                    aria-selected="false"><i class="tf-icons mdi mdi-tag-check mdi-20px me-1"></i>
                    Selesai
                    @if ($finished->count() > 0)
                        <span class="badge bg-success">{{ $finished->count() }}</span>
                    @endif
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
    </div> --}}

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="display table nowrap text-center" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>nama lengkap</th>
                            <th>status</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $no => $item)
                            <tr>
                                <td>{{ ++$no }}.</td>
                                <td>{{ $item->user->name ?? '-' }}</td>
                                <td>
                                    <span class="badge bg-white text-dark border">
                                        {{ $item->return_date < now() && $item->status == 'Berjalan' ? 'Terlambat' : $item->status }}
                                    </span>                                </td>
                                <td>{{ Carbon\carbon::parse($item->borrow_date)->format('d M Y') ?? '-' }}</td>
                                <td>{{ Carbon\carbon::parse($item->return_date)->format('d M Y') ?? '-' }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        @if ($item->return_date < now() && $item->status != 'Tolak' && $item->status != 'Menunggu' && $item->status != 'Selesai')
                                            <a class="btn btn-danger btn-sm"
                                                href="{{ route('penalties.show', $item->id) }}">Bayar</a>
                                        @elseif ($item->status == 'Berjalan')
                                            <form action="{{ route('transactions.finished', $item->id) }}"
                                                method="post">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-success btn-sm">Selesai</button>
                                            </form>
                                        @endif

                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('transactions.show', $item->id) }}" role="button">Lihat</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-auth.layout>
