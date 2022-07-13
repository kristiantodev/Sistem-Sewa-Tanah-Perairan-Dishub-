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
                                                            
                                            <a data-toggle="modal" data-target="#bb">
                                            <button type="button" class="btn btn-primary waves-effect waves-light">
                                    <i class="fa fa-plus"></i> Tambah Pengajuan</button>
                                </a>
                                
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
  
                                            <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                <tr>
                                    <th width="9"><b>No</b></th>
                                    <th><b>Pengajuan</b></th>
                                    <th><b>Tanggal</b></th>
                                     <th><b>Pesan</b></th>
                                    <th width="250"><b>Status</b></th>
                                    <th width="150"><b>Aksi</b></th>
                                </tr>
                                                </thead>
    
    
                                                <tbody>
                                             <?php $no=1;
         foreach ($pengajuanku as $b): ?>
                                
                                <tr>
                                    <td width="7" align="center"><?php echo $no++; ?></td>
                                    <td><?php echo $b->nm_retribusi ?><br><?php echo $b->nm_wilayah ?> </td>
                                    <td><?php echo $b->tgl_pengajuan ?></td>
                                    <td>To UPTD :<br><?php echo $b->message_to_uptd ?>
                                    <br><br>
                                    Reply From UPTD :<br><?php echo $b->message_to_cust ?>
                                     </td>
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

                                       <?php if ($b->acc_dishub==1) { ?>

                                        <span class="badge badge-success">Pengajuan Sewa Diterima</span>

                                      <?php } ?>


                                      <?php if ($b->acc_final==1) { ?>

                                        <span class="badge badge-success">ACC - Silahkan Datang ke Dishub</span>

                                      <?php } ?>

                                      <?php if ($b->acc_final==2) { ?>

                                        <span class="badge badge-danger">Batal Pengajuan</span>

                                      <?php } ?>

                                      <?php if ($b->acc_admin==1 && $b->acc_dishub==0) { ?>

                                        <br><span class="badge badge-info">Menunggu Surat Persetujuan Pihak Dishub</span>

                                      <?php } ?>

                                    </td>
                                    <td>
                                       <?php if ($b->acc_uptd==1 && $b->acc_admin==0) { ?>

                                        <a data-toggle="modal" data-target="#bb<?php echo $b->id_pengajuan ?>" class="btn btn-primary waves-effect waves-light"><font color="white"><i class="fas fa-search"></i> Pilih Sewa</font></a>

                                      <?php } ?>

                                       <?php if ($b->acc_dishub==1) { ?>

                                       <a data-toggle="modal" data-target="#bb-see<?php echo $b->id_pengajuan ?>" class="btn btn-success waves-effect waves-light"><span data-toggle="tooltip" data-original-title="Berkas Berkas Perjanjian"><font color="white"><i class="fas fa-search"></i> Surat Perjanjian</font></span></a>

                                      <?php } ?>

                                      <?php if ($b->acc_final==0 && $b->acc_dishub==1) { ?>

                                       <a data-toggle="modal" data-target="#bb-bayar<?php echo $b->id_pengajuan ?>" class="btn btn-warning waves-effect waves-light"><span data-toggle="tooltip" data-original-title="Berkas Berkas Perjanjian"><font color="white"><i class="fas fa-upload"></i> Upload Pembayaran</font></span></a>

                                      <?php } ?>

                                      <?php if ($b->acc_final==1) { ?>

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
                  <div class="modal fade text-left" id="bb" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-primary">
                      <h6 class="modal-title"><font color='white'>Form Pengajuan Sewa</font></h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <form action="<?php echo site_url('pelanggan/pengajuan/add'); ?>" method="post" enctype="multipart/form-data">
                      <div class="modal-body">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Retribusi</label>
                          <select name="id_retribusi" id="select" required class="custom-select">
                            <option value="">-- Pilih Retribusi --</option>
                  <?php foreach ($retribusiku as $k): ?>
                  <option value="<?php echo $k->id_retribusi ?>"><?php echo $k->nm_retribusi ?></option>
                  <?php endforeach; ?>
                </select>
                        </fieldset>
                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Wilayah</label>
                          <select name="id_wilayah" id="select" required class="custom-select">
                            <option value="">-- Pilih Wilayah --</option>
                  <?php foreach ($wilayahku as $k): ?>
                  <option value="<?php echo $k->id_wilayah ?>"><?php echo $k->nm_wilayah ?></option>
                  <?php endforeach; ?>
                </select>
                        </fieldset>

                            <fieldset class="form-group floating-label-form-group">
                          <label for="email">Pesan ke UPTD</label>
                          <textarea class="form-control" name="message_to_uptd" id="title1" rows="3"></textarea>
                        </fieldset>
                         
                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-secondary mr-1"  data-dismiss="modal" value="close">
                                    <i class="fas fa-times"></i>&nbsp;Keluar
                                </button>
                                <button type="submit"  class="btn btn-primary">
                                    <i class="fa fa-save"></i>&nbsp;Simpan
                                </button>
                        
                      </div>
                      </form>
                    </div>
                    </div>
                  </div>


<?php foreach ($pengajuanku as $b): ?>
                                  <!-- Modal -->
                  <div class="modal fade text-left" id="bb<?=$b->id_pengajuan?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-primary">
                      <h6 class="modal-title"><font color='white'>Pilih Tanah atau Perairan</font></h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <form action="<?php echo site_url('pelanggan/pengajuan/pilih'); ?>" method="post" enctype="multipart/form-data">
                      <div class="modal-body">
                         <?php
                             $idWilayah = $b->id_wilayah;
                             $idRetribusi = $b->id_retribusi;
                             $listAlokasi = $this->db->query("SELECT*FROM alokasi 
                              LEFT JOIN retribusi ON retribusi.id_retribusi=alokasi.id_retribusi
            LEFT JOIN wilayah ON wilayah.id_wilayah=alokasi.id_wilayah
            WHERE alokasi.id_wilayah='$idWilayah' AND alokasi.id_retribusi='$idRetribusi' AND alokasi.id_user IS NULL AND alokasi.deleted=0")->result();
                         ?>
                        
                              <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead bgcolor="">
                                                <tr>
                                    <th width="9"><b></b></th>
                                    <th><b>Pilih Tanah/Perairan :</b></th>
                                     <th><b>Nama Tanah/Perairan</b></th>
                                     <th><b>Harga</b></th>
                                     <th><b>Keterangan</b></th>
                                </tr>
                                                </thead>
    
    
                                                <tbody>
                                             <?php $u=1;
                                        foreach ($listAlokasi as $f): ?>
                                <tr>
                                    <td width="20" align="center">

                                      <input type="hidden" name="id_pengajuan" value="<?=$b->id_pengajuan?>">
                                      
                                      <input type="radio" required id="outstanding_<?php echo $u; ?>" name="id_alokasi" value="<?= $f->id_alokasi ?>" onchange="getVals(this, 'question_<?php echo $u; ?>');">
                        <label class="radio" for="outstanding_<?php echo $u; ?>"></label>
                        <label for="outstanding_<?php echo $u; ?>" class="wrapper"></label>

                                    </td>
                                    <td><img src="<?php echo base_url('assets/images/alokasi/'.$f->foto) ?>" alt="" height="150"></td>

                                    <td><?=$f->nm_retribusi?> - <?=$f->nm_wilayah?></td>
                                    <td><?="Rp " . number_format($f->harga,0,',','.');?></td>
                                    <td><?=$f->keterangan?></td>
                                </tr>
                                <?php endforeach; ?>
                                                </tbody>
                                            </table>
                         
                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-secondary mr-1"  data-dismiss="modal" value="close">
                                    <i class="fas fa-times"></i>&nbsp;Keluar
                                </button>
                                <button type="submit"  class="btn btn-primary">
                                    <i class="fa fa-save"></i>&nbsp;Simpan
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
                  <div class="modal fade text-left" id="bb-bayar<?=$b->id_pengajuan?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-warning">
                      <h6 class="modal-title"><font color='white'>Upload Bukti Pembayaran</font></h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <form action="<?php echo site_url('pelanggan/pengajuan/pembayaran'); ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_pengajuan" value="<?=$b->id_pengajuan?>">
                      <div class="modal-body">
                       
                       <fieldset class="form-group floating-label-form-group">
                          <label for="email">Upload Bukti Pembayaran *pdf</label>
                          <input type="file" name="file_pembayaran" class="form-control">
                        </fieldset>

                         <fieldset class="form-group floating-label-form-group">
                          <label for="email">Konfirmasi</label>
                          <select name="acc_final" id="select" required class="form-control">
                                        <option value=""></option>  
                                    <option value="1">Setuju</option>
                                    <option value="2">Tolak</option>
                                           </select>
                        </fieldset>  

                         
                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-secondary mr-1"  data-dismiss="modal" value="close">
                                    <i class="fas fa-times"></i>&nbsp;Keluar
                                </button>
                                <button type="submit"  class="btn btn-warning">
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