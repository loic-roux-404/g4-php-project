# Project PPO php - Rendu

### Base de donnée accès
---
**HOST : remotemysql.com**<br>
**BD Name : mVrrTxQ5nS**
**id :** mVrrTxQ5nS<br>
**pwd :** IL3tuUFSCQ

### Docs
---
**Constantes**

-  VF = 'Views/';
-  MD = 'Models/';



**MVC**<br>
![MVC](docs/consigne/MVC.jpg)


**Modèle**<br>
![Modèle](docs/consigne/GL3_1920_PHP_TP_noté_structures.PNG)



**Cas spécifique association secteurs structures**<br>
&rarr; La jointure [Conntroller association s/s](SRC/Controllers/ControllerSecteursStructures.php)
Jointure récupérant toutes les données des tables associées
Fusionne les données en communs (id équivalents) dans une case de tableau 
On injecte ainsi dans les vues les données nécéssaires aux traitement
Les LEFT et RIGHT nous permettent de remplacer par des NULL si il n'y a pas d'association entre les deux tables
Aisni on se contente d'une seule requète SQL
