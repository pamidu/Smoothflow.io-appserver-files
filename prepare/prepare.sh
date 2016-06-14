#!/bin/bash
echo "Starting to prepare the files required for Smoothflow"
echo "Branch name ": $1
echo ""

username="duobuilduser"
emailaddress="duobuilduser@duosoftware.com"
password="DuoS12345"

echo ""
echo "BEGIN REPO PULL SmoothFlow.io"

if [ ! -d "SmoothFlow.io" ]; then
	git clone -b $1 https://$username:$password@github.com/DuoSoftware/SmoothFlow.io.git
	cd SmoothFlow.io
	git log -20 --pretty=format:"%h%x09%an%x09%ad%x09%s" > DPDcommitHistory.txt
else
	cd SmoothFlow.io
	git pull
	git log -20 --pretty=format:"%h%x09%an%x09%ad%x09%s" > DPDcommitHistory.txt
fi
cd ../

echo "REPO pull completed"
echo ""
echo "BEGIN REPO PULL WF-GO"

if [ ! -d "WF-GO" ]; then
	git clone -b $1 https://$username:$password@github.com/DuoSoftware/WF-GO.git
	cd WF-GO
	git log -20 --pretty=format:"%h%x09%an%x09%ad%x09%s" > WFGOcommitHistory.txt
else
	cd WF-GO
	git pull
	git log -20 --pretty=format:"%h%x09%an%x09%ad%x09%s" > WFGOcommitHistory.txt
fi
cd ../
echo "REPO pull completed"
echo ""

echo "BEGIN REPO PULL v6engine-deps"
if [ ! -d "v6engine-deps" ]; then
	git clone https://github.com/DuoSoftware/v6engine-deps
	cd v6engine-deps
else
	cd v6engine-deps
	git pull
fi
cd ../
echo "REPO pull completed"
echo ""
echo "BEGIN REPO PULL v6engine"
if [ ! -d "v6engine" ]; then
	git clone https://github.com/DuoSoftware/v6engine
	cd v6engine
else
	cd v6engine
	git pull
fi
cd ../
echo "REPO pull completed"
echo ""
echo "Set permission to cook.sh"
cd ../
cd cook/
chmod u+x ./cook.sh
# curser in cook dicrectory
echo "permission given to cook.sh"
echo ""
