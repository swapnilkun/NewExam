	     <?php
	     include('include/configure.php');
          include('login_check.php');
	     
	        $id = mysqli_real_escape_string($con,$_POST['lastrowindex']); 
	        
	     ?>               
	                    	<tr id="courserow-<?php echo $id;?>">
											<!-- <td>0</td -->
											
											<td>
												<select class="form-control course" name="course[]" id="course<?php echo $id;?>">
			                                        <option>select course </option>
                         				              <?php 
                        								   $query_batch=mysqli_query($con,"select subject_name from subject");
                        								 
                        								    while($result_batch=mysqli_fetch_array($query_batch))
                        								   {?>
                        								 <option value="<?php echo $result_batch['subject_name'];?>"> <?php echo $result_batch['subject_name']; ?></option>
											    	<?php }
                        						    ?>
                        					        </select>
												
											</td>
											
											<td>
												<input type="text" class="form-control" name="coursefees[]" id="coursefees<?php echo $id;?>"  /></td>
											<td>
											<select class="form-control" name="discrate[]" id="discrate<?php echo $id;?>" onchange="calDiscountedAmt(0)">
											    <option value="amtminus" >Select---</option>
													<option value="amtminus" >Amount - </option>
													<option value="amtplus" >Amount + </option>
													<option value="perminus" >% - </option>
													<option value="perplus" >% + </option>
												</select>
											</td>

											<td>	
																						
											<input type="text" class="form-control" name="discamt[]" id="discamt<?php echo $id;?>" onchange="calDiscountedAmt(0)" onkeyup="calDiscountedAmt(0)" value="0" />
											</td>
											
											<td>	
																						
											<input type="text" class="form-control" name="install[]" id="install<?php echo $id;?>" onchange="install(0)" onkeyup="install(0)" value="<?php echo $id;?>"/>
											</td>
											<td>	
																						
											<input type="date" class="form-control" name="install_date[]" id="install_date<?php echo $id;?>"  />
											</td>
											
											<td>
												
											<input type="text" class="form-control" name="totalcoursefee[]" id="totalcoursefee<?php echo $id;?>" readonly  /></td>
											<td>	
																							
											<input type="text" class="form-control" name="amtrecieved[]" id="amtrecieved<?php echo $id;?>" onchange="calTotalPerCourse(0)" onkeyup="calTotalPerCourse(0)" value="0" />
											<span style="color:#f00" id="amtrecieved_err<?php echo $id;?>"></span>
											</td>
											<td>	
																						
											<input type="text" class="form-control" name="amtbalance[]" id="amtbalance<?php echo $id;?>" readonly  /></td>
											<td>
												
											<textarea class="form-control" name="payremarks[]" id="payremarks<?php echo $id;?>"></textarea></td>
											
											<td><a href="javascript:void(0)" onclick="deleteCourseRow(<?php echo $id;?>)" class="btn btn-xs btn-danger"><i class="fa fa-minus-circle"></i></a></td>
	</tr>