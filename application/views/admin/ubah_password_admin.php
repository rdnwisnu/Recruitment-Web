<div class="content-wrapper">
 <!-- Peluang Karir -->
 <section class="page-section mt-5">
        <div class="container">
            <div class="text-center">
                <h3 class="section-heading text-uppercase">Ubah Password</h3>
                <p class="line1"></p>
                <p class="line2 mb-3"></p>
            </div>
            <div class="row mt-3">
                <div class="col-sm-8 col-md-6 col-lg-4 mx-auto mt-3">
                    <div class="card">
                        <p class="text-center p-3">Isi form dibawah ini hanya bila Anda hendak mengubah password Anda.</p>
                        <div class="card-body login-card-body">
                            <form action="<?php echo site_url('users/change_password'); ?>" method="post">
                                <div class="input-group mb-3">
                                    <input type="password" name="password_lama" id="password_lama" class="form-control" placeholder="Password Lama">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" name="password_baru" id="password_baru" class="form-control" placeholder="Password Baru">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" name="konfirmasi_password" id="konfirmasi_password" class="form-control" placeholder="Konfirmasi Password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" name="btnChangePassword" id="btnChangePassword" class="btn btn-primary btn-block" value="1">Ubah password</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>
                        </div>
                        <!-- /.login-card-body -->
                    </div>

                </div>
            </div>
        </div>
    </section>

    <footer class="main-footer" style="position: fixed;left: 0;bottom: 0;width: 100%;">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.4
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>
  </div>

