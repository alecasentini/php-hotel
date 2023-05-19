<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>
<body style="background-color: #F9FAFA;">

    <h1 class="text-center my-5">Hotel</h1>

    <div class="container my-3">
        <!-- form -->
        <form action="" method="GET" class="d-flex align-items-center">
            <!-- filtro parcheggio -->
            <label for="parking" class="me-3">Parcheggio:</label>
            <select name="parking" class="form-select" style="width: 75px;">
                <option selected>...</option>
                <option value="true">SI</option>
                <option value="false">NO</option>
            </select>

            <!-- filtro voto -->
            <label for="vote" class="ms-5 me-3">Voto:</label>
            <select name="vote" class="form-select" style="width: 75px;">
                <option selected>...</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <input type="submit" value="Filtra" class="btn btn-primary ms-5">
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="btn btn-success ms-5">Mostra tutti</a>

        </form>


    </div>

    <div class="container bg-white">

        <!-- tabella -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" >Nome</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col" class="text-center">Parcheggio</th>
                    <th scope="col" class="text-center">Voto</th>
                    <th scope="col" class="text-end">Distanza dal centro</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $filtered_hotels = array_filter($hotels, function ($hotel) {
                        $parkingFilter = true;
                        if (isset($_GET['parking']) && $_GET['parking'] !== '...') {
                            $parkingFilter = $hotel['parking'] == ($_GET['parking'] === 'true');
                        }
                        $voteFilter = true;
                        if (isset($_GET['vote']) && $_GET['vote'] !== '...') {
                            $voteFilter = $hotel['vote'] >= $_GET['vote'];
                        }
                        return $parkingFilter && $voteFilter;
                    });
                    

                    foreach ($filtered_hotels as $hotel) {
                        echo "<tr>";
                            echo '<td>' . $hotel['name'] . "</td>";
                            echo '<td>' . $hotel['description'] . "</td>";
                            echo '<td class="text-center">' . ($hotel['parking'] ? 'Si' : 'No') .   "</td>";
                            echo '<td class="text-center">' . $hotel['vote'];
                            echo '<td class="text-end">' . $hotel['distance_to_center'] . " Km </td>";
                        echo "</tr>";
                    }
                    
                    
                ?>
            </tbody>
        </table>

    </div>    

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</html>