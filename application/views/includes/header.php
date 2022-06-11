<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/styles.css" rel="stylesheet">
    <title><?php
            if (APP_NAME) {
                $title = APP_NAME;
            }
            if (isset($heading)) {
                $title = $title . " - " . $heading;
            }
            echo $title;
            ?></title>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="<?php echo base_url() ?>"> <i class="material-icons">home</i></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>mycal/index/" class="nav-link">Calendar</a>
                    </li>
                    <li class="nav-item">
                        <?php if (!$this->ion_auth->logged_in()) : ?>
                            <a href="<?php echo base_url(); ?>auth/login" class="nav-link">Login</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Welcome,
                            <?php $user = $this->ion_auth->user()->row();
                            echo $user->username; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo base_url(); ?>articles/write">Write</a>
                            <a class="dropdown-item" href="<?php echo base_url(); ?>auth/change_password">Change Password</a>
                            <a class="dropdown-item" href="<?php echo base_url(); ?>auth/logout">Logout</a>
                        </div>
                    </li>
                <?php endif ?>
                </ul>
            </div>
        </nav>
        <?php $message = $this->session->flashdata('message'); ?>
        <?php if ($message) : ?>
            <h3 class="alert alert-primary" id="message"> <i class="material-icons">thumb_up</i> <?php echo $message ?></h3>
        <?php endif; ?>