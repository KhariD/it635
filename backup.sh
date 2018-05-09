#!/bin/bash/expect

mysql -u root -p
expect "Enter password: "
send "monkey"