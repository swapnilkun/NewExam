<?php
include('include/configure.php');
include('login_check.php');
include('include/meta_tag.php');
include('include/main-header.php');
include('include/left-menu.php');
?>	
<script type="text/javascript"
        src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML">
</script>
 <style type="text/css">
    .Table
    {
        display: table;
    }
    .Title
    {
        display: table-caption;
        text-align: center;
        font-weight: bold;
        font-size: larger;
    }
    .Heading
    {
        display: table-row;
        font-weight: 600;
        text-align: center;
    }
    .Row
    {
        display: table-row;
    }
    .Cell
    {
        display: table-cell;
        border:#EAEBEF solid;
        border-width: thin;
        padding-left: 5px;
        padding-right: 5px;
    }
     a.btn.btn-green.btn-small.view_obj {
        border-radius: 0px;
        padding: 6px;
    }
    .obj_btn {
        margin: 5px;
    }
</style>
<div class="main-content">
    <div class="obj_btn">
        <a href="question.php" class="btn btn-green btn-small view_obj"><i class="icon-plus-sign"></i> Add Question </a>
    </div>    
    <div class="tab-pane box active" id="list">
        <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
            <thead>
                <tr>
                    <th><div><?php echo constant('TI_TABLE_HASH'); ?></div></th>
                    <th><div><?php echo constant('TI_TABLE_QUESTION_NAME'); ?></div></th>  
                    <th><div><?php echo constant('TI_TABLE_STATUS'); ?></div></th> 
                    <th><div><?php echo constant('TI_TABLE_OPTIONS'); ?></div></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = @mysqli_query($con,"select * from questions_table where question_type='objective' order by q_id DESC");
//                $query = mysql_query("SELECT * FROM questions_table where s_id='" . $_GET['s_id'] . "' AND question_type='objective' order by q_id DESC");
                $i = 0;
                while ($row = @mysqli_fetch_array($query)) {

                    $i++;
                    $query1 = @mysqli_query($con,"SELECT * FROM objective_table where q_id='" . $row['q_id'] . "'");
                    $result = @mysqli_fetch_array($query1)
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td>
                            <table border="0">
                                <tr>
                                    <td><?php echo constant('TI_TABLE_QUESTION_QUESTION'); ?></td>
                                    <td><?php echo nl2br($result['question']); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo constant('TI_TABLE_QUESTION_OPTION'); ?></td>
                                    <td>	
                                        <div class="Table">									
                                            <div class="Heading">
                                                <div class="Cell">
                                                    <p> <?php echo constant('TI_TABLE_QUESTION_CHOICES_NO'); ?>  </p>
                                                </div>
                                                <div class="Cell">
                                                    <p> <?php echo constant('TI_TABLE_QUESTION_CHOICES_CORRECT'); ?> </p>
                                                </div>
                                                <div class="Cell">
                                                    <p> <?php echo constant('TI_TABLE_QUESTION_CHOICES_CHOICES'); ?></p>
                                                </div>										
                                            </div>
                                            <?php if ($result['typeofquestion'] == "Single") { ?>
                                                <div class="Row">
                                                    <div class="Cell">
                                                        <?php echo constant('TI_LABEL_QUESTION_CHOICES_A'); ?>
                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_<?php echo $row['q_id']; ?>" value="A" <?php if ($result['correct_ans'] == 'A') {
                                                            echo 'checked="checked"';
                                                        } ?>>
                                                    </div>
                                                    <div class="Cell">
                                                        <p><?php echo $result['option_a']; ?></p>
                                                    </div>										
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														<?php echo constant('TI_LABEL_QUESTION_CHOICES_B'); ?>
                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_<?php echo $row['q_id']; ?>" value="B" <?php if ($result['correct_ans'] == 'B') {
														echo 'checked="checked"';
														} ?>>
                                                    </div>
                                                    <div class="Cell">
                                                        <p><?php echo $result['option_b']; ?></p>
                                                    </div>													
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														<?php echo constant('TI_LABEL_QUESTION_CHOICES_C'); ?>
                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_<?php echo $row['q_id']; ?>" value="C" <?php if ($result['correct_ans'] == 'C') {
														echo 'checked="checked"';
														} ?>>
                                                    </div>
                                                    <div class="Cell">
                                                        <p><?php echo $result['option_c']; ?></p>
                                                    </div>										
                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														<?php echo constant('TI_LABEL_QUESTION_CHOICES_D'); ?>
                                                    </div>
                                                    <div class="Cell">
                                                        <input type="radio" name="correct_ans_<?php echo $row['q_id']; ?>" value="D" <?php if ($result['correct_ans'] == 'D') {
														echo 'checked="checked"';
														} ?>>
                                                    </div>
                                                    <div class="Cell">
                                                        <p><?php echo $result['option_d']; ?></p>
                                                    </div>

                                                </div>



                                            <?php
                                            } if ($row['typeofquestion'] == "Multiple") {


                                                if ($row['correct_ans'] != "") {
                                                    $explode_correct_ans = explode("-", $result['correct_ans']);
                                                }
                                                ?>
                                                <div class="Row">
                                                    <div class="Cell">
														<?php echo constant('TI_LABEL_QUESTION_CHOICES_A'); ?>
                                                    </div>
                                                    <div class="Cell">
                                                        <input type="checkbox" name="correct_ans_A" value="A" <?php if ($explode_correct_ans[0] == 'A') {
														echo 'checked="checked"';
														} ?>>
                                                    </div>
                                                    <div class="Cell">
                                                        <p><?php echo $result['option_a']; ?></p>
                                                    </div>

                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														<?php echo constant('TI_LABEL_QUESTION_CHOICES_B'); ?>
                                                    </div>
                                                    <div class="Cell">

                                                        <input type="checkbox" name="correct_ans_B" value="B" <?php if ($explode_correct_ans[1] == 'B') {
														echo 'checked="checked"';
														} ?>>
                                                    </div>
                                                    <div class="Cell">
                                                        <p><?php echo $result['option_b']; ?></p>
                                                    </div>

                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														<?php echo constant('TI_LABEL_QUESTION_CHOICES_C'); ?>
                                                    </div>
                                                    <div class="Cell">											
                                                        <input type="checkbox" name="correct_ans_C" value="C" <?php if ($explode_correct_ans[2] == 'C') {
														echo 'checked="checked"';
														} ?>>
                                                    </div>
                                                    <div class="Cell">
                                                        <p><?php echo $result['option_c']; ?></p>
                                                    </div>

                                                </div>
                                                <div class="Row">
                                                    <div class="Cell">
														<?php echo constant('TI_LABEL_QUESTION_CHOICES_D'); ?>
                                                    </div>
                                                    <div class="Cell">
                                                        <input type="checkbox" name="correct_ans_D" value="D" <?php if ($explode_correct_ans[3] == 'D') {
														echo 'checked="checked"';
														} ?>>
                                                    </div>
                                                    <div class="Cell">
                                                        <p><?php echo $result['option_d']; ?></p>
                                                    </div>

                                                </div>

												<?php } ?>




                                        </div>				
                                    </td>
                                </tr>
                                <tr><td><?php echo constant('TI_LABEL_QUESTION_MARKS'); ?></td><td><?php echo $row['marks']; ?></td></tr>								
                            </table>				
                        </td>
                        <td>
						<?php
							if ($row['question_status'] == 1) {
						?>														

                                <a data-toggle="modal" href="#modal-status-deactive" onclick="modal_status_deactive('question_status.php?q_id=<?php echo $row['q_id']; ?>&s_id=<?php echo $_GET['s_id']; ?>')" class="btn btn-red btn-small"><i class="icon-eye-close"></i> <?php echo constant('TI_DEACTIVATE_BUTTON'); ?></a>
						<?php
						} else {
						?>														

                                <a data-toggle="modal" href="#modal-status-active" onclick="modal_status_active('question_status.php?q_id=<?php echo $row['q_id']; ?>&s_id=<?php echo $_GET['s_id']; ?>')" class="btn btn-green btn-small"><i class="icon-eye-open"></i> <?php echo constant('TI_ACTIVATE_BUTTON'); ?></a>
								<?php } ?>	
                        </td>






                        <td align="center">
                            <a data-toggle="modal" href="question_edit.php?q_id=<?php echo $row['q_id']; ?>&s_id=<?php echo $row['s_id']; ?>&o_q_id=<?php echo $result['o_q_id']; ?>"  class="btn btn-gray btn-small"><i class="icon-wrench"></i> <?php echo constant('TI_EDIT'); ?></a>

                            <a data-toggle="modal" href="#modal-delete" onclick="modal_delete('question_delete.php?q_id=<?php echo $row['q_id']; ?>&s_id=<?php echo $_GET['s_id']; ?>&o_q_id=<?php echo $result['o_q_id']; ?>')" class="btn btn-red btn-small"><i class="icon-trash"></i> <?php echo constant('TI_DELETE_BUTTON'); ?> </a>



                        </td>		
                    </tr>
						<?php } ?>

            </tbody>
        </table>





    </div>
</div>