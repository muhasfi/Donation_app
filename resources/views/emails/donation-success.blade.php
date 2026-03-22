<!DOCTYPE html>
<html>
<body>
    <h2>Terima kasih, {{ $donation->donor_name }}! 🎉</h2>
    <p>Donasi kamu berhasil diterima.</p>
    <table>
        <tr><td>Kode Donasi</td><td>{{ $donation->donation_code }}</td></tr>
        <tr><td>Jenis</td><td>{{ ucwords(str_replace('_', ' ', $donation->donation_type)) }}</td></tr>
        <tr><td>Jumlah</td><td>Rp {{ number_format($donation->amount, 0, ',', '.') }}</td></tr>
    </table>
</body>
</html>