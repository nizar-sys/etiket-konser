<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} | Terima kasih</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        body {
            font-family: arial;
        }

        table {
            border-bottom: 5px solid # 000;
            padding: 2px
        }
    </style>
</head>

<body>
    <div class="rangkasurat">
        <h4 class="text-center">{{ config('app.name') }} | Terima kasih Anda Telah Memesan Tiket</h4>

        <p>Terima kasih telah memesan tiket di {{ config('app.name') }}. Berikut adalah detail pesanan Anda:</p>

        <h5>Detail Pesanan</h5>

        <ul>
            <li>Nama Acara: {{ $order->event->nama_acara }}</li>
            <li>Nama Pemesan: {{ $order->nama_pemesan }}</li>
            <li>Email: {{ $order->email_pemesan }}</li>
            <li>No HP: {{ $order->no_hp_pemesan }}</li>
            <li>Jumlah Tiket: {{ $order->jumlah_tiket }}</li>
            <li>Total Harga: {{ $order->total_harga }}</li>
            <li>
                Cek tiket Anda di <a href="{{ route('event.order.detail', $order->id) }}">sini</a>
            </li>
        </ul>
    </div>
</body>

</html>