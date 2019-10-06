# Project PPO php - Rendu
### Groupe
- Julien rata
- Sylvain Platet
- Colin Loury
- Loïc Roux


### Base de donnée accès
---
**HOST : remotemysql.com** 
**BD Name : mVrrTxQ5nS**
**id :** mVrrTxQ5nS
**pwd :** IL3tuUFSCQ

## Documentation
---
### Configuration du serveur ( ! )
Il faut pointer la racine du serveur sur SRC/ sinon php ne résoudra pas les namespace et leurs classes

**Constantes**<br>

- VF = Views/
- VFP = Views/partials/
- URI = url entier
- DOM = localhost:80

**MVC**<br>
![MVC](docs/consigne/MVC.jpg)


**Modèle**<br>
![Modèle](docs/consigne/GL3_1920_PHP_TP_noté_structures.PNG)

**Cas spécifique :**<br>
**&rarr; La jointure [Conntroller association s/s](SRC/Controllers/ControllerSecteursStructures.php)**
La Jointure séléctionne pour chaques colonnes certaines données et en rajoute d'autres s'il y a une association.<br>
On fusionne en quelque sorte les données communes (id équivalents) dans une case de tableau 
Les LEFT et RIGHT nous permettent de remplacer par des NULL les ID si il n'y a pas d'association entre les deux tables
On injecte ainsi dans les vues les données nécéssaires aux opérations CRUD avec seulement une requète SQL et deux boucles imbriquées

