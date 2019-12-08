
                <!-- begin app-main -->
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
                                <li class="breadcrumb-item active text-primary" aria-current="page">Addnew</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- end page title -->
            </div>
        </div>




<form method="post" enctype="multipart/form-data">
What you want:
<input type="radio" name="typ" value="sale"><strong>Sale </strong>or
<input type="radio" name="typ" value="rent"><strong>Rant</strong>  property  
<br>
Title:
<input type="text" name="title" class="form-control col-lg-4"placeholder="Property Title" />
<br>
<div class="card card-statistics">
    <div class="card-header">
        <div class="card-heading">
            <h4 class="card-title">Address Detail:</h4>
        </div>
    </div>
    <div class="card-body">
    <div class="row">
        <div class="col-lg-6">
        Country:
    <select name="country" class="form-control col-lg-6" id="cn">
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
    <br>
    State:<br>
    <select name="state" class="form-control col-lg-6" id="st">
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
    <br>
    City:<br>
    <select name="city" class="form-control col-lg-6" id="ct">
        <option>-----select-----</option>
    </select>
        </div>
        <div class="col-lg-6">
            Locality:
            <input type="text" name="lcty" class="form-control col-lg-8"placeholder="Locality" />
            <br>
            Lendmark:
            <input type="text" name="lendmark" class="form-control col-lg-8"placeholder="Lendmark" />

        </div>
    </div>
   
    <br>
    <hr>
        <br>
    Full Address:<br>
    <textarea class="form-control" rows="3"></textarea>
    </div>
</div>

<div class="card card-statistics">
    <div class="card-header">
        <div class="card-heading">
            <h4 class="card-title">Main Detail:</h4>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4">
                Number Of Badrooms:
                <select name="badrooms" class="form-control col-lg-6">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div class="col-lg-4">
            Number of Balconie:
            <select name="balconie" class="form-control col-lg-6">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
        <div class="col-lg-4">
                Number of Bathrooms:
                <select name="bathroom" class="form-control col-lg-6">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
        </div>
        <br>
        <div class="row">
                <div class="col-lg-4">
                    Saleable Area:                           
                    <input type="text" class="form-control col-lg-8" class="form-control" placeholder="in sqft." name="saleable_area" />
                </div>
                <div class="col-lg-4">
                    Carpet Area:                           
                    <input type="text" class="form-control col-lg-8" class="form-control" placeholder="in sqft." name="carpet_area" />
                </div>
                <div class="col-lg-4">
                </div>
        </div>
        <hr>
       <strong> Select Extra Rooms:</strong><br>
        <input type="checkbox" name="play" value="1">Player Room<br>
        <input type="checkbox" name="study" value="1">Study Room<br>
        <input type="checkbox" name="store" value="1">Store Room<br>
        <input type="checkbox" name="servent" value="1">Servent Room
                                                <br><br>
        <strong>Property type:</strong><br>
        <select name="ptype" class="form-control col-lg-3">
                    <?php foreach($typ as $row){
                        ?>
                
                    <option value="<?php echo $row->property_type_id; ?>"><?php echo $row->type_name; ?></option>

                    <?php } ?>
        </select>
    </div>
        
</div>


<div class="card card-statistics">
    <div class="card-header">
        <div class="card-heading">
            <h4 class="card-title">Price Detail:</h4>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6">
                <strong>Price:</strong><br>
                <input type="text" name="price" class="form-control col-lg-5" placeholder="INR/sqft." /> <input type="checkbox" name="isnegotiable" value="1"> Is Negotiable
                <br><br><strong>Booking Amount:</strong><br>
                <input type="text" class="form-control col-lg-5" name="bkg_amt" />
            </div>
            <div class="col-lg-6">
                <strong>Inclusive:-</strong><br>

                <label class="container">parking-fee
                    <input type="checkbox" name="prg" value="1">
                    <span class="checkmark"></span>
                </label>
                <label class="container">PLC
                <input type="checkbox" name="plc" value="1">
                    <span class="checkmark"></span>
                </label>
                <label class="container">club-membership
                    <input type="checkbox" name="club" value="1">
                    <span class="checkmark"></span>
                </label>
                <label class="container">registration-fee
                    <input type="checkbox" name="reg_fee" value="1">
                    <span class="checkmark"></span>
                </label>
                <label class="container">edu/idc 
                    <input type="checkbox" name="edu_idc" value="1">
                    <span class="checkmark"></span>
                </label>
            </div>
        </div>
        
    </div>
</div>

<div class="card card-statistics">
    <div class="card-header">
        <div class="card-heading">
            <h4 class="card-title">Features</h4>
        </div>
    </div>
    <div class="card-body">
        Ownershiptype:<br>
            <select name="ownership" class="form-control col-lg-4">
                <option value="builder">builder</option>
                <option value="owner">owner</option>
                <option value="Agent">Agent</option>
            </select>
                        <hr>
            <div class="row">
                <div class="col-lg-4">
                    <strong>furnishing:</strong>
                    <hr> 

                    wardrobe:
                    <select name="wardrobe" class="form-control col-lg-6">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    Beds:
                    <select name="beds" class="form-control col-lg-6">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>         
            TV:
            <select name="tv" class="form-control col-lg-6">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>

            AC:
            <select name="ac" class="form-control col-lg-6">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            Sofa:
            <select name="sofa" class="form-control col-lg-6">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            Refrigerator:
            <select name="refrigerator" class="form-control col-lg-6">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
<br>
<strong>more items:</strong><hr>

                <label class="container">diningtable 
                    <input type="checkbox" name="diningtable" value="1">
                    <span class="checkmark"></span>
                </label>
                <label class="container">gas connectin 
                    <input type="checkbox" name="gas_connectin" value="1">
                    <span class="checkmark"></span>
                </label>
                <label class="container">washing machine 
                    <input type="checkbox" name="mwashing_machine" value="1">
                    <span class="checkmark"></span>
                </label>
                <label class="container">wifi 
                    <input type="checkbox" name="wifi" value="1">
                    <span class="checkmark"></span>
                </label>
                <label class="container">modular kitchen 
                    <input type="checkbox" name="modular_kitchen" value="1">
                    <span class="checkmark"></span>
                </label>

               
                </div>
                <div class="col-lg-4">
                    <strong>flooring:</strong>
                    <hr>
                    Living room:
                    <select name="f_living" class="form-control col-lg-6">
                            <option>---select---</option>
                            <?php foreach($flr as $row){
                                ?>
                            <option value="<?php echo $row->flooring_id; ?>"><?php echo $row->flooring_type; ?></option>
                            <?php } ?>
                        </select>

                        Kitchen:
                        <select name="f_kitchen" class="form-control col-lg-6">
                            <option>---select---</option>
                            <?php foreach($flr as $row){
                                ?>
                            <option value="<?php echo $row->flooring_id; ?>"><?php echo $row->flooring_type; ?></option>
                            <?php } ?>
                        </select>
                        Badroom:
                        <select name="f_bardroom" class="form-control col-lg-6">
                        <option>---select---</option>
                        <?php foreach($flr as $row){
                                ?>
                            <option value="<?php echo $row->flooring_id; ?>"><?php echo $row->flooring_type; ?></option>
                            <?php } ?>
                        </select>

                        Bathroom:
                        <select name="f_bathroom" class="form-control col-lg-6">
                        <option>---select---</option>
                            <?php foreach($flr as $row){
                                ?>
                            <option value="<?php echo $row->flooring_id; ?>"><?php echo $row->flooring_type; ?></option>
                            <?php } ?>
                            </select>
                        Balcony:
                        <select name="f_balconie" class="form-control col-lg-6">
                        <option>---select---</option>
                            <?php foreach($flr as $row){
                                ?>
                            <option value="<?php echo $row->flooring_id; ?>"><?php echo $row->flooring_type; ?></option>
                            <?php } ?>
                        </select>
                        Other:
                        <select name="f_other" class="form-control col-lg-6">
                        <option>---select---</option>
                            <?php foreach($flr as $row){
                                ?>
                            <option value="<?php echo $row->flooring_id; ?>"><?php echo $row->flooring_type; ?></option>
                            <?php } ?>
                        </select>
                </div>
                <div class="col-lg-4">
                            <strong>Amenties</strong>
                            <hr>
                            <br>
                            <label class="container">Car Parcking 
                                <input type="checkbox" name="carparking" value="1">
                                <span class="checkmark"></span>
                             </label>
                             <label class="container">Power Backup 
                                <input type="checkbox" name="powerbackup" value="1">
                                <span class="checkmark"></span>
                             </label>
                             <label class="container">Lift 
                                <input type="checkbox" name="lift" value="1">
                                <span class="checkmark"></span>
                             </label>
                             <label class="container">Lendscap garden 
                                <input type="checkbox" name="lendscap_garden" value="1">
                                <span class="checkmark"></span>
                             </label>
                             <label class="container">GYM 
                                <input type="checkbox" name="gym" value="1">
                                <span class="checkmark"></span>
                             </label>
                             <label class="container">Club House 
                                <input type="checkbox" name="club_house" value="1">
                                <span class="checkmark"></span>
                             </label>
                             <label class="container">ATM 
                                <input type="checkbox" name="atm" value="1">
                                <span class="checkmark"></span>
                             </label>
                             <label class="container">CCTV 
                                <input type="checkbox" name="cctv" value="1">
                                <span class="checkmark"></span>
                             </label>
                             <label class="container">water supply 
                                <input type="checkbox" name="water_supply" value="1">
                                <span class="checkmark"></span>
                             </label>                        
                </div>
            </div>

            <hr>
            Description:
            <textarea name="descr" class="form-control" rows="3" ></textarea><br>
    </div>
</div>
<hr>

<div class="card card-statistics">
    <div class="card-header">
        <div class="card-heading">
            <h4 class="card-title"><strong>Upload Images for Your Property:</strong></h4>
        </div>
    </div>
    <div class="card-body">
    <input type="file" multiple="true" class="form-control" name="images[]" />
    </div>
</div>
<input type="submit" value="Add New property" class="btn btn-primary col-lg-2" name="addprop" />
</form>
                        
                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->
            </div>
            <!-- end app-container -->