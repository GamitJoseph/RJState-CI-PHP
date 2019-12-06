                
<div class="app-main" id="main">
    <!-- begin container-fluid -->
    <div class="container-fluid">
        <!-- begin row -->
        <div class="row">
            <div class="col-md-12 m-b-30">
                <!-- begin page title -->
                <div class="d-block d-sm-flex flex-nowrap align-items-center">
                    <div class="page-title mb-2 mb-sm-0">
                        <h1>Seller details </h1>
                    </div>
                    <div class="ml-auto d-flex align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    Seller
                                </li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">full details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- end page title -->
            </div>
        </div>
        <!-- end row -->
        <?php 
        if (isset($cust)) {






         ?>
         <!--mail-Compose-contant-start-->
         <div class="row account-contant">
            <div class="col-12">
                <div class="card card-statistics">
                    <div class="card-body p-0">
                        <div class="row no-gutters">
                            <div class="col-xl-3 pb-xl-0 pb-5 border-right">
                                <div class="page-account-profil pt-5">
                                    <div class="profile-img text-center rounded-circle">
                                        <div class="pt-5">
                                            <div class="bg-img m-auto">
                                                <img src="<?php echo base_url(); ?>assets/uploads/users/<?php echo $cust['photo']; ?>" class="img-fluid" alt="users-avatar">
                                            </div>
                                            <div class="profile pt-4">
                                                <h4 class="mb-1"><?php 
                                                echo $cust['firstname'];
                                                echo "&nbsp;";
                                                echo $cust['middlename'];
                                                echo "&nbsp;";
                                                echo $cust['lastname'];


                                                ?></h4>
                                               <!--  <p>Customer</p> -->
                                            </div>
                                            
                                                <ul class="nav justify-content-center text-center mb-2">
                                                    <li class="nav-item  px-3">
                                                        <div>
                                                             <p>Join Date</p>
                                                            <h4 class="mb-0"><?php  echo $cust['reg_date']; ?></h4>
                                                           
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>

                                        
                                    </div>



                                    <div class="profile-btn text-center mb-2">
                                        <?php 
                                        if ($cust['is_verify']==1) {


                                         ?>
                                         <div>
                                            <a href="<?php echo base_url('is_verify_seller/'.$cust['user_id'].'/0'); ?>">
                                                <button class="btn btn-round btn-inverse-success  mb-2">Disable User</button>
                                            </a>
                                        </div>
                                    <?php }else{

                                     ?>
                                     <div>
                                        <a href="<?php echo base_url('is_verify_seller/'.$cust['user_id'].'/1'); ?>">
                                            <button class="btn btn-round btn-inverse-danger mb-2">Enable User</button>
                                        </a>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-md-6 col-12 border-t border-right">
                        <div class="page-account-form">
                            <div class="form-titel border-bottom p-3">
                                <h5 class="mb-0 py-2">Personal Details</h5>
                            </div>
                            <div class="p-4">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="name1">First Name</label>
                                            <input type="text" disabled="true" class="form-control text-dark" id="name1" value="<?php echo $cust['firstname']; ?>">

                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="name1">middle Name</label>
                                            <input type="text" disabled="true" class="form-control text-dark" id="name1" value="<?php echo $cust['middlename']; ?>">

                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="name1">Last Name</label>
                                            <input type="text" disabled="true" class="form-control text-dark" id="name1" value="<?php echo $cust['lastname']; ?>">

                                        </div>


                                    </div>
                                    <div class="form-group">
                                        <label for="add1">Address</label>
                                        <input type="text" class="form-control text-dark" disabled="true" id="add1" value="<?php echo $cust['address']; ?>">
                                    </div>



                                    <div class="form-row">

                                        <div class="form-group col-md-4">
                                            <label for="inputZip">City</label>
                                            <input type="text" class="form-control text-dark" disabled="true"value="<?php echo $cust['city_name']; ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputZip">State</label>
                                            <input type="text" class="form-control text-dark" disabled="true" value="<?php echo $cust['state_name']; ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputZip">Country</label>
                                            <input type="text" class="form-control text-dark" disabled="true" value="<?php echo $cust['country_name']; ?>">
                                        </div>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 border-t col-12">
                        <div class="page-account-form">
                            <div class="form-titel border-bottom p-3">
                                <h5 class="mb-0 py-2">Contact details</h5>
                            </div>
                            <div class="p-4">
                                <form>
                                    <div class="form-group">
                                        <label for="fb">Email:</label>
                                        <input type="email" class="form-control text-primary" disabled="true" id="email1" value="<?php echo $cust['email']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="fb">Phone Number:</label>
                                        <input type="text" class="form-control text-dark" disabled="true" id="phone1" value="<?php echo $cust['phone']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="fb">Username:</label>
                                        <input type="text" class="form-control text-dark" disabled="true" id="fb" value="<?php echo $cust['username']; ?>">
                                    </div>                                         



                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--mail-Compose-contant-end-->
<?php }else{
    redirect(base_url("Sellers"));
}


 ?>
</div>
<!-- end container-fluid -->
</div>
<!-- end app-main -->
</div>