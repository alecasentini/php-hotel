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
    <div class="container bg-white">

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
                    for ($i = 0; $i < count($hotels); $i++) {
                        echo "<tr>";
                            echo '<td>' . $hotels[$i]['name'] . "</td>";
                            echo '<td>' . $hotels[$i]['description'] . "</td>";
                            echo '<td class="text-center">' . ($hotels[$i]['parking'] ? 'Si' : 'No') . "</td>";
                            echo '<td class="text-center">' . $hotels[$i]['vote'];
                            echo '<td class="text-end">' . $hotels[$i]['distance_to_center'] . "Km </td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>

    </div>    

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</html>