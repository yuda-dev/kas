@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-header" style="margin-top: 20px;margin-left: 2px">
                    <p>
                        <button class="btn btn-warning btn-refresh"><i class="fa fa-spinner"></i> Refresh</button>
                        <button class="btn btn-danger btn-filter"><i class="fa fa-filter"></i> Filter</button>
                        <a href="{{ url('rekap_ks/export') }}" class="btn btn-success"> <i class="fa fa-book"></i> Export</a>
                    </p>
                </div>
                
                    <div class="alert alert-warning">
                        <center><h5><i class="icon fas fa-mosque"></i> REKAP DATA KAS SOSIAL</h5></center>
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
                                    <th>Jumlah Pengeluaran</th>
                                    <th>Tanggal</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $key=>$dt)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$dt->uraian}}</td>
                                    <td>Rp. {{number_format($dt->masuk, 0) }}</td>
                                    <td>Rp. {{number_format($dt->keluar, 0) }}</td>
                                    <td>{{date('d F Y', strtotime($dt->tgl))}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Uraian</th>
                                    <th>Jumlah Masuk</th>
                                    <th>Jumlah Pengeluaran</th>
                                    <th>Tanggal</th>
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

    <div class="modal fade" id="modal-filter">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{$title}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" method="get" action="{{url('rekap_ks/filter')}}">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Dari tanggal</label>
                                <input type="date" class="form-control" name="dari"  autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Sampai tanggal</label>
                                <input type="date" class="form-control" name="sampai" autocomplete="off">
                            </div>
                            
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
    
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.btn-filter').click(function(e){
                e.preventDefault();

                $('#modal-filter').modal();
            })
        })
    </script>

@endsection
