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
		<div class="row editable-wrapper">
			<div class="col-lg-12 ">
				<div class="card card-statistics">
					<div class="card-body">
						<div class="table-responsive">
							<table id="datatable" class="table display nowrap table-light table-bordered">
								<thead class="thead-light">
									<tr>
										<th>Title</th>
										<th>Description</td>
										<th></th>
										
									</tr>
								</thead>
								<tbody>
                                   <?php
                                    foreach($list as $row)
                                    { ?>
                                    <tr>
										<td><?php echo $row->property_title; ?></td>
										<td><?php echo  substr($row->description,0,70)."..." ; ?></td>
										<td><a href="<?php base_url();?>moreDetail/<?php echo $row->propertym_id;?>" class="btn" >more detail...</a></td>
										</tr>
								  <?php 
								   }
                                  ?>	
								</tbody>

							</table>
						</div>
					</div>
				</div>
			</div>
		</div>