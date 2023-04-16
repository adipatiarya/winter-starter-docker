init:
	make down && \
	make up && \
	cp env.default .env && sleep 15 && \
	make composer && \
	make migrate && \
	make admin
up:
	docker-compose up -d
down:
	docker-compose down --remove-orphan
migrate:
	docker exec wintercms-app php artisan winter:up
admin:
	docker exec wintercms-app php artisan winter:passwd admin 12345
backup:
	docker exec -i wintercms-mysql mysqldump -u winter -h mysql wintercms --no-tablespaces -ppassword > ./mysql/init_db.sql

dev-plugin:
	docker exec -i wintercms-app php artisan plugin:refresh Winter.Market
env:
	docker exec -i wintercms-app php artisan winter:env && php artisan key:generate
composer:
	docker exec wintercms-app composer install