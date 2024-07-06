# Run without building

```php
com prod:start -- -o file.png
```

# Build portable file and run it

```php
com prod:build && \
php app.phar -o file.png
```