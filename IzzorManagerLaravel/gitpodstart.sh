#!/bin/bash
export MYSQL_PWD=$(grep -oP 'DB_PASSWORD=\K.*' .env)
export MYSQL_USER=$(grep -oP 'DB_USERNAME=\K.*' .env)
# Instale o DDEV
brew install ddev/ddev/ddev

# Inicialize o projeto DDEV
ddev config --project-type=laravel

#Inicializa o ddev
ddev start -y

# Crie o banco de dados
