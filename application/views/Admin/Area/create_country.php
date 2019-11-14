
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
					<div class="card-header">
						<div class="card-heading">
							<h4 class="card-title">Create New</h4>
						</div>
					</div>
					<form action="CountryAdd" method="post" name="frmcountry">
						<div class="card-body">
							<div class="form-group">

								
								<input type="text" class="form-control" name="country_name" placeholder="Enter Country">
							</div>
							<?php echo form_error('country_name',"<div class='text-danger' >","</div>"); 
echo "hii";
							?>
							<button type="submit" class="btn btn-primary">Save</button>
						</div>

					</form>

				</div>
			</div>
		</div>
	</div>
</div>

