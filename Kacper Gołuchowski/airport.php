<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Odloty samolotów </title>
    <link rel = 'stylesheet' href = 'styl.css' />
</head>
<body>
    <header class = 'first_header'>
        <h2> Odloty z lotniska </h2>
    </header>
    <header class = 'second_header'>
        <img src = 'zad6.png' alt = 'logotyp' />
    </header>
    <main>
        <h4> tabela odlotów </h4>
        <table>
            <tr>
                <th> LP. </th>
                <th> NUMER REJSU </th>
                <th> CZAS </th>
                <th> KIERUNEK </th>
                <th> STATUS </th>
            </tr>
            <tr>
                <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";

                        // Create connection
                        $conn = new mysqli($servername, $username, $password, "egzamin");

                        // Check connection
                        if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);    
                        }

                        $sql = "SELECT id, nr_rejsu, czas, kierunek, status_lotu FROM odloty ORDER BY odloty.czas DESC";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc())
                            echo '<tr> <td>'.$row['id'].'</td> <td>'.$row['nr_rejsu'].'</td> <td>'.$row['czas'].'</td> <td>'.$row['kierunek'].'</td> <td>'.$row['status_lotu'].'</td> </tr>';
                        } else {
                            echo "0 results";
                        }
                        echo json_encode(42);
                ?>
            </tr>
        </table>
    </main>
    <footer class = 'first_footer'>
        <a href = 'kw1.png' target = '_blank'> POBIERZ OBRAZ </a>
    </footer>
    <footer class = 'second_footer'>
    <?php 
        if(isset($_COOKIE['hello'])) {
            echo '<p> Miło nam, że nas znowu odwiedziłeś! </p>';
        }
        else {
            setcookie('hello', 'hello', time() + 3600*20, "", "", false, false);
            echo '<p> Sprawdź regulamin naszej strony    </p>';

        }
    ?>
    </footer>
    <footer class = 'third_footer'>
        Autor: Kacper Gołuchowski
    </footer>
</body>
</html>