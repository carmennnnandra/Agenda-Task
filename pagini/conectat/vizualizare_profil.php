<h1>Vizualizare profil</h1>
<?php
$user = preiaUtilizatorDupaEmail($_SESSION['user']);


?>
<table>
    <tr>
        <th>Nume</th>
        <th>Prenume</th>
        <th>Email</th>
    </tr>
    <?php
   
        print"<tr>";
        print "<td>" . $user['nume']."</td>";
        print "<td>" . $user['prenume'] . "</td>";
        print "<td>" . $user['email'] . "</td>";
        print "</tr>";       
    
    print "</table>";
    ?>
    <br/>
    <h1>Profilul dumneavoastra</h1>
    <img src ="imagini/picno.png" width="5px"/>
    <br/>
    <h1>Incarcare poza</h1>
    <form method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label for ="img">Imagine</label></td>
                <td><input type="file" id="img" name="img"/></td>
            </tr>
            <tr>
                <td><input type = "submit" name = "upload" value ="Upload"</td>
            </tr>
        </table>
    </form>
   <?php
//     $phpFileUploadErrors = array(
//        0 => 'There is no error, the file uploaded with success',
//        1 => 'Exceeds php.ini upload_max_filesize directive in php.ini ',
//        2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
//        3 => 'The uploaded file was only partially uploaded',
//        4 => 'No file was uploaded',
//        6 => 'Missing a temporary folder',
//        7 => 'Failed to write file to disk.',
//        8 => 'A PHP extension stopped the file upload.',
//    );
 
if (isset($_POST['upload'])){
    if(isset($_POST['img'])){
        if ($_FILES['img']['error'] == 0){
            switch ($_FILES['img']['type']){
           case 'image/jpg':
           case 'image/jpeg':
           case 'image/png':
           case 'image/bmp':
           case 'image/gif':
              $numeImagine = uniqid() . $_FILES['poza']['name']; 
              $salvareServer = move_uploaded_file($_FILES['poza']['tmp_name'],
                       'imagini/'. $numeImagine
                       );
              if($salvareServer){
                  $salvareBd=adaugaPoza($numeImagine);
                  if($salvareBd){
                      print 'Poza a fost adaugata cu succes';
                  }else {
                      unlink('imagini'. $numeImagine);
                      print "Eroare la salvare in baza de date";
                  }
              }else {
                  print 'Eroare la salvare pe server';
              }
              break;
           default:  'Fisierul nu este acceptat';
               break;
            }
        }else{
            print 'Eroare la salvare';
        }
    }
}
                  
                      
            
   