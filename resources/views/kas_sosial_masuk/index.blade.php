@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-header" style="margin-top: 20px;margin-left: 2px">
                    <p>
                        <button class="btn btn-warning btn-refresh"><i class="fa fa-spinner"></i> Refresh</button>
                        <a href="{{url('kas_sosial_masuk/add')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
                    </p>
                </div>
                
                    <div class="alert alert-success">
                        <center><h5><i class="icon fas fa-mosque"></i> TOTAL PEMASUKAN KAS SOSIAL</h5>
                        <hr>
                        <?php
                            $jumlah_masuk = \DB::select("SELECT SUM(masuk) as tot_masuk from tb_kas_sosial  WHERE jenis='Masuk'");
                        ?>
                        @foreach ($jumlah_masuk as $jml)
                            <h3> Rp.{{ number_format( $jml->tot_masuk, 0)}}</h1>
                        @endforeach
                    </center>
                    </div>

                <div class="card">
                    <div class="card-header" style="background-color: var(--blue);color: white">
                        <h3 class="card-title">{{$title}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Uraian</th>
                                    <th>Jumlah Masuk</th>
                                    <th>Tanggal Masuk</th>
                                    <th>action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $key=>$dt)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$dt->uraian}}</td>
                                    <td>Rp. {{number_format($dt->masuk, 0) }}</td>
                                    <td>{{date('d F Y', strtotime($dt->tgl))}}</td>
                                    <td>
                                        <a href="{{url('kas_sosial_masuk/edit',$dt->id)}}" id="edit" class="btn btn-sm btn-flat btn-success"><i class="fa fa-edit"></i> </a>
                                        <a href="{{url('kas_sosial_masuk/delete', $dt->id)}}" id="delete" class="btn btn-sm btn-flat btn-danger btn-hapus"><i class="fa fa-trash"></i> </a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Uraian</th>
                                    <th>Jumlah Masuk</th>
                                    <th>Tanggal Masuk</th>
                                    <th>action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>

@endsection
