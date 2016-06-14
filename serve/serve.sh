#!/bin/bash
echo "Starting the serve process"

echo ""


cd ../


echo "Running source profile"
source /etc/profile
echo "Running source profile completed"
echo ""

echo "Starting ProcessEngine service"

cd engine/src/processengine/engine/
./processengine
