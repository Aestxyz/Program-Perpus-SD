<!-- Modal trigger button -->
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
    data-bs-target="#{{ $penalty->transaction->user->slug . '-' . $penalty->transaction->id }}">
    Detail
</button>

<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="{{ $penalty->transaction->user->slug . '-' . $penalty->transaction->id }}" tabindex="-1"
    role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-wrap">
                    <h4 class="fw-bold">Informasi Peminjaman dan Pengembalian Buku
                        Perpustakaan</h4>
                    <p>Kode Peminjaman:</p>
                    <button type="button" disabled class="btn btn-body mb-4" style="outline-style: dashed;">
                        <span class="text-dark">{{ $penalty->transaction->code }}</span>
                </div>
                </button>
                <div class="row gy-2">
                    <div class="col-md">
                        <div class="card shadow-none">
                            <h5 class="card-header">Biodata Anggota</h5>
                            <div class="card-body text-start">
                                <p class="card-text">Nama : {{ $penalty->transaction->user->name }}</p>
                                <p class="card-text">Telp : {{ $penalty->transaction->user->telp }}</p>
                                <p class="card-text">NIS/Etc. : {{ $penalty->transaction->user->identify }}</p>
                                <p class="card-text">Jenis Kelamin : {{ $penalty->transaction->user->gender }}</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-md">
                        <div class="card shadow-none">
                            <h5 class="card-header">Peminjaman dan Pengembalian</h5>
                            <div class="card-body text-start">
                                <p class="card-text">Buku :
                                <ul>
                                    @foreach ($penalty->transaction->books as $item)
                                        <li>{{ $item->title }}</li>
                                    @endforeach
                                </ul>
                                </p>
                                <p class="card-text">Tanggal Pinjam : {{ $penalty->transaction->borrow_date }}</p>
                                <p class="card-text">Tanggal kembali : {{ $penalty->transaction->return_date }}</p>
                                <p class="card-text">Status : <span
                                        class="badge bg-primary">{{ $penalty->transaction->status }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
