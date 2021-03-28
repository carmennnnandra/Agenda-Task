<?php
function conectareBd(
    $host = 'localhost',
    $user = 'root',
    $password = '',
    $database='taskuri'
)
{
    return mysqli_connect($host, $user, $password, $database);
    
}

function clearData($input, $link)
{
    $input = trim($input);
    $input = htmlspecialchars($input);
    $input = stripslashes($input);
    $input = mysqli_real_escape_string($link, $input);
    
    return $input;
}
 function preiaUtilizatorDupaEmail($adresaEmail)
 {
     $link = conectareBd();
     $adresaEmail=clearData($adresaEmail, $link);
     $query = "SELECT * FROM utilizator WHERE email='$adresaEmail' ";
     //var_dump($query); die();
     $result = mysqli_query($link, $query);
     $utilizator = mysqli_fetch_array($result,MYSQLI_ASSOC);
     return $utilizator;
 }
function inregistrare($nume, $prenume, $email, $pass)
{
    $link = conectareBd();
    $nume = clearData($nume,$link);
    $prenume=clearData($prenume, $link);
    $email = clearData($email, $link);
    $pass = clearData($pass, $link);
    $pass = md5($pass);
    $user = preiaUtilizatorDupaEmail($email);
    if ($user) {
        return false;
    }
    $query = "INSERT INTO utilizator VALUES(NULL, '$nume', '$prenume', '$email', '$pass', NULL)";
    return mysqli_query($link, $query);
} 

function conectare($email, $pass)
{
   $link = conectareBd();
   $email = clearData($email, $link);
   $pass = clearData($pass, $link);
   $user = preiaUtilizatorDupaEmail($email);
   if($user){
      return md5($pass) === $user['parola'];
   }
return false;
}

function adaugaTask($titlu, $data, $tip, $descriere, $id_utilizator)
{
$link = conectareBD();
$titlu = clearData($titlu, $link);
$data = clearData($data, $link);
$tip = clearData($tip, $link);
$descriere = clearData($descriere, $link);
$query = "INSERT INTO task (titlu,data,tip,descriere,status,id_utilizator)  VALUES('$titlu','$data','$tip','$descriere','0',$id)";
//var_dump($query); die();
return mysqli_query($link, $query);
}



function preiaTaskuri()
{ 
$link = conectareBd();
$query = "SELECT * FROM task ";
$rezultat = mysqli_query($link, $query);
$taskuri = mysqli_fetch_all($rezultat, MYSQLI_ASSOC);
return $taskuri;
}

function preiaTaskuriDupaId($id)
{
    $link = conectareBd();
    $id = clearData($id, $link);
    $user = preiaUtilizatorDupaEmail($_SESSION['user']);
    $id2=$user['id']; 
    
    $query = "SELECT * FROM task WHERE id=$id2";
    
    $rezultat = mysqli_query($link, $query);
    $task = mysqli_fetch_array($rezultat, MYSQLI_ASSOC);
    
    return $task;
    
    
}



function adaugaPoza($poza)
{
    $link = conectareBd();
    $poza = clearData($poza, $link);
    $user = preiaUtilizatorDupaEmai($_SESSION['user']);
//    $id = $user['id'];
    $query = "UPDATE utilizator SET poza='$poza'";
    return mysqli_query($link, $query);
}
