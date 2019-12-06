 
<div class="app-main" id="main">
	<!-- begin container-fluid -->
	<div class="container-fluid">
		<!-- begin row -->
		<div class="row">
			<div class="col-md-12 m-b-30">
				<!-- begin page title -->
				<div class="d-block d-sm-flex flex-nowrap align-items-center">
					<div class="page-title mb-2 mb-sm-0">
						<h1>Customers</h1>
					</div>
					<div class="ml-auto d-flex align-items-center">
						<nav>
							<ol class="breadcrumb p-0 m-b-0">
								<li class="breadcrumb-item">
									<a href="<?php echo base_url(); ?>Home"><i class="ti ti-home"></i></a>
								</li>
								<li class="breadcrumb-item">
									Customers
									
								</li>
								<li class="breadcrumb-item active text-primary" aria-current="page">List</li>
							</ol>
						</nav>
					</div>
				</div>
				<!-- end page title -->
			</div>
		</div>

		<!-- start row -->

		<div class="row">
			<?php 

			foreach ($datalst as $d) :
				?>
				<div class="col-xxl-3 col-xl-4  col-sm-6">
					<div class="card card-statistics contact-contant">
						<div class="card-body py-4">
							<div class="d-flex align-items-center">
								<div class="bg-img">
									
									<img src="<?php echo base_url(); ?>/assets/uploads/users/<?php echo $d['photo']; ?>" alt="" class="img-fluid">
								</div>
								<div class="ml-3">
									<h4 class="mb-0">
										
										<?php 
										echo $d['firstname'];
										echo "&nbsp;";
										echo $d['middlename'];
										echo "&nbsp;";
										echo $d['lastname'];

										?>
									</h4>
									<p><span class="badge badge-warning-inverse px-2 py-1 mt-1">Customer</span></p>
								</div>
							</div>
							<div>
								<ul class="nav">
									<li class="nav-item">
										<div class="img-icon"><i class="fa fa-mobile"></i></div>
									</li>
									<li class="nav-item">
										<p><?php echo $d['phone']; ?></p>
									</li>
								</ul>
								
								<ul class="nav">
									<li class="nav-item">
										<div class="img-icon"><i class="fa fa-envelope-o"></i></div>
									</li>
									<li class="nav-item">
										<p><?php echo $d['email']; ?></p>
									</li>
								</ul>
								<ul class="nav">
									<li class="nav-item">
										<div class="img-icon"><i class="fa fa-location-arrow"></i></div>
									</li>
									<li class="nav-item">
										<p><?php echo $d['state_name']; 
										?></p>
									</li>
									

								</ul>
								
							</div>
								
							<div class="ml-3 mt-20">
							<a href="<?php echo base_url('/Customer_full/'. $d['user_id']); ?>" class="btn btn-round btn-inverse-info">View more</a>
							</div>
						</div>
					</div>
				</div>


			<?php endforeach;
			

			?>


		</div>
		<!-- end row -->
		<div class="row">
			<div class="col-md-12 m-b-30">
				<!-- begin page title -->
				<div class="d-block d-sm-flex flex-nowrap align-items-center">

				<?php echo  $this->pagination->create_links();  ?>
			</div>
		</div>
	</div>
	</div>
	<!-- end container-fluid -->
	
</div>
<!-- end app-main -->
