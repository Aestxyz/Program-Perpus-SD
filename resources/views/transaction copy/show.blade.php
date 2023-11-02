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
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="card">
                            <div class="card-body text-start">
                                <ul class="list-unstyled mt-2">
                                    @foreach ($item->books as $no => $book)
                                        <li class="text-wrap mb-3">Buku : {{ $book->title }}</li>
                                    @endforeach
                                    <li>Tanggal Pinjam : {{ $item->borrow_date }}</li>
                                    <li>Tanggal Kembali : {{ $item->return_date }}</li>
                                    <li>Status : {{ $item->status }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 text-start">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="d-flex justify-content-start align-items-center mb-4">
                                    <div class="d-flex flex-column">
                                        <a href="app-user-view-account.html">
                                            <h6 class="mb-1">{{ $item->user->name }}</h6>
                                        </a>
                                        <small>{{ $item->user->role }}</small>
                                    </div>
                                </div>
                                <p class=" mb-1">Email : {{ $item->user->email }}</p>
                                <p class=" mb-0">Telp : {{ $item->user->telp }}</p>
                                <p class=" mb-0">NIS/Etc. : {{ $item->user->identify }}</p>
                                <p class=" mb-0">Tanggal Lahir. : {{ $item->user->birthdate }}</p>
                                <p class=" mb-0">Jenis Kelamin : {{ $item->user->gender }}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
