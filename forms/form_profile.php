<?php
include_once "db_connect.php";
include_once "functions/functions.php";
?>
<!-- user edit profile form -->
<form id="profile_form" class="wrapper" action="http://news.lenuson.com/process" method="post" enctype="multipart/form-data">

	<?php

		// load records
		$user_id = $_SESSION["usr_id"];
		$sql = "SELECT author.*,roles.name FROM author INNER JOIN roles ON author.role_id=roles.id WHERE author.id=".$user_id;
		$result = mysqli_query($con, $sql);

		while($row = mysqli_fetch_assoc($result)):

	?>

	<div class="profile_img">

		<!--calling image swicher-->
		<?php img_switch($row['avatar'],"uploads/user_images/","uploads/user_images/user.png","user image"); ?>

		<div class="proftle_img_upload">
		    <button class="btn"><i class="fa fa-cloud-upload" aria-hidden="true"></i></button>
		    <input type="file" name="avatar">
		</div>
	</div>

	<div class="profile_table_wrap">

	    <table class="profile_table">
	    	<thead>
	    		<tr>
	    			<th colspan="4"><?=$row['username']?></th>
	    		</tr>
	    	</thead>
	    	<tbody>
	    		<tr>
	    			<td>First Name</td>
	    			<td><div class="hover_input"><input type="text" name="firstname" value="<?=$row['firstname']?>"></div></td>
	    			<td>E-mail</td>
	    			<td><div class="hover_input"><input type="text" name="email" value="<?=$row['email']?>"></div></td>
	    		</tr>
	    		<tr>
	    			<td>Last Name</td>
	    			<td><div class="hover_input"><input type="text" name="lastname" value="<?=$row['lastname']?>"></div></td>
	    			<td>Role</td>
	    			<td><?=$row['name']?></td>
	    		</tr>
	    		<tr>
	    			<td>New Password</td>
	    			<td>
	    				<div class="hover_input"><input type="password" name="edit_password" placeholder="Enter new password"></div>
	    			</td>
	    			<td>Joined</td>
	    			<td><?=date_short($row['created'])?></td>
	    		</tr>
	    		<tr>
	    			<td class="bio_heading" colspan="4">Bio<div class="counter"></div></td>
	    		</tr>
	    		<tr>
	    			<td colspan="4"><textarea name="bio" id="bio" onkeyup="count_char(this,100,'.counter')" rows="10"><?=$row['bio']?></textarea></td>
	    			
	    		</tr>
	    	</tbody>
	    	<tfoot>
	    		<tr>
	    			<td class="profile_edit_btn" colspan="4"><input type="submit" name="edit_profile" value="apply"></td>
	    		</tr>
	    	</tfoot>
	    </table>
    </div>

    <input type="hidden" name="form_id" value="edit_profile">

    <?php endwhile; ?>

    <?php if(isset($_SESSION["msg"])): ?>

        <div class="msg">
            <p class="msg_info"><?=$_SESSION["msg"]?></p>

            <?php  unset($_SESSION["msg"]);  ?>

            <div class="remove">
                <i class="fa fa-times" aria-hidden="true"></i>
            </div>
        </div>

    <?php endif; ?>

</form>