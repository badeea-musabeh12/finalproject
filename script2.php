<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 </head>
<body>

    <?php
     $cars = [
        
    ];

    foreach ($cars as $car) {
       
        echo '<button onclick="changeColor(this)">Reserve</button>';
     }
    ?>

    <script>
        function changeColor(button) {
            button.style.backgroundColor = button.style.backgroundColor === 'residential' ? '' : 'residential'; 
        }
    </script>

</body>
</html>