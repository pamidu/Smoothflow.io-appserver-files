#!/bin/bash
echo "Starting the serve process"

echo ""
echo "Moving smoothflow app files"

cd ../

cp -r prepare/SmoothFlow.io/* app/

echo "Moving smoothflow app files completed."

echo ""
echo "Running source profile"
source /etc/profile
echo "Running source profile completed"
echo ""

echo "Starting ProcessEngine service"

cd engine/src/processengine/engine/
./processengine
