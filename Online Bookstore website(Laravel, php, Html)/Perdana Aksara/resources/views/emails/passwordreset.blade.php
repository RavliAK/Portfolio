@component('mail::message')
# Halo Pengguna!

Silahkan tekan link berikut ini untuk reset password anda.

@component('mail::button', ['url' => "http://127.0.0.1:8000/resetpassword/$id"])
Reset Password
@endcomponent

Terima kasih,<br>
Perdana Aksara Group
@endcomponent
