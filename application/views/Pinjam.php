<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
  <meta name="keywords" content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="pixelstrap">
  <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">
  <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
  <title>Pinjol - Peminjaman</title>
  <!-- Google font-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
  <!-- Font Awesome-->
  <link rel="stylesheet" type="text/css" href="assets/css/fontawesome.css">
  <!-- ico-font-->
  <link rel="stylesheet" type="text/css" href="assets/css/icofont.css">
  <!-- Themify icon-->
  <link rel="stylesheet" type="text/css" href="assets/css/themify.css">
  <!-- Flag icon-->
  <link rel="stylesheet" type="text/css" href="assets/css/flag-icon.css">
  <!-- Feather icon-->
  <link rel="stylesheet" type="text/css" href="assets/css/feather-icon.css">
  <!-- Plugins css start-->
  <!-- Plugins css Ends-->
  <!-- Bootstrap css-->
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/css/datatables.css">
  <!-- App css-->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link id="color" rel="stylesheet" href="assets/css/color-1.css" media="screen">
  <!-- Responsive css-->
  <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
  <link rel="stylesheet" type="text/css" href="assets/css/select2.css">
</head>
<body>
  <!-- Loader starts-->
  <div class="loader-wrapper">
    <div class="theme-loader">
      <div class="loader-p"></div>
    </div>
  </div>
  <!-- Loader ends-->
  <!-- page-wrapper Start-->
  <div class="page-wrapper" id="pageWrapper">
    <!-- Page Header Start-->
    <?php echo $this->load->view('berbagi/Menu_atas', '', TRUE);?>
    <!-- Page Header Ends                              -->
    <!-- Page Body Start-->
    <div class="page-body-wrapper horizontal-menu">
      <!-- Page Sidebar Start-->
      <?php echo $this->load->view('berbagi/Menu_samping', '', TRUE);?>
      <!-- Page Sidebar Ends-->
      <div class="page-body">
        <!-- Container-fluid starts-->
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header pb-0">
                  <h5>Tambah Pegawai</h5>
                </div>
                <form class="form theme-form">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <div class="mb-3 row">
                          <label class="col-sm-4 col-form-label">NIP/NIK</label>
                          <div class="col-sm-8">
                            <input class="form-control" type="text">
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <label class="col-sm-4 col-form-label">Nama Pegawai</label>
                          <div class="col-sm-8">
                            <input class="form-control" type="text">
                          </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label" >Jenis Pegawai</label>
                            <div class="col-sm-8">
                              <select class="js-example-basic-single col-sm-12">
                                <optgroup label="pegawai">
                                  <option value="1">PNS</option>
                                  <option value="2">PPPK</option>
                                  <option value="3">PPNPN</option>
                                  <option value="4">ASK</option>
                                </optgroup>
                              </select>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-end">
                    <div class="col-sm-9 offset-sm-3">
                      <button class="btn btn-primary" type="submit">Simpan</button>
                      <input class="btn btn-light" type="reset" value="Batal">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header pb-0">
                  <h5>Data Dokumen Sedang Di Pinjam</h5>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="display" id="basic-8">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Tanggal</th>
                          <th>Berkas</th>
                          <th>Jenis Dokumen</th>
                          <th>Lokasi</th>
                          <th>Nama Peminjaman</th>
                          <th>Nama Pegawai Pengambilan</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $i=0;
                          foreach($data_pegawai as $pegawai){
                          $i++;
                        ?>
                          <tr>
                            <td width="10%"><?php echo $i; ?></td>
                            <td> <?php echo $pegawai->nip_nik;?></td>
                            <td><?php echo $pegawai->nama_pegawai; ?></td>
                            <td>
                              <?php
                                if($pegawai->jenis_pegawai==1){
                                    echo"PNS";
                                }else if($pegawai->jenis_pegawai==2){
                                    echo"PPPK";
                                }else if($pegawai->jenis_pegawai==3){
                                    echo"PPNPN";
                                }else if($pegawai->jenis_pegawai==4){
                                    echo"ASK";
                                }
                              ?>
                            </td>
                            <td>
                              <?php
                                if($pegawai->status==0){
                                    echo"Belum Memiliki";
                                }else if($pegawai->status==1){
                                    echo"Aktf";
                                }else if($pegawai->status==2){
                                    echo"Blokir";
                                }else if($pegawai->status==3){
                                    echo"Tunda";
                                }
                              ?>
                            </td>
                            <td> </td>
                            <td width="30%">
                              <button type="button" class="btn btn-primary btn-sm">User</button>
                              <button type="button" class="btn btn-warning btn-sm">Ubah</button>
                              <button type="button" class="btn btn-danger btn-sm">Hapus</button>
                            </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>No</th>
                          <th>Tanggal</th>
                          <th>Berkas</th>
                          <th>Jenis Dokumen</th>
                          <th>Lokasi</th>
                          <th>Nama Peminjaman</th>
                          <th>Nama Pegawai Pengambilan</th>
                          <th>Aksi</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- Container-fluid Ends-->
      </div>
      <!-- footer start-->
      <?php echo $this->load->view('berbagi/Footer', '', TRUE);?>
    </div>
  </div>
  <!-- latest jquery-->
  <script src="assets/js/jquery-3.5.1.min.js"></script>
  <!-- feather icon js-->
  <script src="assets/js/icons/feather-icon/feather.min.js"></script>
  <script src="assets/js/icons/feather-icon/feather-icon.js"></script>
  <!-- Sidebar jquery-->
  <script src="assets/js/sidebar-menu.js"></script>
  <script src="assets/js/config.js"></script>
  <!-- Bootstrap js-->
  <script src="assets/js/bootstrap/popper.min.js"></script>
  <script src="assets/js/bootstrap/bootstrap.min.js"></script>
  <!-- Plugins JS start-->
  <!-- Plugins JS Ends-->
  <!-- Theme js-->
  <script src="assets/js/script.js"></script>
  <script src="assets/js/theme-customizer/customizer.js"></script>
  <!-- login js-->
  <!-- Plugin used-->
  <script src="assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
  <script src="assets/js/datatable/datatables/datatable.custom.js"></script>
  <script src="assets/js/select2/select2.full.min.js"></script>
  <script src="assets/js/select2/select2-custom.js"></script>
</body>
</html>
