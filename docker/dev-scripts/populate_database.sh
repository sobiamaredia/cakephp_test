#!/bin/bash

USERNAME=admin
PASSWORD=admin
MYSQL_HOST=localhost

echo "mysql init script"
echo

MYSQL="mysql -u root -h ${MYSQL_HOST}"
RESULT=`${MYSQL} --skip-column-names -e "SHOW DATABASES LIKE 'cakephp_local'"`

echo "Checking if cakephp_local database exists"

# if cakephp_local does not exist then create it and add user.
if [[ "${RESULT}" != "cakephp_local" ]]; then
    echo "Creating skeleton database"
    ${MYSQL} -se "CREATE USER '${USERNAME}'@'%' IDENTIFIED BY '${PASSWORD}'"
    ${MYSQL} -se "GRANT ALL PRIVILEGES ON *.* TO '${USERNAME}'@'%'"
    ${MYSQL} -se "FLUSH PRIVILEGES"
    ${MYSQL} -s < ./dev-scripts/initial-database.sql
fi

echo "Done initial database population check"

echo
echo
