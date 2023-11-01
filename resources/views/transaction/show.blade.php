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
                <div class="row m-5">
                    <div class="col-md">
                        <p class="card-text">Nama : {{ $item->user->name }}</p>
                        <p class="card-text">Telp : {{ $item->user->telp }}</p>
                    </div>
                    <div class="col-md">
                        <p class="card-text">NIS/Etc. : {{ $item->user->identify }}</p>
                        <p class="card-text">Jenis Kelamin : {{ $item->user->gender }}</p>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table border">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>judul</th>
                                <th>kategori buku</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($item->books as $no => $book)
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
</div>
