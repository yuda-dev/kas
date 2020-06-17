<?php 

$jumlah_masuk = \DB::select("SELECT SUM(masuk) as tot_masuk FROM tb_kas_sosial WHERE jenis='Masuk'");
$jumlah_keluar = \DB::select("SELECT SUM(keluar) as tot_keluar FROM tb_kas_sosial WHERE jenis='Keluar'");

?>

<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Uraian</th>
        <th>Masuk</th>
        <th>Keluar</th>
        <th>Jenis</th>
        <th>Tanggal</th>
    </tr>
    </thead>
    <tbody>
    @foreach($export as $key=>$km)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $km->uraian }}</td>
            <td>Rp. {{ number_format($km->masuk, 0) }}</td>
            <td>Rp. {{ number_format($km->keluar, 0) }}</td>
            <td>{{ $km->jenis }}</td>
            <td>{{ $km->tgl }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Pemasukan</th>
        <th>Pengeluaran</th>
        <th>Saldo Akhir</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($jumlah_masuk as $key=>$jmlm)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>Rp. {{ number_format($jmlm->tot_masuk) }}</td>
            @foreach ($jumlah_keluar as $key=>$jmlk)
            <td>Rp. {{ number_format($jmlk->tot_keluar) }}</td>
            @endforeach
            <td>Rp. {{ number_format($jmlm->tot_masuk-$jmlk->tot_keluar, 0) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

    