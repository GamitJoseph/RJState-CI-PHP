<div class="app-main" id="main">
	<!-- begin container-fluid -->
	<div class="container-fluid">
		<!-- begin row -->
		<div class="row">
			<div class="col-md-12 m-b-30">
				<!-- begin page title -->
				<div class="d-block d-sm-flex flex-nowrap align-items-center">
					<div class="page-title mb-2 mb-sm-0">
						<h1>Country</h1>
					</div>
					<div class="ml-auto d-flex align-items-center">
						<a  href="<?php echo base_url(); ?>CountryCreate/" >

							<span class="btn btn-info">Create new &nbsp;<i class="nav-icon ti ti-pencil"></i>
							</span>

						</a>
						&nbsp;
						&nbsp;
						&nbsp;
						<nav>
							<ol class="breadcrumb p-0 m-b-0">
								<li class="breadcrumb-item">

									<a href="<?php echo base_url(); ?>Home"><i class="ti ti-home"></i></a>
								</li>
								<li class="breadcrumb-item">
									Country
								</li>
								<li class="breadcrumb-item active text-primary" aria-current="page">List</li>
							</ol>
						</nav>
					</div>
				</div>
				<!-- end page title -->
			</div>
		</div>
		<div class="row editable-wrapper">
			<div class="col-lg-12 ">
				<div class="card card-statistics">
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


					<div class="card-body">
						<div class="table-responsive col-lg-8">
							<table id="datatable" class="table display responsive nowrap table-light table-bordered ">
								<thead class="thead-light">
									<tr >
										<th>Name</th>
										<th>Actions</th>
										
										
									</tr>
								</thead>
								<tbody>
									<?php 
									foreach ($datalst as $d) :
										?>
										<tr>
											<td>
												<?php
												echo $d['country_name']; 
												?>


												
											</td>
											<td>

												<a  href="<?php echo base_url(); ?>CountryEdit/<?php echo $d['country_id']; ?>" >

													<span class="btn btn-primary">Edit &nbsp;<i class="nav-icon ti ti-pencil"></i>
													</span>

												</a>

												<a onclick="return confirm('sure want to delete ?')" href="<?php echo base_url(); ?>CountryDelete/<?php echo $d['country_id']; ?>" >

													<span class="btn btn-danger">Delete &nbsp;<i class="nav-icon ti ti-na"></i>
													</span>


												</a>

														
												
												
											</td>

											

										</tr>
									<?php endforeach; ?>
									<tr>
										
										<td colspan="2" >

											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  $this->pagination->create_links(); ?>
										</td>
									</tr>
								</tbody>

							</table>




						</div>
					</div>
				</div>
			</div>
		</div>