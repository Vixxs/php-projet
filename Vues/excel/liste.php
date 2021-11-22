<?php
session_start();
$_SESSION['list'] = $A_vue['excel'];
?>

<main>
    <section class="box">
    <h2>Liste des éleves</h2>
    <?php
    if(isset($A_vue['excel']) && !empty($A_vue['excel'])){
        $_POST['list'] = $A_vue['excel'];
        foreach($A_vue['excel'] as $student){
            echo "<p class='student'>" . $student['civilite'] .' '. $student['nom'] .' '.  $student['prenom'] . "</p>";
        }
    }
    ?>
    </section>
    <form action="generate" method="POST">
        <label id="chunckLabel" for="chunck">Nombre d'éleve par groupe</label>
        <input class="number" type="number" name="chunck" required>
        <button type="submit">Générer</button>
    </form>
        <?php
         if(isset($A_vue['group']) && !empty($A_vue['group'])){
            echo "<section class='groups'>";
            echo "<h2>Groupes</h2>";
            foreach($A_vue['group'] as $key=>$group){
                echo "<section class='group'><h2>Groupe ". $key . "</h2>" ;
                foreach($group as $student){
                    echo "<p>". $student['civilite']  ." ". $student['nom'] ." ". $student['prenom']. "</p>";
                }
                echo "</section>";
            }
            echo "</section>";
         }
       
        ?>
</main>
