# Makefile
test:
	php app/console cache:clear --env=test
	php app/console doctrine:database:create --env=test
	phpunit -c app
	php app/console doctrine:database:drop --force --env=test
