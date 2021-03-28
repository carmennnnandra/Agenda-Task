<h1>Lista taskuri</h1>
<?php

$taskuri = preiaTaskuri();
if(count($taskuri) == 0){
    print "Niciun task salvat pentru dvs!";
    return;
}
?>

<table>
    <tr>
        <th>Titlul</th>
        <th>Data</th>
        <th>Tipul</th>
        <th>Descrierea task-ului</th>
    <br>
    <a href="pagini/conectat/adaugare_task.php">Adauga un task</a>
    <?php 
    foreach($taskuri as $task){
        ?>
    <tr>
        
        <td><?php print $task['titlu'];?></td>
        <td><?php print $task['data'];?></td> 
         <td><?php print $task['tip'];?></td>
          <td><?php print $task['descriere'];?></td>
           <td><a href="index.php?id=<?php print $task['id'];?>">Termina task</a></td> 
           
    </tr>
    
    <?php
    }
    ?>
</table>