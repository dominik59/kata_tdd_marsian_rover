docker-compose down
docker-compose build
docker-compose up -d
docker-compose exec php bash -c 'echo GO TO DOCKER PROJECT DIRECTORY && \
cd /home/wwwroot/tdd && \
echo RUN COMPOSER INSTALL && \
composer install'

Read-Host -Prompt 'Press Enter to exit'