<x-auth.layout>
    <x-slot name="title">Penalty Payment</x-slot>

    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="card-title text-center">
                        <h5 class="fw-bold">Pembayaran Denda Peminjaman dan Pengembalian Buku Perpustakaan</h5>
                    </div>
                </div>
                <div class="table-responsive">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Status</th>
                                    <th>Tanggal Lewat</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td>{{ $transaction->borrow_date }}</td>
                                    <td>{{ $transaction->return_date }}</td>
                                    <td><span class="badge bg-danger">{{ $transaction->status }}</span></td>
                                    <td>{{ $lates_day }} Hari Berlalu</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end align-items-center m-3 p-1">
                        <div class="order-calculations">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="w-px-100 text-heading">Denda:</span>
                                <h6 class="mb-0">{{ $lates_day }} Hari X Rp. {{ $penalty }}</h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="w-px-100 mb-0">Total:</h6>
                                <h6 class="mb-0">Rp. {{ $amount }}</h6>
                            </div>
                            <div class="my-5 text-center">
                                @include('penalty.store')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table border text-center">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>judul</th>
                                    <th>kategori buku</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaction->books as $no => $book)
                                    <tr>
                                        <td>{{ ++$no }}.</td>
                                        <td>{{ $book->title }}</td>
                                        <td><span class="badge bg-secondary">{{ $book->category->name }}</span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-12 col-lg-4">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="customer-avatar-section">
                        <div class="d-flex align-items-center flex-column">
                            <img class="img-fluid rounded my-3"
                                src="https://api.dicebear.com/7.x/lorelei-neutral/svg?seed={{ Auth()->user()->name }}"
                                height="110" width="110" alt="User avatar">
                            <div class="customer-info text-center">
                                <h4 class="mb-1">{{ $transaction->user->name }}</h4>
                                <small>NIS/Etc. {{ $transaction->user->identify }}</small>
                            </div>
                        </div>
                    </div>

                    <div class="info-container">
                        <small class="d-block pt-4 border-top text-muted my-3">DETAIL USER</small>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <span class="fw-medium me-2">Nama:</span>
                                <span>{{ $transaction->user->name }}</span>
                            </li>
                            {{-- <li class="mb-3">
                                <span class="fw-medium me-2">Email:</span>
                                <span>{{ $transaction->user->email }}</span>
                            </li> --}}
                            <li class="mb-3">
                                <span class="fw-medium me-2">Role:</span>
                                <span class="badge bg-label-success">{{ $transaction->user->role }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-medium me-2">Telp:</span>
                                <span>{{ $transaction->user->telp }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-medium me-2">NIS/Etc.:</span>
                                <span>{{ $transaction->user->identify }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-medium me-2">Jenis Kelamin:</span>
                                <span>{{ $transaction->user->gender }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-medium me-2">Tgl. Lahir:</span>
                                <span>{{ $transaction->user->birthdate }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</x-auth.layout>
