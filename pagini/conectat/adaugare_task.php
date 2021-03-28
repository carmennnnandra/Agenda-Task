<h1>Adauga un task</h1>
<form method="POST" enctype="multipart/form-data">
    <table>
        <tr>
            <td><label for="titlu">Titlu</label></td>
            <td><input type="text" name="titlu" placeholder="Titlul task-ului"/></td>
        </tr>
        <tr>
            <td><label for="data">Data pentru indeplinirea task-ului</label></td>
            <td><input type="date" name="data" required/></td>
        </tr>
        <tr>
            <td><label for="tip">Tipul task-ului</label></td>
            <td>
                <select type="text" name="tipul" required="">
                    <option value="task">Task</option>
                    <option value="event">Eveniment</option>
                    <option value="reminder">Reaminteste-mi</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Descrierea tipului de task</td>
            <td>
                <textarea name="descriere" rows="4" cols =" 20">Descrierea task-ului</textarea>
            </td>
        </tr>
       <tr>
        <th colspan="4">
        <input type="submit" name="submitTask" value="Adauga task"/>
        </th>
       </tr>
    </table>
</form>
<?php
if (isset($_POST['submitTask'])){
   $titlu = $_POST['titlu'];
   $data = $_POST['data'];
   $tip = $_POST['tipul'];
   $descriere = $_POST['descriere'];
   $rezultatAdaugareTask = adaugaTask($titlu, $data, $tip, $descriere);
   $user = preiaUtilizatorDupaEmail($_SESSION['user']);
   $id=$user['id'];
   if($rezultatAdaugareTask){
       print '<h3 style="color:green">Inregistrare cu succes a task-ului</h3>';
   }else{
       print '<h3 style="color:red">Eroare la inregistrarea task-ului</h3>';
       
   }
}
