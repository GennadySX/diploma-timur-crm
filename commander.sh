#!/usr/bin/bash



read -p "Enter  command: "  command;



sudo docker-compose exec myapp $command


