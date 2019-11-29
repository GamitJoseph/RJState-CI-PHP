<div class="app-main" id="main">
	<!-- begin container-fluid -->
	<div class="container-fluid">
		<!-- begin row -->
		<div class="row">
			<div class="col-md-12 m-b-30">
				<!-- begin page title -->
				<div class="d-block d-sm-flex flex-nowrap align-items-center">
					<div class="page-title mb-2 mb-sm-0">
						<h1>Property</h1>
					</div>
					<div class="ml-auto d-flex align-items-center">
						<nav>
							<ol class="breadcrumb p-0 m-b-0">
								<li class="breadcrumb-item">
									<a href="<?php echo base_url(); ?>Home"><i class="ti ti-home"></i></a>
								</li>
								<li class="breadcrumb-item">
									Property
								</li>
								<li class="breadcrumb-item active text-primary" aria-current="page">List</li>
							</ol>
						</nav>
					</div>
				</div>
				<!-- end page title -->
			</div>
		</div>
		<div class="row">
			<div class="col-xxl-8 m-b-30">
				<div class="card card-statistics h-100 m-b-0">
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
					<div class="card-header d-flex justify-content-between">
						<div class="card-heading">
							<h4 class="card-title">Recently added property </h4>
						</div>
						<div class="dropdown">
							<a class="p-2" href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fe fe-more-horizontal"></i>
							</a>
							<div class="dropdown-menu custom-dropdown dropdown-menu-right p-4">
								<h6 class="mb-1">Action</h6>
								<a class="dropdown-item" href="#!"><i class="fa-fw fa fa-file-o pr-2"></i>View reports</a>
								<a class="dropdown-item" href="#!"><i class="fa-fw fa fa-edit pr-2"></i>Edit reports</a>
								<a class="dropdown-item" href="#!"><i class="fa-fw fa fa-bar-chart-o pr-2"></i>Statistics</a>
								<h6 class="mb-1 mt-3">Export</h6>
								<a class="dropdown-item" href="#!"><i class="fa-fw fa fa-file-pdf-o pr-2"></i>Export to PDF</a>
								<a class="dropdown-item" href="#!"><i class="fa-fw fa fa-file-excel-o pr-2"></i>Export to CSV</a>
							</div>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-borderless mb-0">
								<thead class="bg-light">
									<tr>
										<th>Order ID</th>
										<th>Customer</th>
										<th>Photo</th>
										<th>Property</th>
										<th>Date </th>
										<th>Type</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody class="text-muted mb-0">
									<tr>
										<td>#54981</td>
										<td>Alice Williams</td>
										<td>
											<div class="bg-img">
												<img class="img-fluid rounded" src="assets/img/real-estate/01.jpg" alt="">
											</div>
										</td>
										<td>Eaton Place</td>
										<td>20-01-2019</td>
										<td>Rent</td>
										<td><span class="badge badge-success ">Paid</span></td>
										<td>
											<a href="javascript:void(0)" class="mr-2"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>
											<a href="javascript:void(0)"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i></a>
										</td>
									</tr>
									<tr>
										<td>#25425</td>
										<td>AnnaHorno</td>
										<td>
											<div class="bg-img">
												<img class="img-fluid rounded" src="assets/img/real-estate/02.jpg" alt="">
											</div>
										</td>
										<td>Kent Terrace </td>
										<td>26-04-2019</td>
										<td>Sell</td>
										<td><span class="badge badge-warning">Paid</span></td>
										<td>
											<a href="javascript:void(0)" class="mr-2"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>
											<a href="javascript:void(0)"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i></a>
										</td>
									</tr>
									<tr>
										<td>#25425</td>
										<td>Fielmonk</td>
										<td>
											<div class="bg-img">
												<img class="img-fluid rounded" src="assets/img/real-estate/03.jpg" alt="">
											</div>
										</td>
										<td>Princes Gate Court</td>
										<td>14-04-2019</td>
										<td>Sell</td>
										<td><span class="badge badge-success">Pending</span></td>
										<td>
											<a href="javascript:void(0)" class="mr-2"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>
											<a href="javascript:void(0)"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i></a>
										</td>
									</tr>
									<tr>
										<td>#25425</td>
										<td>Dutca Patrick</td>
										<td>
											<div class="bg-img">
												<img class="img-fluid rounded" src="assets/img/real-estate/04.jpg" alt="">
											</div>
										</td>
										<td>Ossington Street</td>
										<td>06-12-2019</td>
										<td>Sold</td>
										<td><span class="badge badge-danger">Sold</span></td>
										<td>
											<a href="javascript:void(0)" class="mr-2"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>
											<a href="javascript:void(0)"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i></a>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xxl-5 m-b-30">
				<div class="card card-statistics tab nav-border mb-0 h-100">
					<div class="card-header d-block d-sm-flex align-items-center justify-content-between p-3">
						<div class="card-heading mb-3 mb-sm-0">
							<h4 class="card-title">Property overview </h4>
						</div>
						<div class="dropdown">
							<ul class="nav nav-tabs mb-0" role="tablist">
								<li class="nav-item">
									<a class="nav-link py-2 active show" id="sell-02-tab" data-toggle="tab" href="#sell-02" role="tab" aria-controls="sell-02" aria-selected="true">Sell</a>
								</li>
								<li class="nav-item">
									<a class="nav-link py-2" id="rent-02-tab" data-toggle="tab" href="#rent-02" role="tab" aria-controls="rent-02" aria-selected="false">Rent </a>
								</li>
							</ul>
						</div>
					</div>
					<div class="card-body">
						<div class="tab-content">
							<div class="tab-pane fade active show" id="sell-02" role="tabpanel" aria-labelledby="sell-02-tab">
								<div class="row align-items-center m-b-20">
									<div class="col-xs-2 mb-2 mb-xs-0">
										<img class="img-fluid" src="assets/img/real-estate/01.jpg" alt="">
									</div>
									<div class="col-xs-7">
										<h5 class="mb-1"> <a href="#">Atrium Apartments, St John's Wood, NW8 </a></h5>
										<span>05, Jun 2019, St John's Wood</span>
									</div>
									<div class="col-xs-3 mt-2 mt-xs-0 text-left text-xs-center">
										<a class="btn btn-xs btn-inverse-primary" href="#"> Read more </a>
									</div>
								</div>
								<div class="row align-items-center m-b-20">
									<div class="col-xs-2 mb-2 mb-xs-0">
										<img class="img-fluid" src="assets/img/real-estate/02.jpg" alt="">
									</div>
									<div class="col-xs-7">
										<h5 class="mb-1"> <a href="#">Old Church Street, Chelsea, London, SW3 </a></h5>
										<span>12, Jun 2019, Chelsea, London, SW3</span>
									</div>
									<div class="col-xs-3 mt-2 mt-xs-0 text-left text-xs-center">
										<a class="btn btn-xs btn-inverse-primary" href="#"> Read more </a>
									</div>
								</div>
								<div class="row align-items-center m-b-20">
									<div class="col-xs-2 mb-2 mb-xs-0">
										<img class="img-fluid" src="assets/img/real-estate/03.jpg" alt="">
									</div>
									<div class="col-xs-7">
										<h5 class="mb-1"> <a href="#">Wilton Place, Knightsbridge, London, SW1X 8RL </a></h5>
										<span>30, Jun 2019, London, SW1X 8RL</span>
									</div>
									<div class="col-xs-3 mt-2 mt-xs-0 text-left text-xs-center">
										<a class="btn btn-xs btn-inverse-primary" href="#"> Read more </a>
									</div>
								</div>
								<div class="row align-items-center m-b-20">
									<div class="col-xs-2 mb-2 mb-xs-0">
										<img class="img-fluid" src="assets/img/real-estate/04.jpg" alt="">
									</div>
									<div class="col-xs-7">
										<h5 class="mb-1"> <a href="#">Wilton Place, Knightsbridge, London, SW1X 8RL </a></h5>
										<span>30, Jun 2019, London, SW1X 8RL</span>
									</div>
									<div class="col-xs-3 mt-2 mt-xs-0 text-left text-xs-center">
										<a class="btn btn-xs btn-inverse-primary" href="#"> Read more </a>
									</div>
								</div>
								<div class="row align-items-center">
									<div class="col-xs-2 mb-2 mb-xs-0">
										<img class="img-fluid" src="assets/img/real-estate/05.jpg" alt="">
									</div>
									<div class="col-xs-7">
										<h5 class="mb-1"> <a href="#">Ebury Square, Belgravia, London, SW1W </a></h5>
										<span>20, Sep 2019, London, SW1W </span>
									</div>
									<div class="col-xs-3 mt-2 mt-xs-0 text-left text-xs-center">
										<a class="btn btn-xs btn-inverse-primary" href="#"> Read more </a>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="rent-02" role="tabpanel" aria-labelledby="rent-02-tab">
								<div class="row align-items-center m-b-20">
									<div class="col-xs-2 mb-2 mb-xs-0">
										<img class="img-fluid" src="assets/img/real-estate/04.jpg" alt="">
									</div>
									<div class="col-xs-7">
										<h5 class="mb-1"> <a href="#">Wapping High Street, London, E1W </a></h5>
										<span>10, Sep 2019, St London, E1W</span>
									</div>
									<div class="col-xs-3 mt-2 mt-xs-0 text-left text-xs-center">
										<a class="btn btn-xs btn-inverse-primary" href="#"> Read more </a>
									</div>
								</div>
								<div class="row align-items-center m-b-20">
									<div class="col-xs-2 mb-2 mb-xs-0">
										<img class="img-fluid" src="assets/img/real-estate/05.jpg" alt="">
									</div>
									<div class="col-xs-7">
										<h5 class="mb-1"> <a href="#">Ebury Square, Belgravia, London, SW1W </a></h5>
										<span>20, Sep 2019, London, SW1W </span>
									</div>
									<div class="col-xs-3 mt-2 mt-xs-0 text-left text-xs-center">
										<a class="btn btn-xs btn-inverse-primary" href="#"> Read more </a>
									</div>
								</div>
								<div class="row align-items-center m-b-20">
									<div class="col-xs-2 mb-2 mb-xs-0">
										<img class="img-fluid" src="assets/img/real-estate/06.jpg" alt="">
									</div>
									<div class="col-xs-7">
										<h5 class="mb-1"> <a href="#">Elm Walk, Hampstead, NW3 </a></h5>
										<span>25, Sep 2019, Hampstead, NW3</span>
									</div>
									<div class="col-xs-3 mt-2 mt-xs-0 text-left text-xs-center">
										<a class="btn btn-xs btn-inverse-primary" href="#"> Read more </a>
									</div>
								</div>
								<div class="row align-items-center m-b-20">
									<div class="col-xs-2 mb-2 mb-xs-0">
										<img class="img-fluid" src="assets/img/real-estate/05.jpg" alt="">
									</div>
									<div class="col-xs-7">
										<h5 class="mb-1"> <a href="#">Ebury Square, Belgravia, London, SW1W </a></h5>
										<span>20, Sep 2019, London, SW1W </span>
									</div>
									<div class="col-xs-3 mt-2 mt-xs-0 text-left text-xs-center">
										<a class="btn btn-xs btn-inverse-primary" href="#"> Read more </a>
									</div>
								</div>
								<div class="row align-items-center">
									<div class="col-xs-2 mb-2 mb-xs-0">
										<img class="img-fluid" src="assets/img/real-estate/05.jpg" alt="">
									</div>
									<div class="col-xs-7">
										<h5 class="mb-1"> <a href="#">Ebury Square, Belgravia, London, SW1W </a></h5>
										<span>20, Sep 2019, London, SW1W </span>
									</div>
									<div class="col-xs-3 mt-2 mt-xs-0 text-left text-xs-center">
										<a class="btn btn-xs btn-inverse-primary" href="#"> Read more </a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
