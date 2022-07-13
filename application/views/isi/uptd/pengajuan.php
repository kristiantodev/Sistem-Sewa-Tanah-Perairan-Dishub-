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
                                    <th><b>Aksi</b></th>
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

                                        <span class="badge badge-success">Pengajuan Disetujui</span>

                                      <?php } ?>

                                      <?php if ($b->acc_uptd==2) { ?>

                                        <span class="badge badge-danger">Pengajuan Ditolak</span>

                                      <?php } ?>
                                    </td>
                                    <td>
                                      
                                       <?php if ($b->acc_uptd==0) { ?>

                                        <a data-toggle="modal" data-target="#bb<?php echo $b->id_pengajuan ?>" class="btn btn-primary waves-effect waves-light"><span data-toggle="tooltip" data-original-title="Konfirmasi Pengajuan"><font color="white"><i class="fas fa-check"></i> Konfirmasi</font></span></a>

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
                      <div class="modal-header bg-primary">
                      <h6 class="modal-title"><font color='white'>Konfirmasi Pengajuan</font></h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <form action="<?php echo site_url('uptd/pengajuan/Konfirmasi'); ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_pengajuan" value="<?=$b->id_pengajuan?>">
                      <div class="modal-body">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Konfirmasi</label>
                          <select name="acc_uptd" id="select" required class="custom-select">
                            <option value="">-- Pilih Status --</option>
                             <option value="1">Disetujui</option>
                              <option value="2">Ditolak</option>  
                </select>
                        </fieldset>

                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Pesan Dari Pelanggan</label>
                          <textarea class="form-control" disabled name="message_to_uptd" id="title1" rows="3"><?=$b->message_to_uptd?>
                          </textarea>
                        </fieldset>

                            <fieldset class="form-group floating-label-form-group">
                          <label for="email">Balas Pesan</label>
                          <textarea class="form-control" name="message_to_cust" id="title1" rows="3"></textarea>
                        </fieldset>
                         
                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-secondary mr-1"  data-dismiss="modal" value="close">
                                    <i class="fas fa-times"></i>&nbsp;Keluar
                                </button>
                                <button type="submit"  class="btn btn-primary">
                                    <i class="fa fa-check"></i>&nbsp;Konfirmasi
                                </button>
                        
                      </div>
                      </form>
                    </div>
                    </div>
                  </div>

                  <?php endforeach; ?>