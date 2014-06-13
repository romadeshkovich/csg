<?php
include 'z_scripts/db_connect.php';

/* Search for products in the database and store in array to loop through in product list */
$searchinfo = $mysqli->query("SELECT * FROM fast_products;") or die($mysqli->error);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>CSG FAST - Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/stylesheet.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Le fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.html">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.html">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.html">
                    <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.html">
                                   <link rel="shortcut icon" href="img/favicon.png">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->
	

  </head>

  <body>


    <div id="content"> <!-- Content start -->
        <div class="top_bar">
            <ul class="breadcrumb">
              <li><a href="login.php"><i class="icon-home"></i></a> <span class="divider">/</span></li>
              <li class="active"><a href="#">Registration Wizard</a></li>
			</ul>
        </div>
        
		<!-- Popup for dynamic product information agreement (Initially hidden) -->
		<div id="preModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></button>
						<h3>Agreement</h3>
					</div>
					<div class="modal-body">
						<p>Our goal is to make this process easy and effective. 
                           We look forward to serving you and your clients with the best customer experience possible. 
                           The sign up takes about 20 minutes to complete, after completion we will be in contact with you within 2 business days.
                        </p>
						<center><p>For help, hover over the "?" on any field.</p></center>
						<hr></hr>
						<center><p>If you accept the terms below, please click "Accept Terms" to continue.</p></center>
						<hr></hr>
						<ul>
						<li type="square">I have a land line phone #</li>
						<li type="square">I understand that Google Voice allowed</li>

						</ul>
					</div>
					<div class="modal-footer">

						<a href="#" data-dismiss="modal" aria-hidden="true" class="btn green AcceptWizTerms">Accept Terms</a>
						<a href="login.php" class="btn red">I Do Not Agree</a>
					</div>
		</div>
		<!-- End of Hidden Popup Div -->
		
        <div class="inner_content">
            <div class="statistic clearfix">
                <div class="current_page float_left">
                    
					<img src="img/reg_header.png" />
                </div>
				<div class="current_page float_right">
                    <div class="farm_web_pic"></div>
                </div>

            </div>

            <div class="widgets_area">
			    <div id="reg_form_submit_response"></div> <!-- placeholder for submit response message -->
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="well grey">
                                    <div class="well-header">
                                        <h5>Service Registration Form</h5>
                                    </div>

                                    <div class="well-content no_padding no-search">
                                        <form id="rootwizard_form" name="rootwizard_form" enctype="multipart/form-data">
                                            <div id="rootwizard2" class="wizard">
												<!--- Wizard header Style 1 -->
												<!--
												<div class="wizard_navigation">
                                                    <ul>
													    <li><a href="#tab10" data-toggle="tab">
                                                            <span>
                                                                <i class="icon-shopping-cart"></i>
                                                                <strong>1</strong>
                                                            </span> Product information</a></li>
                                                        <li><a href="#tab11" data-toggle="tab">
                                                            <span>
                                                                <i class="icon-user"></i>
                                                                <strong>2</strong>
                                                            </span> User information</a></li>
                                                        <li><a href="#tab12" data-toggle="tab">
                                                            <span>
                                                                <i class="icon-lock"></i>
                                                                <strong>3</strong>
                                                            </span> Agency Details</a></li>
														<li><a href="#tab13" data-toggle="tab">
                                                            <span>
                                                                <i class="icon-lock"></i>
                                                                <strong>3</strong>
                                                            </span> Agency Staff</a></li>
                                                        <li><a href="#tab14" data-toggle="tab">
                                                            <span>
                                                                <i class="icon-reorder"></i>
                                                                <strong>5</strong>
                                                            </span> Contact details</a></li>
															
														<li><a href="#tab15" data-toggle="tab">
                                                            <span>
                                                                <i class="icon-reorder"></i>
                                                                <strong>6</strong>
                                                            </span> Additional</a></li>	
															
                                                        <li><a href="#tab16" data-toggle="tab">
                                                            <span>
                                                                <i class="icon-grid"></i>
                                                                <strong>7</strong>
                                                            </span> Finalize</a></li>
                                                    </ul>
                                                </div>
												-->
												<!--- End of Wizard header Style 1 -->
												<!--- Start of Wizard header Style 2 -->
												<div class="navbar">
												  <div class="navbar-inner">
													<div class="container">
														<ul>
															<li><a href="#tab10" data-toggle="tab"><strong>Product Info</strong></a></li>
															<li><a href="#tab11" data-toggle="tab"><strong>User Info</strong></a></li>
															<li><a href="#tab12" data-toggle="tab"><strong>Agency Details</strong></a></li>
															<li><a href="#tab13" data-toggle="tab"><strong>Agency Staff</strong></a></li>
															<li><a href="#tab14" data-toggle="tab"><strong>Contact Details</strong></a></li>
															<li><a href="#tab15" data-toggle="tab"><strong>Additional</strong></a></li>
															<li><a href="#tab16" data-toggle="tab"><strong>Finalize</strong></a></li>
														</ul>
													 </div>
												  </div>
												</div>
												<!-- End of Wizard header Style 2 -->
                                                <div class="wizard_bar">
                                                    <div class="progress progress-success progress-striped">
                                                      <div class="bar"></div>
                                                    </div>
                                                </div>
												
                                                <div class="tab-content">
												    <div class="tab-pane no_padding" id="tab10">
														<div class="form_row">
															
															   <center><h3>Select the services you want</h3></center>
															
														</div>
														<div class="form_row">
                                                                <div class="status-widgets">
                                                        <?php while($productinfo = $searchinfo->fetch_assoc()) { ?>
                                                                    
																	<!-- Popup for dynamic product information agreement (Initially hidden) -->
																	<div id="prod_mod_<?php echo $productinfo['product_id']; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
																				<div class="modal-header">
																					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></button>
																					<h3><?php echo $productinfo['product_name']; ?></h3>
																				</div>
																				<div class="modal-body">
																					<p><?php echo $productinfo['product_terms']; ?></p>
																				</div>
																				<div class="modal-footer">
											
																					<a href="#" data-dismiss="modal" aria-hidden="true" prodname="<?php echo $productinfo['product_name']; ?>" prodid="prod_mod_<?php echo $productinfo['product_id']; ?>" class="btn green addprod">Accept Terms / Add Product</a>
																					<a href="#" data-dismiss="modal" aria-hidden="true" prodname="<?php echo $productinfo['product_name']; ?>" prodid="prod_mod_<?php echo $productinfo['product_id']; ?>" class="btn red removeprod">Cancel (Unselect)</a>
																				</div>
																	</div>
																	<!-- End of Hidden Popup Div -->
																	
																	
																	<div class="row-fluid">
																		<div class="span12">
																			<div class="widget blue clearfix prod_mod_<?php echo $productinfo['product_id']; ?>" href="#prod_mod_<?php echo $productinfo['product_id']; ?>" role="button" data-toggle="modal" style="cursor: pointer;">
																				<div class="options">
																					<i class="icon-shopping-cart"></i>
																				</div>
																				<div class="details">
																					<div class="number">
																						<?php echo $productinfo['product_name']; ?>
																					</div>
																					<div class="description">
																						<?php echo $productinfo['product_short_desc']; ?>
																					</div>
																				</div>
																				<a class="more"><i class="icon-plus icon_prod_mod_<?php echo $productinfo['product_id']; ?>"></i></a>
																			</div>
																		</div>
																	</div>
																	<br>
																	
													    <?php }?> <!-- End of Product Fetch Loop -->
																	
																	<div class="row-fluid">	
																		<div class="span12">
																			<div class="widget grey clearfix next-button" href="#preModal" role="button" data-toggle="modal" style="cursor: pointer;">
																				<div class="options">

																				</div>
																				<div class="details">
																					<div class="number">
																						Done Selecting
																					</div>
																					<div class="description">
																						Sign Up Now, Decide to Add Products Later
																					</div>
																				</div>
																				<a href="#"class="more"><i class="icon-arrow-right"></i></a>
																			</div>
																			<input class="fast_products" id="fast_products" name="fast_products--tosql_farm_agent_info" style="display: none;"/>
																		   
																		</div>
																	</div>
																</div>
															
														</div>
                                                        
                                                    </div>
                                                    <div class="tab-pane no_padding" id="tab11">
													    <div class="form_row">
                                                            <label class="field_name align_right">Farmers Agency Website <span class="required">*</span></label>
                                                            <div class="field">
                                                                <input class="span6 farmweb" id="website" name="website--tosql_farm_agent_info" type="text" value="http://www.farmersagent.com/" AUTOCOMPLETE=ON>
                                                                <span class="help"><a href="#" rel="popover" data-trigger="hover" data-placement="right" data-content="This should be your (http://www.farmersagent.com/...)website given to you by farmers. The dots represent the part you should fill in and place the whole URL in this box (usually the first part of your @farmersagent.com email address). This will be used to pre-fill in information for your convenience, please allow time for search." title="Help" class="btn orange">?</a></span>
																<label for="website" id="websitefound"></label>
																<!--<label for="website" id="websitenotfound"></label>-->
															</div>
															
                                                        </div>
                                                        <div class="form_row">
                                                            <label class="field_name align_right">First Name <span class="required">*</span></label>
                                                            <div class="field">
                                                                <input class="span6 required" id="name" name="firstname--tosql_users" type="text" AUTOCOMPLETE=ON>
                                                            </div>
                                                        </div>
														
                                                        <div class="form_row">
                                                            <label class="field_name align_right">Last Name <span class="required">*</span></label>
                                                            <div class="field">
                                                                <input class="span6 required" id="lastname" name="lastname--tosql_users" type="text" AUTOCOMPLETE=ON>
                                                            </div>
                                                        </div>
														<div class="form_row">
                                                            <label class="field_name align_right">Agent Code <span class="required">*</span></label>
                                                            <div class="field">
                                                                <input class="input-medium required mask-agent-code" id="agent_code" name="agent_code--tosql_users" type="text" >
																<span class="help"><a href="#" rel="popover" data-trigger="hover" data-placement="right" data-content="Your Producer Code, ex. 00-00-00" title="Help" class="btn orange">?</a></span>
                                                                <label for="agentcode" id="dup_agentcode"></label>
															</div>
                                                        </div>
                                                        <div class="form_row">
                                                            <label class="field_name align_right">Password <span class="required">*</span></label>
                                                            <div class="field">
                                                                <input class="passcomplex input-medium" id="password" name="pwd--tosql_users" type="password">
                                                            </div>
                                                        </div>
                                                        <div class="form_row">
                                                            <label class="field_name align_right">Confirm password <span class="required">*</span></label>
                                                            <div class="field">
                                                                <input class="input-medium" id="conpassword" name="conpassword" type="password">
                                                            </div>
                                                        </div>
                                                        <div class="form_row">
                                                            <label class="field_name align_right">Email <span class="required">*</span></label>
                                                            <div class="field">
                                                                <input class="span6 required email" id="email" name="email--tosql_users" type="text" AUTOCOMPLETE=ON>
                                                                <label for="email" id="dup_email"></label>
															</div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="tab-pane no_padding" id="tab12">
													    <div class="form_row">
                                                            <label class="field_name align_right">Your Agency Name <span class="required">*</span></label>
                                                            <div class="field">
                                                                <input class="span6 required" id="agencyname" name="agencyname--tosql_farm_agent_info" type="text" AUTOCOMPLETE=ON>
                                                            </div>
                                                        </div>
														<div class="form_row"> 
                                                            <label class="field_name align_right">Office Address <span class="required">*</span></label>
                                                            <div class="field">
                                                                <input class="span6 required" id="address" name="address--tosql_farm_agent_info" type="text" AUTOCOMPLETE=ON>
                                                            </div>
                                                        </div>
														
														<div class="form_row">
                                                            <label class="field_name align_right">State <span class="required">*</span></label>
                                                            <div class="field">
                                                                <div class="span4 no-search">
                                                                    <select id="stateselect" name="state--tosql_farm_agent_info">
                                                                        <option value="" selected=""></option>
																		<option value="AL">Alabama</option>
																		<option value="AK">Alaska</option>
																		<option value="AZ">Arizona</option>
																		<option value="AR">Arkansas</option>
																		<option value="CA">California</option>
																		<option value="CO">Colorado</option>
																		<option value="CT">Connecticut</option>
																		<option value="DE">Delaware</option>
																		<option value="FL">Florida</option>
																		<option value="GA">Georgia</option>
																		<option value="HI">Hawaii</option>
																		<option value="ID">Idaho</option>
																		<option value="IL">Illinois</option>
																		<option value="IN">Indiana</option>
																		<option value="IA">Iowa</option>
																		<option value="KS">Kansas</option>
																		<option value="KY">Kentucky</option>
																		<option value="LA">Louisiana</option>
																		<option value="ME">Maine</option>
																		<option value="MD">Maryland</option>
																		<option value="MA">Massachusetts</option>
																		<option value="MI">Michigan</option>
																		<option value="MN">Minnesota</option>
																		<option value="MS">Mississippi</option>
																		<option value="MO">Missouri</option>
																		<option value="MT">Montana</option>
																		<option value="NE">Nebraska</option>
																		<option value="NV">Nevada</option>
																		<option value="NH">New Hampshire</option>
																		<option value="NJ">New Jersey</option>
																		<option value="NM">New Mexico</option>
																		<option value="NY">New York</option>
																		<option value="NC">North Carolina</option>
																		<option value="ND">North Dakota</option>
																		<option value="OH">Ohio</option>
																		<option value="OK">Oklahoma</option>
																		<option value="OR">Oregon</option>
																		<option value="PA">Pennsylvania</option>
																		<option value="RI">Rhode Island</option>
																		<option value="SC">South Carolina</option>
																		<option value="SD">South Dakota</option>
																		<option value="TN">Tennessee</option>
																		<option value="TX">Texas</option>
																		<option value="UT">Utah</option>
																		<option value="VT">Vermont</option>
																		<option value="VA">Virginia</option>
																		<option value="WA">Washington</option>
																		<option value="WV">West Virginia</option>
																		<option value="WI">Wisconsin</option>
																		<option value="WY">Wyoming</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>  
														<div class="form_row">
                                                            <label class="field_name align_right">Your County Name <span class="required">*</span></label>
                                                            <div class="field">
                                                                <input class="span6 required" id="county" name="county--tosql_farm_agent_info" type="text" AUTOCOMPLETE=ON>
                                                            </div>
                                                        </div>
														<div class="form_row">
                                                            <label class="field_name align_right">Your City <span class="required">*</span></label>
                                                            <div class="field">
                                                                <input class="span6 required" id="city" name="city--tosql_farm_agent_info" type="text" AUTOCOMPLETE=ON>
                                                            </div>
                                                        </div>
														<div class="form_row">
                                                            <label class="field_name align_right">Zip Code <span class="required">*</span></label>
                                                            <div class="field">
                                                                <input class="input-medium required" minlength="5" maxlength="5" id="zipcode" name="zipcode--tosql_farm_agent_info" type="text" AUTOCOMPLETE=ON>
                                                            </div>
                                                        </div>
														<!-- Adding Timezone field to the registration process -->
																									
															<div class="form_row">
                                                            <label class="field_name align_right">Time Zone<span class="required">*</span></label>
																<div class="field">
																	<div class="span4 no-search">
                                                                    <select id="timezoneselect" name="timezone--tosql_farm_agent_info">
                                                                        <option value="" selected=""></option>
																		<option value="Eastern">Eastern Time</option>
																		<option value="Central">Central Time</option>
																		<option value="Mountain">Mountain Time</option>
																		<option value="Mountain_no_dst">Mountain Time (no DST)</option>
																		<option value="Pacific">Pacific Time</option>
                                                                    </select>
																	</div>
																</div>
															</div> 
														
														<div class="form_row"> 
                                                            <label class="field_name align_right">District Manager<span class="required">*</span></label>
                                                            <div class="field">
																 <select class="chosen-select" name="dm_id--tosql_farm_agent_info">
																	<option value="">Select your Distrist Manager...</option>
																	<?php
																	$dm_req = "SELECT * from dm_list;";
																	$dm_query = $mysqli->query($dm_req)or die($mysqli->error); 

																		while($dm_row = $dm_query->fetch_assoc())
																		{
																		  echo "<option value='{$dm_row['id_dm']}' >{$dm_row['firstname']} {$dm_row['lastname']} | {$dm_row['state_office']}</option>";
																		} $mysqli->close();
																	?>
																 </select>  
															</div>
														</div>
														<div class="form_row">
                                                            <label class="field_name align_right">Fax Number</label>
                                                            <div class="field">
                                                                <input class="input-medium mask-phone tendigits" id="fax" name="fax--tosql_farm_agent_info" type="text" AUTOCOMPLETE=ON>
                                                            </div>
                                                        </div>
														<div class="form_row">
                                                            <label class="field_name align_right">Current PIF Size</label>
                                                            <div class="field">
                                                                <input class="span6 mask-digits" id="pif" name="pif--tosql_farm_agent_info" type="text" AUTOCOMPLETE=ON>
                                                            </div>
                                                        </div>
														<div class="form_row">
                                                            <label class="field_name align_right">Years in Business</label>
                                                            <div class="field">
                                                                <input class="span6 mask-digits2" id="years_in_bus" name="years_in_bus--tosql_farm_agent_info" type="text" AUTOCOMPLETE=ON>
                                                            </div>
                                                        </div>
														
														  
														
                                                        <div class="form_row">
                                                            <label class="field_name align_right">Is your agency spanish speaking?</label>
														    <div class="field">
																<label class="radio">
																	<div class="radio"><input type="radio" class="uniform" name="spanish--tosql_farm_agent_info" value="Yes"></div> Yes
																</label>
																<label class="radio">
																	<div class="radio"><input type="radio" class="uniform" name="spanish--tosql_farm_agent_info" checked value="No"></div> No
																</label>
																<a href="#" rel="popover" data-trigger="hover" data-placement="right" data-content="Do you have alot of Spanish speaking customers?" title="Help" class="btn orange">?</a></span>
												
														    </div>
														</div>
                                                        
                                                        
                                                    </div>
													<div class="tab-pane no_padding" id="tab13">
													    <div class="form_row">
                                                            <label class="field_name align_right">Add your staff?</label>
														    <div class="field">
																<label class="radio">
																	<div class="radio"><input type="radio" class="uniform showstaff" name="radio2" value="Yes"></div> Yes
																</label>
																<label class="radio">
																	<div class="radio"><input type="radio" class="uniform showstaff" name="radio2" checked value="No"></div> No
																</label>
																<span class="help"><a href="#" rel="popover" data-trigger="hover" data-placement="right" data-content="Do you have additional staff employed at your agency?" title="Help" class="btn orange">?</a></span>
												
														    </div>
														</div>
                                                        <?php for($s = 1; $s<=6; $s++){ //Loop through for additional staff?>
														<div class="form_row staff<?php echo $s;?> hide viewstaff">
                                                            <label class="field_name align_right">Staff <?php echo $s;?> </label>
																<div class="well blue span6">
																	<div class="well-content no-search">
																		<div class="form_row">
																			<label class="field_name">Name</label>
																			<div class="field">
																		    <input class="span10" onkeyup="stafflist(this, <?php echo $s;?>)" name="staffname<?php echo $s;?>--tosql_farm_agent_staff_info" type="text" AUTOCOMPLETE=ON placeholder="Name">
																			</div>
																		</div>
																		<div class="form_row">
																			<label class="field_name">Position</label>
																			<div class="field">
																		    <input class="span10" name="staffposition<?php echo $s;?>--tosql_farm_agent_staff_info" type="text" AUTOCOMPLETE=ON placeholder="Ex. CSR, Accounting, Rep. etc.">
																			</div>
																		</div>
																		<div class="form_row">
																			<label class="field_name">Email</label>
																			<div class="field">
																		    <input class="span10 email" name="staffemail<?php echo $s;?>--tosql_farm_agent_staff_info" type="text" AUTOCOMPLETE=ON placeholder="janedoe@website.com">
																			</div>
																		</div>		
																		<div class="form_row">
																			<label class="field_name">Phone Number</label>
																			<div class="field">
																		    <input class="span10 mask-phone" name="staffphone<?php echo $s;?>--tosql_farm_agent_staff_info" type="text" AUTOCOMPLETE=ON placeholder="">
																			</div>
																		</div>
																		<div class="form_row">
																			<label class="field_name">In Office Hours</label>
																			<div class="field">
																				<div class="input-append bootstrap-timepicker">
																					<input readonly class="span5 input-small timepicker3" name="staff<?php echo $s;?>open--tosql_farm_agent_staff_info" type="text" value="08:00 AM"/>
																					<span class="add-on" style="width: 50px;"><i class="icon-time"></i> In</span> 
																			    </div>
																				<div class="input-append bootstrap-timepicker">
																					<input readonly class="span5 input-small timepicker3" name="staff<?php echo $s;?>close--tosql_farm_agent_staff_info" type="text" value="05:00 PM"/>
																					<span class="add-on" style="width: 50px;"><i class="icon-time"></i> Out</span>
																				</div>
																			</div>
																		</div>
																		<?php if($s==1){?>
																			<div class="btn btn-block addstaff" nextstaffclass="staff<?php echo ($s + 1);?>"> Add Another? </div>
																		<?php }else if($s==6){?>
																			<div class="btn btn-block removestaff" thisstaffclass="staff<?php echo $s;?>"> Remove </div>
																		<?php } else{ ?>
																		<div class="form_row">
																			<div class="btn span6 btn-block addstaff" nextstaffclass="staff<?php echo ($s + 1);?>"> Add Another? </div>
																			<div class="btn span6 removestaff" thisstaffclass="staff<?php echo $s;?>"> Remove </div>
																	    </div>
																		<?php } ?>
																	</div>
															</div>
														</div>
														<?php } ?>
														
														
													</div>
                                                    <div class="tab-pane no_padding" id="tab14">
													    <div class="form_row">
                                                            <label class="field_name align_right">Main Business Phone <span class="required">*</span></label>
                                                            <div class="field">
                                                                <input class="span6 required mask-phone" id="mainphone" name="mainphone--tosql_farm_incontact_info" type="text" AUTOCOMPLETE=ON>
                                                                <input id="rback" style="display: none;" name="rback--tosql_farm_incontact_info" type="text" AUTOCOMPLETE=ON>
																<!-- The above input field gets the value of the mainphone input field dynamically -->
															</div>
                                                        </div>
														
														<div class="form_row">
                                                            <label class="field_name align_right">Secondary Phone</label>
                                                            <div class="field">
                                                                <input class="span6 mask-phone" name="secondphone--tosql_farm_incontact_info" type="text" AUTOCOMPLETE=ON>
                                                            </div>
                                                        </div>
                                                        <div class="form_row">
                                                            <label class="field_name align_right">Mobile Phone (Kept Private)</label>
                                                            <div class="field">
                                                                <input class="span6 mask-phone" id="cellphone" name="cellphone--tosql_farm_incontact_info" type="text" AUTOCOMPLETE=ON>
                                                            </div>
                                                        </div>
														<div class="form_row">
															<label class="field_name align_right">Appt. Preference</label>
															<div class="field">
																<div class="span8">
																	<select class="chosen" name="appts--tosql_farm_agent_info">
																	    <option></option>
																		<option value="In Office">In Office</option>
																		<option value="Home Visits">Home Visits</option>
																		<option value="Phone Appts">Phone Appts</option>
																		<option value="All of the above">All of the above</option>
																		<option value="In Office & Home Visits Only">In Office & Home Visits Only</option>
																		<option value="Home Visits & Phone Appts Only">Home Visits & Phone Appts Only</option>
																		<option value="Phone Appts & In Office Only">Phone Appts & In Office Only</option>
																	</select>
																</div>
														
															</div>
														</div> 
														<div class="form_row">
                                                            <label class="field_name align_right">Using ECMS?</label>														
															<div class="field">
																<label class="radio">
																	<div class="radio"><input type="radio" class="uniform" name="ecmscalender--tosql_farm_agent_info" checked value="Yes"></div> Yes
																</label>
																<label class="radio">
																	<div class="radio"><input type="radio" class="uniform" name="ecmscalender--tosql_farm_agent_info" value="No"></div> No
																</label>
																<span class="help"><a href="#" rel="popover" data-trigger="hover" data-placement="right" data-content="Do you use Farmers Emails and eCMS calenders for all of your transactions, appts, etc.?" title="Help" class="btn orange">?</a></span>
												
														    </div>
                                                        </div>
														<div class="form_row">
                                                            <label class="field_name align_right">Forwarding Lines Capable?</label>
                                                            <div class="field">
                                                                <label class="radio">
																	<div class="radio"><input type="radio" class="uniform" name="forwardinglines--tosql_farm_agent_info" checked value="Yes"></div> Yes
																</label>
																<label class="radio">
																	<div class="radio"><input type="radio" class="uniform" name="forwardinglines--tosql_farm_agent_info" value="No"></div> No
																</label>
																<span class="help"><a href="#" rel="popover" data-trigger="hover" data-placement="right" data-content="Do you currently have call forwarding capabilities?" title="Help" class="btn orange">?</a></span>
                                                            </div>
                                                        </div>
														<div class="form_row">
															<label class="field_name align_right">Business Hours of Operation <span class="required">*</span></label>
															<table>
															<tr><td style="padding-right: 30px;">
															<div class="field">
																<div class="input-append bootstrap-timepicker">
																    <span style="width: 50px;" class="add-on">M-Open</span>
																	<input readonly class="span10 input-small timepicker3" name="mopen--tosql_farm_agent_info" type="text" value="08:00 AM"/>
																	<span class="add-on"><i class="icon-time"></i></span>
																	
																</div>
															</div>
															</td><td>
															<div class="field">
																<div class="input-append bootstrap-timepicker">
																   
																	<input readonly class="span10 input-small timepicker3" name="mclose--tosql_farm_agent_info" type="text" value="05:00 PM"/>
																	<span class="add-on"><i class="icon-time"></i> Close</span>
																</div>
															</div>
															</td><td><span class="help" style="margin-left: 60px;"><a href="#" rel="popover" data-trigger="hover" data-placement="right" data-content="If Closed on any day, simply set the times equal to one another.  Ex. 8:00 AM to 8:00 AM" title="Help" class="btn orange">?</a></span>
															</td></tr>
															<tr><td style="padding-right: 30px;">
															<div class="field">
																<div class="input-append bootstrap-timepicker">
																    <span style="width: 50px;" class="add-on">T-Open</span>
																	<input readonly class="span10 input-small timepicker3" name="topen--tosql_farm_agent_info" type="text" value="08:00 AM"/>
																	<span class="add-on"><i class="icon-time"></i></span>
																</div>
															</div>
															</td><td>
															<div class="field">
																<div class="input-append bootstrap-timepicker">
																	<input readonly class="span10 input-small timepicker3" name="tclose--tosql_farm_agent_info" type="text" value="05:00 PM"/>
																	<span class="add-on"><i class="icon-time"></i> Close</span>
																</div>
															</div>
															</td><td>
															</td></tr>
															<tr><td style="padding-right: 30px;">
															<div class="field">
																<div class="input-append bootstrap-timepicker">
																    <span style="width: 50px;" class="add-on">W-Open</span>
																	<input readonly class="span10 input-small timepicker3" name="wopen--tosql_farm_agent_info" type="text" value="08:00 AM"/>
																	<span class="add-on"><i class="icon-time"></i></span>
																</div>
															</div>
															</td><td>
															<div class="field">
																<div class="input-append bootstrap-timepicker">
																	<input readonly class="span10 input-small timepicker3" name="wclose--tosql_farm_agent_info" type="text" value="05:00 PM"/>
																	<span class="add-on"><i class="icon-time"></i> Close</span>
																</div>
															</div>
															</td><td>
															</td></tr>
															<tr><td style="padding-right: 30px;">
															<div class="field">
																<div class="input-append bootstrap-timepicker">
																	<span style="width: 50px;" class="add-on">R-Open</span>
																	<input readonly class="span10 input-small timepicker3" name="ropen--tosql_farm_agent_info" type="text" value="08:00 AM"/>
																	<span class="add-on"><i class="icon-time"></i></span>
																</div>
															</div>
															</td><td>
															<div class="field">
																<div class="input-append bootstrap-timepicker">
																	<input readonly class="span10 input-small timepicker3" name="rclose--tosql_farm_agent_info" type="text" value="05:00 PM"/>
																	<span class="add-on"><i class="icon-time"></i> Close</span>
																</div>
															</div>
															</td><td>
															</td></tr>
															<tr><td style="padding-right: 30px;">
															<div class="field">
																<div class="input-append bootstrap-timepicker">
																    <span style="width: 50px;" class="add-on">F-Open</span>
																	<input readonly class="span10 input-small timepicker3" name="fopen--tosql_farm_agent_info" type="text" value="08:00 AM"/>
																	<span class="add-on"><i class="icon-time"></i></span>
																</div>
															</div>
															</td><td>
															<div class="field">
																<div class="input-append bootstrap-timepicker">
																	<input readonly class="span10 input-small timepicker3" name="fclose--tosql_farm_agent_info" type="text" value="05:00 PM"/>
																	<span class="add-on"><i class="icon-time"></i> Close</span>
																</div>
															</div>
															</td><td>
															</td></tr>
															<tr><td style="padding-right: 30px;">
															<div class="field">
																<div class="input-append bootstrap-timepicker">
																<span style="width: 50px;" class="add-on">S-Open</span>
																	<input readonly class="span10 input-small timepicker3" name="saopen--tosql_farm_agent_info" type="text" value="08:00 AM"/>
																	<span class="add-on"><i class="icon-time"></i></span>
																</div>
															</div>
															</td><td>
															<div class="field">
																<div class="input-append bootstrap-timepicker">
																	<input readonly class="span10 input-small timepicker3" name="saclose--tosql_farm_agent_info" type="text" value="08:00 AM"/>
																	<span class="add-on"><i class="icon-time"></i> Close</span>
																</div>
															</div>
															</td><td>
															</td></tr>
															<tr><td style="padding-right: 30px;">
															<div class="field">
																<div class="input-append bootstrap-timepicker">
																    <span style="width: 50px;" class="add-on">S-Open</span>
																	<input readonly class="span10 input-small timepicker3" name="suopen--tosql_farm_agent_info" type="text" value="08:00 AM"/>
																	<span class="add-on"><i class="icon-time"></i></span>
																</div>
															</div>
															</td><td>
															<div class="field">
																<div class="input-append bootstrap-timepicker">
																	<input readonly class="span10 input-small timepicker3" name="suclose--tosql_farm_agent_info" type="text" value="08:00 AM"/>
																	<span class="add-on"><i class="icon-time"></i> Close</span>
																</div>
															</div>
															</td><td>
															</td></tr>
															</table>
														</div>
                                                    </div>
													<div class="tab-pane no_padding" id="tab15">
													   <div class="form_row no_add_fields">
															<div class="field">
																<div class="field_value"><h4>No Additional Fields Needed. You're almost finished!</h4></div>
															</div>
													   </div>
													   <div class="form_row added_fields prod_id_2 prod_id_3 hide">
															<label class="field_name align_right">Set my appts with</label>
															<div class="field">
																<div class="span8">
																	<select id="ffr_where_to_set_appts" name="where_to_set_appts--tosql_products_ext" type="text">
																		<option value="Agent" selected>Myself</option>	
																	</select>
																<span class="help"><a href="#" rel="popover" data-trigger="hover" data-placement="right" data-content="With whom should we set your appts with?" title="Help" class="btn orange">?</a></span>
																</div>
																
															</div>
														</div> 
														<div class="form_row added_fields prod_id_2 hide">
															<label class="field_name align_right">Max day appts</label>
															<div class="field">
																<div class="span8">
																	<input class="mask-digits" type="text" name="max_day_appts--tosql_products_ext"/>
																	<span class="help"><a href="#" rel="popover" data-trigger="hover" data-placement="right" data-content="Please provide the max appointments you want in a day" title="Help" class="btn orange">?</a></span>
																</div>
																
															</div>
														</div>
														<div class="form_row added_fields prod_id_2 hide">
															<label class="field_name align_right">Max week appts</label>
															<div class="field">
																<div class="span8">
																	<input class="mask-digits" type="text" name="max_week_appts--tosql_products_ext"/>
																	<span class="help"><a href="#" rel="popover" data-trigger="hover" data-placement="right" data-content="Please provide the max appointments you want in a week" title="Help" class="btn orange">?</a></span>
																</div>
																
															</div>
														</div>													
														<div class="form_row added_fields prod_id_2 prod_id_3 hide">
															<label class="field_name align_right">Primary Appt. Preference</label>
															<div class="field">
																<div class="span8">
																	<select class="chosen" name="primary_appt_pref--tosql_products_ext">
																	    <option></option>
																		<option value="In Office">In Office</option>
																		<option value="Home Visits">Home Visits</option>
																		<option value="Phone Appts">Phone Appts</option>
																	</select>
																</div>
														
															</div>
														</div> 
														<div class="form_row added_fields prod_id_2 prod_id_3 hide">
															<label class="field_name align_right">Secondary Appt. Preference</label>
															<div class="field">
																<div class="span8">
																	<select class="chosen" name="secondary_appt_pref--tosql_products_ext">
																	    <option></option>
																		<option value="In Office">In Office</option>
																		<option value="Home Visits">Home Visits</option>
																		<option value="Phone Appts">Phone Appts</option>
																	</select>
																</div>
																
															</div>
														</div> 
														<div class="form_row added_fields prod_id_2 prod_id_3 hide">
															<label class="field_name align_right">Appt. length</label>
															<div class="field">
																<div class="span8">
																	<select class="chosen" name="initial_phone_appt_length--tosql_products_ext">
																	    <option></option>
																		<option value="15 minutes">15 minutes</option>
																		<option value="30 minutes">30 minutes</option>
																		<option value="60 minutes">60 minutes</option>
																	</select>
																	<span class="help"><a href="#" rel="popover" data-trigger="hover" data-placement="right" data-content="What length of time would you like your appts set for?" title="Help" class="btn orange">?</a></span>
																</div>
																
															</div>
														</div>
														<div class="form_row added_fields prod_id_2 hide">
															<label class="field_name align_right">Appt. Seperation</label>
															<div class="field">
																<div class="span8">
																	<select class="chosen" name="timeframe_between_appts--tosql_products_ext">
																	    <option></option>
																		<option value="15 minutes">15 minutes</option>
																		<option value="30 minutes">30 minutes</option>
																		<option value="60 minutes">60 minutes</option>
																		<option value="90 minutes">90 minutes</option>
																		<option value="120 minutes">120 minutes</option>
																	</select>
																	<span class="help"><a href="#" rel="popover" data-trigger="hover" data-placement="right" data-content="How long would you like in-between appts?" title="Help" class="btn orange">?</a></span>
																</div>
																
															</div>
														</div>
														<div class="form_row added_fields prod_id_2 hide">
															<label class="field_name align_right">Appt. Range</label>
															<div class="field">
																<div class="span8">
																	<select class="chosen" name="how_far_out_by_week--tosql_products_ext">
																	    <option></option>
																		<option value="1 week out">1 week out</option>
																		<option value="2 weeks out">2 weeks out</option>
																		<option value="3 weeks out">3 weeks out</option>
																	</select>
																	<span class="help"><a href="#" rel="popover" data-trigger="hover" data-placement="right" data-content="How many weeks out do you want your appts scheduled?" title="Help" class="btn orange">?</a></span>
																</div>
																
															</div>
															
														</div>
														<div class="form_row added_fields prod_id_2 prod_id_3 hide">
															<label class="field_name align_right">Special Details</label>
															<div class="field">
																<div class="span8">
																	<textarea class="autosize" name="special_details--tosql_products_ext" cols="63" rows="3" style="resize: vertical; height: 88px;"></textarea>
																	<span class="help"><a href="#" rel="popover" data-trigger="hover" data-placement="right" data-content="Do you have any special details we need to be aware of?" title="Help" class="btn orange">?</a></span>
																</div>
																
															</div>
														</div>
														<div class="form_row added_fields prod_id_2 hide">
															<label class="field_name align_right">Other Services</label>
															<div class="field">
																<div class="span8">
																	 <textarea class="autosize" name="other_services_provided--tosql_products_ext" cols="63" rows="3" style="resize: vertical; height: 88px;"></textarea>
																	 <span class="help"><a href="#" rel="popover" data-trigger="hover" data-placement="right" data-content="What other services does your office provide?" title="Help" class="btn orange">?</a></span>
																</div>
																
															</div>
														</div>
														<div class="form_row added_fields prod_id_2 hide">
															<label class="field_name align_right">Allow Eprint?</label>
															<div class="field">
																<div class="span8">
																	<select class="chosen" name="send_eprint--tosql_products_ext">
																		<option></option>
																		<option value="Yes">Yes</option>
																		<option value="No">No</option>
																	</select>
																	<span class="help"><a href="#" rel="popover" data-trigger="hover" data-placement="right" data-content="In the event there is incorrect contact info for one of your clients, would you like us to send an EPRINT letter on your behalf?" title="Help" class="btn orange">?</a></span>
																</div>
																
															</div>
														</div>
														
													</div>
                                                    <div class="tab-pane no_padding" id="tab16">
														<div class="form_row">
															<label class="field_name align_right">When would you like to start?</label>
															<div class="field">
																<div class="input-append date">
																	<input size="16" type="text" readonly name="start_request_date--tosql_farm_agent_info" id="dp">
																	<span class="add-on"><i class="icon-calendar"></i></span>
																</div>
															</div>
														</div>
													    <div class="form_row">
                                                            <label class="field_name align_right">Farmers Agent Code:</label>
                                                            <div class="field">
                                                                <span class="field_value agentcode_verify" id="agentcode_verify"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form_row">
                                                            <label class="field_name align_right">First Name:</label>
                                                            <div class="field">
                                                                <span class="field_value firstname_verify" id="firstname_verify"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form_row">
                                                            <label class="field_name align_right">Last Name:</label>
                                                            <div class="field">
                                                                <span class="field_value lastname_verify" id="lastname_verify"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form_row">
                                                            <label class="field_name align_right">Main Phone:</label>
                                                            <div class="field">
                                                                <span class="field_value mainphone_verify" id="mainphone_verify"></span>
                                                            </div>
                                                        </div>
														<div class="form_row">
                                                            <label class="field_name align_right">Email:</label>
                                                            <div class="field">
                                                                <span class="field_value email_verify" id="email_verify"></span>
                                                            </div>
                                                        </div>
														<div class="form_row">
                                                            <label class="field_name align_right">Services:</label>
                                                            <div class="field">
                                                                 <span class="field_value products_verify" id="products_verify"></span>
                                                            </div>
                                                        </div>
														<!-- Uncomment to show user their password at the final screen
														<div class="form_row">
                                                            <label class="field_name align_right">Password:</label>
                                                            <div class="field">
                                                                <span class="field_value password_input"></span>
                                                            </div>
                                                        </div>-->
														

                                                    </div>
                                                    <div class="form_row wizard_buttons">
                                                        <div class="field">
                                                            <span class="btn red previous-button"><i class="icon-arrow-left"></i> Previous</span>
                                                            <span class="btn blue next-button next-button-root"><i class="icon-arrow-right"></i> Next</span>

															<div id="doRegister" class="btn dark_green s-button doRegisterLoad"><i class="icon-check"></i> Register for services!</div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	
    <script src="js/jquery-1.10.2.js"></script>
	<script src="js/library/chosen.jquery.min.js"></script>
    <script src="js/jquery-ui-1.10.3.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/library/jquery.collapsible.min.js"></script>
    <script src="js/library/jquery.mCustomScrollbar.min.js"></script>
    <script src="js/library/jquery.mousewheel.min.js"></script>
    <script src="js/library/jquery.uniform.min.js"></script>

    <script src="js/library/jquery.sparkline.min.js"></script>
    
    <script src="js/library/jquery.easytabs.js"></script>
    <script src="js/library/flot/excanvas.min.js"></script>
    <script src="js/library/flot/jquery.flot.js"></script>
    <script src="js/library/flot/jquery.flot.pie.js"></script>
    <script src="js/library/flot/jquery.flot.selection.js"></script>
    <script src="js/library/flot/jquery.flot.resize.js"></script>
    <script src="js/library/flot/jquery.flot.orderBars.js"></script>
    <script src="js/library/maps/jquery.vmap.js"></script>
    <script src="js/library/maps/maps/jquery.vmap.world.js"></script>
    <script src="js/library/maps/data/jquery.vmap.sampledata.js"></script>
    <script src="js/library/jquery.autosize-min.js"></script>
    <script src="js/library/charCount.js"></script>
    <script src="js/library/jquery.minicolors.js"></script>
    <script src="js/library/jquery.tagsinput.js"></script>
    <script src="js/library/fullcalendar.min.js"></script>
	<script src="js/library/footable/footable.js"></script>
    <script src="js/library/footable/data-generator.js"></script>
    <script src="js/library/jquery.bootstrap.wizard.js"></script>
    <script src="js/library/jquery.validate.js"></script>

    <script src="js/library/bootstrap-datetimepicker.js"></script>
    <script src="js/library/bootstrap-timepicker.js"></script>
    <script src="js/library/bootstrap-datepicker.js"></script>
    <script src="js/library/bootstrap-fileupload.js"></script>	
    <script src="js/library/jquery.inputmask.bundle.js"></script>
	<script src="js/library/bootstrap-select.js"></script>
	<script src="js/jquery.maskedinput.js"></script>
	
    <script src="js/flatpoint_core.js"></script>

	<script src="js/reg_wizard.js"></script>
	
	<script src="js/reg_form_ajax_submit.js"></script>

	<script src="js/library/bootstrap-modal.js"></script>
    <script src="js/library/bootstrap-modalmanager.js"></script>
	
	<script src="js/library/jquery.reject.js"></script> <!-- Script to Disable old browsers -->
	
	<script>
	function stafflist(e, num) {
	$("#ffr_where_to_set_appts option[name='"+num+"']").remove();
    window["staff"+num] = e.value;
    var eval = e.value;	
	if(eval) {
    $("#ffr_where_to_set_appts").append('<option value="'+eval+'" name="'+num+'">'+eval+'</option>')
	}
    }; //Funtion to append staff names to staff options in select list
	
	
	</script>

  </body>
</html>