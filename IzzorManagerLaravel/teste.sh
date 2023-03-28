export MYSQL_PWD=$(grep -oP 'DB_PASSWORD=\K.*' .env)
export MYSQL_USER=$(grep -oP 'DB_USERNAME=\K.*' .env)

echo ${MYSQL_USER}
echo a
ddev mysql -u root -proot -e "CREATE DATABASE catalogo"
echo ${MYSQL_PWD}