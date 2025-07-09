#!/bin/bash

# Définir l'URL du dépôt Git (à adapter)
REPO_URL="https://github.com/1989nicolas/pattouneWEB.git"
version1="v0.5.0"
version2="V0.6.0"
# Cloner et lancer la version 0.5.0
git clone "$REPO_URL" projet-"$version1"
cd projet-"$version1"
git checkout "$version1"
php -S localhost:8001 > ../serveur-"$version1".log 2>&1 &
cd ..

# Cloner et lancer la version 0.6.0
git clone "$REPO_URL" projet-"$version2"
cd projet-"$version2"
git checkout version-"$version2"
php -S localhost:8002 > ../serveur-"$version2".log 2>&1 &
cd ..

echo "Serveur "$version1" lancé sur http://localhost:8001"
echo "Serveur "$version2" lancé sur http://localhost:8002"

# lancer gitbash dans le dossier test
# lancer le script ./lancer_serveurs.sh
