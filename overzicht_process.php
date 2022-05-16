<?php 
session_start();
$reisID   = $_SESSION['reisID'];

require_once 'config.php'; 

$id = 0;
$update = false;
$title = ''; 
$location = '';
$input = '';
$startdate = '';
$enddate = '';
$reg = 1;

//Voeg een gebruiker / record toe 
if (isset($_POST['save'])) {
    $title = $_POST['title'];
    $location = $_POST['location'];
    $input = $_POST['input'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $reg = $_POST['reg'];

    $mysqli->query("INSERT INTO reizen (titel, bestemming, omschrijving, begindatum, einddatum, inschrijvingen, reisID) VALUES('$title', '$location', '$input', '$startdate', '$enddate', '$reg', '$id')") or 
        die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location: overzicht.php");
}

//Delete een gebruiker / record
if (isset($_GET['delete'])) {
    $reisID = $_GET['delete'];
    $mysqli->query("DELETE FROM reizen WHERE reisID=$reisID") or die($mysqli->error());

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: overzicht.php");
}

//Laat een gebruiker / record zien wanneer je op edit klikt
//Edit knop
if (isset($_GET['edit'])) {
    $reisID = $_GET['edit']; 
    $update = true; 
    $result = $mysqli->query("SELECT * FROM reizen WHERE reisID=$reisID") or die($mysqli->error());
    
    if (count($result)==1) {
        $row = $result->fetch_array();
        $title = $row['titel'];
        $location = $row['bestemming'];
        $input = $row['omschrijving'];
        $startdate = $row['begindatum'];
        $enddate = $row['einddatum'];
        $reg = $row['inschrijvingen'];
    }
}


//Update een gebruiker / Record
if (isset($_POST['update'])) { 
    $id = $_POST['id'];
    $title = $_POST['title'];
    $location = $_POST['location'];
    $input = $_POST['input'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $reg = $_POST['reg'];

    $mysqli->query("UPDATE reizen SET titel='$title', bestemming='$location', omschrijving='$input', begindatum='$startdate', einddatum='$enddate', inschrijvingen='$reg' WHERE reisID=$reisID") or die($mysqli->error()); 

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header('location: overzicht.php');
}


?>