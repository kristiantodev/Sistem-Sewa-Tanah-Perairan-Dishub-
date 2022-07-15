

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
                                                    <?php $array = array('acc_uptd' => 0);
  echo $totalNew1 = $this->db->where($array)->count_all_results('pengajuan');?> Pengajuan Baru</b></h4>
                                                    
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
                                                      <?php $array = array('acc_uptd' => 1);
  echo $totalNew2 = $this->db->where($array)->count_all_results('pengajuan');?> Pengajuan Diterima</b></h4>


                                                    
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
                                                    <?php $array = array('acc_uptd' => 2);
  echo $totalNew3 = $this->db->where($array)->count_all_results('pengajuan');?> Pengajuan Ditolak</b></h4>
                                                    
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

                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card m-b-20">
                                        <div class="card-body">
            
                                            <center><h4 class="mt-0 header-title"><b>Grafik Pengajuan Sewa Tanah atau Perairan oleh UPTD</b></h4></center>
            
                                                        
                                            <canvas id="statusTiket" height="200"></canvas>
            
                                        </div>
                                    </div>
                                </div>
                            </div>

                           
                        </div>
                        <!-- end page content-->

                    </div> <!-- container-fluid -->

                </div> <!-- content -->
               
   <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
                <!-- ChartJS -->
    <script src="<?php echo base_url();?>assets/Chart.min.js"></script>
    <!-- Superieur Admin for Chart purposes -->
    <script src="<?php echo base_url();?>assets/widget-charts2.js"></script>

    <script>
    
$(function () {

'use strict';

    if( $('#statusTiket').length > 0 ){
		var ctx2 = document.getElementById("statusTiket").getContext("2d");
		var data2 = {
			labels: ["Pengajuan Baru", "Pengajuan Diterima", "Pengajuan Ditolak", "Total Pengajuan"],
			datasets: [
			{
				label: "Jumlah",
				backgroundColor: ["#ADFF2F","#008B8B", "#BDB76B","#CD5C5C"],
				borderColor: "#ADFF2F",
				data: [<?=$totalNew1;?>,<?=$totalNew2;?>,<?=$totalNew3;?>, <?=$totalNew3+$totalNew1+$totalNew2;?>
                ]
			}
			]
		};
		
		var hBar = new Chart(ctx2, {
			type:"bar",
			data:data2,
			
			options: {
				tooltips: {
					mode:"label"
				},
				scales: {
					yAxes: [{
						stacked: true,
						gridLines: {
							color: "rgba(135,135,135,0)",
						},
						ticks: {
							fontFamily: "Poppins",
							fontColor:"#878787"
						}
					}],
					xAxes: [{
						stacked: true,
						gridLines: {
							color: "rgba(135,135,135,0)",
						},
						ticks: {
							fontFamily: "Poppins",
							fontColor:"#878787"
						}
					}],
					
				},
				elements:{
					point: {
						hitRadius:40
					}
				},
				animation: {
					duration:	3000
				},
				responsive: true,
				maintainAspectRatio:false,
				legend: {
					display: false,
				},
				
				tooltip: {
					backgroundColor:'rgba(33,33,33,1)',
					cornerRadius:0,
					footerFontFamily:"'Poppins'"
				}
				
			}
		});
	}
    

  }); // End of use strict
    </script>   
   