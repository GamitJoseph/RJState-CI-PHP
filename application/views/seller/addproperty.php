 <!-- begin app-main -->
                <div class="app-main" id="main">
                    <!-- begin container-fluid -->
                    <div class="container-fluid">
                        <!-- begin row -->
                        <div class="row">
                            <div class="col-md-12 m-b-30">
                                <!-- begin page title -->
                                <div class="d-block d-lg-flex flex-nowrap align-items-center">
                                    <div class="page-title mr-4 pr-4 border-right">
                                        <h1>Dashboard</h1>
                                    </div>
                                    <div class="breadcrumb-bar align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="index.html"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item">
                                                    Add Property
                                                </li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page"></li>
                                            </ol>
                                        </nav>
                                    </div>
    

                                    <div class="ml-auto d-flex align-items-center secondary-menu text-center">
                                        <a href="javascript:void(0);" class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="" data-original-title="Todo list">
                                            <i class="fe fe-edit btn btn-icon text-primary"></i>
                                        </a>
                                        <a href="javascript:void(0);" class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="" data-original-title="Projects">
                                            <i class="fa fa-lightbulb-o btn btn-icon text-success"></i>
                                        </a>
                                        <a href="javascript:void(0);" class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="" data-original-title="Task">
                                            <i class="fa fa-check btn btn-icon text-warning"></i>
                                        </a>
                                        <a href="javascript:void(0);" class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="" data-original-title="Calendar">
                                            <i class="fa fa-calendar-o btn btn-icon text-cyan"></i>
                                        </a>
                                        <a href="javascript:void(0);" class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="" data-original-title="Analytics">
                                            <i class="fa fa-bar-chart-o btn btn-icon text-danger"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- end page title -->
                            </div>
                        </div>





<form method="post" enctype="multipart/formdata">
What you want:
<input type="radio" name="typ" value="sale"><strong>Sale </strong>or
<input type="radio" name="typ" value="rent"><strong>Rant</strong>  property  

<hr>Address Detail:<hr>
<table>
    <tr>
        <td>Title</td>
        <td><input type="text" name="title" /></td>
    </tr>
    <tr>
        <td>Country</td>
        <td>
            <select name="country" class="form-control" id="cn">
                <option>-----select-----</option>
                    <?php foreach($cntr as $row){
                    ?>
                        <option value="<?php echo $row->country_id; ?>"><?php echo $row->country_name; ?></option>
                <?php } ?>
            </select>
        </td>
    </tr>
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
    <tr>
        <td>State</td>
        <td>
            <select name="state" class="form-control" id="st">
                <option>-----select-----</option>
            </select>
        </td>
    </tr>
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
    <tr>
        <td>City</td>
        <td>
            <select name="city" class="form-control" id="ct">
                <option>-----select-----</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>Locality</td>
        <td><textarea name="lcty" ></textarea></td>
    </tr>
    <tr>
        <td>Lendmark</td>
        <td><textarea name="lendmark" ></textarea></td>
    </tr>
    
    
    <tr>
        <td>Full Address</td>
        <td><textarea name="addr" ></textarea></td>
    </tr>
    
</table>
<hr>
Main Detail:
<hr>
<table>
    <tr>
        <td>Number OF badrooms</td>
        <td>
            <select name="badrooms">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>Number of Balconie</td>
        <td>
            <select name="balconie">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>Number of Bathrooms</td>
        <td>
            <select name="bathroom">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>Saleable Area</td>
        <td><input type="text" name="saleable_area" /></td>
    </tr>
    <tr>
        <td>Carpet Area</td>
        <td><input type="text" name="carpet_area" /></td>
    </tr>
    <tr>
        <td>Select More rooms</td>
        <td>      
                <input type="checkbox" name="play" value="1">Player Room<br>
                <input type="checkbox" name="study" value="1">Study Room<br>
                <input type="checkbox" name="store" value="1">Store Room<br>
                <input type="checkbox" name="servent" value="1">Servent Room
        </td>
    </tr>
    <tr>
        <td>Property type</td>
        <td>
                <select name="ptype">
                    <?php foreach($typ as $row){
                        ?>
                
                    <option value="<?php echo $row->property_type_id; ?>"><?php echo $row->type_name; ?></option>

                    <?php } ?>
                </select>
        </td>
    </tr>   
</table>
<hr>


Price Detail:
<hr>
<table>
    <tr>
        <td>price:</td>
        <td><input type="text" name="price" placeholder="in sqft." /> <input type="checkbox" name="isnegotiable" value="1">is negotiable</td>
    </tr>
    <tr>
        <td>Inclusive</td>
        <td>
                <input type="checkbox" name="prg" value="1">parking-fee<br>
                <input type="checkbox" name="plc" value="1">plc<br>
                <input type="checkbox" name="club" value="1">club-membership<br>
                <input type="checkbox" name="reg_fee" value="1">registration-fee<br>
                <input type="checkbox" name="edu_idc" value="1">edu/idc
         </td>
    </tr>
    <tr>
        <td>Booking Amt</td>
        <td><input type="text" name="bkg_amt" /></td>
    </tr>

</table>

<!-- <hr>
Status Detail:
<hr>
<table>
    <tr>
        <td>Property Status</td>
        <td>
            <select name="status">
                <option value="expired">expired</option>
                <option value="rejected">rejected</option>
                <option value="panding verification">panding verification</option>
                <option value="under verification">under verification</option>
                <option value="live">live</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>Property Age</td>
        <td><input type="text" name="age"/></td>
    </tr>
    <tr>
        <td>Transection Type</td>
        <td></td>
    </tr>

</table> -->

<hr>
Features detail<hr>

furnishing:
<table>
    <tr>
        <td>wardrobe</td>
        <td><select name="wardrobe">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select></td>
        <td> beds</td>
        <td>
            <select name="beds">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>         
        </td>
    </tr>
    <tr>
        <td>tv</td>
        <td><select name="tv">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select></td>
        <td> ac:</td>
        <td><select name="ac">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select></td>
    </tr>
    <tr>
        <td>sofa</td>
        <td><select name="sofa">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select></td>
        <td>refrigerator</td>
        <td><select name="refrigerator">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select></td>
    </tr>
    <tr>
        <td>more items:<br><br><br><br><br></td>
        <td>
                <input type="checkbox" name="mitem['diningtable']" value="1">diningtable<br>
                <input type="checkbox" name="mitem['gas_connectin']" value="1">gas connectin<br>
                <input type="checkbox" name="mitem['washing_machine']" value="1">washing machine<br>
                <input type="checkbox" name="mitem['wifi']" value="1">wifi<br>
                <input type="checkbox" name="mitem['modular_kitchen']" value="1">modular kitchen
        </td>
    </tr>

</table>
<hr>
flooring:
<table>
        <tr>
            <td>Living room</td>
            <td>
                        <select name="f_living">
                            <option>---select---</option>
                            <?php foreach($flr as $row){
                                ?>
                            <option value="<?php echo $row->flooring_id; ?>"><?php echo $row->flooring_type; ?></option>
                            <?php } ?>
                        </select>
            </td>
        </tr>
        <tr>
            <td>Kitchen</td>
            <td>
                        <select name="f_kitchen">
                            <option>---select---</option>
                            <?php foreach($flr as $row){
                                ?>
                            <option value="<?php echo $row->flooring_id; ?>"><?php echo $row->flooring_type; ?></option>
                            <?php } ?>
                        </select>
            </td>
        </tr>
        <tr>
            <td>Badroom</td>
            <td>
                <select name="f_bardroom">
                <option>---select---</option>
                    <?php foreach($flr as $row){
                                ?>
                            <option value="<?php echo $row->flooring_id; ?>"><?php echo $row->flooring_type; ?></option>
                            <?php } ?>
                    </select>
            </td>
        </tr>
        <tr>
            <td>bathroom</td>
            <td>
            <select name="f_bathroom">
            <option>---select---</option>
                            <?php foreach($flr as $row){
                                ?>
                            <option value="<?php echo $row->flooring_id; ?>"><?php echo $row->flooring_type; ?></option>
                            <?php } ?>
                        </select>
            </td>
        </tr>
        <tr>
            <td>balcony</td>
            <td>
            <select name="f_balcony">
            <option>---select---</option>
                            <?php foreach($flr as $row){
                                ?>
                            <option value="<?php echo $row->flooring_id; ?>"><?php echo $row->flooring_type; ?></option>
                            <?php } ?>
                        </select>
            </td>
        </tr>
        <tr>
            <td>other</td>
            <td>
            <select name="f_other">
            <option>---select---</option>
                            <?php foreach($flr as $row){
                                ?>
                            <option value="<?php echo $row->flooring_id; ?>"><?php echo $row->flooring_type; ?></option>
                            <?php } ?>
                        </select>
            </td>
        </tr>

</table>
Amenties:
<table>
    <tr>
        <td>Available Amenteis:<br><br><br><br><br><br><br><br><br><br><br></td>
        <td>
                <input type="checkbox" name="amnt['carparking']" value="1">Car Parking<br>
                <input type="checkbox" name="amnt['powerbackup']" value="1">Power Backup<br>
                <input type="checkbox" name="amnt['lift']" value="1">Lift<br>
                <input type="checkbox" name="amnt['lendscap_garden']" value="1">Lendscap Garden<br>
                <input type="checkbox" name="amnt['gym']" value="1">GYM  <br>  
                <input type="checkbox" name="amnt['club_house']" value="1">Club House<br>
                <input type="checkbox" name="amnt['atm']" value="1">ATM<br>
                <input type="checkbox" name="amnt['cctv']" value="1">CCTV<br>
                <input type="checkbox" name="amnt['water_supply']" value="1">water supply<br>           
        </td>
    </tr>
</table>
Description:<br>
<textarea name="descr"></textarea><br>
<input type="submit" value="Add New" name="addprop" />
</form>
                        
                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->
            </div>
            <!-- end app-container -->