<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ALDUIN</title>
    <link href="<?php echo '/' . DX_ROOT_PATH; ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo '/' . DX_ROOT_PATH; ?>/css/styles.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo '/' . DX_ROOT_PATH; ?>/css/bootstrap-lightbox.min.css" type="text/css">
</head>
<body>
<div class="container-fluid">
    <header class="page-header">
        <div class="row">
            <div class="col-lg-8">
                <?php $logged_user = \Lib\Authentication::get_instance()->get_logged_user();?>
                <nav>
                    <ul class="nav nav-pills pull-left" role="tablist">
                        <li><a href="<?php echo '/' . DX_ROOT_PATH; ?>">Home</a></li>
                        <li><a href="<?php echo '/' . DX_ROOT_PATH . "category/index"; ?>">Categories</a></li>
                        <!-- <li><a href="#">Albums</a></li> -->

                        <?php if (empty($logged_user)): ?>
                            <li><a href="<?php echo '/' . DX_ROOT_PATH . "login/index"; ?>">Login</a></li>
                            <li><a href="#">Register</a></li>
                        <?php endif; ?>

                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <h1 class="h1 pull-right">Alduin</h1>
            </div>

        </div>
    </header>