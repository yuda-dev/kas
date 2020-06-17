@extends('layouts.master')

@section('content')
<br>
<div class="alert alert-warning">
    <center><h5><i class="icon fas fa-mosque"></i> MONITORING KAS MESJID AL-IKHLAS</h5></center>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <center><h5><i class="icon fas fa-mosque"></i> REKAP DATA KAS MESJID</h5></center>
            <div class="alert alert-success">
                <hr>
                <?php
                    $jumlah_masuk = \DB::select("SELECT SUM(masuk) as tot_masuk from tb_kas_mesjid  WHERE jenis='Masuk'");
                    $jumlah_keluar = \DB::select("SELECT SUM(keluar) as tot_keluar from tb_kas_mesjid  WHERE jenis='Keluar'");
                ?>
                @foreach ($jumlah_masuk as $jmlm)
                    <h5>Pemasukan : Rp.{{ number_format( $jmlm->tot_masuk, 0)}}</h5>
                    @foreach ($jumlah_keluar as $jmlk)
                    <h5>Pengeluaran: Rp.{{ number_format( $jmlk->tot_keluar, 0)}}</h5>
                    @endforeach
                    <hr>
                    <h4>Saldo Akhir : Rp. {{ number_format($jmlm->tot_masuk - $jmlk->tot_keluar, 0)  }}</h4>
                @endforeach
            </div>
        </div>
    
        <div class="col-md-6">
            <center><h5><i class="icon fas fa-users"></i> REKAP DATA KAS SOSIAL</h5></center>
            <div class="alert alert-danger">
                <hr>
                <?php
                    $jumlah_masuk = \DB::select("SELECT SUM(masuk) as tot_masuk from tb_kas_sosial  WHERE jenis='Masuk'");
                    $jumlah_keluar = \DB::select("SELECT SUM(keluar) as tot_keluar from tb_kas_sosial  WHERE jenis='Keluar'");
                ?>
                @foreach ($jumlah_masuk as $jmlm)
                    <h5>Pemasukan : Rp.{{ number_format( $jmlm->tot_masuk, 0)}}</h5>
                    @foreach ($jumlah_keluar as $jmlk)
                    <h5>Pengeluaran: Rp.{{ number_format( $jmlk->tot_keluar, 0)}}</h5>
                    @endforeach
                    <hr>
                    <h4>Saldo Akhir : Rp. {{ number_format($jmlm->tot_masuk - $jmlk->tot_keluar, 0)  }}</h4>
                @endforeach
            </div>
        </div>
    </div>
</div>



@endsection