<?php
/*Script de initializare, il folosim mai pe toate paginile */
session_start();

require 'database/connect.php';
require 'functions/general.php';
require 'functions/users.php';
require 'functions/plants.php';
require 'functions/album.php';
require 'functions/view.php';

$errors = array();
?>