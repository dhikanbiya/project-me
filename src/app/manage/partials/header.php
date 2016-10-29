<?php
//include config
require_once('../../db/con.php');
require_once('../../control/functions.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: ../login.php'); }

?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Manage Area</title>

        <!-- Bootstrap Core CSS -->
        <link href="../../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../../../lib/css/manage.css" rel="stylesheet">



    </head>

    <body>

        <div id="wrapper">

            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li class="sidebar-brand">

                        <a href="#">
                            Simple Blog
                        </a>										
                    </li>     
										<li class="user">Hallo, <?php echo $_SESSION['username'];?></li>              
                    <li>
                        <a href="index.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="post.php">Post</a>
                    </li>
										<?php if($_SESSION['group']==34): ?>
                    <li>
                        <a href="users.php">Users</a>
                    </li>                
									<?php endif ?>
                  <li>
                      <a href="update.php?id=<?php echo $_SESSION['slug'] ?>">Update Password</a>
                  </li>
                    <li>
                        <a href="../logout.php">Logout</a>
                    </li>                
                </ul>
            </div>
            <!-- /#sidebar-wrapper -->
            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-12 pull-right">
                                <a href="#menu-toggle" class="btn btn-success btn-sm pull-right" id="menu-toggle">Toggle Menu</a>	
                            </div>
