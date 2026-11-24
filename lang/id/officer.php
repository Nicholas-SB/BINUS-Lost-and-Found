<?php
return [
    // navbar
    'dashboard' => 'Dasbor',
    'post_item' => 'Tambah Barang',
    'logout' => 'Keluar',

    // dashboard table
    'image' => 'Foto',
    'name' => 'Nama',
    'location' => 'Lokasi',
    'date_found' => 'Tanggal Ditemukan',
    'status' => 'Status',
    'action' => 'Aksi',

    // view dropdown
    'view' => 'Tampilan',
    'view_all' => 'Semua',
    'view_unclaimed' => 'Belum Diklaim',
    'view_claimed' => 'Sudah Diklaim',
    'view_transfer' => 'Siap Dipindahkan',
    'view_transferred' => 'Sudah Dipindahkan',

    // status badges (key = status value in the database)
    'status_unclaimed' => 'Belum Diklaim',
    'status_transferred' => 'Dipindahkan',
    'status_claimed' => 'Diklaim',

    // buttons
    'record_claim' => 'Catat Klaim',
    'transfer' => 'Pindahkan',
    'reprint_slip' => 'Cetak Ulang Slip Klaim',
    'cancel_claim' => 'Batalkan Klaim',
    'edit' => 'Ubah',
    'delete' => 'Hapus',
    'back_to_dashboard' => 'Kembali ke dasbor',

    // confirm popups
    'confirm_cancel_claim' => 'Batalkan klaim ini?',
    'confirm_delete' => 'Hapus barang ini? Tindakan ini tidak dapat dibatalkan.',

    // item detail (officer panel)
    'claimed_by' => 'Diklaim oleh :name pada :date',

    // item forms
    'log_item_title' => 'Catat barang temuan',
    'edit_item_title' => 'Ubah barang',
    'description' => 'Deskripsi',
    'category' => 'Kategori',
    'choose' => 'Pilih...',
    'location_found' => 'Lokasi ditemukan',
    'photo' => 'Foto',
    'keep_photo_hint' => 'Kosongkan untuk tetap memakai foto saat ini.',
    'save_item' => 'Simpan barang',
    'save_changes' => 'Simpan perubahan',

    // claim form
    'claimant_name' => 'Nama Pengklaim',
    'email' => 'Email',
    'phone' => 'Telepon',
    'nim' => 'NIM',

    // flash messages
    'flash_item_logged' => 'Barang berhasil dicatat.',
    'flash_item_updated' => 'Barang berhasil diperbarui.',
    'flash_item_deleted' => 'Barang berhasil dihapus.',
    'flash_item_transferred' => 'Ditandai sudah dipindahkan ke BM (Business Management).',
    'flash_already_claimed' => 'Barang tersebut sudah diklaim.',
    'flash_claim_reverted' => 'Klaim berhasil dibatalkan.',
];
