@include('layouts.select2')
<form action="{{ route('textbooks.update', $transaction->id) }}" method="post">
    @csrf
    @method('PUT')
    <input type="hidden" name="status" value="Berjalan">
    <div class="card-body">
        <div class="row">
            <div class="col-md">
                <div class="mb-3">
                    <label for="user_id" class="form-label">Nama Lengkap</label>
                    <select class="form-select" name="user_id" id="user_id">
                        <option>Select one</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}"
                                {{ $transaction->user->id == $user->id ? 'selected' : '' }}>-
                                {{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md">
                <div class="mb-3">
                    <label for="book_id" class="form-label">Buku</label>
                    <select id="select2Multiple" class="select2 form-select bg-body" name="book_id[]" multiple>
                        @foreach ($books as $book)
                            @foreach ($transaction->books as $item)
                                <option class="text-truncate {{ $book->book_count == 0 ? 'text-danger' : '' }}"
                                    value="{{ $book->id }}" {{ $book->book_count == 0 ? 'disabled' : '' }}
                                    {{ $book->id == $item->id ? 'selected' : '' }}>
                                    {{ $book->title }} : {{ $book->book_count }}
                                </option>
                            @endforeach
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md">
                <div class="mb-3">
                    <label for="borrow_date" class="form-label">Tanggal Pinjam</label>
                    <input type="date" class="form-control" value="{{ $transaction->borrow_date }}"
                        name="borrow_date" id="borrow_date" aria-describedby="helpId" placeholder="borrow_date">
                </div>
            </div>
            <div class="col-md">
                <div class="mb-3">
                    <label for="return_date" class="form-label">Tanggal Kembali</label>
                    <input type="date" class="form-control" value="{{ $transaction->return_date }}"
                        name="return_date" id="return_date" aria-describedby="helpId" placeholder="return_date">
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" name="status" id="status">
                <option disabled>Select one</option>
                <option {{ $transaction->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                <option {{ $transaction->status == 'Berjalan' ? 'selected' : '' }}>Berjalan</option>
                <option {{ $transaction->status == 'Terlambat' ? 'selected' : '' }}>Terlambat</option>
                <option {{ $transaction->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>
