<!-- Modal trigger button -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalId">
Tambah Data
</button>

<!-- Modal Body -->
<div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="modalTitleId">Buku</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
@csrf
<div class="modal-body">
<div class="mb-3">
    <label for="title" class="form-label">Judul Buku</label>
    <input type="text" class="form-control" name="title" id="title"
        value="{{ old('title') }}" aria-describedby="helpId" placeholder="Enter book title">
    @error('title')
        <small class="text-danger fw-bold">{{ $message }}</small>
    @enderror
</div>
<div class="row">
    <div class="col-md">
        <div class="mb-3">
            <label for="isbn" class="form-label">Kode ISBN</label>
            <input type="number" class="form-control" name="isbn" id="isbn"
                value="{{ old('isbn') }}" aria-describedby="helpId" placeholder="Enter book isbn">
            @error('isbn')
                <small class="text-danger fw-bold">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="col-md">
        <div class="mb-3">
            <label for="image" class="form-label">Gambar / Cover</label>
            <input type="file" class="form-control" name="image" id="image"
                aria-describedby="helpId" placeholder="Enter book image" required>
            @error('image')
                <small class="text-danger fw-bold">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md">
        <div class="mb-3">
            <label for="author" class="form-label">Penulis</label>
            <input type="text" class="form-control" name="author" id="author"
                value="{{ old('author') }}" aria-describedby="helpId"
                placeholder="Enter book author">
            @error('author')
                <small class="text-danger fw-bold">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="col-md">
        <div class="mb-3">
            <label for="year_published" class="form-label">Tahun Terbit</label>
            <input type="number" class="form-control" name="year_published" id="year_published"
                value="{{ old('year_published') }}" aria-describedby="helpId"
                placeholder="Enter book year published">
            @error('year_published')
                <small class="text-danger fw-bold">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="col-md">
        <div class="mb-3">
            <label for="publisher" class="form-label">Penerbit</label>
            <input type="text" class="form-control" name="publisher" id="publisher"
                value="{{ old('publisher') }}" aria-describedby="helpId"
                placeholder="Enter book publisher">
            @error('publisher')
                <small class="text-danger fw-bold">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md">
        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori Buku</label>
            <select class="form-select" name="category_id" id="category_id">
                <option selected>Select one</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md">
        <div class="mb-3">
            <label for="type" class="form-label">Tipe Buku</label>
            <select class="form-select" name="type" id="type">
                <option selected disabled>Select one</option>
                <option value="Umum">Umum</option>
                <option value="Paket">Paket</option>
            </select>
        </div>
    </div>
    <div class="col-md">
        <div class="mb-3">
            <label for="book_count" class="form-label">Jumlah Buku</label>
            <input type="number" class="form-control" name="book_count" id="book_count"
                value="{{ old('book_count') }}" aria-describedby="helpId"
                placeholder="Enter book book count">
            @error('book_count')
                <small class="text-danger fw-bold">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>
<div class="mb-3">
    <label for="synopsis" class="form-label">Sinopsis</label>
    <textarea class="form-control" name="synopsis" id="synopsis" rows="3">{{ old('synopsis') }}</textarea>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
<button type="submit" class="btn btn-primary">Simpan</button>
</div>
</form>
</div>
</div>
</div>
