<h1>Inregistrare</h1>
<form method="POST">
    <table>
         <tr>
            <td>Nume</td>
            <td>
                <input type="text" placeholder="Nume" name="name" required >
            </td>
            
        </tr>
        <tr>
            <td>Prenume</td>
            <td>
                <input type="text" placeholder="Prenume" name="last_name" required >
            </td>
            
        </tr>
        <tr>
            <td>Email</td>
            <td>
                <input type="email" placeholder="Email@gmail.com" name="email_utilizator" required >
            </td>
            
        </tr>
        
        <tr>
            <td>Parola</td>
            <td>
                <input type="password" placeholder ="Password" name="pass" required>
            </td>
        </tr>
        <tr>
            <th colspan="2">
                <input type="submit" name="inregistrare" value="Register">
                <br>
            </th>
        </tr>
        
    </table>
</form>




<?php
if(isset($_POST['inregistrare'])){
    $nume = $_POST['name'];
    $prenume = $_POST['last_name'];
    $email = $_POST['email_utilizator'];
    $parola = $_POST['pass'];
    if(trim($email) == null || trim($parola) == null){
        print '<h1 style="color:red">Email si parola nu pot fi nule</h1>';
        return;
    }
    $rezultatInregistrare = inregistrare($nume, $prenume, $email, $parola);
    if($rezultatInregistrare){
        print '<h1 style="color:green">Inregistrare cu succes</h1>';
        $_SESSION['email']=$email;
        $_SESSION['welcome'] = '<h1 style="color:green">Buna, te-ai inregistrat cu succes!</h1>';
        header("location:index.php");
    }else{
        print '<h1 style="color:red">Eroare la inregistrare</h1>';
    }
}
