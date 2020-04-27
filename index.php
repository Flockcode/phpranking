<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>leaderboard</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Data-Table-1.css">
    <link rel="stylesheet" href="assets/css/Data-Table.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body><table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>

                <th>Anzahl</th>
                <th>Name</th>
                <th>UUID</th>

            </tr>
        </thead>
        <tbody>
          <?php
          $servername = "localhost";
          $username = "user";
          $password = "pw";
          $dbname = "name";

          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);
          // Check connection
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }

          $sql = "SELECT COUNT(*) AS amount, player_uuid, player_name FROM hgi_hgi_players GROUP BY player_uuid ORDER BY amount DESC;";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {

              // output data of each row
              while($row = $result->fetch_assoc()) {
                  echo "<tr></td> <td>" . $row["amount"]. "</td><td> " . $row["player_name"]. "</td> <td>" . $row["player_uuid"]. "</td><tr>";
              }
          } else {
              echo "Keine Resultat";
          }
          $conn->close();
          ?>




        </tbody>
    </table>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
</body>

</html>
