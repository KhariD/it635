#!/bin/sh

echo "### Mysql Backup ###"

FILE=Used_Cars_BACKUP.sql.'date "+%y%m%d"'
DBSERVER=172.31.86.96
DATABASE=Used_Cars
USER=root
PASS=monkey

mysqldump --opt --protocol=TCP --user=${USER} --password=${PASS} --host=${DBSERVER} ${DATABASE} > ${FILE}

echo "${FILE} was created: "
ls -l ${FILE}