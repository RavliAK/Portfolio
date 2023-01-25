@component('mail::message')
# Halo {{ auth()->user()->username }}!

Terima kasih karena sudah berbelanja melalui website Perdana Aksara.
Berikut adalah rincian dari transaksi anda:
@component('mail::button', ['url' => "http://127.0.0.1:8000/history/$order"])
Kembali ke Situs Kami
@endcomponent


    

Kami harap anda puas dengan layanan kami dan akan berbelanja di website kami lagi untuk ke depannya!

Hormat kami,<br>
{{ config('app.name') }}
@endcomponent
