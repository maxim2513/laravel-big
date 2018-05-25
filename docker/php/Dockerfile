FROM php:7.2-fpm-alpine

RUN apk add --no-cache freetype \
  lcms2-dev \
  libpng \
  libjpeg-turbo \
  freetype-dev \
  libjpeg-turbo-dev \
  libmcrypt-dev \
  mysql-client  \
  nodejs \
  nodejs-npm \
  zlib \
  zlib-dev \
  libwebp \
  libwebp-dev \
  nasm

RUN apk --no-cache add make bash g++ zlib-dev libpng-dev \
    &&  rm -fr /var/cache/apk/*

RUN npm install -g pngquant-bin cross-env webpack

RUN docker-php-ext-install pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php \
        && mv composer.phar /usr/local/bin/ \
        && ln -s /usr/local/bin/composer.phar /usr/local/bin/composer

USER root
COPY ./php.ini /usr/local/etc/php/conf.d/99-custom.ini
	
WORKDIR /var/www