<!-- Modal trigger button -->
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
    data-bs-target="#{{ $item->user->slug . '-' . $item->id }}">
    Detail
</button>

<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="{{ $item->user->slug . '-' . $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-wrap">
                    <h4 class="fw-bold">Informasi Peminjaman dan Pengembalian Buku
                        Perpustakaan</h4>
                </div>
                </button>
                <div class="row gap-3 text-start">
                    <div class="col-md">
                        <div class="card text-wrap">
                            <div class="card-body rounded shadow">
                                <h4 class="card-title text-truncate">Transaksi</h4>
                                <dl class="row">
                                    <dt class="col-sm-4">Buku</dt>
                                    <dd class="col-sm-8">
                                        <ul>
                                            @foreach ($item->books as $book)
                                                <li>{{ $book->title }}</li>
                                            @endforeach
                                        </ul>
                                    </dd>

                                    <dt class="col-sm-4">Status</dt>
                                    <dd class="col-sm-8">
                                        <span class="badge bg-label-primary">{{ $item->status }}</span>
                                    </dd>

                                    <dt class="col-sm-4">Tgl. Pinjam</dt>
                                    <dd class="col-sm-8">
                                        {{ $item->borrow_date }}
                                    </dd>

                                    <dt class="col-sm-4">Tgl. Kembali</dt>
                                    <dd class="col-sm-8">
                                        {{ $item->return_date }}
                                    </dd>
                                </dl>
                            </div>
                            <div class="col-12 col-md-6">
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="card-body rounded shadow">
                            <h4 class="card-title text-truncate">User</h4>
                            <dl class="row">
                                <dt class="col-sm-4">nama</dt>
                                <dd class="col-sm-8">{{ $item->user->name }}</dd>
                                <dt class="col-sm-4">role</dt>
                                <dd class="col-sm-8">{{ $item->user->role }}</dd>

                                <dt class="col-sm-4">Email</dt>
                                <dd class="col-sm-8">{{ $item->user->email }}</dd>
                                <dt class="col-sm-4">Telp</dt>
                                <dd class="col-sm-8">{{ $item->user->telp }}</dd>
                                <dt class="col-sm-4">NIS/Etc.</dt>
                                <dd class="col-sm-8">{{ $item->user->identify }}</dd>
                                <dt class="col-sm-4">Tgl. Lahir</dt>
                                <dd class="col-sm-8">{{ $item->user->birthdate }}</dd>
                                <dt class="col-sm-4">Jenis Kelamin</dt>
                                <dd class="col-sm-8">{{ $item->user->gender }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
