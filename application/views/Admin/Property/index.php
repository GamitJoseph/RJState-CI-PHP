 
<div class="app-main" id="main">
	<!-- begin container-fluid -->
	<div class="container-fluid">
		<!-- begin row -->
		<div class="row">
			<div class="col-md-12 m-b-30">
				<!-- begin page title -->
				<div class="d-block d-sm-flex flex-nowrap align-items-center">
					<div class="page-title mb-2 mb-sm-0">
						<h1>Properties</h1>
					</div>
					<?php 

					if (!empty($this->session->flashdata('msg'))) :
						?>
						<div class="card-body button-list">
							<div class="alert alert-<?php echo $this->session->flashdata('alert'); ?> alert-dismissible fade show" role="alert">
								<strong><?php echo $this->session->flashdata('alert_title'); ?>!</strong> 
								<?php echo $this->session->flashdata('msg'); ?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<i class="ti ti-close"></i>
								</button>
							</div>
						</div>
					<?php endif; ?>
					<div class="ml-auto d-flex align-items-center">
						<nav>
							<ol class="breadcrumb p-0 m-b-0">
								<li class="breadcrumb-item">
									<a href="<?php echo base_url(); ?>Home"><i class="ti ti-home"></i></a>
								</li>
								<li class="breadcrumb-item">
									Properties
									
								</li>
								<li class="breadcrumb-item active text-primary" aria-current="page">List</li>
							</ol>
						</nav>
					</div>
				</div>
				<!-- end page title -->
			</div>
		</div>
		<!-- end row -->
		<!-- start-clients contant-->
		<div class="row">
			<div class="col-12">
				<div class="card card-statistics clients-contant">
					<div class="card-header">
						<div class="d-xxs-flex justify-content-between align-items-center">

							<div class="card-heading">
								<h4 class="card-title">Properties</h4>
							</div>

						</div>
					</div>
					<div class="card-body py-0 table-responsive">
						<table class="table clients-contant-table mb-0">
							<thead>
								<tr>
									<th scope="col">Title </th>
									<th scope="col">Description</th>
									<th scope="col">Type</th>
									<th scope="col">View more</th>	
								</tr>
							</thead>
							<tbody>
								<?php 

								

								foreach ($list as $row) :
									?>
									<tr>
										<td>
											<div class="d-flex align-items-center">

												<p class="font-weight-bold text-secondary">

													<?php 
													echo $row['property_title'];
													?>
												</p>
											</div>
										</td>

										<td><?php echo  substr($row['description'],0,70)."..." ; ?></td>
										<td>
											<?php 
											if ($row['type']=="sale") {
												
											
											?>
											<label class="badge mb-0 badge-success-inverse
											"> <?php echo $row['type']; ?></label>
											<?php
											}else{

											?>
											<label class="badge mb-0 badge-info-inverse
											"> <?php echo $row['type']; ?></label>
											<?php } ?>
											
										</td>
										<td>
											<a  href="<?php base_url();?>Admin_moreDetail/<?php echo $row['propertym_id'];?>" class="btn btn-icon btn-outline-primary btn-round mr-2 mb-2 mb-sm-0 "><i class="ti ti-eye"></i></a>

											


										</td>
									</tr>
								<?php endforeach; ?>
								<tr>
									<td colspan="2">

										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<?php echo  $this->pagination->create_links(); 
										?>
									</td>
								</tr>
								
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- end-clients contant-->
	</div>
	<!-- end container-fluid -->
</div>
<!-- end app-main -->
</div>










































