<!DOCTYPE html>
<html lang="en">
<head>
    <title>RJ State | Login</title>
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
                        <img src="./assets/img/loader/loader.svg" alt="loader">
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
                                        <h1 class="mb-2">RJ State Login</h1>
                                        <p>Welcome back, please login to your account.</p>
                                        <?php  $attributes = array('class' => 'mt-3 mt-sm-5', 'id' => 'login'); 
                                        echo form_open('user/login', $attributes);
                                        ?>   
                                        
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">UserName / Email*</label>

                                                    <?php 
                                                    $err_class='form-control alert alert-outline-danger';
                                                    $data = array(
                                                        'name'          => 'username',
                                                        'id'            => 'username',
                                                        'placeholder'     => 'Username',
                                                        'value'=>set_value('username'),
                                                        'class'          => 'form-control'
                                                    );
                                                    echo form_input($data);
                                                    ?>
                                                    
                                                </div>
                                                 
                                                    <?php echo form_error('username',"<div class='text-danger' >","</div>"); ?>
                                            </div>



                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Password*</label>
                                                    <?php 
                                                    $data = array(
                                                        'name'          => 'password',
                                                        'id'            => 'password',
                                                        'placeholder'     => 'Password',
                                                        'value'=>set_value('password'),
                                                        'class'          => 'form-control'

                                                    );

                                                    echo form_password($data);


                                                    ?>

                                                </div>
                                                 <?php echo form_error('password',"<div class='text-danger' >","</div>"); ?>
                                                 
                                            </div>
                                            <div class="col-12">
                                                <div class="d-block d-sm-flex  align-items-center">

                                                    <a href="javascript:void(0);" class="ml-auto">Forgot Password ?</a>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <?php 

                                                $data = array(
                                                    'id' => 'password',
                                                    'class'=> 'text-uppercase btn btn-primary',
                                                    'value'=>'Sign In'

                                                );

                                                echo form_submit($data);

                                                ?>
                                                
                                            </div>
                                            <div class="col-12  mt-3">
                                                <p>Don't have an account ?<a href="auth-register.html"> Sign Up</a></p>
                                            </div>
                                        </div>
                                        <?php  echo form_close(); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xxl-9 col-lg-7 bg-gradient o-hidden order-1 order-sm-2">
                                <div class="row align-items-center h-100">
                                    <div class="col-7 mx-auto ">
                                        <img class="img-fluid" src="<?php echo base_url(); ?>/assets/img/bg/login.svg" alt="">
                                    </div>
                                </div>
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