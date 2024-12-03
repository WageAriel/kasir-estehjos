ser:
	php artisan serve

dev:
	npm run dev
	
migrate:
	php artisan optimize:clear
	php artisan migrate:fresh --seed

cln:
	php artisan optimize:clear
