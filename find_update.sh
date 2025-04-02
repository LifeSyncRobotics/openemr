#!/bin/bash

# Define the time range in minutes (4 hours = 240 minutes)
TIME_RANGE=240

# Use the find command to locate files modified within the last 4 hours
echo "Finding files modified in the last $((TIME_RANGE / 60)) hours..."
find . -type f -mmin -$TIME_RANGE -print
