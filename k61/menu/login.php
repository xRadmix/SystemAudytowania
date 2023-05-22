<?php
#URUCHAMIAMY SESJĘ UŻYTKOWNIKA
    session_start();
    
    #SPRAWDZAMY CZY UŻYTKOWNIK
    if((!isset($_POST['username'])) || (!isset($_POST['password'])))
    {
        header('Location: ../index.php');
        exit();
    }
    #NAWIĄZUJEMY POŁĄCZENIE Z BAZĄ DANYCH
    require_once "db_conn.php";

    $connect = @new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
    if($connect->connect_errno!=0)
    {
        echo "Error: " .$connect->connect_errno;
    }
    else
    {
        #ZAPISUJEMY DO ZMIENNYCH DANE Z FORMULARZA
        $login = $_POST['username'];
        $password = $_POST['password'];
        #ZABEZPIECZAMY WPROWADZANIE DANYCH POPRZEZ PRZEKSZTAŁCENIE WPROWADZONEGO LOGINU I HASLA DO HTML
        $login=htmlentities($login, ENT_QUOTES, "UTF-8");
        $password=htmlentities($password, ENT_QUOTES, "UTF-8");
        if($result = @$connect->query(
        sprintf("SELECT * FROM users WHERE u_name='%s' 
        AND u_password='%s'",
        #ZABEZPIECZENIE - ZAMIENIAMY ZNAKI SPECJALNE W TYP STRING
        mysqli_real_escape_string($connect,$login),
        mysqli_real_escape_string($connect,$password))))
        {   
            #WERYFIKUJEMY LOGOWANIE     
            $users=$result->num_rows;
            if($users>0)
            {
                $_SESSION['logon']=true;
                $row = $result->fetch_assoc();
                $_SESSION['user'] = $row['u_name'];
                unset($_SESSION['blad']);
                $result->close();
                header('Location: menu.php');
            }
            else{
                $_SESSION['blad'] = '<span style="color:red">Wrong username or password!</span>'; 
                header('Location: ../index.php');               
            }
        }
        $connect->close();
    }
    
  
?>