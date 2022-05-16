<!DOCTYPE html>
<?php 
	session_start();
    // To only give access to a page if a user is logged in  

    // if(!isset($_SESSION['username'])){
    //     header("Location: login.php");
    // } else { 
      
    // }

    //Login / Loguit systeem
    if(!isset($_SESSION['username']))
    {
        $login = '<a class="nav-link" href="login.php">Login</a>';
    }
    else
    {
        if ($_SESSION['user-lvl'] == 1)
        {
            $login = '<a class="nav-link" href="loguit.php">Loguit</a>';
    
        }
    
        else if ($_SESSION['user-lvl'] >= 1)
        {
            $login = '<a class="nav-link" href="loguit.php">Loguit</a>';
        }
        
        else if ($_SESSION['user-lvl'] <= 1)
        {
            $login = '<a class="nav-link" href="loguit.php">Loguit</a>';
        }

    }
    $ulvl = $_SESSION['user-lvl'];
    $reisID   = $_SESSION['reisID'];
    
    // verifieer lvl van persoon (admin lvl req)
    if ( $ulvl == "2") {
    //site here
    
    
    }
    //Normal
    else{

    } 
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="scss/main.css">
    <title>Overzichtspagina</title>
</head>
<body>
        <?php
            include_once "nav.php";
        ?>
    <?php require_once 'overzicht_process.php'; ?>

    <?php 
    //Laat een confirmatie bericht zien na het toevoegen of verwijderen van een gebruiker 
    if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>">

            <?php 
                echo $_SESSION['message'];
                unset ($_SESSION['message']);
            ?>

        </div> 

    <?php endif ?>
    <h1> Reizen Overzicht </h1>
        <div class="container">
        <?php 
            //call naar de config file
            require_once 'config.php';
            //laat alles zien van de databse tafel: "reizen"
            $result = $mysqli->query("SELECT * FROM reizen") or die($mysqli->error);
            // pre_r($result);
            // pre_r($result->fetch_assoc());
            ?>

            <div class="row justify-content-center">
                <table class="table"> 
                    <thead>
                        <tr>
                            <th>Titel</th>
                            <th>Bestemming</th>
                            <th>Omschrijving</th>
                            <th>Begindatum</th>
                            <th>Einddatum</th>
                            <th>Inschrijvingen</th>
                            <th colspan="2">Action</th> 
                        </tr>
                    </thead>
                <?php
                    while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['titel']; ?></td> 
                            <td><?= $row['bestemming']; ?></td> 
                            <td><?= $row['omschrijving']; ?></td> 
                            <td><?= $row['begindatum']; ?></td> 
                            <td><?= $row['einddatum']; ?></td> 
                            <td><?= $row['inschrijvingen']; ?></td> 
                                <td>
                                <div class="action-buttons">
                                    <?php if( $ulvl == "2" ) { ?>
                                        <a href="overzicht.php?edit=<?= $row['reisID']; ?>" class="btn btn-info">Edit</a>

                                        <?php } else { } ?>

                                    <?php 
                                        // verifieer lvl van persoon (admin lvl req)
                                        if ( $ulvl == "2") {
                                            //site here
                                            ?>
                                            <a href="overzicht_process.php?delete=<?= $row['reisID']; ?>" class="btn btn-danger">Delete</a>
                                            <?php } 
                                        //level 1 
                                            else{
                                                
                                            } 
                                    ?>
                                    <a href="reizen.php?<?= $row['reisID']; ?>" class="btn btn-primary">Inschrijving</a>
                                </div>
                                </td>
                        </tr>              

                        <?php endwhile; ?>

                </table>
            </div>

            <?php 
            //functie voor het uitlezen van de database table
            //gebruikt bij het testen
            function pre_r( $array ) {
                echo '<pre>';
                print_r($array);
                echo '</pre>';
            }

        ?>
        <?php if ($ulvl == "2") { ?>
            <!-- de form -->
            <div class="row justify-content-center">
                <form action="overzicht_process.php" method="POST"> 
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <div class="form-group"> 
                        <label>Titel</label>
                        <input type="text" name="title" class="form-control" value="<?= $title; ?>" placeholder="Vul hier de titel in" required> 
                    </div> 
                    <div class="form-group">
                        <label>Bestemming</label>
                        <input type="text" name="location" class="form-control" value="<?= $location; ?>" placeholder="Vul hier de bestemming in" required> 
                    </div>
                    <div class="form-group">
                        <label>Omschrijving</label>
                        <input type="text" name="input" class="form-control" value="<?= $input; ?>" placeholder="Vul hier de omschrijving in!" required> 
                    </div>
                    <div class="form-group">
                        <label>Begindatum</label>
                        <input type="date" name="startdate" class="form-control" value="<?= $startdate; ?>" placeholder="Vul hier de begindatum in" required> 
                    </div>
                    <div class="form-group">
                        <label>Einddatum</label>
                        <input type="date" name="enddate" class="form-control" value="<?= $enddate; ?>" placeholder="Vul hier de einddatum in" required>  
                    </div>
                    <div class="form-group">
                    <label>Inschrijvingen</label>
                    <input type="text" name="reg" class="form-control" value="<?= $reg; ?>" placeholder="Vul hier de maximaal aantal inschrijvingen in" required>  
                </div>
                    <div class="form-group button">
                        <!-- verander de knop van Save naar Update  -->
                        <?php 
                            if ($update == true) { 
                        ?>
                            <button type="submit" class="btn btn-info" name="update">Update</button> 
                            <a href="overzicht.php" class="btn btn-secondary">Back</a>
                        <?php } else { ?> 
                                <button type="submit" class="btn btn-primary" name="save">Save</button> 
                        <?php } ?>
                        
                    </div>
                </form> 
            </div>
        </div>
    <?php } else { }?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
</body>
</html>