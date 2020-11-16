FROM php:7.4.2-fpm
RUN apt-get update && apt-get install -y \
   vim \
   zip \
   unzip \
   iputils-ping \
   git

COPY ./php.ini /usr/local/etc/php/

RUN docker-php-ext-install pdo_mysql

#####################################
# GMP (GNU Multiple Precision):
#####################################


RUN apt-get update -yqq && \
apt-get install -y libgmp-dev && \
  docker-php-ext-install gmp

RUN apt-get update -yqq && \
apt-get install -y libicu-dev

RUN docker-php-ext-install intl


RUN apt-get install -y zlib1g-dev && apt-get install -y libzip-dev && \
    docker-php-ext-install zip

ENV COMPOSER_ALLOW_SUPERUSER 1;



RUN curl -s http://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer


# Node.jsをインストール
RUN curl -sL https://deb.nodesource.com/setup_10.x | bash -
RUN apt-get install -y nodejs

# yarnをインストール
RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add -
RUN echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list
RUN apt-get update && apt-get install yarn


#####################################
# GD
#####################################
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
    && docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd exif


