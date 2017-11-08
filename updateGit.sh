#!/bin/sh
MESSAGE=$1
git commit -a -m MESSAGE
git push origin master