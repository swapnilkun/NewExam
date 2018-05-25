	     <?php
	     include('include/configure.php');
          include('login_check.php');
	     
	        $id = mysqli_real_escape_string($con,$_POST['lastrowindex']); 
	        $balance = mysqli_real_escape_string($con,$_POST['balance']); 
	        $coursefees = mysqli_real_escape_string($con,$_POST['coursefees']); 
	        $course = mysqli_real_escape_string($con,$_POST['course']); 
	        $discrate = mysqli_real_escape_string($con,$_POST['discrate']); 
	     ?>               
	                    	<tr id="courserow-<?php echo $id;?>">
											<!-- <td>0</td -->
											
											<td>
												<select class="form-control course" name="course[]" id="course<?php echo $id;?>" readonly>
			                                        <option>select course </option>
                         				              <?php 
                        								   $query_batch=mysqli_query($con,"select subject_name from subject");
                        								 
                        								    while($result_batch=mysqli_fetch_array($query_batch))
                        								   {?>
                        								 <!--<option value="<?php echo $result_batch['subject_name'];?>"> <?php echo $result_batch['subject_name']; ?></option>-->
                        								 	<option value="<?php echo $result_batch['subject_name']; ?>" <?php if($result_batch['subject_name'] == $course) { echo "selected=selected"; }?>> <?php echo $result_batch['subject_name'];?></option>
													
											    	<?php }
                        						    ?>
                        					        </select>
											
												
											</td>
											
											<td>
												<input type="text" class="form-control coursefees" name="coursefees[]" id="coursefees<?php echo $id;?>"  value="<?php echo $coursefees;?>" /></td>
											<td>
											    
											<select class="form-control discrate" name="discrate[]" id="discrate<?php echo $id;?>" onchange="calDiscountedAmt(<?php echo $id;?>)" readonly>
											    <option value="amtminus" >Select---</option>
													    <option value="amtminus" <?php if($discrate == 'amtminus'){ echo "selected=selected"; } ?>>Amount -</option>
                                                        <option value="amtplus" <?php if($discrate == 'amtplus') { echo "selected=selected"; } ?>>Amount + </option>
                                                        <option value="perminus" <?php if($discrate == 'perminus') { echo "selected=selected"; } ?>>% - </option>
                                                        <option value="perplus" <?php if($discrate == 'perplus') { echo "selected=selected"; } ?>>% + </option>
												</select>
												
											<!--	<input type="text" class="form-control coursefees" name="coursefees[]" id="coursefees<?php echo $id;?>"  value="<?php echo $discrate;?>" /></td>-->
									
											</td>

											<td>	
																						
											<input type="text" class="form-control" name="discamt[]" id="discamt<?php echo $id;?>" onchange="calDiscountedAmt(<?php echo $id;?>)" onkeyup="calDiscountedAmt(<?php echo $id;?>)" value="" readonly/>
											</td>
											
											<td>	
																						
											<input type="text" class="form-control" name="install[]" id="install<?php echo $id;?>" onchange="install(<?php echo $id;?>)" onkeyup="install(<?php echo $id;?>)" value="<?php echo $id;?>"/>
											</td>
											<td>	
																						
											<input type="date" class="form-control" name="install_date[]" id="install_date<?php echo $id;?>"  />
											</td>
											
											<td>
												
											<input type="text" class="form-control" name="totalcoursefee[]" id="totalcoursefee<?php echo $id;?>" readonly  value="<?php echo $balance; ?>"/></td>
											<td>	
																							
											<input type="text" class="form-control" name="amtrecieved[]" id="amtrecieved<?php echo $id;?>" onchange="calTotalPerCourse(<?php echo $id;?>)" onkeyup="calTotalPerCourse(<?php echo $id;?>)" value="" />
											<span style="color:#f00" id="amtrecieved_err<?php echo $id;?>"></span>
											</td>
											<td>	
																						
											<input type="text" class="form-control" name="amtbalance[]" id="amtbalance<?php echo $id;?>" readonly   value="<?php echo $balance; ?>"/></td>
											<td>
												
											<textarea class="form-control" name="payremarks[]" id="payremarks<?php echo $id;?>"></textarea></td>
											
											<td><a href="javascript:void(0)" onclick="deleteCourseRow(<?php echo $id;?>)" class="btn btn-xs btn-danger"><i class="fa fa-minus-circle"></i></a></td>
	</tr>