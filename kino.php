<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lucky Numbers</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="container">
        <p>Pick 5 Numbers</p>
        <br>
        <form action="kino.php" method="POST">
            <table id="tab">
                <tr>
                    <td><input type="checkbox" id="num1" value="1" name="numbers[]"><label for="num1">1</label></td>
                    <td><input type="checkbox" id="num2" value="2" name="numbers[]"><label for="num2">2</label></td>
                    <td><input type="checkbox" id="num3" value="3" name="numbers[]"><label for="num3">3</label></td>
                    <td><input type="checkbox" id="num4" value="4" name="numbers[]"><label for="num4">4</label></td>
                    <td><input type="checkbox" id="num5" value="5" name="numbers[]"><label for="num5">5</label></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="num6" value = "6"name ="numbers[]"><label for="num6"> 6</label></td>
                <td><input type="checkbox" id="num7"value = "7" name = "numbers[]"><label for="num7">7</label></td>
                <td><input type="checkbox" id="num8"value = "8" name = "numbers[]"><label for="num8">8</label></td>
                <td><input type="checkbox" id="num9"value = "9" name = "numbers[]"><label for="num9">9</label></td>
                <td><input type="checkbox" id="num10" value = "10" name = "numbers[]"><label for="num10">10</label></td>
                </tr>

                <tr>
                <td><input type="checkbox" id = "num1" value = "11"name ="numbers[]"><label for="num11"> 11</label></td>
                <td><input type="checkbox" id = "num12" value = "12"name = "numbers[]"><label for="num12">12</label></td>
                <td><input type="checkbox" id = "num13" value = "13" name = "numbers[]"><label for="num13">13</label></td>
                <td><input type="checkbox" id = "num14" value = "14"name = "numbers[]"><label for="num14">14</label></td>
                <td><input type="checkbox" id = "num15" value = "15"name = "numbers[]"><label for="num15">15</label></td>
                </tr>

                <tr>
                <td><input type="checkbox" id = "num16" value = "16"name ="numbers[]"><label for="num16"> 16</label></td>
                <td><input type="checkbox" id = "num17"value = "17" name = "numbers[]"><label for="num17">17</label></td>
                <td><input type="checkbox" id = "num18" value = "18"name = "numbers[]"><label for="num18">18</label></td>
                <td><input type="checkbox" id = "num19"value = "19" name = "numbers[]"><label for="num19">19</label></td>
                <td><input type="checkbox" id = "num20"value = "20" name = "numbers[]"><label for="num20">20</label></td>
                </tr>
            </table>
            <br>
            <input type="submit" name="play" id="button" value="Παίξε"> 
            
        </form>
    
</div>
<?php


if(isset($_POST["play"])){

    if(isset($_POST["numbers"]) && !empty($_POST["numbers"])){
        $numbers = $_POST["numbers"];
        $sum = count($numbers);

        if($sum != 5){
            echo "<h3>Pick 5 Numbers</h3>";
        } else {
            do {
    
                $draw = array(rand(1, 20),rand(1, 20),rand(1, 20),rand(1, 20),rand(1, 20));
                sort($draw);
            } while (count($draw) != count(array_unique($draw)));

            $k = 1;
            
            echo "<table id='draw' border='1'>";
            echo "<tr> <td colspan='5'> Lucky Numbers </td> </tr>";
            for ($i = 1; $i <= 4; $i++) {
                echo "<tr>";
                for ($j = 1; $j <= 5; $j++) {
                  
                    $result = '';
                    if(in_array($k, $numbers) && in_array($k, $draw)) {
                        $result = 'match';
                    } elseif(in_array($k, $draw)) {
                        $result = 'mismatch';
                    }
                    
                    echo "<td class='$result'> $k </td>";
                    $k++;
                }
                echo "</tr>";
            }
            echo "</table>";
        }
    } else {
        echo "<h3> You Need To Pick At Least One</h3>";
    }
}

?>



</body>
</html>
