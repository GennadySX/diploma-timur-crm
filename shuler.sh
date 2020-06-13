#!/usr/bin/bash



read -p "Enter artisan command: "  command;



sudo docker-compose exec myapp php artisan $command


