#!/bin/bash

# Script alternatif pour arrêter les serveurs PHP sur les ports 8001 et 8002 sans lsof

# Fonction pour arrêter un serveur PHP sur un port donné
arreter_serveur() {
  PORT=$1
  echo "Recherche de processus PHP sur le port $PORT..."

  PID=$(ps aux | grep "[p]hp -S localhost:$PORT" | awk '{print $2}')

  if [ -n "$PID" ]; then
    echo "Serveur trouvé (PID=$PID), arrêt en cours..."
    kill "$PID"
    echo "Serveur sur le port $PORT arrêté."
  else
    echo "Aucun serveur PHP trouvé sur le port $PORT."
  fi
}

# Appel pour les deux ports
arreter_serveur 8001
arreter_serveur 8002
