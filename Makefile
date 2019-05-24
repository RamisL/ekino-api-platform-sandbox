.PHONY: test test-all install update clean dev bower load assets optimize

help:
	@echo "Please use \`make <target>' where <target> is one of"
	@echo "  infra-up       to start docker"
	@echo "  infra-shell-php-fpm    to start container php"


infra-up:
	docker-compose up -d --build

infra-shell-php-fpm:
	docker-compose exec -u www-data php sh

