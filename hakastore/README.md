# 🌟 HakaStore Official Store — WordPress WooCommerce Theme

Tema WordPress e-commerce modern dengan estetika **Dark Luxury & Gold Accent** yang dirancang khusus untuk toko resmi (*single seller*) yang menjual **produk digital (instant download)** maupun **produk fisik (pengiriman kurir)** dengan sistem registrasi eksklusif untuk **pembeli (customer only)** dan **pembaruan otomatis 1-klik via GitHub**.

---

## 📋 Daftar Isi
1. [Fitur Unggulan](#-fitur-unggulan)
2. [Persyaratan Sistem](#-persyaratan-sistem)
3. [Panduan Instalasi Tema](#-panduan-instalasi-tema)
4. [Pengaturan Tema via WordPress Customizer](#-pengaturan-tema-via-wordpress-customizer)
5. [Tutorial Unggah Produk Digital (Download Otomatis 24/7)](#-tutorial-unggah-produk-digital)
6. [Tutorial Unggah Produk Fisik (Pengiriman Kurir)](#-tutorial-unggah-produk-fisik)
7. [Alur Pembelian & Pengiriman File](#-alur-pembelian--pengiriman-file)
8. [Tutorial Pembaruan Otomatis (Auto-Update via GitHub)](#-tutorial-pembaruan-otomatis-auto-update-via-github)
9. [Struktur Berkas Tema](#-struktur-berkas-tema)
10. [Rekomendasi Plugin Pendukung](#-rekomendasi-plugin-pendukung)
11. [Tanya Jawab (FAQ) & Solusi](#-tanya-jawab-faq--solusi)

---

## ✨ Fitur Unggulan

- **💎 Desain Dark Luxury & Gold**: Palet warna gelap elegan (`#0A0A0F`, `#151522`) dipadu aksen emas mewah (`#D4AF37`) dengan tipografi Google Fonts modern (*Sora* & *Inter*).
- **🔒 Model Toko Tunggal (Penjual Hanya Anda)**: Penjualan terpusat dari satu pemilik toko resmi tanpa sistem multi-vendor rumit. Semua produk berlabel **`✓ HakaStore Official Store`**.
- **👤 Registrasi Khusus Pembeli**: Formulir pendaftaran hanya untuk pelanggan (*role customer*). Pengguna non-admin secara otomatis dicegah mengakses `/wp-admin` dan bilah admin WordPress disembunyikan agar tampilan toko tetap bersih dan profesional.
- **⚡ Pengiriman File Digital Otomatis**: Pembeli langsung menerima file seketika setelah pembayaran terverifikasi lewat 3 jalur: layar konfirmasi (*Thank You page*), email otomatis, dan dashboard akun (*My Account > Unduhan*).
- **📦 Dukungan Produk Fisik Lengkap**: Manajemen stok gudang, perhitungan ongkir, dan input nomor resi pengiriman kurir (JNE, J&T, SiCepat, dll).
- **📌 Fixed Sticky Header**: Bilah navigasi, kolom pencarian, dan keranjang belanja tetap diam di posisi atas layar saat halaman digulir (*scroll*).
- **⬆️ Tombol Melayang Back to Top**: Tombol panah melayang di kanan bawah yang otomatis muncul saat scroll dan mengembalikan halaman ke atas secara halus (*smooth scroll*).
- **📱 Responsif & Ramah Layar Ponsel (Mobile-First)**:
  - Kartu produk tampil 2 kolom proporsional di layar ponsel.
  - Kategori produk dapat digeser ke samping (*horizontal touch swipe with snap*).
  - Menu navigasi mobile drawer yang mulus.
  - Ukuran target sentuh nyaman (minimal 44px).
- **🔄 Pembaruan Otomatis 1-Klik (Auto-Update via GitHub)**: Dilengkapi updater bawaan. Begitu Anda rilis versi baru di GitHub, dashboard WordPress akan memunculkan tombol *'Perbarui Sekarang'* seperti tema resmi.
- **⚙️ Pengaturan Penuh via WordPress Customizer**: Ubah warna aksen emas, teks hero banner, 4 poin keunggulan toko, banner pelanggan, serta kontak WhatsApp/Instagram langsung dari dashboard admin tanpa sentuh kode.

---

## 💻 Persyaratan Sistem

- **WordPress**: Versi 6.0 atau yang lebih baru.
- **PHP**: Versi 8.0 atau yang lebih baru.
- **Plugin Wajib**: **WooCommerce** (gratis dari repositori WordPress).
- **Web Server**: Apache / Nginx / LiteSpeed.

---

## 🚀 Panduan Instalasi Tema

### Langkah 1: Unggah Tema ke WordPress
1. Buka dashboard WordPress admin Anda (`https://domain-anda.com/wp-admin`).
2. Masuk ke menu **Tampilan > Tema** (*Appearance > Themes*).
3. Klik tombol **Tambah Tema Baru > Unggah Tema** (*Add New Theme > Upload Theme*).
4. Pilih berkas **`hakastore.zip`** dari komputer Anda.
5. Klik **Pasang Sekarang** (*Install Now*).
6. Setelah proses instalasi selesai, klik **Aktifkan** (*Activate*).

### Langkah 2: Pasang Plugin WooCommerce
1. Masuk ke menu **Plugin > Tambah Baru** (*Plugins > Add New*).
2. Cari plugin **WooCommerce** lalu klik **Pasang Sekarang** dan **Aktifkan**.
3. Ikuti wizard panduan toko WooCommerce (atur mata uang ke **IDR - Rupiah Indonesia**).

### Langkah 3: Data Demo Bawaan
Saat tema HakaStore diaktifkan pertama kali bersama WooCommerce, tema secara otomatis menginstal beberapa contoh produk digital dan fisik agar toko langsung tampak lengkap untuk pengujian.

---

## 🎨 Pengaturan Tema via WordPress Customizer

Semua teks, warna, dan kontak toko dapat diubah kapan saja melalui menu kustomisasi WordPress:

1. Buka **Tampilan > Sesuaikan** (*Appearance > Customize*).
2. Klik panel **⚡ Pengaturan HakaTimes Store / HakaStore**.
3. Di dalamnya tersedia opsi:
   - **🎨 Warna & Identitas Toko**:
     - *Warna Aksen Utama (Gold)*: Pilih warna emas favorit Anda dengan color picker.
     - *Label Toko Resmi*: Ubah nama brand resmi toko Anda.
   - **🏠 Hero Banner Beranda**:
     - Ubah teks label kecil (*Eyebrow*).
     - Ubah judul utama dan deskripsi perkenalan toko.
     - Ubah teks tombol belanja utama.
   - **⭐ Keunggulan Toko (4 Poin)**:
     - Ubah judul dan deskripsi 4 keunggulan toko Anda.
   - **🎁 Banner Akun Pelanggan**:
     - Ubah judul dan teks ajakan pendaftaran pembeli.
   - **📞 Kontak & Sosial Media**:
     - *Nomor WhatsApp Admin*: Masukkan nomor WA dengan format internasional tanpa tanda `+` (contoh: `6281234567890`). Tombol chat WA akan otomatis aktif di footer.
     - *Link Instagram*: Masukkan URL profil Instagram toko Anda.
     - *Deskripsi Footer*: Ubah teks keterangan singkat di footer.
4. Klik **Terbitkan** (*Publish*) untuk menyimpan perubahan.

---

## ⚡ Tutorial Unggah Produk Digital

Ikuti langkah-langkah ini setiap kali Anda ingin menambahkan produk digital baru (seperti template desain, ebook, source code, kursus video, audio, atau software):

1. Masuk ke menu **Produk > Tambah Baru** (*Products > Add New*).
2. Tuliskan **Nama Produk** dan **Deskripsi Lengkap**.
3. Tetapkan **Gambar Produk** (*Product Image*) sebagai cover produk.
4. Gulir ke bagian **Data Produk** (*Product Data*):
   - Pilih jenis produk: **Produk sederhana** (*Simple product*).
   - **WAJIB CENTANG**:
     - ☑️ **Virtual** *(Otomatis menghilangkan ongkir dan alamat pengiriman saat checkout)*.
     - ☑️ **Dapat Diunduh / Downloadable** *(Membuka opsi pengunggahan file)*.
5. Masukkan **Harga Normal** (dan **Harga Diskon** jika sedang promo).
6. Di bagian **File yang dapat diunduh** (*Downloadable files*):
   - Klik **Tambah File** (*Add File*).
   - Tulis nama file (contoh: `Template UI Dashboard Pro v2.0 (ZIP)`).
   - Klik **Pilih File** lalu unggah berkas `.zip`, `.pdf`, atau dokumen Anda.
   - *Catatan File Besar*: Jika ukuran file lebih dari 100MB (misal video kursus 5GB), Anda bisa memasukkan tautan Google Drive / Dropbox privat di kolom URL file.
7. Pengaturan Unduhan:
   - **Batas Unduhan** (*Download limit*): Kosongkan agar pembeli bisa mengunduh tanpa batas.
   - **Kedaluwarsa Unduhan** (*Download expiry*): Kosongkan agar link unduhan aktif selamanya.
8. Pilih Kategori Produk (misal: *Software & Plugin*, *Ebook*, atau *Desain & Template*).
9. Klik **Terbitkan** (*Publish*).

Produk digital Anda kini otomatis mendapatkan badge ungu **`⚡ Digital`** di halaman depan dan toko!

---

## 📦 Tutorial Unggah Produk Fisik

Gunakan langkah ini untuk produk fisik yang memerlukan pengiriman kurir (misal: pakaian, tas, tumbler, buku cetak, aksesoris, atau elektronik):

1. Masuk ke **Produk > Tambah Baru** (*Products > Add New*).
2. Isi nama, deskripsi, foto cover, dan galeri foto produk.
3. Di kotak **Data Produk**:
   - Biarkan kotak *Virtual* dan *Downloadable* **TIDAK DICENTANG**.
4. Masukkan **Harga Produk**.
5. Klik tab **Inventaris** (*Inventory*):
   - Centang *Kelola Stok* dan masukkan jumlah stok yang tersedia di gudang Anda.
6. Klik tab **Pengiriman** (*Shipping*):
   - Masukkan **Berat** (dalam kg) dan dimensi paket untuk perhitungan ongkir otomatis.
7. Pilih Kategori Produk (misal: *Fashion & Pakaian*, *Elektronik*, dsb).
8. Klik **Terbitkan** (*Publish*).

Produk fisik akan otomatis diberi badge biru **`📦 Fisik`** lengkap dengan estimasi pengiriman dan garansi retur di halaman produk.

---

## 🔄 Alur Pembelian & Pengiriman File

### 1. Alur Pembelian Produk Digital
```
[Pembeli Memilih Produk Digital] 
              ↓
[Klik Beli & Checkout] (Hanya isi Nama, Email & No. HP — Tanpa Alamat Pengiriman)
              ↓
[Pembayaran via QRIS / Bank / E-Wallet]
              ↓
[Sistem Otomatis Mendeteksi Pembayaran Lunas (Completed)]
              ↓
File Otomatis Diterima Pembeli Lewat 3 Jalur Sekaligus:
1. Tombol Download Langsung di Layar (Thank You Page)
2. Link File Masuk ke Email Pembeli
3. Tersimpan Seumur Hidup di Akun Pembeli (Dashboard > Unduhan)
```

### 2. Alur Pembelian Produk Fisik
```
[Pembeli Memilih Produk Fisik]
              ↓
[Checkout Lengkap: Alamat Pengiriman Rumah/Kantor & Pilihan Kurir]
              ↓
[Pembeli Membayar Pesanan]
              ↓
[Penjual Mengemas Barang & Mengirim via Ekspedisi]
              ↓
[Penjual Memasukkan Nomor Resi di Dashboard Pesanan]
              ↓
[Pembeli Melacak Status Resi di Akun Saya > Riwayat Pesanan]
```

---

## 🔄 Tutorial Pembaruan Otomatis (Auto-Update via GitHub)

Tema HakaStore telah dilengkapi dengan **fitur update otomatis resmi** (`inc/class-theme-updater.php`) yang terhubung langsung ke repositori GitHub:
👉 **[https://github.com/hakastudio/hakastore](https://github.com/hakastudio/hakastore)**

### A. Alur Kerja Sistem Pembaruan Otomatis
```
[Anda Rilis Versi Baru di GitHub (misal: v1.0.2)]
                      ↓
[GitHub Actions Otomatis Merilis hakastore.zip]
                      ↓
[WordPress Mendeteksi Ada Versi Baru dari API GitHub]
                      ↓
[Muncul Notifikasi "Perbarui Sekarang" di Dashboard WP]
                      ↓
[Admin Klik "Perbarui Sekarang" -> Selesai dalam 5 Detik!]
```

---

### B. Tutorial Langkah demi Langkah untuk Melakukan Update di Masa Depan

Bila suatu saat Anda ingin memperbaiki kode, menambah fitur, atau mengganti desain tema:

#### Langkah 1: Ubah Nomor Versi di Berkas Tema
Buka dan naikkan nomor versi di 2 berkas berikut:
1. **`hakastore/style.css`**:
   ```css
   /* Ubah dari 1.0.1 menjadi versi baru, misal 1.0.2 */
   Version: 1.0.2
   ```
2. **`hakastore/functions.php`**:
   ```php
   // Ubah dari 1.0.1 menjadi versi baru
   define( 'HAKASTORE_VERSION', '1.0.2' );
   ```

#### Langkah 2: Commit dan Buat Tag Rilis di Terminal
Jalankan perintah berikut di folder proyek Anda:
```bash
# 1. Tambahkan semua perubahan file
git add .

# 2. Buat commit pesan perbaikan
git commit -m "feat: rilis pembaruan tema v1.0.2"

# 3. Buat Git Tag rilis baru (sesuai nomor versi)
git tag -a v1.0.2 -m "Rilis HakaStore v1.0.2"

# 4. Push kode dan tag baru ke GitHub
git push origin main --tags
```

#### Langkah 3: GitHub Actions Bekerja Otomatis
Setelah perintah `git push` selesai:
- GitHub Actions akan otomatis mengompres folder `hakastore/` menjadi paket **`hakastore.zip`**.
- Paket zip tersebut otomatis diunggah ke halaman [GitHub Releases](https://github.com/hakastudio/hakastore/releases) dengan tag `v1.0.2`.

#### Langkah 4: Cara Memperbarui dari Dashboard WordPress
1. Buka dashboard WordPress Anda.
2. Masuk ke menu **Dasbor > Pembaruan** (*Dashboard > Updates*) atau **Tampilan > Tema** (*Appearance > Themes*).
3. Anda akan melihat notifikasi pembaruan tema HakaStore:
   > *"Ada versi baru dari HakaStore tersedia. **Perbarui sekarang**."*
4. Klik tombol **"Perbarui sekarang"** (*Update now*).
5. WordPress akan otomatis mengunduh berkas `hakastore.zip` terbaru dari GitHub dan memperbarui tema Anda dalam beberapa detik!

> 💡 **Tips Memaksa Pengecekan Update Instan**:
> WordPress menyimpan cache pemeriksaan update selama beberapa jam. Jika Anda baru saja merilis tag di GitHub dan ingin melihat notifikasinya detik itu juga, cukup buka **Dasbor > Pembaruan** lalu klik tombol **"Periksa Lagi"** (*Check Again*).

---

## 📁 Struktur Berkas Tema

```
hakastore/
├── README.md                      # Panduan lengkap dokumentasi tema
├── style.css                      # Metadata tema WordPress
├── screenshot.png                 # Gambar pratinjau tema di dashboard WP (1200x900)
├── functions.php                  # Engine utama, proteksi admin, hook filter produk
├── header.php                     # Header tetap diam (fixed), live search, keranjang
├── footer.php                     # Footer lengkap, tombol back-to-top, link pembeli
├── index.php                      # Beranda toko resmi dengan integrasi Customizer
├── page.php                       # Template halaman standar
├── single.php                     # Template artikel blog
├── search.php                     # Halaman hasil pencarian produk
├── 404.php                        # Halaman error 404 berdesain senada
├── inc/
│   ├── class-theme-updater.php    # Mesin pembaruan otomatis via GitHub Releases
│   ├── customizer.php             # Panel pengaturan Tampilan > Sesuaikan
│   └── demo-data.php              # Generator contoh produk otomatis
├── woocommerce/
│   ├── archive-product.php        # Halaman katalog toko & filter sidebar
│   └── single-product.php         # Halaman rincian produk (badge resmi, perks, tabs)
├── assets/
│   ├── css/
│   │   └── main.css               # Desain sistem lengkap 46KB responsif mobile
│   └── js/
│       └── main.js                # Fixed header handler, back-to-top, mobile drawer
└── template-parts/
    └── home/
        ├── categories.php         # Grid chip kategori geser horizontal
        ├── featured.php           # Produk unggulan pilihan editor
        ├── products.php           # Grid katalog produk terbaru berbadge resmi
        ├── how-it-works.php       # 4 langkah panduan berbelanja
        ├── vendors.php            # 4 Poin keunggulan toko resmi
        └── promo-banner.php       # Banner ajakan pembuatan akun pelanggan
```

---

## 🔌 Rekomendasi Plugin Pendukung

Untuk memaksimalkan toko online HakaStore Anda:
1. **Otomatisasi Pembayaran (Payment Gateway)**:
   - **Midtrans WooCommerce** / **Xendit** / **Tripay** / **Duitku**: Menerima QRIS instan, Transfer Bank Virtual Account, dan E-Wallet. Status pesanan langsung otomatis *Completed* detik itu juga setelah pembeli membayar.
2. **Hitung Ongkir Ekspedisi Indonesia (Untuk Produk Fisik)**:
   - **Plugin Ongkos Kirim (RajaOngkir)** / **Woongkir**: Menghitung tarif pengiriman JNE, J&T, SiCepat, POS, TIKI otomatis sesuai alamat pembeli.
3. **Notifikasi WhatsApp Otomatis**:
   - **WAPress** / **WooCommerce WhatsApp Notification**: Mengirim notifikasi invoice dan link download langsung ke nomor WhatsApp pembeli setelah pembayaran berhasil.

---

## ❓ Tanya Jawab (FAQ) & Solusi

#### Q: Apakah update otomatis akan menghapus produk atau pengaturan toko saya?
> **A:** **Sama sekali tidak.** Semua data produk, pesanan, akun pelanggan, dan pengaturan Customizer tersimpan aman di database MySQL WordPress Anda, bukan di dalam berkas tema. Proses update hanya mengganti berkas template tema saja.

#### Q: Apakah pembeli wajib mendaftar akun untuk mengunduh produk digital?
> **A:** Disarankan ya, agar file yang mereka beli tersimpan selamanya di menu **Akun Saya > Unduhan**. Anda dapat mengaktifkannya di menu **WooCommerce > Pengaturan > Akun & Privasi** > centang *"Izinkan pelanggan membuat akun selama pembayaran"*.

#### Q: Bagaimana jika file digital saya berukuran beberapa Gigabyte?
> **A:** Di bagian *File yang dapat diunduh*, daripada mengunggah file ke hosting web (yang mungkin memiliki batas upload), Anda cukup menaruh link Google Drive / Dropbox yang telah diatur aksesnya ke mode unduh.

#### Q: Bagaimana cara mengganti logo toko?
> **A:** Anda dapat mengunggah logo toko melalui menu **Tampilan > Sesuaikan > Identitas Situs > Logo**.

#### Q: Apakah pembeli bisa masuk ke dashboard admin WordPress?
> **A:** **Tidak bisa.** Tema HakaStore telah dilengkapi sistem keamanan otomatis yang memblokir akses pengguna dengan peran *Customer* ke URL `/wp-admin`. Jika mereka mencoba membukanya, mereka akan dialihkan otomatis ke halaman akun pembeli (*My Account*).

---

&copy; 2026 **HakaStore Official Store**. Hak Cipta Dilindungi.
