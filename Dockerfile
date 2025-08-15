FROM php:8.3-cli-alpine

WORKDIR /app

COPY . /app

EXPOSE 10000

CMD ["sh", "-lc", "php -S 0.0.0.0:${PORT:-10000} -t /app"]
