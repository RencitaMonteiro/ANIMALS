<?php
session_start();
//error_reporting(0);
include('doctor/includes/dbconnection.php');
    if(isset($_POST['submit']))
  {
 $name=$_POST['name'];
  $mobnum=$_POST['phone'];
 $email=$_POST['email'];
 $appdate=$_POST['date'];
 $aaptime=$_POST['time'];
 $specialization=$_POST['location'];
  $doctorlist=$_POST['doctorlist'];
 $message=$_POST['message'];
 $aptnumber=mt_rand(100000000, 999999999);
 $cdate=date('Y-m-d');

if($appdate<=$cdate){
       echo '<script>alert("Appointment date must be greater than todays date")</script>';
} else {
$sql="insert into tblappointment(AppointmentNumber,Name,MobileNumber,Email,AppointmentDate,AppointmentTime,Specialization,Doctor,Message)values(:aptnumber,:name,:mobnum,:email,:appdate,:aaptime,:specialization,:doctorlist,:message)";
$query=$dbh->prepare($sql);
$query->bindParam(':aptnumber',$aptnumber,PDO::PARAM_STR);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':mobnum',$mobnum,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':appdate',$appdate,PDO::PARAM_STR);
$query->bindParam(':aaptime',$aaptime,PDO::PARAM_STR);
$query->bindParam(':specialization',$specialization,PDO::PARAM_STR);
$query->bindParam(':doctorlist',$doctorlist,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);

 $query->execute();
   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Your Appointment Request Has Been Send. We Will Contact You Soon")</script>';
echo "<script>window.location.href ='index.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}
}
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Doctor Appointment Management System || Home Page</title>

        <!-- CSS FILES -->        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/owl.carousel.min.css" rel="stylesheet">

        <link href="css/owl.theme.default.min.css" rel="stylesheet">

        <link href="css/templatemo-medic-care.css" rel="stylesheet">
        <script type="text/javascript">
        $(function () {
          $("#txtName").keypress(function (e) {
            var keyCode = e.keyCode || e.which;

            $("#lblError").html("");

            var regex = /^[A-Za-z0-9]+$/;

            var isValid = regex.test(String.fromCharCode(keyCode));
            if (!isValid) {
              $("#lblError").html("special characters are not allowed.");
            }

            return isValid;
          });
        });
        </script>
        <script>
function getdoctors(val) {
  //  alert(val);
$.ajax({

type: "POST",
url: "get_doctors.php",
data:'sp_id='+val,
success: function(data){
$("#doctorlist").html(data);
}
});
}
</script>
    </head>
    
    <body id="top">
    
        <main>

            <?php include_once('includes/header.php');?>

            <section class="hero" id="hero">
                <div class="container">
                    <div class="row">

                        <div class="col-12">
                            <div id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="https://4.bp.blogspot.com/-5jECXwTg6iA/XLdmkDDx3OI/AAAAAAAAEfc/hUsg50qNBewqJu_8lhRO3cT5ldlDuxcQgCLcBGAs/s1600/vet-help-dog.jpg" class="img-fluid" alt="">
                                    </div>

                                    <div class="carousel-item">
                                        <img src="https://creditkarma-cms.imgix.net/wp-content/uploads/2018/03/options-huge-vet-bill.jpg" class="img-fluid" alt="">
                                    </div>

                                    <div class="carousel-item">
                                        <img src="https://img1.wsimg.com/isteam/ip/3b648486-0d2e-4fcd-8deb-ddb6ce935eb3/blob-0010.png" class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </section>

            <section class="section-padding" id="about">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-md-6 col-12">
                            <?php
$sql="SELECT * from tblpage where PageType='aboutus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                            <h2 class="mb-lg-3 mb-3"><?php  echo htmlentities($row->PageTitle);?></h2>

                            <p><?php  echo ($row->PageDescription);?>.</p>

                           <?php $cnt=$cnt+1;}} ?>
                        </div>

                        <div class="col-lg-4 col-md-5 col-12 mx-auto">
                            <div class="featured-circle bg-white shadow-lg d-flex justify-content-center align-items-center">
                                <p class="featured-text"><span class="featured-number">5</span> Years<br> of Experiences</p>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <section class="gallery">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-6 ps-0">
                            <img src="https://www.humanesociety.org/sites/default/files/2022-10/cat-vet-583001.jpg" class="img-fluid galleryImage" alt="get a vaccine" title="get a vaccine for yourself">
                        </div>

                        <div class="col-lg-6 col-6 pe-0">
                            <img src="https://m.economictimes.com/thumb/msid-82601833,width-1200,height-900,resizemode-4,imgsize-542718/puppies-vet_istock.jpg" class="img-fluid galleryImage" alt="wear a mask" title="wear a mask to protect yourself">
                        </div>

                    </div>
                </div>
            </section>

            

            

            <section class="section-padding" id="booking">
                <div class="container">
                    <div class="row">
                    
                        <div class="col-lg-8 col-12 mx-auto">
                            <div class="booking-form">
                                
                                <h2 class="text-center mb-lg-3 mb-2">Book an appointment</h2>
                            
                                <form role="form" method="post">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Full name" required='true' pattern="[a-z A-Z]+" required>
                                        </div>

                                        <div class="col-lg-6 col-12">
                                            <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required='true' title="only alphbets are allowed ">
                                        </div>
                                   
                                        <div class="col-lg-6 col-12">
                                            <input type="telephone" name="phone" id="phone" class="form-control" placeholder="Enter Phone Number" maxlength="10" minlength="10" pattern="[0-9]+" required='true'>
                                        </div>

                                        <div class="col-lg-6 col-12">
                                            <input type="date" name="date" id="date" value="" class="form-control" required>
                                            
                                        </div>

                                            <div class="col-lg-6 col-12">
                                            <input type="time" name="time" id="time" value="" class="form-control" required>
                                            
                                        </div>

    <div class="col-lg-6 col-12">
<select onChange="getdoctors(this.value);"  name="location" id="location" class="form-control" required>
<option value="">Select your nearest location</option>
<!--- Fetching States--->
<?php
$sql="SELECT * FROM tblspecialization";
$stmt=$dbh->query($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
while($row =$stmt->fetch()) { 
  ?>
<option value="<?php echo $row['ID'];?>"><?php echo $row['location'];?></option>
<?php }?>
</select>
</div>


    <div class="col-lg-6 col-12">
<select name="doctorlist" id="doctorlist" class="form-control">
<option value="">Select Doctor</option>
</select>
</div>



                                        <div class="col-12">
                                            <textarea class="form-control" rows="5" id="message" name="message" placeholder="Additional Message"></textarea>
                                        </div>

                                        <div class="col-lg-3 col-md-4 col-6 mx-auto">
                                            <button type="submit" class="form-control" name="submit" id="submit-button">Book Now</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </main>
        <?php include_once('includes/footer.php');?>
        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/scrollspy.min.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>