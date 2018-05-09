#!/bin/sh

echo "### Mysql Backup ###"

FILE=Used_Cars.sql.`date + "%Y%m%d"`
DATABASE=Used_Cars
USER=root
PASS=monkey

mysqldump --opt --protocol=TCP --user=${USER} --password=${PASS} ${DATABASE} > ${FILE}

gzip $FILE

echo "${FILE}.gz was created: "
ls -l ${FILE}.gz