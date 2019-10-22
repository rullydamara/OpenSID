<div class="content-wrapper">
	<section class="content-header">
                <h1>Pengelolaan Data <?= ucwords($this->setting->sebutan_dusun)?></h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= site_url('sid_core')?>"> Daftar <?= ucwords($this->setting->sebutan_dusun)?></a></li>
			<li class="active">Data <?= ucwords($this->setting->sebutan_dusun)?></li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?= site_url("sid_core")?>" class="btn btn-social btn-flat btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i>Kembali ke Daftar <?= ucwords($this->setting->sebutan_dusun)?>
           	</a>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-sm-12">
								<form id="validasi" action="<?= $form_action?>" method="POST" enctype="multipart/form-data"  class="form-horizontal">
									<div class="box-body">
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group">
													<label class="col-sm-3 control-label" for="dusun">Nama  <?= ucwords($this->setting->sebutan_dusun)?></label>
													<div class="col-sm-7">
														<input  id="dusun" class="form-control input-sm required" type="text" placeholder="Nama  <?= ucwords($this->setting->sebutan_dusun)?>" name="dusun" value="<?= $dusun?>">
													</div>
												</div>
											</div>

                                                                                       <?php if ($dusun): ?>
												<div class="col-sm-12">
													<div class="form-group">
														<label class="col-sm-3 control-label" for="kepala_lama">Kepala  <?= ucwords($this->setting->sebutan_dusun)?> Sebelumnya</label>
														<div class="col-sm-7">
															<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
																<strong><?= $individu["nama"]?></strong>
																<br/>NIK - <?= $individu["nik"]?>
															</P>
														</div>
													</div>
												</div>
											<?php endif; ?>
											<div class="col-sm-12">
												<div class="form-group">
													<label class="col-sm-3 control-label" for="id_kepala">NIK / Nama Kepala  <?= ucwords($this->setting->sebutan_dusun)?></label>
													<div class="col-sm-7">
														<select class="form-control select2" style="width: 100%;" id="id_kepala" name="id_kepala">
															<option selected="selected">-- Silakan Masukan NIK / Nama--</option>
															<?php foreach ($penduduk as $data): ?>
																<option value="<?= $data['id']?>">NIK :<?= $data['nik']." - ".$data['nama']." - ".$data['dusun']?></option>
															<?php endforeach; ?>
														</select>
													</div>
												</div>
											</div>
										</div>
									

                                                 <div class="form-group">
								<label class="col-sm-3 control-label" for="kode_propinsi">Peta Kantor / Wilayah <?=ucwords($this->setting->sebutan_dusun)?></label>
								<div class="col-sm-9">
                                                                <a href="<?=site_url("sid_core/ajax_kantor_dusun_maps/$dusun")?>" class="btn btn-social btn-flat bg-navy btn-sm"><i class='fa fa-map-marker'></i> Kantor <?=ucwords($this->setting->sebutan_dusun)?> </a>
                                                                
                                                                <a href="<?=site_url("sid_core/ajax_wilayah_dusun_maps/$dusun")?>" class="btn btn-social btn-flat bg-navy btn-sm"><i class='fa fa-map'></i> Wilayah <?=ucwords($this->setting->sebutan_dusun)?></a>
								</div>
							</div>
						</div>
						<div class='box-footer'>
							<div class='col-xs-12'>
								<button type='reset' class='btn btn-social btn-flat btn-danger btn-sm invisible' ><i class='fa fa-times'></i> Batal</button>
								<button type='submit' class='btn btn-social btn-flat btn-info btn-sm pull-right'><i class='fa fa-check'></i> Simpan</button>
							</div>
						</div>                                      
								</form>
							</div>
                                         	</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<script>
   $(document).ready(function(){
     $("[rel=tooltip]").tooltip({ placement: 'top'});
   });
</script>
<!-- Notification Script -->
<script>
   <?php
      $success = $this->session->flashdata('success');
      $error   = $this->session->flashdata('error');
      if (!empty($success))
       {
      ?>
    $.notify({
         
         icon: 'glyphicon glyphicon-info-sign',
         title: '<b>Sukses</b><br>',
         message: '<?php echo $success ?>',
     },
     {
         
         
         type: "success success-noty col-md-3",
         allow_dismiss: true,
         placement: {
             from: "top",
             align: "right"
         },
         offset: 20,
         spacing: 10,
         z_index: 1431,
         delay: 5000,
         timer: 1000,
         animate: {
             enter: 'animated bounceInDown',
             exit: 'animated bounceOutUp'
         }
     });
   <?php
      } 
      if (!empty($error))
       {
      ?>
    $.notify({
             
             icon: 'glyphicon glyphicon-info-sign',
             title: '<b>Ada Kesalahan</b><br>',
             message: '<?php echo $error ?>',
         },{
             
             
             type: "danger noty-color col-md-3",
             allow_dismiss: true,
             placement: {
                 from: "top",
                 align: "right"
             },
             offset: 20,
             spacing: 10,
             z_index: 1431,
             delay: 5000,
             timer: 1000,
             animate: {
                 enter: 'animated fadeInDown',
                 exit: 'animated fadeOutUp'
             }
         });
    <?php            
      }
      ?>
   
</script>  
<script>
   <?php
      if (!empty($message))
        {
      ?>
    $.notify({
         
         icon: 'glyphicon glyphicon-info-sign',
         title: '<b>Notifikasi</b><br>',
         message: '<?php echo $message;?>',
     },
     {
         
         type: "success success-noty col-md-3 col-md-offset-2",
         allow_dismiss: true,
         placement: {
             from: "top",
             align: "right"
         },
         offset: 20,
         spacing: 10,
         z_index: 1431,
         delay: 5000,
         timer: 1000,
         animate: {
             enter: 'animated bounceInDown',
             exit: 'animated bounceOutUp'
         }
     });
   <?php
      }
      ?> 
</script> 
<script>
   <?php  
      if (!empty($_GET['err_msg']))  
      {
      ?> 
      $.notify({
      title: '<strong><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Error!</strong>',
      message: '<?php echo $_GET['err_msg'] ?>'
      },{
        type: 'danger alert-danger-alt col-md-3 col-md-offset-3'
      });
     <?php 
      } 
       elseif (!empty($_GET['success_msg']))  
      {
       ?>
   
      $.notify({
      title: '<strong> <span class= "glyphicon glyphicon-ok"></span> Success!</strong>',
      message: '<?php echo $_GET['success_msg'] ?>'
      },{
        type: 'success alert-success-alt col-md-3'
      });
   
    <?php    
      }    
      ?>  
   
</script>

<script src="<?= base_url()?>assets/js/validasi.js"></script>
<script src="<?= base_url()?>assets/js/jquery.validate.min.js"></script>
