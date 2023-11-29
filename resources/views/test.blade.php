<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body bgcolor="#ddd">
    <strong class="text-danger"><h1 align="center">Chaseboard</h1></strong>
    <table border="2" cellpadding="1" cellspacing="2" align="center">
        <?php
            for($row = 1; $row < 8; $row++){
                echo'<tr>';
                    for($col = 1; $col  < 8; $col++){
                        $total=$row+$col;
                        if($total%2 == 0){
                            echo'<td width="90", height="90", bgcolor="black"></td>';
                        }
                        else{
                            echo'<td width="90", height="90", bgcolor="white"></td>';
                        }
                    }
                echo'</tr>';
            }
        ?>
    </table>
</body>
</html>
