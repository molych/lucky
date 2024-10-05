php-stan:
	./vendor/bin/phpstan analyse

format:
	npm run prettier .  --write

lint-fix:
	npm run lint -- --fix

pint:
	./vendor/bin/pint

lint:
	npm run eslint --ext .js,.vue --ignore-path .gitignore --fix src
