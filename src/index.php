<?php

use src\Autoloader;

const VF = 'Views/partials/';

//import 
require_once 'bootstrap.php';
Autoloader::register();

?>
<!DOCTYPE html>
<html lang="en">

<?php include(VF . "head.php"); ?>

<body>
    <div class="container">
        <?php include(VF . "navbar.php"); ?>

        <h2>Les structures</h2>
        <form action="">
        
        <table  class=" table table-striped"   style="border: 3px solid black; border-radius: 10px  " >
                        <thead>
                            <tr>

                                <th>Id</th>
                                <th>Nom</th>
                                <th>Rue</th>
                            </tr>
                        </thead>
                        <tbody class="mygrid-wrapper-div">
                            <?php
// pour chaque ligne (chaque enregistrement)

                            foreach ($objet as $row) {

// DONNEES A AFFICHER dans chaque cellule de la ligne
                                ?>
                                <tr>
                                    <td><?php echo $row['ID']; ?></td>
                                    <td><?php echo $row['NOM']; ?></td>
                                    <td><?php echo $row['RUE']; ?></td>
                                    <td>
                                        <button  name="id" value="<?php echo $row['ID']; ?>" class="btn btn-info">Détails</button>
                                    </td>
                                </tr>
                                <?php
                            } // fin foreach
                            ?>    
                        </tbody>
                    </table>  
                </form>

                <h2>Les secteurs</h2>
        <form action="">
        
        <table  class=" table table-striped"   style="border: 3px solid black; border-radius: 10px  " >
                        <thead>
                            <tr>

                                <th>Id</th>
                                <th>Libelle</th>
                                
                            </tr>
                        </thead>
                        <tbody class="mygrid-wrapper-div">
                            <?php
// pour chaque ligne (chaque enregistrement)

                            foreach ($objet as $row) {

// DONNEES A AFFICHER dans chaque cellule de la ligne
                                ?>
                                <tr>
                                    <td><?php echo $row['ID']; ?></td>
                                    <td><?php echo $row['LIBELLE']; ?></td>
                                    <td>
                                        <button  name="id" value="<?php echo $row['id']; ?>" class="btn btn-info">Détails</button>
                                    </td>
                                </tr>
                                <?php
                            } // fin foreach
                            ?>    
                        </tbody>
                    </table>  
                </form>
        <?php include(VF . "footer.php"); ?>
    </div>
</body>

</html>