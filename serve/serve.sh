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

#give permission to all files to execute
chmod 777 *
./processengine
