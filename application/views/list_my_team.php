<?php
$id = $this->session->userdata('user_data');
?>
<section class="scrollable wrapper">

<?php 
	foreach($user as $users){
		//if($users['id_team'] == $id['id_team']){

?>

	<div class="column">
		<div class="col-sm-4">
			<section class="panel">
				<div class="panel-body">
                        <a href="#" class="thumb pull-left m-r">
                          <img src="<?php 
                          	$file = $users['img_file'];
                          	$img = "images/avatar_default.jpg"; 
							if ($file){
								$img = "images/".$users['img_file']; 
							}
							echo base_url($img);

							?>" height="50" width="50" class="img-circle">
                        </a>
                        <div class="clear">
                          <h><?php echo $users['nama_lengkap'];?></h></br>
                          <a href="#" class="text-info"><?php echo $users['email'];?> <i class="fa fa-envelope-o"></i></a>
                          <small class="block text-muted"><?php echo $users['nama'];?>-<?php echo $users['no_phone'];?></small>
                          <a href="#" class="btn btn-xs btn-success m-t-xs"><?php echo $users['alamat'];?> <i class="fa  fa-location-arrow"></i></a>
                        </div>
                      </div>
		  	</section>
		</div>
	</div>

<?php
			
		//}
	}				
?>
	
	

</section>
