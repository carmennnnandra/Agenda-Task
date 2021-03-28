<!--meniu cu home, conectare, inregistrare
sablonare pt paginile din meniu -->
<nav id="meniu">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="index.php?page=1">Conectare</a></li>
        <li><a href="index.php?page=2">Inregistrare</a></li>
    </ul>
</nav>
<section id="continut">
<?php
if (isset($_GET['page'])){
    $page= $_GET['page'];
    if($page==1){
        require_once 'pagini/neconectat/conectare.php';
    }elseif($page==2) {
        require_once 'pagini/neconectat/inregistrare.php';
    }else{
        require_once 'pagini/neconectat/home.php';
    }
}

?>
</section>