#!/bin/bash
echo "Starting the serve process"

echo ""


cd ../


echo "Running source profile"
source /etc/profile
echo "Running source profile completed"
echo ""

echo "Starting ProcessEngine service"

cd /var/www/html/engine/

#remove all files which are in the size of 0 bytes
find . -size 0c -delete

#give permission to all files to execute
chmod 777 *
./processengine
