<?php
session_start();
if(isset($_SESSION['admin'])){
}else{
header('location:adminlogin.php');
exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Job Request</title>
</head>
<body>
<?php
include("link.php");
include("ribbon.php");

?>

<div class="container-fluid" style= "background: linear-gradient(to bottom right, #ffffff 25%, #33ccff 100%);">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-2" style="margin-left: -30px">
				<?php
					include("sidenav.php");
				?>
			</div>
			<div class="col-md-10">
				<h5 class="text-center my"><b>Job Request</b></h5>
				<div id="show"></div>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		
           show();

		function show(){
			$.ajax({
				url:"ajax_job_request.php",method:"POST",success:function(data){
					$("#show").html(data);
				}
			});
		}
        $(document).on('click','.approve',function(){
        	var id = $(this).attr("id");
        	

        	$.ajax({
        		url:"ajax_approve.php",
        		method:"POST",
        		data:{id:id},
        		success:function(data){

        		}

        	});
        });

          $(document).on('click','.reject',function(){
        	var id = $(this).attr("id");
        	

        	$.ajax({
        		url:"ajax_reject.php",
        		method:"POST",
        		data:{id:id},
        		success:function(data){

        		}

        	});
        });
	});
</script>


</body>
</html>