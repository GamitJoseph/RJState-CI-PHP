<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mentor - Bootstrap 4 Admin Dashboard Template</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Admin template that can be used to build dashboards for CRM, CMS, etc." />
    <meta name="author" content="Potenza Global Solutions" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/img/favicon.ico">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- plugin stylesheets -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/vendors.css" />
    <!-- app style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/style.css" />
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
                        <img src="<?php echo base_url(); ?>/assets/img/loader/loader.svg" alt="loader">
                    </div>
                </div>
            </div>
            <!-- end pre-loader -->

            <!--start login contant-->
            <div class="app-contant">
                <div class="bg-white">
                    <div class="container-fluid p-0">
                        <div class="row no-gutters">
                            <div class="col-sm-6 col-lg-5 col-xxl-3  align-self-center order-2 order-sm-1">
                                <div class="d-flex align-items-center h-100-vh">
                                    <div class="login p-50">
                                        <h1 class="mb-2">RJ State Seller</h1>
                                        <p>Seller Registration, please Register your detail.</p>
                                    </div>
                                </div>
                            </div>       
                            <div class="col-sm-6  align-self-center order-2 order-sm-1">
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="row justify-content-around">
                                        <div class="form-group">
                                            <label for="fname" class="form-label">First Name:</label>
                                            <input type="text" class="form-control" name="fname"/>
                                        </div>
                                        <div class="form-group">
                                                    <label for="mname" class="form-label">Middele Name:</label>
                                                    <input type="text" class="form-control" name="mname"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="lname" class="form-label">Last Name:</label>
                                            <input type="text" class="form-control" name="lname"/>
                                        </div>
                                    </div>
                                    <div class="row justify-content-around">
                                        <div class="form-group col-lg-8">
                                            <label for="email" class="form-label">Email iD:</label>
                                            <input type="text" class="form-control" name="email"/>
                                        </div>
                                        <div class="form-group">
                                                    <label for="phone" class="form-label">Mobile no:</label>
                                                    <input type="text" class="form-control" name="phone"/>
                                        </div>
                                    </div>
                                    <div class="row justify-content-around">
                                        <div class="form-group">
                                            <label for="country" class="form-label">Country:</label>
                                            <select name="country" class="form-control" id="cn">
                                                <option>-----select-----</option>
                                                <?php foreach($cntr as $row){
                                                    ?>
                                                    <option value="<?php echo $row->country_id; ?>"><?php echo $row->country_name; ?></option>
                                                <?php } ?>
                                            </select>
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
                                                                    $('#st').html('<option>-----select-----</option>');
                                                                    $('#st').append(data);
                                                                }
                                                            });
                                                        }
                                                    });
                                                });
                                            </script>
                                            <!-- <input type="text" class="form-control" name="country"/> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="state" class="form-label">State:</label>
                                            <!-- <input type="text" class="form-control" name="state"/> -->
                                            <select name="state" class="form-control" id="st">
                                                <option>-----select-----</option>
                                            </select>
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
                                                                {   $('#ct').html('<option>-----select-----</option>');
                                                                    $('#ct').append(data);
                                                                }
                                                            });
                                                        }
                                                    });
                                                });
                                            </script>
                                        </div>
                                        <div class="form-group">
                                            <label for="city" class="form-label">City:</label>
                                        <!-- <input type="text" class="form-control" name="city"/> -->
                                            <select name="city" class="form-control" id="ct">
                                                <option>-----select-----</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-10">
                                        <label for="addr" class="form-label">Address:</label>
                                        <textarea class="form-control" name="addr"></textarea>
                                    </div>
                                    
                                   <div class="row justify-content-around">
                                        <div class="form-group col-lg-5">
                                            <label for="psw" class="form-label">password:</label>
                                            <input type="password" class="form-control " name="psw"/>
                                        </div>
                                        <div class="form-group col-lg-5">
                                            <label for="cpsw" class="form-label">Confirm Password:</label>
                                            <input type="password" class="form-control" name="cpsw"/>
                                        </div>
                                   </div>
                                <div class="form-group">
                                        <label for="photo" class="form-label">upload Profile Pic:</label>
                                        <input type="file" class="form-control col-lg-4" name="photo"/>
                                </div>
                                <div class="form-group">
                                        <input type="submit" value="Register As Seller" class="btn col-lg-4" name="sreg"/>
                                </div>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <!--end login contant-->
        </div>
        <!-- end app-wrap -->
    </div>
    <!-- end app -->



    <!-- plugins -->
    <script src="<?php echo base_url(); ?>/assets/js/vendors.js"></script>

    <!-- custom app -->
    <script src="<?php echo base_url(); ?>/assets/js/app.js"></script>
</body>


</html>