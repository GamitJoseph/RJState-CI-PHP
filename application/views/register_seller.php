
<!DOCTYPE html>
<html lang="en">
<head>
    <title>RJ STATE | <?php 
    if (!empty($header_title)) {
       echo $header_title;
   } ?>

</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="description" content="Admin template that can be used to build dashboards for CRM, CMS, etc." />
<meta name="author" content="Potenza Global Solutions" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!-- app favicon -->

<link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/img/favicon.ico">
<!-- google fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<!-- plugin stylesheets -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/vendors.css" />
<!-- app style -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/pagination.css" />


<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script src="<?php echo base_url(); ?>assets/js/jq.min.js"></script>
</head>
<body class="bg-white">
    <!-- begin app -->
    <div class="app">
        <!-- begin app-wrap -->
        <div class="app-wrap">
            <!-- begin pre-loader -->
            <div class="loader">
                <div class="h-100 d-flex justify-content-center">
                    <div class="align-self-center">
                        <img src="assets/img/loader/loader.svg" alt="loader">
                    </div>
                </div>
            </div>
            <!-- end pre-loader -->

            <!--start login contant-->
            <div class="app-contant">

                <div class="bg-white">

                  <div class="container-fluid p-0">

                     <form method="POST" enctype="multipart/form-data">
                        <div class="row no-gutters">


                            <div class="col-sm-6 col-lg-5 col-xxl-3  align-self-center order-2 order-sm-1">
                                <div class="d-flex align-items-center h-100-vh">
                                    <div class="register p-5">

                                     <h1 class="mt-2">RJ State Register Seller</h1>
                                     <p>Welcome, Please create your account.</p>
                                     <br>
                                     <div class="row">
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group">
                                                <label class="control-label">First Name*</label>
                                                <input type="text" class="form-control" placeholder="First Name" value="<?php echo set_value('fname');  ?>" name="fname"/>


                                                <?php echo form_error('fname',"<p class='text-danger small' >","</p>"); 

                                                ?>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-4">
                                            <div class="form-group">
                                                <label class="control-label">Middle Name*</label>
                                                <input type="text" class="form-control"  name="mname" placeholder="Middle Name" 
                                                value="<?php echo  set_value('mname');  ?>"
                                                />

                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group">
                                                <label class="control-label">Last Name*</label>
                                                <input type="text" class="form-control" name="lname" placeholder="Last Name"
                                                value="<?php echo  set_value('lname');  ?>"

                                                 />
                                                 <?php echo form_error('lname',"<p class='text-danger small' >","</p>"); 

                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="control-label">Email*</label>
                                                <input type="text" class="form-control" name="email" placeholder="Email" 

                                                value="<?php echo  set_value('email');  ?>" />
                                                <?php echo form_error('email',"<p class='text-danger small' >","</p>"); 

                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="control-label">Mobile Numer*</label>
                                                <input type="text" class="form-control" name="phone" placeholder="Mobile Numer" 
                                                value="<?php echo set_value('phone');  ?>"

                                                />
                                                <?php echo form_error('phone',"<p class='text-danger small' >","</p>"); 

                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="control-label">Password*</label>
                                                <input type="password" name="psw" class="form-control" placeholder="Password" 

                                                />
                                                <?php echo form_error('psw',"<p class='text-danger small' >","</p>"); 

                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="control-label">Confirm Password*</label>
                                                <input type="password" class="form-control" name="cpsw" placeholder="Confirm Password" />
                                                <?php echo  form_error('cpsw',"<p class='text-danger small' >","</p>"); 

                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-12  mt-3">
                                            <p>Already have an account ?<a href="auth-login.html"> Sign In</a></p>
                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>



                        <div class="col-sm-6 col-lg-5 col-xxl-3  align-self-center order-2 order-sm-1">
                            <div class="d-flex align-items-center h-100-vh">
                                <div class="register p-5">

                                    <br>
                                    <br>
                                    <br>
                                    <br><br>
                                    <br>


                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="control-label">Username*</label>
                                                <input type="text" class="form-control" name="uname" placeholder="Username"
                                                value="<?php echo set_value('uname');  ?>"

                                                 />
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group">
                                                <label class="control-label">Country*</label>
                                                <select name="country" class="form-control" id="cn">
                                                    <option value="" selected>---select---</option>
                                                    <?php foreach($cntr as $row){
                                                        ?>
                                                        <option value="<?php echo $row->country_id; ?>"><?php echo $row->country_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <?php echo form_error('country',"<p class='text-danger small' >","</p>"); 

                                                ?>
                                                <script>  
                                                    $(document).ready(function(){
                                                        $('#cn').change(function(){
                                                            var id=$('#cn').val();
                                                            if(id!=''){
                                                                $.ajax({
                                                                    url:"<?php echo base_url(); ?>user/fetch_state",
                                                                    method:"POST",
                                                                    data:{id:id},
                                                                    success:function(data)
                                                                    {
                                                                        $('#st').html('<option selected>-----select-----</option>');
                                                                        $('#st').append(data);
                                                                    }
                                                                });
                                                            }
                                                        });
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group">
                                                <label class="control-label">State*</label>
                                                <select name="state" class="form-control" id="st">
                                                    <option  value="" selected>-----select-----</option>
                                                </select>
                                                <?php echo form_error('state',"<p class='text-danger small' >","</p>"); 

                                                ?>
                                                <script>  
                                                    $(document).ready(function(){
                                                        $('#st').change(function(){
                                                            var id=$('#st').val();
                                                            if(id!=''){
                                                                $.ajax({
                                                                    url:"<?php echo base_url(); ?>user/fetch_city",
                                                                    method:"POST",
                                                                    data:{id:id},
                                                                    success:function(data)
                                                                    {   $('#ct').html('<option selected>-----select-----</option>');
                                                                    $('#ct').append(data);
                                                                }
                                                            });
                                                            }
                                                        });
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group">
                                                <label class="control-label">City*</label>
                                                <select name="city" class="form-control" id="ct">
                                                    <option value="" selected>-----select-----</option>
                                                </select>
                                                <?php echo form_error('city',"<p class='text-danger small' >","</p>"); 

                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="control-label">Address*</label>
                                                <textarea class="form-control"  name="addr">
                                                   <?php echo set_value('addr');  ?>
                                                </textarea>
                                                <?php echo form_error('addr',"<p class='text-danger small' >","</p>"); 

                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="control-label">upload profile pic*</label>
                                                <input type="file" class="form-control col-lg-12" name="photo"/>
                                                <?php 


                                                if (!empty($this->session->flashdata("upload_err"))) {
                                                   echo "<p class='text-danger small' >".$this->session->flashdata("upload_err")."</p>";
                                                }

                                                

                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                                <label class="form-check-label" for="gridCheck">
                                                    I accept terms & policy
                                                </label>
                                            </div>
                                              <?php 


                                                if (!empty($this->session->flashdata("insert_err"))) {
                                                   echo "<p class='text-danger small' >".$this->session->flashdata("insert_err")."</p>";
                                                }

                                                

                                                ?>
                                        </div>
                                        <div class="col-12 mt-3">

                                           <input type="submit" value="Sign up" class="btn btn-primary text-uppercase" name="sreg"/>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>
</div>
<!-- end app-wrap -->
</div>
<!-- end app -->
<script src="<?php echo base_url(); ?>/assets/js/vendors.js"></script>

<!-- custom app -->
<script src="<?php echo base_url(); ?>/assets/js/app.js"></script>
</body>


</html>



