<div class="app-main" id="main">
	<!-- begin container-fluid -->
	<div class="container-fluid">
		<!-- begin row -->
		<div class="row">
			<div class="col-md-12 m-b-30">
				<!-- begin page title -->
				<div class="d-block d-sm-flex flex-nowrap align-items-center">
					<div class="page-title mb-2 mb-sm-0">
						<h1><?php echo $pm[0]->property_title; ?></h1>
					</div>
					<div class="ml-auto d-flex align-items-center">
						<nav>
							<ol class="breadcrumb p-0 m-b-0">
								<li class="breadcrumb-item">
									<a href="<?php echo base_url(); ?>Home"><i class="ti ti-home"></i></a>
								</li>
								<li class="breadcrumb-item">
								<?php echo $pm[0]->property_title; ?>
								</li>
								<li class="breadcrumb-item active text-primary" aria-current="page">Detail</li>
							</ol>
						</nav>
					</div>
				</div>
				<!-- end page title -->
			</div>
		</div>
		<div class="row editable-wrapper">
			<div class="col-lg-12">
			
				<!-- basic -->
				<div class="card card-statistics">
                    <div class="card-header">
                            Basic Detail
                    </div>
					<div class="card-body">
                        Description:<br>
						<small><?php echo $pm[0]->description; ?></small>
						<br>
						<br>


						<div class="row justify-content-around">

							<div class="card col-lg-2">
								<div class="card-header">
									BadRooms
								</div>
								<div class="card-body">
									<?php echo $md[0]->badroom_count;?>
								</div>
							</div>


							<div class="card col-lg-2">
								<div class="card-header">
									BathRooms
								</div>
								<div class="card-body">
								<?php echo $md[0]->bathroom_count;?>
								</div>
							</div>


							<div class="card col-lg-2">
								<div class="card-header">
									Balconie
								</div>
								<div class="card-body">
								<?php echo $md[0]->balconie_count;?>
								</div>
							</div>
							<div class="card col-lg-2">
								<div class="card-header">
									Saleable Area(sq. ft.)
								</div>
								<div class="card-body">
									<?php echo $md[0]->saleable_area;?>
								</div>
							</div>
							<div class="card col-lg-2">
								<div class="card-header">
									Carpet Area(sq. ft.)
								</div>
								<div class="card-body">
									<?php echo $md[0]->carpet_area;?>
								</div>
							</div>		
						</div>
						<div class="row justify-content-around">
							Extra Rooms:<br>
							<div class="card col-lg-2">
								<div class="card-header">
									Player Room
								</div>
								<div class="card-body">
								<i class='fas fa-gamepad' style='font-size:48px;color:<?php if($md[0]->is_playerroom==1){echo "green";}else{echo "red";}?>'></i>
								</div>
								<div class="card-footer text-muted">
								<?php 
									  	if($md[0]->is_playerroom==1){
											echo "<span class='badge badge-success'>Yes</span>";
										  }
										  else{
											echo	"<span class='badge badge-danger'>No</span>";
										  }   
									  ?>
  								</div>
							</div>
							
							
							<div class="card col-lg-2">
								<div class="card-header">
									Study Room
								</div>
								<div class="card-body">
									<i class='fas fa-chalkboard-teacher' style='font-size:48px;color:<?php if($md[0]->is_studyroom==1){echo "green";}else{echo "red";}?>'></i>
								</div>
								<div class="card-footer text-muted">
								<?php 
									  	if($md[0]->is_studyroom==1){
											echo "<span class='badge badge-success'>Yes</span>";
										  }
										  else{
											echo	"<span class='badge badge-danger'>No</span>";
										  }   
									  ?>
  								</div>
							</div>

							<div class="card col-lg-2">
								<div class="card-header">
									Store Room
								</div>
								<div class="card-body">
								<i class='fas fa-landmark' style='font-size:48px;color:<?php if($md[0]->is_storeroom==1){echo "green";}else{echo "red";}?>'></i>
								</div>
								<div class="card-footer text-muted">
								<?php 
									  	if($md[0]->is_storeroom==1){
											echo "<span class='badge badge-success'>Yes</span>";
										  }
										  else{
											echo	"<span class='badge badge-danger'>No</span>";
										  }   
									  ?>
  								</div>
							</div>


							<div class="card col-lg-2">
								<div class="card-header">
									Servent Room
								</div>
								<div class="card-body">
								<i class='fas fa-users' style='font-size:48px;color:<?php if($md[0]->is_serventroom==1){echo "green";}else{echo "red";}?>'></i>
								</div>
								<div class="card-footer text-muted">
									<?php 
									  	if($md[0]->is_serventroom==1){
											echo "<span class='badge badge-success'>Yes</span>";
										  }
										  else{
											echo	"<span class='badge badge-danger'>No</span>";
										  }   
									  ?>
  								</div>
							</div>

						</div>
					</div>
				</div>

				<!-- address -->
				<div class="card card-statistics">
                    <div class="card-header">
                            Address Detail
                    </div>
					<div class="card-body">
						<div class="row justify-content-around">

							<div class="card col-lg-2"><div class="card-header">Country:</div><div class="card-body"><?php echo $addr[0]->country_name; ?></div></div>
							<div class="card col-lg-2"><div class="card-header">State:</div><div class="card-body"><?php echo $addr[0]->state_name; ?></div></div>
							<div class="card col-lg-2"><div class="card-header">City:</div><div class="card-body"><?php echo $addr[0]->city_name; ?></div></div>
							<div class="card col-lg-2"><div class="card-header">Lendmark:</div><div class="card-body"><?php echo $addr[0]->lendmark; ?></div></div>
						</div>
						<hr>
                        <h5>full Address:</h5>
						<p><?php echo $addr[0]->fulladdr; ?></p>
					</div>
				</div>


				<!-- price -->
                <div class="card card-statistics">
                    <div class="card-header">
                            Price Detail
                    </div>
					<div class="card-body">
                        
					</div>
				</div>

				<!-- feature -->
				<div class="card card-statistics">
                    <div class="card-header">
                            Features Detail
                    </div>
					<div class="card-body">
						<div class="row justify-content-around"> 
							<div class="card card-statistics col-lg-3">
                    			<div class="card-header">
                            		Furnishing Features
                    			</div>
								<div class="card-body">  

								</div>
							</div>

							<div class="card card-statistics col-lg-3">
                    			<div class="card-header">
                            		Amenties
                    			</div>
								<div class="card-body">  

								</div>
							</div>
							<div class="card card-statistics col-lg-3">
                    			<div class="card-header">
                            		Flooring Features
                    			</div>
								<div class="card-body">  

								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- photos -->
				<div class="card card-statistics">
                    <div class="card-header">
                             Photos
                    </div>
					<div class="card-body">
                        
					</div>
				</div>
				
			</div>
		</div>