<?php
$firstDayMonth = 1;
$days = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
$months = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
if (isset($_GET['month']) && isset($_GET['year'])) {
    $month = $_GET['month'];
    $year = $_GET['year'];
    $nbDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    $firstDayMonth = date("N",  mktime(0, 0, 0,  $month, 1, $year));
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>CALENDRIER</title>
</head>

<body>
    <h1>CALENDRIER</h1>
    <form action="" method="get">
        <label for="month" id="choice">Choisir un mois :</label>
        <select name="month" id="month">
            <option value="">--MOIS--</option>
            <?php foreach ($months as $key => $month) { ?>
                <option value="<?php echo $key + 1 ?>"><?php echo $month ?></option>
            <?php }
            ?>
        </select>
        <label for="year" id="choice">Choisir une ann&eacute;e :</label>
        <select name="year" id="year">
            <option value="">--ANN&Eacute;ES--</option>
            <?php
            for ($y = 2020; $y <= 2050; $y++) { ?>
                <option><?php echo $y ?></option>
            <?php }
            ?>
        </select>
        <input type="submit" name="valider" value="Valider" />
    </form>

    <div class="container">
        <div class="photo"></div>
        <div class="calendar">
            
                <?php foreach ($days as $key => $day) { ?>
                    <div class="days"><?php echo $day ?></div>
                <?php }
                ?>

                <?php 
                for ($i=1; $i <$firstDayMonth  ; $i++) { 
                    echo '<div class="days"></div>';
                }
                for ($i=1; $i <= $nbDays; $i++) { 
                    echo '<div class="date">'.$i.'</div>';
                }
                ?>

        </div>
    </div>
</body>

</html>