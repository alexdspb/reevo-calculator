(Optional) Run Docker container if you don't have PHP installed:
```
docker compose up -d
docker exec -ti reevo-php bash
```

Run the calculation script (in the app/ directory):

```
php calc.php '5+2'
```

Run tests:
```
vendor/bin/phpunit tests/CalculatorTest.php
```
