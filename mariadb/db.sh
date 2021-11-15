#!/bin/sh

mysql -u root -ppassword -e "CREATE DATABASE IF NOT EXISTS injection"
mysql -u root -ppassword -D injection < /var/lib/mysql/injection.sql