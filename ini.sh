#!/bin/bash

git clone https://github.com/DuoSoftware/Smoothflow.io-appserver-files.git
mv Smoothflow.io-appserver-files/* /var/www/html/

#set permisions to other scripts
chmod u+x /var/www/html/prepare/./prepare.sh
chmod u+x /var/www/html/cook/./cook.sh
chmod u+x /var/www/html/serve/./serve.sh