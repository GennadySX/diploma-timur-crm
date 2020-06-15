#!/usr/bin/env bash

d=`date +"%d-%m"`


read -p " enter commit message: " mess


git add .

git commit -m "TimCRM -$d -pg  :$mess"


git push -u origin master
