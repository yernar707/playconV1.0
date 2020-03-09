<?php
if (isset($_COOKIE['username'])&&isset($_COOKIE['moderator'])) {
  if (($_COOKIE['admin']=='0')&&($_COOKIE['moderator']=='1')) {
    header('location:/play/moderator');
  }else{
    if (($_COOKIE['admin']=='1')&&($_COOKIE['moderator']=='0')) {
      header('location:/play/admin');
    }
  }
}else{
  header("location:/play/login");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="/play/js/sweetalert2.js"></script>
  <script src="/play/js/sweetalert2.all.js"></script>
  <script src="/play/js/sweetalert2.all.min.js"></script>
  <script src="/play/js/sweetalert2.min.js"></script>
  <script type="text/javascript">
  
  </script>
</head>
<body>


</body>
</html>
<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/play/php/config.php');
if (isset($_COOKIE['iduser'])) {
	$userid=$_COOKIE['iduser'];
}
if(isset($_POST['title'])){
	$title=mysqli_real_escape_string($relate,$_POST['title']);}else{
		$title="";
	}
if(isset($_POST['date'])){
	$date=mysqli_real_escape_string($relate,$_POST['date']);}else{
		$date="";
	}
if(isset($_POST['location'])){
	$location=mysqli_real_escape_string($relate,$_POST['location']);}else{
		$location="";
	}
if(isset($_POST['sporttype'])){
	if($_POST['sporttype']=='another'){
		$type=mysqli_real_escape_string($relate,$_POST['another']);
	}else{
		$type=mysqli_real_escape_string($relate,$_POST['sporttype']);;
	}
	}else{
		$type="";
	}
if (isset($_POST['none'])) {
	$none=mysqli_real_escape_string($relate,$_POST['none']);
}





if ($title!="") {
	$code="SELECT * FROM requests WHERE (title LIKE '%".$title."%') AND userid='".$userid."'";
	if ($date!="") {
	 	$code .="AND (date='".$date."')";
		if ($location!="") {
			$code .="AND (location LIKE '%".$location."%')";
			if ($type!="") {
				$code ="SELECT * FROM requests WHERE (title LIKE '%".$title."%') AND (location LIKE '%".$location."%') AND (date='".$date."') AND (type LIKE '%".$type."%') AND userid='".$userid."' ORDER BY date DESC, time DESC";
			}else{
				$code ="SELECT * FROM requests WHERE (title LIKE '%".$title."%') AND (location LIKE '%".$location."%') AND (date='".$date."') AND userid='".$userid."' ORDER BY date DESC, time DESC";
			}
		}else{
			if ($type!="") {
				$code .="AND (type LIKE '%".$type."%')";
			}else{
				$code="SELECT * FROM requests WHERE (title LIKE '%".$title."%') AND (date='".$date."') AND userid='".$userid."' ORDER BY date DESC, time DESC";
			}
		}
	}else{
		if ($location!="") {
			$code .="AND (location LIKE '%".$location."%')";
			if ($type!="") {
				$code .="AND (type LIKE '%".$type."%')";
			}else{
				$code ="SELECT * FROM requests WHERE (title LIKE '%".$title."%') AND (location LIKE '%".$location."%') AND userid='".$userid."' ORDER BY date DESC, time DESC";
			}
		}else{
				$code ="SELECT * FROM requests WHERE (title LIKE '%".$title."%') AND userid='".$userid."' ORDER BY date DESC, time DESC";
		}
	}
}else{
	if ($date!="") {
	 	$code ="SELECT * FROM requests WHERE (date='".$date."')";
		 if ($location!="") {
		 	$code .="AND (location LIKE '%".$location."%')";
		 	if ($type!="") {
				$code .="AND (type LIKE '%".$type."%')";
			}else{
				$code ="SELECT * FROM requests WHERE (date='".$date."') AND (location LIKE '%".$location."%') AND userid='".$userid."' ORDER BY date DESC, time DESC";
			}
		}else{
				$code ="SELECT * FROM requests WHERE (date='".$date."') AND userid='".$userid."' ORDER BY date DESC, time DESC";
		}
	}else{
		if ($location!="") {
		 	$code ="SELECT * FROM requests WHERE (location LIKE '%".$location."%')  ";
		 	if ($type!="") {
				$code .="AND (type LIKE '%".$type."%') AND userid='".$userid."' ORDER BY date DESC, time DESC";
			}else{
				$code ="SELECT * FROM requests WHERE (location LIKE '%".$location."%') AND userid='".$userid."' ORDER BY date DESC, time DESC";
			}
		}else{
			if ($type!="") {
				$code ="SELECT * FROM requests WHERE (type LIKE '%".$type."%') AND userid='".$userid."' ORDER BY date DESC, time DESC";
			}else{
				$code ="SELECT * FROM requests WHERE userid='".$userid."' ORDER BY date DESC, time DESC";
			}
			
		}
	}
}


if (isset($_COOKIE['username'])) {
	$product = mysqli_query($relate, $code);
	$allrows=mysqli_num_rows($product);
	if ($allrows>0) {
		for ($i=0; $i <$allrows ; $i++) { 
			for ($j=0; $j < 1; $j++) { 
				$column=mysqli_fetch_assoc($product);
				$secondproduct=mysqli_query($relate,"SELECT username FROM users WHERE userid='".$column["userid"]."'");
				$secondcolumn=mysqli_fetch_assoc($secondproduct);				
				$thirdproduct=mysqli_query($relate,"SELECT userid FROM participate WHERE requestid='".$column["id"]."'");
				$thirdrows=mysqli_num_rows($thirdproduct);
					
								
				echo '
      <div class="window " >
        <div class="detail info_window" id="datetime'.$i.'">
          <span class="detail_title">'.$column["date"].'</span>
          <span class="detail_value">'.$column["time"].' '.$column["type"].'</span>
        </div>
        <script>
        	$("#datetime'.$i.'").click(function(){
        		if(document.getElementById("data'.$i.'").style.display=="none"){
        			document.getElementById("data'.$i.'").style.display="block";
        		}else{
        			document.getElementById("data'.$i.'").style.display="none";
        		}
        	});
        </script>
        <div class="info" id="data'.$i.'" style="display:none;">
	        <div class="detail">
	          <span class="detail_title">Title</span>
	          <span class="detail_value">'.$column["title"].'</span>
	        </div>
	        <div class="detail">
	          <span class="detail_title">Author</span>
	          <span class="detail_value">'.$secondcolumn["username"].'</span>
	        </div>
	        <div class="detail">
	          <span class="detail_title">Location</span>
	          <span class="detail_value">'.$column["location"].'</span>
	        </div>
	        <div class="detail">
	          <span class="detail_title">Participants</span>
	          <span class="detail_value">'.$thirdrows.'/'.$column["maxpeople"].'</span>
	        </div>
	        <div class="detail last">
	          <span class="detail_title">Information</span>
	          <span class="detail_value">'.$column["information"].'</span>
	        </div>
	        
	        <div class="detail last">
	         	<span class="detail_title"></span>
	         	<span class="detail_value">
		          	<form action="/play/welcome/php/delete.php" method="post">
		          		<input hidden name="id" value="'.$column["id"].'">
		          		<input type="button" class="btn btn-primary" data-toggle="collapse" data-target="#participants" aria-expanded="false" aria-controls="Participants" value="Show Participants">
		          		<input type="submit" value="Delete">

		          	</form>


	         	</span>
	        </div>
	        
        </div>
      </div>'
     ;
			
				if($thirdrows>0){
		for ($o=0; $o < $thirdrows; $o++) { 
						for ($p=0; $p < 1; $p++) { 
							$thirdcolumn=mysqli_fetch_assoc($thirdproduct);
							$final=mysqli_query($relate, "SELECT username,phone FROM users WHERE userid='".$thirdcolumn["userid"]."'");
							$finalrows=mysqli_num_rows($final);
							for ($m=0; $m < $finalrows; $m++) { 
								for ($n=0; $n < 1; $n++) { 
									$finalcolumn=mysqli_fetch_assoc($final);
									echo '<div class="collapse participants"  id="participants">
			  <div class="detail last">
				         	<span class="detail_title"></span>
				         	<span class="detail_value participants">
				         		'.$finalcolumn["username"].'  
				         		'.$finalcolumn["phone"].';
				         	</span>
				        </div>
			</div>';
								}}}}}else{
									echo '<div class="collapse participants" id="participants">
			  <div class="detail last">
				         	<span class="detail_title"></span>
				         	<span class="detail_value participants">
				         		No pariticpants;
				         	</span>
				        </div>
			</div>';
								}
							}
							
		}
	}else{
		echo "No requests";
	}
}else{
		echo '<script type="text/javascript">'; 
		echo 'swal({position: "center",type: "error",title: "Login Please!", showConfirmButton: false,timer: 1500});';
		echo 'setTimeout(function(){window.location="/play/login"}, 1500);';
		echo '</script>';
}

?>