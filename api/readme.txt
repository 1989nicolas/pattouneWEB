readme
-----------------
Documentation API
-----------------
URL : localhost/tests/api/animal
+ Méthode :
++ GET : 
+++ paramètre : pas besoin de paramètre
+++ résultat : liste des animaux actifs en base au format json avec les clefs-valeurs suivantes :
++++ id : entier unique représentant l'identifiant de l'animal
++++ nom : varchar représentant le nom de l'animal
++++ type : varchar représentant l'espèce de l'animal
++++ created_by : varchar représentant l'auteur de la création de l'animal
++++ created_date : date représentant la date de création
++++ actif : boolean représentant le statut de l'animal en base
++++ updated_by : varchar représentant l'auteur de la mise à jour
++++ updated_date : date représentant la date de mise à jour
++ PATCH :
+++ paramètre : fichier json contenant un tableau associatif [] avec liste de clef/valeur {} ou tableau de tableau [["...":"..."]]
++++ clefs-valeur attendues :
+++++ id_animal : obligatoire - entier - représentant l'identifiant de l'animal
+++++ updated_by : facultatif - varchar - représentant l'auteur de la mise à jour, si pas indiqué : sera "api"
+++ résultat : inactivation de l'animal donné en paramètre avec le nom donnée en paramètre pour auteur de mise à jour
++ POST :
+++ paramètre : fichier json contenant un tableau associatif [] avec liste de clef/valeur {} ou tableau de tableau [["...":"..."]]
++++ clefs-valeur attendues :
+++++ nom : obligatoire - varchar - représentant le nom de l'animal
+++++ type : obligatoire - varchar - représentant le type d'animal
+++++ created_by : facultatif - varchar - représentant l'auteur de la création de l'animal, si pas indiqué : sera "api"