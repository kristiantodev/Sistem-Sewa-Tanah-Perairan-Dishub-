<link href="<?php echo base_url();?>assets/style.css" rel="stylesheet" />
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('sukses'); ?>"></div>
                    


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h3 class="page-title"><b><i class="fas fa-folder-open"></i>&nbsp; Data Pengajuan</b></h3>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active">Dinas Perhubungan Kota Palembang</li>
                                    </ol>
            
                                    <div class="state-information d-none d-sm-block">
                                                            
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="page-content-wrapper">
                           <div class="row">
                                <div class="col-12">
                            <div class="card m-b-20">
                                        <div class="card-body">
  
                                            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                <tr>
                                    <th width="9"><b>No</b></th>
                                    <th><b>Pemohon</b></th>
                                    <th><b>Pengajuan</b></th>
                                    <th><b>Tanggal</b></th>
                                    <th><b>Status</b></th>
                                    <th width="9"><b>Aksi</b></th>
                                </tr>
                                                </thead>
    
    
                                                <tbody>
                                             <?php $no=1;
         foreach ($pengajuanku as $b): ?>
                                
                                <tr>
                                    <td width="7" align="center"><?php echo $no++; ?></td>
                                    <td><?php echo $b->nm_user ?></td>
                                    <td><?php echo $b->nm_retribusi ?><br><?php echo $b->nm_wilayah ?> </td>
                                    <td><?php echo $b->tgl_pengajuan ?></td>
                                    <td>
                                      <?php if ($b->acc_uptd==0) { ?>

                                        <span class="badge badge-info">Menunggu Konfirmasi UPTD</span>

                                      <?php } ?>

                                      <?php if ($b->acc_uptd==1) { ?>

                                        <span class="badge badge-success">Pengajuan Disetujui UPTD</span>

                                      <?php } ?>

                                      <?php if ($b->acc_uptd==2) { ?>

                                        <span class="badge badge-danger">Pengajuan Ditolak UPTD</span>

                                      <?php } ?>

                                      <?php if ($b->acc_admin==1 && $b->acc_final==0) { ?>

                                        <br><span class="badge badge-info">Menunggu Surat Persetujuan Pihak Dishub</span>

                                      <?php } ?>

                                      <?php if ($b->acc_dishub==1) { ?>

                                        <br><span class="badge badge-warning">Surat Perjanjian Terupload</span>

                                      <?php } ?>

                                      <?php if ($b->acc_final==1) { ?>
<br>
                                        <span class="badge badge-success">Bukti Pembayaran Terupload</span>

                                      <?php } ?>

                                      <?php if ($b->acc_final==2) { ?>

                                        <span class="badge badge-danger">Batal Pengajuan</span>

                                      <?php } ?>

                                    </td>
                                    <td>
                                      
                                       <?php if ($b->acc_uptd==1 && $b->acc_admin==1 && $b->acc_dishub==0) { ?>

                                        <a data-toggle="modal" data-target="#bb<?php echo $b->id_pengajuan ?>" class="btn btn-success waves-effect waves-light"><span data-toggle="tooltip" data-original-title="Upload Berkas Perjanjian"><font color="white"><i class="fas fa-upload"></i> Upload Berkas</font></span></a>

                                      <?php } ?>

                                      <?php if ($b->acc_dishub==1) { ?>

                                       <a data-toggle="modal" data-target="#bb-see<?php echo $b->id_pengajuan ?>" class="btn btn-success waves-effect waves-light"><span data-toggle="tooltip" data-original-title="Berkas Berkas Perjanjian"><font color="white"><i class="fas fa-search"></i> Surat Perjanjian</font></span></a>

                                      <?php } ?>

                                      <?php if ($b->acc_final==1) { ?>
<br>
                                       <a data-toggle="modal" data-target="#bb-bayar-see<?php echo $b->id_pengajuan ?>" class="btn btn-warning waves-effect waves-light"><span data-toggle="tooltip" data-original-title="Berkas Berkas Perjanjian"><font color="white"><i class="fas fa-search"></i> Bukti Pembayaran</font></span></a>

                                      <?php } ?>

                                    </td>
                                 
                                </tr>
                                <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                                
                                        </div>
                                    </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
    

        

                           
    
                        </div>
                        <!-- end page content-->

                    </div> <!-- container-fluid -->

                </div> <!-- content -->



                <!-- Modal -->

                 <?php $no=1;
         foreach ($pengajuanku as $b): ?>
                  <div class="modal fade text-left" id="bb<?=$b->id_pengajuan?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-success">
                      <h6 class="modal-title"><font color='white'>Upload Surat Perjanjian</font></h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <form action="<?php echo site_url('adm/pengajuan/perjanjian'); ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_pengajuan" value="<?=$b->id_pengajuan?>">
                      <div class="modal-body">
                       
                       <fieldset class="form-group floating-label-form-group">
                          <label for="email">Upload File Perjanjian *pdf</label>
                          <input type="file" name="file_perjanjian" class="form-control" required>
                        </fieldset>

                         
                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-secondary mr-1"  data-dismiss="modal" value="close">
                                    <i class="fas fa-times"></i>&nbsp;Keluar
                                </button>
                                <button type="submit"  class="btn btn-success">
                                    <i class="fa fa-upload"></i>&nbsp;Upload
                                </button>
                        
                      </div>
                      </form>
                    </div>
                    </div>
                  </div>

                  <?php endforeach; ?>

                   <?php $no=1;
         foreach ($pengajuanku as $b): ?>
                  <div class="modal fade text-left" id="bb-see<?=$b->id_pengajuan?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-success">
                      <h6 class="modal-title"><font color='white'>Surat Perjanjian</font></h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      
                      <div class="modal-body">
              
                         <embed src="<?php echo base_url('assets/images/perjanjian/'.$b->file_perjanjian) ?>" width="750px" height="450px" />

                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-secondary mr-1"  data-dismiss="modal" value="close">
                                    <i class="fas fa-times"></i>&nbsp;Keluar
                                </button>
                      </div>
                    </div>
                    </div>
                  </div>

                  <?php endforeach; ?>

                                        <?php $no=1;
         foreach ($pengajuanku as $b): ?>
                  <div class="modal fade text-left" id="bb-bayar-see<?=$b->id_pengajuan?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-warning">
                      <h6 class="modal-title"><font color='white'>Bukti Pembayaran</font></h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      
                      <div class="modal-body">

                        <?php if ($b->file_pembayaran == "default.png") { ?>
              <center>
            <img src="<?php echo base_url('assets/images/bukti/'.$requestDetail->file) ?>" height="450"><br>Tidak ada file pembayaran yang dilampirkan</center>
            <?php }else{ ?>
<embed src="<?php echo base_url('assets/images/bukti/'.$b->file_pembayaran) ?>" width="750px" height="450px" />
             <?php }?> 

                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-secondary mr-1"  data-dismiss="modal" value="close">
                                    <i class="fas fa-times"></i>&nbsp;Keluar
                                </button>
                      </div>
                    </div>
                    </div>
                  </div>

                  <?php endforeach; ?>