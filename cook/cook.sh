#!/bin/bash
echo "Starting the cooking process"
echo "Get processengine content"

#moving out to html from cook folder
cd ../

echo ""
echo "Moving processengine files."
#copy all WF project files to the engine folder
cp -rf prepare/WF-GO/* engine/
cp -rf prepare/WF-GO/WFGOcommitHistory.txt engine/
echo "Moving processengine files completed."

echo ""
echo "Starting to move Smoothflow files"

cp -rf prepare/SmoothFlow.io/* app/

echo "Moving smoothflow app files completed."
echo ""

echo "Starting to move Dependancies"

cp -rf prepare/v6engine-deps/* engine/src/

echo "Moving dependancies files completed."
echo ""
echo "Starting to move v6engine files"

cp -rf prepare/v6engine/* engine/src/duov6.com/

echo "Moving v6engine files completed."
echo ""
echo "Build processengine begins"

cd /var/www/html/engine/

if [  -f processengine ]; then
	rm processengine
fi

source /etc/profile

go build processengine.go > processengine.txt

echo "Building successful."
