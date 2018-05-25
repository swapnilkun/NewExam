<table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
									<thead>
										<tr>
										
											<th><div>Course Name</div></th>
											<!--<th><div>Certifying Auth</div></th>
											<th><div>Exam Fee</div></th>
											<th><div>Course Fee</div></th>-->
										    <th><div>Course Duration</div></th>
											<th><div><?php echo constant('TI_TABLE_STATUS');?></div></th>
											<th><div><?php echo constant('TI_TABLE_OPTIONS');?></div></th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$query=mysqli_query($con,"SELECT * FROM subject ORDER BY subject_name");
											$i=0;
											while($row=mysqli_fetch_array($query))
											{ 
											//	$query_category_name=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM category where c_id='".$row['category_id']."'"));

											//	$query_subcategory_name=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM subcategory where s_c_id='".$row['subcategory_id']."'"));
												$i++;										
											?>
											<tr class="text-center">
												<!-- <td><?php //echo $i;?></td> -->
												<!-- <td><?php //echo ucfirst($query_subcategory_name['subcategory_name']);?></td>
												<td><?php //echo ucfirst($query_category_name['category_name']);?></td>-->
												
												<td><?php echo ucfirst($row['subject_name']);?></td>
												<!--<td><?php //echo ucfirst($row['certify']);?></td>
												<td><?php //echo ucfirst($row['exam_fee']);?></td>
												<td><?php //echo ucfirst($row['course_fee']);?></td>-->
												<td><?php echo ucfirst($row['duration']);?></td>
												
												<td  align="center">								
													<?php
														if($row['subject_status']==1)
														{?>														

														<a data-toggle="modal" href="#modal-status-deactive" onclick="modal_status_deactive('subject_status.php?s_id=<?php echo $row['s_id'];?>')" class="btn btn-red btn-small"><i class="icon-eye-close"></i> <?php //echo constant('TI_DEACTIVATE_BUTTON');?></a>
													<?php }
														else
														{?>														
															
															<a data-toggle="modal" href="#modal-status-active" onclick="modal_status_active('subject_status.php?s_id=<?php echo $row['s_id'];?>')" class="btn btn-green btn-small"><i class="icon-eye-open"></i> <?php //echo constant('TI_ACTIVATE_BUTTON');?></a>
													<?php }?>								
												</td>
												<td align="center">
													<a data-toggle="modal" href="subject_edit.php?s_id=<?php echo $row['s_id']; ?>" class="btn btn-gray btn-small"><i class="icon-wrench"></i> <?php //echo constant('TI_EDIT_BUTTON');?></a>

													<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('subject_delete.php?s_id=<?php echo $row['s_id'];?>')" class="btn btn-red btn-small"><i class="icon-trash"></i> <?php //echo constant('TI_DELETE_BUTTON');?></a>

													<a data-toggle="modal" href="question.php?s_id=<?php echo $row['s_id'];?>"  class="btn btn-green btn-small"><i class="icon-plus-sign"></i> <?php //echo constant('TI_BUTTON_QUESTION');?> </a>

													<a data-toggle="modal" href="viewquestion.php?s_id=<?php echo $row['s_id'];?>"  class="btn btn-blue btn-small"><i class="icon-zoom-in"></i> <?php //echo constant('TI_EXAM_VIEW_QUESTION_BUTTON');?> </a>
												</td>
											</tr>
											<?php } ?>                                
										</tbody>
									</table>