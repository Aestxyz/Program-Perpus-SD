<!-- Modal trigger button -->
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
    data-bs-target="#{{ $item->user->slug . '-' . $item->id }}">
    Detail
</button>

<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="{{ $item->user->slug . '-' . $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
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
                <div class="row">
                    <div class="col-md">
                        <div class="card-body text-start">
                            <p class="card-text">Nama : {{ $item->user->name }}</p>
                            <p class="card-text">Telp : {{ $item->user->telp }}</p>
                            <p class="card-text">NIS/Etc. : {{ $item->user->identify }}</p>
                            <p class="card-text">Jenis Kelamin : {{ $item->user->gender }}</p>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="card-body text-start">
                            <p class="card-text">Buku : {{ $item->book->title }}</p>
                            <p class="card-text">Tanggal Pinjam : {{ $item->borrow_date }}</p>
                            <p class="card-text">Tanggal kembali : {{ $item->return_date }}</p>
                            <p class="card-text">Status : <span class="badge bg-primary">{{ $item->status }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
