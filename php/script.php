<?php 
    include "../connessione.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Script</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
    <?php
        $actor_code = $_GET["act_code"];

        $text_query_recita = "DELETE FROM recita WHERE codAttore = $actor_code";

        if(!$conn->query($text_query_recita))   // Elimina prima dalla tabella con attori referenziati
            header("Location: ../error.html");

        $text_query_attore = "DELETE FROM attori WHERE codAttore = $actor_code";    // Poi elimina effettivamente dalla tabella degli attori

        if($conn->query($text_query_attore))
            echo ($conn->affected_rows > 0) ? "<p class='text-success'> Attore [$actor_code] rimosso con successo </p>" : "<p class='text-warning'> Nessun attore [$actor_code] rimosso dalla tabella Recita </p>";
        else
            header("Location: ../error.html");
    
    ?>

    <a href="../index.html"> TORNA ALLA HOMEPAGE </a>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>