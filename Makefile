up: docker-up
init: docker-down-clear docker-pull docker-build docker-up landing-init activity-init

docker-up:
	docker-compose up -d

docker-down:
	docker-compose down --remove-orphans

docker-down-clear:
	docker-compose down -v --remove-orphans

docker-pull:
	docker-compose pull

docker-build:
	docker-compose build

landing-init: landing-composer-install

landing-composer-install:
	docker-compose run --rm landing-php-cli composer install

activity-init: activity-composer-install activity-migrations

activity-composer-install:
	docker-compose run --rm activity-php-cli composer install

activity-migrations:
	docker-compose run --rm activity-php-cli php bin/console doctrine:migrations:migrate --no-interaction