
<nav id="app-navbar" class="navbar navbar-inverse navbar-fixed-top primary">
  
  <!-- navbar header -->
  <div class="navbar-header">
    <button type="button" id="menubar-toggle-btn" class="navbar-toggle visible-xs-inline-block navbar-toggle-left hamburger hamburger--collapse js-hamburger">
      <span class="sr-only">Toggle navigation</span>
      <span class="hamburger-box"><span class="hamburger-inner"></span></span>
    </button>

    <button type="button" class="navbar-toggle navbar-toggle-right collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
      <span class="sr-only">Toggle navigation</span>
      <span class="zmdi zmdi-hc-lg zmdi-more"></span>
    </button>

    <button type="button" class="navbar-toggle navbar-toggle-right collapsed" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false">
      <span class="sr-only">Toggle navigation</span>
      <span class="zmdi zmdi-hc-lg zmdi-search"></span>
    </button>

    <a href="dashboard.php" class="navbar-brand">
      <span class="brand-icon"><i class="fa fa-gg"></i></span>
      <span class="brand-name">DAMS</span>
    </a>
  </div><!-- .navbar-header -->
  
  <div class="navbar-container container-fluid">
    <div class="collapse navbar-collapse" id="app-navbar-collapse">
      <ul class="nav navbar-toolbar navbar-toolbar-left navbar-left">
        <li class="hidden-float hidden-menubar-top">
          <a href="javascript:void(0)" role="button" id="menubar-fold-btn" class="hamburger hamburger--arrowalt is-active js-hamburger">
            <span class="hamburger-box"><span class="hamburger-inner"></span></span>
          </a>
        </li>
        <li>
          <h5 class="page-title hidden-menubar-top hidden-float">Dashboard</h5>
        </li>
      </ul>

      <ul class="nav navbar-toolbar navbar-toolbar-right navbar-right">
       

        


          <div class="media-group dropdown-menu animated flipInY">
         <?php
         $docid=$_SESSION['damsid'];
$sql="SELECT * from tblappointment  where Status is null && Doctor=:docid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':docid', $docid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
$totalappintments=$query->rowCount();
foreach($results as $row)
{ 

  ?>

            <a href="view-appointment-detail.php?editid=<?php echo $row->ID;?>&&aptid=<?php echo $row->AppointmentNumber;?>" class="media-group-item">
              <div class="media">
                <div class="media-left">
                  <div class="avatar avatar-xs avatar-circle">
                    <img src="assets/images/images.png" alt="">
                    <i class="status status-online"></i>
                  </div>
                </div>
                
              <!--  <div class="media-body">
                  <h5 class="media-heading">New </h5>
                  <small class="media-meta"><?php echo $row->AppointmentNumber;?> at (<?php echo $row->ApplyDate;?>)</small>
                </div>
              </div>
-->
            </a>< media-group-item 
        <?php  } ?>
          </div>
          <a href="../index.php"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSrfVvIlLb0jOKGcmfqMWVziY0PVoPAChCHyA&usqp=CAU" style="width:25pt; height:25pt; top:10pt; position:absolute; right:10pt;"></a>
        </li>
           
       
            
          </ul>
        </li>

      </ul>
    </div>
  </div>
</nav>