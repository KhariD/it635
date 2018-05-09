#!/bin/sh

echo "### Mysql Backup ###"

FILE=Used_Cars_BACKUP.sql.`date + "%y%m%d"`
DBSERVER=127.0.0.1
DATABASE=Used_Cars
USER=root
PASS=monkey

mysqldump --opt --protocol=TCP --user=${USER} --password=${PASS} --host=${DBSERVER} ${DATABASE} > ${FILE}

gzip $FILE

echo "${FILE} was created: "
ls -l ${FILE}