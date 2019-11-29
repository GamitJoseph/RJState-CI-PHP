
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
						<nav>
							<ol class="breadcrumb p-0 m-b-0">
								<li class="breadcrumb-item">
									<a href="<?php echo base_url(); ?>Home"><i class="ti ti-home"></i></a>
								</li>
								<li class="breadcrumb-item">
									Country
								</li>
								<li class="breadcrumb-item active text-primary" aria-current="page">Create</li>
							</ol>
						</nav>
					</div>
				</div>
				<!-- end page title -->
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card card-statistics">

					<?php 
					if (!empty($msg)) :
						?>
						<div class="card-body button-list">
							<div class="alert alert-<?php echo $alert;  ?> alert-dismissible fade show" role="alert">
								<strong><?php echo $alert_title; ?></strong> 
								<?php echo $msg; ?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<i class="ti ti-close"></i>
								</button>
							</div>
						</div>
					<?php endif; ?>


					<div class="card-header">
						<div class="card-heading">
							<h4 class="card-title">Create New</h4>
						</div>
					</div>
					<form  method="post" name="frmcountry">
						<div class="card-body">
							<div class="form-group">

								
								<input type="text" class="form-control" id="country_name" name="country_name"
								value="<?php set_value('country_name');  ?>"
								placeholder="Enter Country">
							</div>
							<div class="form-group">

								<?php echo form_error('country_name',"<div class='text-danger' >","</div>"); 

								?>
							</div>
							<input type="submit" name="formSubmit" class="btn btn-primary" value="Save"></input>
							<input type="submit" name="formCancel" class="btn btn-warning" value="Cancel"></input>
							
						</div>

					</form>

				</div>
			</div>
		</div>
	</div>
</div>



