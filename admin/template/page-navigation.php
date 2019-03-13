<?php
   // GET PAGES
   $stmtty = $sql->Execute($sql->Prepare("SELECT webmin_contacts.PERSON_ID, webmin_contacts.PERSON_NAME, webmin_contacts.PERSON_EMAIL, webmin_contacts.PERSON_PHONE, webmin_contacts.PERSON_LOCATION, webmin_contacts.PERSON_DESCRIPTION, webmin_contacts.PERSON_DATE_ADDED FROM webmin_contacts WHERE webmin_contacts.PERSON_STATUS ='1'  ORDER BY webmin_contacts.PERSON_DATE_ADDED DESC LIMIT 3"));
   $notify = $stmtty->GetAll();
?>
<!-- Navigation-->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php?action=index&pg=dashboard">Website<b>Manager</b></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item <?php echo(($pg=='dashboard')?'active':'');?>" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php?action=index&pg=dashboard">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item <?php echo(($pg==md5("sitepages"))?'active':'');?>" data-toggle="tooltip" data-placement="right" title="Pages">
          <a class="nav-link" href="index.php?pg=<?php echo md5("sitepages").'&amp;option='.md5("sitepages"); ?>">
            <i class="fa fa-fw fa-files-o"></i>
            <span class="nav-link-text">Pages</span>
          </a>
        </li>
        <li class="nav-item <?php echo(($pg==md5("siteposts"))?'active':'');?>" data-toggle="tooltip" data-placement="right" title="Posts">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsePosts" data-parent="#Posts">
            <i class="fa fa-fw fa-bullhorn"></i>
            <span class="nav-link-text">Posts</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapsePosts">
            <li>
              <a href="index.php?pg=<?php echo md5("siteposts").'&amp;option='.md5("siteposts"); ?>">Posts</a>
            </li>
            <li>
              <a href="index.php?pg=<?php echo md5("siteposts").'&amp;option='.md5("postcategories"); ?>">Post Category</a>
            </li>
          </ul>
        </li>
        <li class="nav-item <?php echo(($pg==md5("sitevideoposts"))?'active':'');?>" data-toggle="tooltip" data-placement="right" title="VideoPosts">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseVideoPosts" data-parent="#VideoPosts">
            <i class="fa fa-fw fa-video-camera"></i>
            <span class="nav-link-text">Video Posts</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseVideoPosts">
            <li>
              <a href="index.php?pg=<?php echo md5("sitevideoposts").'&amp;option='.md5("sitevideoposts"); ?>">Video Posts</a>
            </li>
            <li>
              <a href="index.php?pg=<?php echo md5("sitevideoposts").'&amp;option='.md5("videocategories"); ?>">Video Category</a>
            </li>
          </ul>
        </li>
        <li class="nav-item <?php echo(($pg==md5("siteecommerce"))?'active':'');?>" data-toggle="tooltip" data-placement="right" title="Ecommerce">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseEcommerce" data-parent="#Ecommerce">
            <i class="fa fa-fw fa-shopping-basket"></i>
            <span class="nav-link-text">E-Commerce</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseEcommerce">
            <li>
              <a href="index.php?pg=<?php echo md5("siteecommerce").'&amp;option='.md5("orders"); ?>">Orders</a>
            </li>
            <li>
              <a href="index.php?pg=<?php echo md5("siteecommerce").'&amp;option='.md5("sales"); ?>">Sales</a>
            </li>
            <li>
              <a href="index.php?pg=<?php echo md5("siteecommerce").'&amp;option='.md5("items"); ?>">Items</a>
            </li>
            <li>
              <a href="index.php?pg=<?php echo md5("siteecommerce").'&amp;option='.md5("itemcategories"); ?>">Item Category</a>
            </li>
            <li>
              <a href="index.php?pg=<?php echo md5("siteecommerce").'&amp;option='.md5(""); ?>">Deals & Offers</a>
            </li>
            <li>
              <a href="index.php?pg=<?php echo md5("siteecommerce").'&amp;option='.md5("tax"); ?>">Tax Options</a>
            </li>
          </ul>
        </li>
        <li class="nav-item <?php echo(($pg==md5(""))?'active':'');?>" data-toggle="tooltip" data-placement="right" title="Accounting">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseAccounting" data-parent="#Accounting">
            <i class="fa fa-fw fa-line-chart"></i>
            <span class="nav-link-text">Accounting</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseAccounting">
            <li>
              <a href="index.php?pg=<?php echo md5("").'&amp;option='.md5(""); ?>">Income & Expences</a>
            </li>
            <li>
              <a href="index.php?pg=<?php echo md5("").'&amp;option='.md5(""); ?>">Reports</a>
            </li>
          </ul>
        </li>
        <li class="nav-item <?php echo(($pg==md5("sitesocialportal"))?'active':'');?>" data-toggle="tooltip" data-placement="right" title="Organization">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseOrganization" data-parent="#Organization">
            <i class="fa fa-fw fa-commenting-o"></i>
            <span class="nav-link-text">Social Portal</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseOrganization">
            <li>
              <a href="index.php?pg=<?php echo md5("sitesocialportal").'&amp;option='.md5("members"); ?>">Clients</a>
            </li>
            <li>
              <a href="index.php?pg=<?php echo md5("sitesocialportal").'&amp;option='.md5("comments"); ?>">Comments</a>
            </li>
            <li>
              <a href="index.php?pg=<?php echo md5("sitesocialportal").'&amp;option='.md5("likescomments"); ?>">Likes & Trending</a>
            </li>
            <li>
              <a href="index.php?pg=<?php echo md5("sitesocialportal").'&amp;option='.md5("thirdpartyadverts"); ?>">Third Party Adverts</a>
            </li>
          </ul>
        </li>
        <li class="nav-item <?php echo(($pg==md5("sitemedia"))?'active':'');?>" data-toggle="tooltip" data-placement="right" title="Media">
          <a class="nav-link" href="index.php?pg=<?php echo md5("sitemedia").'&amp;option='.md5("sitemedia"); ?>">
            <i class="fa fa-fw fa-photo"></i>
            <span class="nav-link-text">Media</span>
          </a>
        </li>
        <li class="nav-item <?php echo(($pg==md5("sitecontacts"))?'active':'');?>" data-toggle="tooltip" data-placement="right" title="Posts">
          <a class="nav-link" href="index.php?pg=<?php echo md5("sitecontacts").'&amp;option='.md5("sitecontacts"); ?>">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="nav-link-text">Messages</span>
          </a>
        </li>
        <li class="nav-item <?php echo(($pg==md5("sitetemplate"))?'active':'');?>" data-toggle="tooltip" data-placement="right" title="Template">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseTemplate" data-parent="#Template">
            <i class="fa fa-fw fa-edit"></i>
            <span class="nav-link-text">Template</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseTemplate">
            <li>
              <a href="index.php?pg=<?php echo md5("sitetemplate"); ?>">Theme</a>
            </li>
            <li>
              <a href="index.php?pg=<?php echo md5("sitetemplate").'&amp;option='.md5("menus"); ?>">Menus</a>
            </li>
            <li>
              <a href="index.php?pg=<?php echo md5("sitetemplate").'&amp;option='.md5("slider"); ?>">Slider</a>
            </li>
            <li>
              <a href="index.php?pg=<?php echo md5("sitetemplate").'&amp;option='.md5("editcodes"); ?>">Edit Code</a>
            </li>
          </ul>
        </li>
        <li class="nav-item <?php echo(($pg==md5("sitesettings"))?'active':'');?>" data-toggle="tooltip" data-placement="right" title="Settings">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-cog"></i>
            <span class="nav-link-text">Settings</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="index.php?pg=<?php echo md5("sitesettings").'&amp;option='.md5("sitesettings"); ?>">General</a>
            </li>
            <li>
              <a href="index.php?pg=<?php echo md5("sitesettings").'&amp;option='.md5("manageusers"); ?>">Manage Users</a>
            </li>
            <li>
              <!-- <a href="index.php?pg=<?php #echo md5("sitesettings").'&amp;option='.md5("manageuserlevels"); ?>">User Levels</a> -->
            </li>
          </ul>
        </li>
      </ul>
      
      <!-- Top Navigation Starts Here -->
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <?php if(sizeof($notify,1)>0){?>
              <i class="fa fa-fw fa-circle"></i>
              <?php } ?>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">New Messages:</h6>
            <div class="dropdown-divider"></div>
            <?php if(sizeof($notify,1)>0){ foreach($notify as $pop){?>
            <a class="dropdown-item" href="#">
              <strong><?php echo $pop['PERSON_NAME'];?></strong>
              <span class="small float-right text-muted"><?php echo date('h:i a',strtotime($pop["PERSON_DATE_ADDED"])); ?></span>
              <div class="dropdown-message small"><?php echo $pop["PERSON_DESCRIPTION"];?></div>
            </a>
            <div class="dropdown-divider"></div>
            <?php } }else{?>
              <a class="dropdown-item" href="#">
              <strong>No New Messages</strong>
              </a>
            <div class="dropdown-divider"></div>
            <?php } ?>
            <a class="dropdown-item small" href="index.php?pg=<?php echo md5("sitecontacts").'&amp;option='.md5("sitecontacts"); ?>">View all messages</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div>
        </li>

        <li class="nav-item">
            <div class="space">
              Welcome Admin!
            </div>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" onclick="confirmLogout()"><i class="fa fa-fw fa-lock"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>

  <script>
      function confirmLogout() {
            swal({
                title: 'Are you sure?',
                text: "You want to Logout!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#007BFF',
                cancelButtonColor: '#DC3545',
                confirmButtonText: 'Yes, Logout!'
              }).then(function () {
                window.location.href = 'index.php?action=logout';
              })
        }
    </script>