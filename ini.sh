#!/bin/bash

if [ -d "Smoothflow.io-appserver-files" ]; then 
	cd Smoothflow.io-appserver-files
	git pull
	cd ../
else
	git clone https://github.com/DuoSoftware/Smoothflow.io-appserver-files.git
fi

#copying files
cp -rf Smoothflow.io-appserver-files/* /var/www/html/

#set permisions to other scripts
chmod u+x /var/www/html/prepare/./prepare.sh
chmod u+x /var/www/html/cook/./cook.sh
chmod u+x /var/www/html/serve/./serve.sh