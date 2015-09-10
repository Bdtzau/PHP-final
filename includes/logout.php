<?php
include("../config/session.php");
session_destroy();

header('location: ../index.php');

?>