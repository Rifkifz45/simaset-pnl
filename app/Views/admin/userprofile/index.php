<?php
	$session = session();
	?>
<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="#">Home</a>
				</li>
				<li class="active">User Profile</li>
			</ul>
			<!-- /.breadcrumb -->
			<div class="nav-search" id="nav-search">
				<form class="form-search">
					<span class="input-icon">
					<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
					<i class="ace-icon fa fa-search nav-search-icon"></i>
					</span>
				</form>
			</div>
			<!-- /.nav-search -->
		</div>
		<div class="page-content">
			<!-- /.page-header -->
			<div class="row">
				<div class="col-xs-12">
				   <?php if (!empty(session()->getFlashdata('error'))) : ?>
	               <div class="row">
	                  <div class="col-xs-12"> 
	                     <div class="alert alert-block alert-danger">
	                        <button type="button" class="close" data-dismiss="alert">
	                           <i class="ace-icon fa fa-times"></i>
	                        </button>
	                        <p>
	                           <strong>
	                              <i class="ace-icon fa fa-times"></i>
	                              Failed!
	                           </strong>
	                           <?= session()->getFlashdata('error') ?>
	                        </p>
	                     </div>
	                  </div>
	                </div>
	                <?php endif; ?>

	                <?php if (!empty(session()->getFlashdata('pesan'))) : ?>
	               <div class="row">
	                  <div class="col-xs-12"> 
	                     <div class="alert alert-block alert-success">
	                        <button type="button" class="close" data-dismiss="alert">
	                           <i class="ace-icon fa fa-times"></i>
	                        </button>
	                        <p>
	                           <strong>
	                              <i class="ace-icon fa fa-check"></i>
	                              Well Done!
	                           </strong>
	                           <?= session()->getFlashdata('pesan') ?>
	                        </p>
	                     </div>
	                  </div>
	                </div>
	                <?php endif; ?>
					<!-- PAGE CONTENT BEGINS -->
					<form action="<?= site_url('admin/user-profile/update') ?>" method="post" enctype="multipart/form-data">
					<div class='row'>
					   <div class='col-xs-12'>
					      <div class='widget-box'>
					         <div class='widget-header'>
					            <h4 class='widget-title'>EDIT DATA USER</h4>
					            <div class="widget-toolbar">
									<a href="#" data-action="fullscreen" class="orange2">
										<i class="ace-icon fa fa-expand"></i>
									</a>

									<a href="#" data-action="reload">
										<i class="ace-icon fa fa-refresh"></i>
									</a>

									<a href="#" data-action="collapse">
										<i class="ace-icon fa fa-chevron-up"></i>
									</a>

									<a href="#" data-action="close">
										<i class="ace-icon fa fa-times"></i>
									</a>
								</div>
					         </div>
					         <div class='widget-body'>
					            <div class='widget-main'>
					               <table class='table table-condensed table-bordered input-sm'>
					                  <tbody>
					                     <tr>
					                        <th width='150px' scope='row'><h6>Full Name</h6></th>
					                        <td>
					                        	<input type="hidden" name="id" value="<?= $user['id'] ?>">
					                        	<input type="hidden" name="foto_sebelum" value="<?= $user['foto_user'] ?>">
					                        	<input autofocus onfocus="this.setSelectionRange(this.value.length,this.value.length);" type="text" class="form-control" value="<?= $user['nama_user'] ?>" id="nama_user" name="nama_user" placeholder="Enter full name" required>
					                        </td>
					                     </tr>
					                     <tr>
					                        <th scope='row'><h6>Username</h6></th>
					                        <td>
					                        	<input type="text" class="form-control" id="username" name="username" value="<?= $user['username'] ?>" placeholder="Enter username ID">
					                        </td>
					                     </tr>
					                     <tr>
					                        <th scope='row'><h6>New Password</h6></th>
					                        <td>
					                        	<input type="password" class="form-control" id="newpw1" name="newpw1" placeholder="Enter password ID">
					                        </td>
					                     </tr>
					                     <tr>
					                        <th scope='row'><h6>Confirm Password</h6></th>
					                        <td>
					                        	<input type="password" class="form-control" id="newpw2" name="newpw2" placeholder="Enter confirm password">
					                        </td>
					                     </tr>
					                     <tr>
					                        <th scope='row'><h6>Email</h6></th>
					                        <td>
					                        	<input type="email" class="form-control" value="<?= $user['email'] ?>" id="eMail" name="email" placeholder="Enter email ID">
					                        </td>
					                     </tr>
					                      <tr>
					                        <th scope='row'><h6>Phone</h6></th>
					                        <td>
					                        	<input type="text" class="form-control" value="<?= $user['phone'] ?>" id="phone" name="phone" placeholder="Enter phone number">
					                        </td>
					                     </tr>
					                     <tr>
					                        <th scope='row'><h6>Ganti Foto</h6></th>
					                        <td>
					                           <input type="file" id="id-input-file-2" name="foto_user" accept=".jpg,.png" />
					                           <hr style='margin:5px'>
					                           <i style='color:red'>Foto Saat ini : </i><a target='_BLANK' href='<?= base_url('uploads/user/'.$user['foto_user']) ?>'><?= $user['foto_user'] ?></a>
					                        </td>
					                     </tr>
					                     <tr>
					                        <th scope='row'></th>
					                        <td>
					                           <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"> Update </i></button>
					                        </td>
					                     </tr>
					                  </tbody>
					               </table>
					            </div>
					         </div>
					      </div>
					   </div>
					   <!-- /.span -->
					</div>
					</form>
					<!-- PAGE CONTENT ENDS -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.page-content -->
	</div>
</div>
<!-- /.main-content -->
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script type="text/javascript">
	jQuery(function($) {		
		$('#id-input-file-1 , #id-input-file-2').ace_file_input({
			no_file:'No File ...',
			theme: "bootstrap",
			btn_choose:'Choose',
			btn_change:'Change',
			droppable:false,
			onchange:null,
			thumbnail:false //| true | large
			//whitelist:'gif|png|jpg|jpeg'
			//blacklist:'exe|php'
			//onchange:''
			//
		});	
	})
</script>
<?= $this->endSection('') ?>