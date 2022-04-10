
<?php



if (isset($_POST['num'])){
    $value = $_POST['num'];
    $bin = decbin($value);
    $hex = dechex($value);
    $oct = decoct($value);

    ?>
    <table class="table table-dark center-table">
        
        <tr> 
          <th>Binary</th>
          <th>Hex</th>
          <th>Oct</th></tr>
        <tr class="table-active">
          <td><?php echo $bin ?></td>
          <td><?php echo $hex ?></td>
          <td><?php echo $oct ?></td>
        </tr>
    </table>

    <?php

    header('Access-Control-Allow-Origin: *');

    $servername = "localhost";
    $username = "id18498114_admin";
    $password = "User12345678#";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=id18498114_iot_curso_itp", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
        $sql = "INSERT INTO conversiones VALUES (:originalValue, :bin, :hex, :oct , CURDATE());";

        $statement = $conn->prepare($sql);
        $statement->execute([

            ':originalValue' => $value,
            ':bin' => $bin,
            ':hex' => $hex,
            ':oct' => $oct
                            ]);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

  
}

?>

