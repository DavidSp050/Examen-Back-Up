<?php 
//Check of de gebruiker is ingelogd, zo ja verander de login knop naar loguit
session_start();
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
}
//De Navbar met code dat er voor zorgt dat bv. index in de titel moet staan anders kan je de header niet zien
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    if (strpos($url, 'index')  !== false) {
        ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Ga Lekker Reizen</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="overzicht.php">Overzicht</a>
                        </li>
                        <li class="nav-item">
                            <?php echo $login; ?>
                        </li>                
                    </ul>
                </div>
            </div>
        </nav>
        <?php
    } if (strpos($url,'overzicht') !== false) {
        ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Ga Lekker Reizen</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="overzicht.php">Overzicht</a>
                        </li>
                        <li class="nav-item">
                            <?php echo $login; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <?php
    } if (strpos($url,'login') !== false) {
    ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Ga Lekker Reizen</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="overzicht.php">Overzicht</a>
                        </li>
                        <li class="nav-item">
                            <?php echo $login; ?>
                        </li>        
                    </ul>
                </div>
            </div>
        </nav>
    <?php 
} ?> 
<?php if (strpos($url,'loguit') !== false) { ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Ga Lekker Reizen</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="overzicht.php">Overzicht</a>
                    </li>
                    <li class="nav-item">
                        <?php echo $login; ?>
                    </li>          
                </ul>
            </div>
        </div>
    </nav>
<?php 
} ?>