@extends('layouts.master')

@section('content')
   
    <!-- Main content -->
    <section class="content"  style="margin-top : 20px">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Ubah Profile</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Ubah Password</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <form role="form" enctype="multipart/form-data" method="post" action="{{url('pengguna/update_profile')}}">
                        @csrf
                        @method('PUT')
                         <div class="input-group mb-3">
                             <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ $data->name }}" required autocomplete="off" autofocus placeholder="Masukan Nama">
 
                             @error('name')
                             <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                             @enderror
                             <div class="input-group-append">
                                 <div class="input-group-text">
                                     <span class="fas fa-user"></span>
                                 </div>
                             </div>
                         </div>
 
                         <div class="input-group mb-3">
                             <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ $data->email }}" required autocomplete="off" autofocus placeholder="Masukan E-mail">
 
                             @error('email')
                             <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                             @enderror
                             <div class="input-group-append">
                                 <div class="input-group-text">
                                     <span class="fas fa-envelope"></span>
                                 </div>
                             </div>
                         </div>
                         <div class="input-group mb-3">
                             <input type="file" class="form-controll" name="photo"  style="margin-bottom: 13px">
                          </div>
                                 <button type="submit" class="btn btn-primary btn-block">Ganti</button>
                    </form>
                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <form role="form" method="post" action="{{url('pengguna/update_password')}}">
                      @csrf
                      @method('PUT')
                      <div class="input-group mb-3">
                          <input id="oldpassword" type="password" class="form-control @error('oldpassword') is-invalid @enderror" name="oldpassword" required autocomplete="off" placeholder="Masukan Password Lama">

                          @error('oldpassword')
                          <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                          @enderror
                          <div class="input-group-append">
                              <div class="input-group-text">
                                  <span class="fas fa-lock"></span>
                              </div>
                          </div>
                      </div>
                      <div class="input-group mb-3">
                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="off" placeholder="Masukan Password Baru">

                          @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                          <div class="input-group-append">
                              <div class="input-group-text">
                                  <span class="fas fa-lock"></span>
                              </div>
                          </div>
                      </div>
                      <div class="input-group mb-3">
                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="off" placeholder="Konfirmasi Password Baru">
                          <div class="input-group-append">
                              <div class="input-group-text">
                                  <span class="fas fa-lock"></span>
                              </div>
                          </div>
                      </div>
                              <button type="submit" class="btn btn-primary btn-block">Ganti</button>
                  </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

