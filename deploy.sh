#!/usr/bin/env bash
source '.env';
docker-compose build;
docker-compose stop;
docker-compose up -d;
docker-compose exec -T php composer install --quiet;
docker inspect --format='{{.Name}} - {{range .NetworkSettings.Networks}} {{.IPAddress}}{{end}} - {{range $p, $conf := .NetworkSettings.Ports}} {{$p}} {{end}}' $(docker ps -aq)|grep $APP_NAME
