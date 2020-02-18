<?php
require('config/config.php');
require('config/db.php');
require('config/session.php');

session_destroy();
header("Location: login.php");
