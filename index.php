<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <title>Farm RPG -AUTOFARM</title>
</head>
<body>
    
</body>
</html>

<script>
    $(document).ready(function(){
        function autoFarm(){
            request = $.ajax({
                type: 'GET',
                url: 'farmrpg.php',
                success: function(data){
                    setTimeout(autoFarm, 61000);
                    console.log(data);
                }
            });
        }  
        
        autoFarm();
    });
</script>
