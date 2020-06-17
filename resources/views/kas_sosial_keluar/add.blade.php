@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-header" style="margin-top: 20px;margin-left: 10px">
                    <p>
                        <a href="" class="btn btn-warning btn-refresh"><i class="fa fa-spinner"></i> Refresh</a>
                        <a href="{{url('kas_sosial_keluar')}}" class="btn btn-primary"><i class="fa fa-backward"></i> Kembali</a>
                    </p>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">{{$title}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form"method="post" action="{{ url('kas_sosial_keluar/add') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Uraian</label>
                                    <input type="text" class="form-control" name="uraian" placeholder="Uraian Pengeluaran">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Pengeluaran</label>
                                    <input type="text" class="form-control" name="keluar" placeholder="Jumlah Pengeluaran">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal Keluar</label>
                                    <input type="date" class="form-control" name="tgl">
                                </div>
                                <div class="form-group" hidden>
                                    <label>Jenis</label>
                                   <select name="jenis" class="form-control select2">
                                       <option value="Keluar"></option>
                                   </select>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

