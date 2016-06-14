#!/bin/bash
echo "Starting the cooking process"
echo "Get processengine content"

#moving out to html from cook folder
cd ../

#copy all WF project files to the engine folder
cp -r prepare/WF-GO/* engine/
cp -r prepare/WF-GO/WFGOcommitHistory.txt engine/

#if [ ! -d "bin" ]; then 
#	mkdir "bin" 
#else
#	rm -r bin
#	mkdir bin
#fi
#if [ ! -d "pkg" ]; then 
#	mkdir "pkg" 
#else
#	rm -r pkg
#	mkdir pkg
#fi
#if [ ! -d "src" ]; then 
#	mkdir "src" 
#fi


cd engine/src/

if [ ! -d "processengine" ]; then 
	mkdir "processengine" 
fi
if [ ! -d "duov6.com" ]; then 
	mkdir "duov6.com" 
fi

cd ../
cd ../

#cp -r prepare/WF-GO/src/processengine/* engine/src/processengine/
#cp -r prepare/WF-GO/WFGOcommitHistory.txt engine/src/processengine/

echo "Moving processengine files completed."
echo ""
echo "Starting to move Dependancies"

cp -r prepare/v6engine-deps/* engine/src/

echo "Moving dependancies files completed."
echo ""
echo "Starting to move v6engine files"

cp -r prepare/v6engine/* engine/src/duov6.com/

echo "Moving v6engine files completed."
echo ""
echo "Build processengine begins"

cd engine/src/processengine/engine/

if [  -f processengine ]; then
	rm processengine
fi

source /etc/profile

go build processengine.go > processengine.txt

echo "Building successful."
