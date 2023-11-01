<x-auth.layout>
    <x-slot name="title">Book {{ $book->title }}</x-slot>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Detail Buku</h5>
            <p class="mb-0"> Informasi yang diberikan di bawahnya akan berkaitan dengan detail atau rincian mengenai
                suatu buku.</p>
        </div>
        <div class="card shadow-none">
            <div class="row g-3">
                <div class="col-md">
                    <div class="card-body">
                        <div class="cursor-pointer row">
                            <img src="{{ Storage::url($book->image) }}" class="img rounded" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card-body">
                        <p class="fw-bold text-wrap mb-0">{{ $book->category->name }}</p>
                        <h2>{{ $book->title }}</h2>
                        <p>{{ $book->synopsis }}</p>
                        <div class="row mb-0">
                            <p class="text-wrap"><i class="mdi mdi-book-education mdi-24px me-2"></i>Tipe Buku :
                                {{ $book->type }}</p>
                            <p class="text-wrap"><i class="mdi mdi-identifier mdi-24px me-2"></i>ISBN:
                                {{ $book->isbn }}</p>
                            <p class="text-wrap"><i class="mdi mdi-counter mdi-24px me-2"></i>Jumlah Buku:
                                {{ $book->book_count }}</p>
                            <p class="text-wrap"><i class="mdi mdi-face-man mdi-24px me-2"></i>Penulis:
                                {{ $book->author }}</p>
                            <p class="text-wrap"><i class="mdi mdi-clipboard-text-clock mdi-24px me-2"></i>Tahun
                                Terbit:
                                {{ $book->year_published }}</p>
                            <p class="text-wrap"><i class="mdi mdi-domain mdi-24px me-2"></i>Penerbit:
                                {{ $book->publisher }}</p>
                            <div class="d-grid gap-3">
                                @include('book.update')
                                <form action="{{ route('books.destroy', $book->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger w-100">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-auth.layout>
