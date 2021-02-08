
<?php
include "header.php";
// Connect to the MySQL database
$connect = mysqli_connect('localhost', 'root', '', 'portfolio');

// If the connection did not work, display an error message
if (!$connect) 
{
    echo 'Error Code: ' . mysqli_connect_errno() . '<br>';
    echo 'Error Message: ' . mysqli_connect_error() . '<br>';
    exit;
}

?>

        <h1 class="text-center">MUSIC</h1>

        <?php

        // Create a query
        $query = 'SELECT id,name,youtubeid
            FROM videos
            ORDER BY name';

        // Execute the query
        $result = mysqli_query($connect, $query);

        // If there is no result, display an error message
        if (!$result)
        {
            echo 'Error Message: ' . mysqli_error($connect) . '<br>';
            exit;
        }

       ?>

       <div class="row" style="margin: 2%;">
         

       <?php

        // Loop through the records found
        while ($record = mysqli_fetch_assoc($result))
        {
            echo "<div class='col-sm-6'>";
            // Output the record using if statements and echo
            echo '<hr>';

            echo '<h4>'.$record['name'].'</h4>';

            $url = 'https://www.youtube.com/watch?v='.$record['youtubeid'];

           

            echo '<br><br>';

            echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$record['youtubeid'].'?modestbranding=1" 
                rameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen></iframe>';
            echo "</div>";

        }

        ?>
        
        </div>

        <?php

include "footer.php";
        ?>        
