

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                <h3 class="page-title"><b><i class='fas fa-chart-line'></i>&nbsp;Selamat Datang di Sistem Penyewaan Lahan atau Perairan </b></h3>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active">Dinas Perhubungan Kota Palembang </li>
                                    </ol>
               
                                    
                                </div>
                            </div>
                        </div>
                       
                        <div class="page-content-wrapper">
                            <div class="row">
             <div class="col-xl-4 col-md-6">
                                    <div class="card bg-secondary mini-stat position-relative">
                                        <div class="card-body">
                                            <div class="mini-stat-desc">
                                                <h6 class="verti-label text-white-50">Dishub</h6>
                                                <div class="text-white">
                                                    <h6 class="mt-0 text-white-50"><a href='' class="text-white">Total</a></h6>
                                                    <h4 class="mb-3 mt-0"><b> 
                                                    <?php $array = array('acc_uptd' => 0, 'id_user' => $this->session->userdata('id_user'));
  echo $totalNew = $this->db->where($array)->count_all_results('pengajuan');?> Pengajuan Baru</b></h4>
                                                    
                                                </div>
                                                <div class="mini-stat-icon">
                                                    <i class="fas fa-dolly display-2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-md-6">
                                    <div class="card bg-secondary mini-stat position-relative">
                                        <div class="card-body">
                                            <div class="mini-stat-desc">
                                                <h6 class="verti-label text-white-50">Dishub</h6>
                                                <div class="text-white">
                                                    <h6 class="mt-0 text-white-50"><a href='' class="text-white">Total</a></h6>
                                                    <h4 class="mb-3 mt-0"><b> 
                                                      <?php $array = array('acc_uptd' => 1, 'id_user' => $this->session->userdata('id_user'));
  echo $totalNew = $this->db->where($array)->count_all_results('pengajuan');?> Pengajuan Diterima</b></h4>


                                                    
                                                </div>
                                                <div class="mini-stat-icon">
                                                    <i class="fas fa-dolly display-2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
     

                                <div class="col-xl-4 col-md-6">
                                    <div class="card bg-secondary mini-stat position-relative">
                                        <div class="card-body">
                                            <div class="mini-stat-desc">
                                                <h6 class="verti-label text-white-50">Dishub</h6>
                                                <div class="text-white">
                                                    <h6 class="mt-0 text-white-50"><a href="" class="text-white">Total</a></h6>
                                                    <h4 class="mb-3 mt-0"><b>
                                                    <?php $array = array('acc_uptd' => 2, 'id_user' => $this->session->userdata('id_user'));
  echo $totalNew = $this->db->where($array)->count_all_results('pengajuan');?> Pengajuan Ditolak</b></h4>
                                                    
                                                </div>
                                                <div class="mini-stat-icon">
                                                    <i class="fas fa-dolly display-2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                   
                            </div>
                            <!-- end row -->

                           
                        </div>
                        <!-- end page content-->

                    </div> <!-- container-fluid -->

                </div> <!-- content -->
               
   <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
                <!-- ChartJS -->
    <script src="<?php echo base_url();?>assets/Chart.min.js"></script>
    <!-- Superieur Admin for Chart purposes -->
    <script src="<?php echo base_url();?>assets/widget-charts2.js"></script>
   