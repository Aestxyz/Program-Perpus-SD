<a class="btn btn-secondary btn-sm"
    href="https://wa.me/{{ $item->user->telp }}?text=Hai%20*{{ $item->user->name }}*%2C%20%0A%0AIni%20adalah%20pemberitahuan%20bahwa%20buku%20yang%20kamu%20pinjam%20dari%20perpustakaan%20harus%20dikembalikan%20pada%20tanggal%20yang%20telah%20ditentukan.%20%0ATerima%20kasih%20atas%20kerja%20samanya.%0A%0ABuku%20%3A%20*{{ $item->book->title }}*%0ANama%20%3A%20*{{ $item->user->name }}*%0ATanggal%20Pinjam%20%3A%20*{{ $item->borrow_date }}*%0ATanggal%20Kembali%3A%20*{{ $item->return_date }}*%0A"
    target="_blank">Hubungi</a>
