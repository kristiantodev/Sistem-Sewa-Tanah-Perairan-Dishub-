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
                                    <h3 class="page-title"><b><i class="fas fa-box-open"></i>&nbsp; Data Alokasi Retribusi</b></h3>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active">Dinas Perhubungan Kota Palembang</li>
                                    </ol>
            
                                    <div class="state-information d-none d-sm-block">
                                                            
                                            <a data-toggle="modal" data-target="#bb">
                                            <button type="button" class="btn btn-primary waves-effect waves-light">
                                    <i class="fa fa-plus"></i> Tambah Data</button>
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
  
                                            <table id="datatable2" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                <tr>
                                    <th width="9"><b>No</b></th>
                                    <th><b>Nama Retribusi</b></th>
                                    <th><b>Wilayah</b></th>
                                     <th><b>Harga</b></th>
                                    <th width="150"><b>Aksi</b></th>
                                </tr>
                                                </thead>
    
    
                                                <tbody>
                                             <?php $no=1;
         foreach ($alokasiku as $b): ?>
                                
                                <tr>
                                    <td width="7" align="center"><?php echo $no++; ?></td>
                                    <td>&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url('assets/images/alokasi/'.$b->foto) ?>" alt="" class="thumb-md rounded-circle"> &nbsp;&nbsp;&nbsp;<?php echo $b->nm_retribusi ?> (<?php echo $b->nm_jenis_retribusi ?>)</td>
                                    <td><?php echo $b->nm_wilayah ?></td>
                                    <td><?php echo $b->harga ?></td>
                                   
                                    <td>

                 <a data-toggle="modal" data-target="#modal-edit<?php echo $b->id_alokasi?>" class="btn btn-primary waves-effect waves-light"><span data-toggle="tooltip" data-original-title="Ubah"><font color="white"><i class="fas fa-pencil-alt"></i></font></span></a>
                 <a onclick="deleteConfirm('<?php echo site_url('adm/alokasi/hapus/'.$b->id_alokasi); ?>')" href="#!" data-toggle="tooltip" class="btn btn-danger waves-effect waves-light tombol-hapus" data-original-title="Hapus"><span class="icon-label" data-toggle="modal" data-target="#modal-danger"><i class="fa fa-trash"></i> </span><span class="btn-text"></span></a>
                                        </a>
                 
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
                      <h6 class="modal-title"><font color='white'>Form Tambah ALokasi Retribusi</font></h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <form action="<?php echo site_url('adm/alokasi/add'); ?>" method="post" enctype="multipart/form-data">
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
                          <label for="email">Harga</label>
                          <input type="number" name="harga" class="form-control" id="email" required oninvalid="this.setCustomValidity('Harap Diisi...')" oninput="setCustomValidity('')">

                        </fieldset>
                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Upload Foto</label>
                          <input type="file" name="foto" class="form-control">
                        </fieldset>

                            <fieldset class="form-group floating-label-form-group">
                          <label for="email">Keterangan</label>
                          <textarea class="form-control" name="keterangan" id="title1" rows="3"></textarea>
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




 <!-- Modal -->
 <?php $no=0; foreach ($alokasiku as $b): ?>
                  <div class="modal fade text-left" id="modal-edit<?php echo $b->id_alokasi ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-primary">
                      <h6 class="modal-title"><font color='white'>Edit Data Alokasi</font></h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <form action="<?php echo site_url('adm/alokasi/edit'); ?>" method="post" enctype="multipart/form-data">
                      <input type="hidden" readonly value="<?=$b->id_alokasi;?>" name="id_alokasi" class="form-control" >
                      <input type="hidden" name="old_image" value="<?php echo $b->foto ?>"/>
                      <div class="modal-body">
                        
                               <fieldset class="form-group floating-label-form-group">
                          <label for="email">Retribusi</label>
                          <select name="id_retribusi" id="select" required class="custom-select">
                            <option value="">-- Pilih Retribusi --</option>
                  <?php foreach ($retribusiku as $k): ?>
                  <option value="<?php echo $k->id_retribusi ?>"
                    <?php
                              if ($b->id_retribusi == $k->id_retribusi){
                              echo "selected";
                                    }else{
                              echo "";
                              }
                              ?>
                              ><?php echo $k->nm_retribusi ?></option>
                  <?php endforeach; ?>
                </select>
                        </fieldset>
                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Wilayah</label>
                          <select name="id_wilayah" id="select" required class="custom-select">
                            <option value="">-- Pilih Wilayah --</option>
                  <?php foreach ($wilayahku as $k): ?>
                  <option value="<?php echo $k->id_wilayah ?>"
                    <?php
                              if ($k->id_wilayah == $b->id_wilayah){
                              echo "selected";
                                    }else{
                              echo "";
                              }
                              ?>
                              ><?php echo $k->nm_wilayah ?></option>
                  <?php endforeach; ?>
                </select>
                        </fieldset>
                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Harga</label>
                          <input type="number" name="harga" value="<?php echo $b->harga ?>" class="form-control" id="email" required oninvalid="this.setCustomValidity('Harap Diisi...')" oninput="setCustomValidity('')">

                        </fieldset>
                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Upload Foto</label>
                          <input type="file" name="foto" class="form-control">
                        </fieldset>

                            <fieldset class="form-group floating-label-form-group">
                          <label for="email">Keterangan</label>
                          <textarea class="form-control" name="keterangan" id="title1" rows="3"><?php echo $b->keterangan ?></textarea>
                        </fieldset>      
      
                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-secondary mr-1"  data-dismiss="modal" value="close">
                                    <i class="fas fa-times"></i>&nbsp;Keluar
                                </button>
                                <button type="submit"  class="btn btn-primary">
                                    <i class="fa fa-save"></i>&nbsp;Save
                                </button>
                        
                      </div>
                      </form>
                    </div>
                    </div>
                  </div>
 <?php endforeach; ?>




 <!-- modal -->
<div class="modal modal-danger fade" id="modal-danger">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
      <h5 class="modal-title"><font color='white'>Konfirmasi Penghapusan</font></h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
      </div>
      <div class="modal-body">
      <p>Apakah anda yakin akan menghapus data ini ?</p>
      </div>
      <div class="modal-footer">
      <a type="button" class="btn btn-secondary" data-dismiss="modal"><font color='white'><i class="fas fa-times"></i>&nbsp;Batal</font></a>
      <a href="#" id="btn-delete" type="button" class="btn btn-danger mr-1"><i class="fas fa-trash"></i>&nbsp;Hapus</a>
      </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  

  <script>
function deleteConfirm(url){
    $('#btn-delete').attr('href', url);
    $('#deleteModal').modal();
}
</script>