<?= $this->extend('admin/layout') ?>

<?php
use CodeIgniter\I18n\Time;
?>

<?= $this->section('content') ?>
<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="#">Home</a>
				</li>
				<li>
					<a href="#">Settings</a>
				</li>
				<li class="active">User Management</li>
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
			<?= $this->include('admin/configurejs') ?>
			<div class="page-header">
				<h1>
					Management
					<small>
					Data User
					</small>
				</h1>
			</div>
			<!-- /.page-header -->
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<a href="#" class="btn btn-xs btn-info float-right"><i class="fa fa-plus"></i> &nbsp;Tambah User</a>
					<div class="space-8"></div>
					<form action="" method="get">
						<div class="input-group">
						<span class="input-group-addon">
							<i class="ace-icon fa fa-filter"></i> Filter By
						</span>
						<div class="form-group">
						<!-- <input type="text" name="keyword" class="form-control search-query" placeholder="Pencarian" /> -->
						<select name="" id="search" class="form-control search-query">
							<option value=""> Choose .. </option>
							<option value=""> Nama </option>
							<option value=""> Role </option>
							<option value=""> Username </option>
						</select>
						</div>
						<span class="input-group-btn">
							<button type="button" onclick="alert('Tools in maintenance. Please check periodically')" class="btn btn-success btn-sm">
								<span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
								Search
							</button>
						</span>
					</div>
					</form>
					<div class="space-8"></div>
					<table id="simple-table" class="table table-responsive table-bordered table-hover">
						<thead>
							<tr>
								<th class="center">
									#
								</th>
								<th class="detail-col">Details</th>
								<th>Nama</th>
								<th>Role </th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 1 + (10 * ($currentPage - 1));
							foreach ($users as $key => $value): ?>
							<tr>
								<td class="center"> <?= $i++ ?> </td>
								<td class="center">
									<div class="action-buttons">
										<a href="#" class="green bigger-140 show-details-btn" title="Show Details">
										<i class="ace-icon fa fa-angle-double-down"></i>
										<span class="sr-only">Details</span>
										</a>
									</div>
								</td>
								<td><?= $value['nama']; ?></td>
								<td>
									<?php
									if ($value['role'] == 1) {
										echo "Admin";
									}elseif($value['role'] == 2) {
										echo "Approver";
									}elseif($value['role'] == 3) {
										echo "Penanggung Jawab";
									}else{
										echo "Not Available";
									}
									?>
								</td>
								<td class="hidden-480">
									<nobr>
										<i class="fa fa-circle <?php
											if ($value['status'] == 1) {
												echo "text-warning";
											}elseif($value['status'] == 2) {
												echo "text-danger";
											}elseif($value['status'] == 3) {
												echo "text-success";
											}else{
												echo "Not Available";
											}
										?>"></i>
										<?php
											if ($value['status'] == 1) {
												echo "<strong class=\"text-warning\">Pending</strong>";
											}elseif($value['status'] == 2) {
												echo "<strong class=\"text-danger\">Inactive</strong>";
											}elseif($value['status'] == 3) {
												echo "<strong class=\"text-success\">Active</strong>";
											}else{
												echo "Not Available";
											}
										?>
									</nobr>
								</td>
								<td class="center">
									<div class="hidden-sm hidden-xs btn-group">
										<button class="btn btn-xs btn-success">
										<i class="ace-icon fa fa-check bigger-120"></i>
										</button>
										<button class="btn btn-xs btn-info">
										<i class="ace-icon fa fa-pencil bigger-120"></i>
										</button>
										<button class="btn btn-xs btn-danger">
										<i class="ace-icon fa fa-trash-o bigger-120"></i>
										</button>
										<button class="btn btn-xs btn-warning">
										<i class="ace-icon fa fa-flag bigger-120"></i>
										</button>
									</div>
									<div class="hidden-md hidden-lg">
										<div class="inline pos-rel">
											<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
											<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
											</button>
											<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
												<li>
													<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
													<span class="blue">
													<i class="ace-icon fa fa-search-plus bigger-120"></i>
													</span>
													</a>
												</li>
												<li>
													<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
													<span class="green">
													<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
													</span>
													</a>
												</li>
												<li>
													<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
													<span class="red">
													<i class="ace-icon fa fa-trash-o bigger-120"></i>
													</span>
													</a>
												</li>
											</ul>
										</div>
									</div>
								</td>
							</tr>
							<tr class="detail-row">
								<td colspan="8">
									<div class="table-detail">
										<div class="row">
											<div class="col-xs-12 col-sm-3">
												<div class="text-center">
													<img height="150" class="thumbnail inline no-margin-bottom" alt="Domain Owner's Avatar" src="<?= base_url('/template/assets/images/avatars/' . $value['avatar']) ?>"  />
													<br />
													<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
														<div class="inline position-relative">
															<a class="user-title-label" href="#">
															<i class="ace-icon fa fa-circle light-green"></i>
															&nbsp;
															<span class="white">Alex M. Doe</span>
															</a>
														</div>
													</div>
								 				</div>
											</div>
											<div class="col-xs-12 col-sm-9">
												<div class="space visible-xs"></div>
												<div class="profile-user-info profile-user-info-striped">
													<div class="profile-info-row">
														<div class="profile-info-name"> Username </div>
														<div class="profile-info-value">
															<span><?= $value['username']; ?></span>
														</div>
													</div>
													<div class="profile-info-row">
														<div class="profile-info-name"> Password </div>
														<div class="profile-info-value">
															<i class="fa fa-key light-orange bigger-110"></i>
															<span><?= $value['password']; ?></span>
														</div>
													</div>
													<div class="profile-info-row">
														<div class="profile-info-name"> Email </div>
														<div class="profile-info-value">
															<span><?= $value['email']; ?></span>
														</div>
													</div>
													<div class="profile-info-row">
														<div class="profile-info-name"> Telp </div>
														<div class="profile-info-value">
															<span><?= $value['telp']; ?></span>
														</div>
													</div>
													<div class="profile-info-row">
														<div class="profile-info-name"> Created At </div>
														<div class="profile-info-value">
															<span>
																<?php
																$time = Time::parse($value['created_at'], 'Asia/Jakarta');
																echo date_format($time,"d/m/Y H:i:s");
																?>
															</span>
														</div>
													</div>
													<div class="profile-info-row">
														<div class="profile-info-name"> Created By </div>
														<div class="profile-info-value">
															<span>Muhammad Rifki Kardawi</span>
														</div>
													</div>
													<div class="profile-info-row">
														<div class="profile-info-name"> Updated At </div>
														<div class="profile-info-value">
															<span>
																<?php
																$time = Time::parse($value['updated_at'], 'Asia/Jakarta');
																echo date_format($time,"d/m/Y H:i:s");
																?>
															</span>
														</div>
													</div>
													<div class="profile-info-row">
														<div class="profile-info-name"> Updated By </div>
														<div class="profile-info-value">
															<span>Muhammad Rifki Kardawi</span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</td>
							</tr>
							<?php endforeach ?>
						</tbody>
					</table>
					<?= $pager->links(); ?>
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
<?php echo $this->endSection() ?>
<?= $this->section('script') ?>
<script type="text/javascript">

	jQuery(function($) {				
		
		//And for the first simple table, which doesn't have TableTools or dataTables
		//select/deselect all rows according to table header checkbox
		var active_class = 'active';
		$('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
			var th_checked = this.checked;//checkbox inside "TH" table header
			
			$(this).closest('table').find('tbody > tr').each(function(){
				var row = this;
				if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
				else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
			});
		});
		
		//select/deselect a row when the checkbox is checked/unchecked
		$('#simple-table').on('click', 'td input[type=checkbox]' , function(){
			var $row = $(this).closest('tr');
			if($row.is('.detail-row ')) return;
			if(this.checked) $row.addClass(active_class);
			else $row.removeClass(active_class);
		});
	
		
	
		/********************************/
		//add tooltip for small view action buttons in dropdown menu
		$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
		
		//tooltip placement on right or left
		function tooltip_placement(context, source) {
			var $source = $(source);
			var $parent = $source.closest('table')
			var off1 = $parent.offset();
			var w1 = $parent.width();
	
			var off2 = $source.offset();
			//var w2 = $source.width();
	
			if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
			return 'left';
		}
		
		
		
		
		/***************/
		$('.show-details-btn').on('click', function(e) {
			e.preventDefault();
			$(this).closest('tr').next().toggleClass('open');
			$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
		});
		/***************/
		
		
		
		
		
		/**
		//add horizontal scrollbars to a simple table
		$('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
		  {
			horizontal: true,
			styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
			size: 2000,
			mouseWheelLock: true
		  }
		).css('padding-top', '12px');
		*/
	
	
	})
</script>
<?= $this->endSection() ?>