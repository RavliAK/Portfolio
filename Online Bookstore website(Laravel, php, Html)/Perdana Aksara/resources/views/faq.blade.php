@extends('layouts.main')

@section('container')
<!doctype html>
<html lang="en">
  <style>
  img {
    border-radius: 50%;
  }
  </style>
  <body>
    
<main>
  {{-- <h1 class="visually-hidden">Hidden text how to</h1> --}}
  <h1 class="text-center display-4 fw-bold">FAQ</h1>

  <hr class = my-5>
  <div class="px-4 py-5 my-5">


    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Apakah bisa membeli buku langsung di kantor?
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <p>
                Untuk yang tinggal di Jakarta bisa langsung datang ke:
                jl. Tambra Raya no 23 Rawamangun Jakarta Timur</p>
                <p>No telp cabang Jakarta:  081318640508</p>
               <p> Untuk wilayah lain, bisa hubungi nomor berikut:</p>
               <p>1. Bandung 085294772060</p>
                <p>2. Jogjakarta 08121587645</p>
                    <p>3. Semarang. 08886837383</p>
                        <p>4. Surabaya 081232696101</p>
                            <p>5. Malang 081615081317</p>
                                <p>6. Bali 081338447972</p>
                                    <p>7. Makassar 082194934715</p>
                                        <p>8. Pekan baru 085271859295</p>
                                            <p>9. Palembang 081215934561</p>
                                                <p>10. Medan 082168374987</p>
                </p>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Langkah-langkah pembelian buku di website
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <p>1. Calon pembeli daftar terlebih dahulu</p>
                    <p>2. Pilih buku yang diinginkan pada halaman belanja</p>
                        <p>3. Tekan tombol add to cart untuk memasukan buku pilihan ke keranjang belanja</p>
                            <p>4. Klik menu halaman keranjang(cart) saat akan check out</p>
                                <p>5. Pilih metode pembelian(delivery/pickup)</p>
                                    <p>6. Pilih metode pembayaran dan checkout</p>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Konfirmasi pembayaran?
            </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              Lihat di menu riwayat(history) dan pilih Sedang Berlangsung atau:
              <p>1. Kirim bukti pembayaran ke nomor 0813-1864-0508</p>
                <p>2. Pembeli akan mendapatkan balasan dari admin.</p>
            </div>
          </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading4">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                Buku yang diterima rusak cacat produksi atau salah judul?
              </button>
            </h2>
            <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                Buku akan segera kami ganti. Segera hubungi kami di nomor 0813-1864-0508
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="heading5">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                Apakah Perdana Aksara menjual e-book?
              </button>
            </h2>
            <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="heading5" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                E-book kami dapat dibeli melalui aplikasi Gramedia Digital, Google Playbook atau bisa pinjam di Ipusnas milik Perpustakaan Nasional RI
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="heading6">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                Apakah Perdana Aksara menerima dropshipper/reseller?
              </button>
            </h2>
            <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="heading6" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                Iya, Bisa langsung didiskusikan via WA ke 0813-1864-0508 atau langsung ke perwakilan kami.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="heading7">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                Apakah Perdana Aksara tersedia di e-commerce lain?
              </button>
            </h2>
            <div id="collapse7" class="accordion-collapse collapse" aria-labelledby="heading7" data-bs-parent="#accordionExample">
              <div class="accordion-body">
               <p> 1. Tokopedia.com/perdanaaksara.
https://www.tokopedia.com/perdanaaksara</p>
<p>2. Shopee.co.id/perdanaaksarajakarta. https://shopee.co.id/perdanaaksarajakarta</p>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="heading8">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                Mengajukan naskah untuk dicetak?
              </button>
            </h2>
            <div id="collapse8" class="accordion-collapse collapse" aria-labelledby="heading8" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                Naskah cukup di email ke pmg@perdanaaksara.com atau naskah@perdanaaksara.com
              </div>
            </div>
          </div>
      </div>


  </div>

    
  </body>
</html>
@endsection