<!--meniu cu adaugare task, lista taskuri, vizualizare profil, deconectare
sablonare pt paginile din meniu, nu intra si deconectare aici la sablonare -->
<nav id="meniu">
    <ul>
        <li><a href="index.php">Lista task</a></li>
        <li><a href="index.php?page=1">Adauga un task</a></li>
        <li><a href="index.php?page=2">Vizualizare Profil</a></li>
        <li><a href="index.php?logout ">Log out</a></li>
    </ul>
</nav>
<section id="continut">
    <?php
    if(isset($_GET['logout'])){
        session_destroy();
        header("location:index.php"); 
        
    }
    if(isset($_SESSION['welcome'])){
        print $_SESSION['welcome'];
        unset($_SESSION['welcome']);
    }
    
    if(isset($_GET['page'])){
        $page = $_GET['page'];
        switch($page){
            case 1:
                require_once 'pagini/conectat/adaugare_task.php';
                break;
            case 2:
                require_once 'pagini/conectat/vizualizare_profil.php';
            default: 
                require_once 'pagini/eroare.php';
                
        }
    }else{
        require_once 'pagini/conectat/lista_taskuri.php';
    }
    ?>
</section>

