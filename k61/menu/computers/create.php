<?php
include "../db_conn.php";

if (isset($_POST['submit'])) {
    #------ WSTAWIAMY DO ZMIENNYCH DANE Z FORMULARZA---------#
    $id_u = $_POST['id_u'];
    $producent = $_POST['producent'];
    $model = $_POST['model'];
    $nr_seryjny_k = $_POST['nr_seryjny_k'];
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    #-------------ZAPISUJEMY DO ZMIENNYCH ZAPYTANIA SQL-----------------#
    $sql_u_name = "SELECT imie FROM `uzytkownicy` WHERE id=$id_u;";
    $sql_u_surname = "SELECT nazwisko FROM `uzytkownicy` WHERE id=$id_u;";
    #------------WYKONUJEMY ZAPYTANIE SQL------------------#
    $zapytanie_u_name = mysqli_query($conn, $sql_u_name);
    $zapytanie_u_surname = mysqli_query($conn, $sql_u_surname);
    #--------------WYNIK ZAPYTANIA SQL ZAPISUJEMY DO ZMIENNYCH----------------#
    while ($row = mysqli_fetch_assoc($zapytanie_u_name)) {
        $u_name=$row['imie'];
    }
    while ($row = mysqli_fetch_assoc($zapytanie_u_surname)) {
        $u_surname=$row['nazwisko'];
    }
    #------------ZAPISUJEMY DO ZMIENNYCH ZAPYTANIA SQL------------------#
    $sql = "INSERT INTO `komputery`(`imie`, `nazwisko`, `producent`, `model`, `nr_seryjny_k`, `id_u`) 
    VALUES ('$u_name','$u_surname','$producent','$model','$nr_seryjny_k', '$id_u')";
    $u_sql = "UPDATE `uzytkownicy` SET `nr_seryjny_k`='$nr_seryjny_k' WHERE id=$id_u";
    #------------WYKONUJEMY ZAPYTANIE SQL------------------#
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Procedura wykonana poprawnie";
    } else {
        echo "Błąd:" . mysqli_error($conn);
    }
    #------------WYKONUJEMY ZAPYTANIE SQL------------------#
    $result2 = mysqli_query($conn, $u_sql);
    if ($result2) {
        echo "Procedura wykonana poprawnie";
    } else {
        echo "Błąd:" . mysqli_error($conn);
    }
    header('Location: show.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="data:image/x-icon;base64,AAABAAEAEBAAAAEAIABoBAAAFgAAACgAAAAQAAAAIAAAAAEAIAAAAAAAAAQAABILAAASCwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA4ODh2Pz8/9j8/P/Y4ODhyAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABMTEwHNzc3YkVFRQwAAAAANjY2t4uLi/+JiYn/NjY2swAAAABDQ0MONzc3YktLSwYAAAAAAAAAAAAAAABKSkoJNzc3vFhYWP86OjrbNjY2olBQUP2ZmZn/mZmZ/09PT/w1NTWhOjo63FhYWP83Nze5S0tLCAAAAAAAAAAANzc3ZlhYWP+ZmZn/kJCQ/4GBgf+Xl5f/mZmZ/5mZmf+Wlpb/gYGB/5CQkP+ZmZn/V1dX/zg4OGIAAAAAAAAAAEVFRQw5OTnZj4+P/5mZmf+ZmZn/mZmZ/5mZmf+ZmZn/mZmZ/5mZmf+ZmZn/jo6O/zk5OdZJSUkKAAAAAAAAAAAAAAAANjY2mn5+fv+ZmZn/mZmZ/25ubv9FRUX6RUVF+m5ubv+ZmZn/mZmZ/3x8fP83NzeXAAAAAAAAAAA4ODh7NjY2uk5OTvyWlpb/mZmZ/21tbf83NzeVS0tLC0pKSgo4ODiWbm5u/5mZmf+VlZX/TU1N/DY2Nrk4ODh8Pz8/9YyMjP+ZmZn/mZmZ/5mZmf9ERET4S0tLCQAAAAAAAAAASkpKCkVFRfqZmZn/mZmZ/5mZmf+MjIz/QEBA9z8/P/WLi4v/mZmZ/5mZmf+ZmZn/RERE+FBQUAkAAAAAAAAAAElJSQtFRUX6mZmZ/5mZmf+ZmZn/i4uL/z8/P/Y4ODh0NjY2tk9PT/yWlpb/mZmZ/21tbf83NzeXTExMC05OTgs3NzeYbm5u/5mZmf+VlZX/Tk5O/DY2NrY4ODh1AAAAAAAAAAA2Njabfn5+/5mZmf+ZmZn/bm5u/0ZGRvtGRkb7bm5u/5mZmf+ZmZn/fX19/zc3N5gAAAAAAAAAAAAAAABEREQNOjo62o+Pj/+ZmZn/mZmZ/5mZmf+ZmZn/mZmZ/5mZmf+ZmZn/mZmZ/46Ojv85OTnYSUlJDAAAAAAAAAAAODg4ZVhYWP+ZmZn/j4+P/35+fv+Wlpb/mZmZ/5mZmf+Wlpb/fn5+/4+Pj/+ZmZn/V1dX/zc3N2IAAAAAAAAAAFJSUgg3Nze5V1dX/zk5Odg2NjabT09P/JmZmf+YmJj/TU1N/DY2Npo5OTnaV1dX/zc3N7ZISEgHAAAAAAAAAAAAAAAASUlJBzg4OGBHR0cMAAAAADY2NrWKior/iYmJ/zY2NrIAAAAAREREDTg4OGBNTU0GAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA3NzdxPj4+8z4+PvI4ODhuAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA/D8AAMQjAACAAQAAgAEAAIABAADAAwAAAAAAAAGAAAABgAAAAAAAAMADAACAAQAAgAEAAIABAADEIwAA/D8AAA==" rel="icon" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../style.css">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="../scripts.js"></script>
    <title>Audyt sprzętu</title>
</head>

<body>
    <!-------------------------------TOP---------------------------------------------->
    <div id=top>
        Audyt sprzętu
        <a href="../menu.php">
            <div id=home>
                <i id=y class="fa fa-home fa-2x"></i>
            </div>
        </a>
    </div>
    <!---------------------------MENU-BOCZNE------------------------------------------>
    <div id=menu>
        <div class=buttons id=wysun>
            <div class=info>Schowaj</div>
            <div id=gap></div>
            <div class=bar></div>
            <div class=bar></div>
            <div class=bar></div>
        </div>
        <a href="show.php">
            <div class=buttons>
                <div class=info>Użytkownicy</div>
                <div id=side_button><i class="fa fa-address-book fa-2x"></i></div>
            </div>
        </a>
        <div class=sidegap></div>
        <a href="javascript:delay('../logout.php')">
            <div class=buttons id=logout>
                <div class=info>Wyloguj</div>
                <div id=side_button><i class="fa fa-sign-out fa-2x"></i></div>
            </div>
        </a>
    </div>
    <!-----------------------------STRONA--------------------------------------------->
    <div id=strona>
        <div id=header>Dodaj komputer</div>
        <div id=main>
            <!---------------------TREŚĆ---------------------------->
            <header>Dodawanie komputerów</header>
            <div class="container">
                <h3>Uzupełnij poniższy formularz w celu dodania nowego komputera</h3>
            </div>
            <form method="POST">
                <div class="row">
                    <div class="column">
                        <label class="form-label">ID użytkownika:</label>
                        <input type="text" name="id_u" value="<?php echo $row['id_u'] ?>">>
                    </div>
                    <div class="column">
                        <label class="form-label">Producent:</label>
                        <input type="text" name="producent" value="<?php echo $row['producent'] ?>">>
                    </div>
                    <div class="column">
                        <label class="form-label">Model:</label>
                        <input type="text" name="model" value="<?php echo $row['model'] ?>">>
                    </div>
                    <div class="column">
                        <label class="form-label">Numer seryjny:</label>
                        <input type="text" name="nr_seryjny_k" value="<?php echo $row['nr_seryjny_k'] ?>">>
                    </div>
                    <div>
                        <button type="submit" name="submit">Dodaj</button>
                    </div>
                </div>
            </form>
        </div>
        <div id=footer>
            <!--------------------STOPKA--------------------------->
        </div>

    </div>
    <!--end of strona-->
</body>