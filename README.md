# Find Itinerary

```
php index.php() . // Not working properly since you need to pass actual JSON
```

Unit tests can be run by the following command:
```
vendor/bin/phpunit tests/
```

Assumptions made:
```
1. Tickets will be sent to this API as JSON
2. Tickets will be stored in some DB with the following schema: Id, Departure, Arrival, Action, Description
```