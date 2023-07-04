<?php 
function sendSMS ($sender, $message , $destination, $dnd, $apikey){ 
$sender = urlencode($sender); 
$message = urlencode($message);
$destination = str_replace(' ', '', $destination); 
$destination = urlencode($destination); 
$live_mebo_url = "https://www.bulksmsnigeria.com/api/v1/sms/create?api_token=".$apikey."&from=".$sender."&dnd=".$dnd."&body=".$message."&to=".$destination;
$parse_mebo_url= file($live_mebo_url); 
$numm = count($parse_mebo_url);
$numm = $numm-1 ;
$reports = $parse_mebo_url[$numm];
return $reports ; 	
}

$sql8 = "SELECT *FROM notifications WHERE mtype='general' AND status='send'";		   
$result8 = mysqli_query($conn, $sql8);
if (mysqli_num_rows($result8) > 0) {
while($info8 = mysqli_fetch_array($result8)) {	
$subject = $info8['subject'];
$emailmessage = $info8['emailmessage'];
}
}

if (isset($_POST['Submit'])){
$sender = $_POST['sender']; //Sender name (with spaces) should not be more than 11 characters (Avoid use of special characters)
$message = $_POST['message']; 
$delim = ', ';
$str = $_POST['recepient'];
$parts = explode($delim,$str);
//echo "$string1";
$totalno = count(explode(',',$str));
if ($totalno > 300){
	// send in batches of 300 numbers
	$maxnumbers = 300;
$splitnum = round($totalno/$maxnumbers);
$position = 0;
$n = 1;
	while($n <= $splitnum) {
   $destination = implode($delim,array_slice($parts,$position,$maxnumbers)) . $delim;
	include('include/smscredentials.php'); 
    $sendd = sendSMS($sender, $message, $destination, $dnd, $apikey);
	$send = json_decode($sendd, true);
	if ($sendd){
	// insert into history
	$hid = 0;
	$message2 = addslashes($message);
	$datesent = date('d-m-Y');
	$sql = "INSERT INTO messagehistory VALUES ('$hid', '$datesent', '$sender', '$message2', '$destination', 'Sent')";
if (mysqli_query($conn, $sql)) {
//$databasemsg="<div class='alert alert-success'> <b>Successful!</b> $customername's birthday has been added. </div>";	
}
 $n++;
	$position = $maxnumbers * $n;
	}
	
	
  // echo "$destination <hr>";
   
    } 
if ($n > $splitnum){

header("location:smsreport.php?status=$sender");
}
}
// end send in batches of 300 numbers

else{
	$destination = $str;
	//send at once
	include('include/smscredentials.php'); 
    $sendd = sendSMS($sender, $message, $destination, $dnd, $apikey);
	
	$send = json_decode($sendd, true);
if ($sendd){
	// insert into history
	$hid = 0;
	$message2 = addslashes($message);
	$datesent = date('d-m-Y');
	$sql = "INSERT INTO messagehistory VALUES ('$hid', '$datesent', '$sender', '$message2', '$destination', 'Sent')";
if (mysqli_query($conn, $sql)) {
//$databasemsg="<div class='alert alert-success'> <b>Successful!</b> $customername's birthday has been added. </div>";	
}

header("location:smsreport.php?status=$sender");
}
	
	// end send at once
	
}


}



							
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <title><?php echo "$page | $cname" ; ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	 <link href="plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <!-- This is Sidebar menu CSS -->
    <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- This is a Animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
	<!--alerts CSS -->
    <link href="plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <!-- This is a Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS you can use different color css from css/colors folder -->
    <!-- We have chosen the skin-blue (default.css) for this starter
         page. However, you can choose any other skin from folder css / colors .
         -->
    <link href="css/colors/megna.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
	   <script type="text/javascript">
<!--
function confirmation(ID) {
	 swal({   
            title: "Are you sure?",   
            text: "You will not be able to recover this record again!",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#6C81BB",   
            confirmButtonText: "Yes, delete it!",   
            cancelButtonText: "No, cancel delete!",   
            closeOnConfirm: false,   
            closeOnCancel: false 
        }, function(isConfirm){   
            if (isConfirm) {				
               window.location = "createcategory.php?delid="+ID; 
            } else {     
                swal("Cancelled", "No record has been deleted :)", "error");   
            } 
        });
}
</script>
</head>

<body class="fix-sidebar">
    <!-- Preloader -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
        </svg>
    </div>
    <div id="wrapper">
       
	   <?php include("navheader.php");?>
	   
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <?php include('topcommonadmin.php'); ?>
                <!-- .row body-->
                <div class="row">
                    <div class="col-md-12">
					<!-- dashboard line 1-->
                        <div class="panel panel-themecolor">
                                    <div class="panel-heading">
                                        CREATE PROMOTIONAL MESSAGE <span class="circle circle-md bg-info">  </span>
                                    </div>
                                    <div class="panel-body">
                            <div class="row row-in">
							
							     
								  
							<!-- .main form 2 -->
						<div class="col-md-7 col-sm-12">
						 <div class="white-box">
						
								<form action="" method="post"> 
                                    
									<div class="form-group">
									<p> <?php if (isset($send)){ echo "$send"; } ?> </p>
                                            <label for="exampleInputuname">Sender ID</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="exampleInputuname" value="FLOWERGATE" name="sender" required>
                                                <div class="input-group-addon"></div>
                                            </div>
                                        </div>
										
                                       
									<div class="form-group">
                                            <label for="exampleInputuname">Destination(s) [Total Numbers: <?php echo $column_count; ?>]</label>
                                            <div class="input-group">
                                               <textarea class="form-control" rows="5" name="recepient" required><?php if (isset($allnos)){ echo $allnos; } if(isset($sendnos)){ echo $sendnos; }  ?></textarea>
                                                <div class="input-group-addon"></div>
                                            </div>
                                        </div>
									
											<div class="form-group">
                                            <label for="exampleInputuname">Message</label>
                                            <div class="input-group">
                                               <textarea class="form-control" rows="5" name="message" required></textarea>
                                                <div class="input-group-addon"></div>
                                            </div>
                                        </div>
										
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="Submit">Send Now</button>
                                           <a href ="dashboard.php"> <button type="button" class="btn btn-danger waves-effect waves-light m-r-10" >Return to Dashboard</button> </a>
                                            
                                        </div>

								</form>
						</div>
						  </div>
						<!-- / .main form 2-->
						
						<div class="col-md-5 col-sm-12">
						 <div class="white-box">
						 <H3><strong>QUIDE!</strong></H3>
						 
						<p> Your default sender ID is FLOWERGATE. <br>
						The destination numbers are alredy loaded in the destination field. <br>
						Duplicate numbers are automatically removed<br>
						Enter your message and click on the "SEND" button</p>
						 </div>
						 </div>
                                
                                  
                                  
                             
							 
                                </div>  
							</div>
							
							
			
                </div>
                <!-- .row -->
               
            </div>
            <!-- /.container-fluid -->
           <?php include("footer.php"); ?>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Sidebar menu plugin JavaScript -->
    <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--Slimscroll JavaScript For custom scroll-->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
	<!-- Sweet-Alert  -->
    <script src="plugins/bower_components/sweetalert/sweetalert.min.js"></script>
    <script src="plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.js"></script>
	 <script src="js/custom.js"></script>
	<script src="plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
	 <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
            $(document).ready(function () {
                var table = $('#example').DataTable({
                    "columnDefs": [
                        {
                            "visible": false
                            , "targets": 2
                        }
          ]
                    , "order": [[2, 'asc']]
                    , "displayLength": 25
                    , "drawCallback": function (settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function (group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function () {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    }
                    else {
                        table.order([2, 'asc']).draw();
                    }
                });
            });
        });
        $('#example23').DataTable({
            dom: 'Bfrtip'
            , buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
        });
    </script>
</body>

</html>
<?php 
//include('aunthenticateclose.php;'); 
?>