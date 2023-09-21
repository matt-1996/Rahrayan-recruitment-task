## Rahrayan SMS Service

This Project is Based on Rahrayan recruitment task

## Installation

- Run: composer install
- Set .env Variables
- Run docker-compose build && docker-compose up

## After Instalation Commands

- Run: docker exec -it sms_app bash
- Run: php artisan migrate
- Run: docker exec -it sms_redis bash
- Run: redis-server --port 6380
