RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN apt-get update && \
    apt-get install -y nano mc && \
    rm -rf /var/lib/apt/lists/*

# Установите параметры Xdebug
RUN echo "xdebug.mode=debug" >> /etc/php/8.1/cli/php.ini
RUN echo "xdebug.start_with_request=yes" >> /etc/php/8.1/cli/php.ini
RUN echo "xdebug.client_host=host.docker.internal" >> /etc/php/8.1/cli/php.ini
RUN apt-get update && apt-get install -y mc


