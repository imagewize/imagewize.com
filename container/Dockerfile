FROM php:8.3.13-fpm-bookworm

# Set up www-data user properly
RUN usermod -u 1000 www-data && \
    usermod -s /bin/bash www-data && \
    mkdir -p /srv/www/web && \
    chown www-data:www-data /srv/www/web && \
    usermod -d /srv/www/web www-data

# PHP extensions for WordPress
RUN \
# Recommended extensions
  # curl
    # already built in and enabled
  # dom
    # already built in and enabled
  # exif
    # build and install using built-in docker script
    docker-php-ext-configure exif && \
    docker-php-ext-install -j$(nproc) exif && \
  # fileinfo
    # already built in and enabled
  # hash
    # already built in and enabled
  # json
    # already built in and enabled
  # mbstring
    # already built in and enabled
  # mysqli
    # build and install using built-in docker script
    docker-php-ext-configure mysqli && \
    docker-php-ext-install -j$(nproc) mysqli

RUN \
  # sodium
    # already built in and enabled
  # openssl
    # already built in and enabled
  # pcre
    # already built in and enabled
  # imagick (+GhostScript for PDF support)
    # install build dependencies
    apt-get update && \
    apt-get install -y \
        libmagickwand-dev \
        ghostscript \
        imagemagick \
        libmagickcore-dev \
        --no-install-recommends && \
    # Install specific stable imagick version compatible with PHP 8.3
    pecl install imagick-3.7.0 && \
    docker-php-ext-enable imagick && \
    # Verify imagick installation
    php -m | grep imagick && \
    # Configure policy to allow PDF operations
    { \
        echo '<?xml version="1.0" encoding="UTF-8"?>'; \
        echo '<policymap>'; \
        echo '  <policy domain="coder" rights="read|write" pattern="PDF" />'; \
        echo '  <policy domain="coder" rights="read|write" pattern="LABEL" />'; \
        echo '</policymap>'; \
    } > /etc/ImageMagick-6/policy.xml

RUN \
  # xml
    # already built in and enabled
  # zip
    # install build dependencies
    apt-get update && \
    apt-get install -y \
               libzip-dev \
             --no-install-recommends && \
    # build and install using built-in docker script
    docker-php-ext-install -j$(nproc) zip && \
    docker-php-ext-enable zip

RUN \
# fallback extensions
  # filter
    # already built in and enabled
  # gd
    # install build dependencies
    apt-get update && \
    apt-get install -y \
               libjpeg-dev \
               libpng-dev \
               libzip-dev \
               libfreetype6-dev \
             --no-install-recommends && \
    # build and install using built-in docker script
    docker-php-ext-configure gd \
             --with-freetype --with-jpeg && \
    docker-php-ext-install -j$(nproc) gd

RUN \
  # iconv
    # already built in and enabled
  # mcrypt
    # install build dependencies
    apt-get update && \
    apt-get install -y \
               libmcrypt-dev \
               git \
             --no-install-recommends && \
    # build and install from source
    mkdir -p /usr/src/php/ext/mcrypt && \
    curl -fsSL https://github.com/php/pecl-encryption-mcrypt/archive/master.tar.gz | tar xvz -C "/usr/src/php/ext/mcrypt" --strip 1 && \
    docker-php-ext-configure mcrypt && \
    docker-php-ext-install mcrypt

RUN \
  # simplexml
    # already built in and enabled
  # xmlreader
    # already built in and enabled
  # zlib
    # already built in and enabled
  # Trellis additional/differing extensions
  # opcache
    # build and install using built-in docker script
    docker-php-ext-configure opcache && \
    docker-php-ext-install -j$(nproc) opcache

# Install Composer, unzip, and git
RUN \
    apt-get update && \
    apt-get install -y unzip git --no-install-recommends && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    ln -s /usr/local/bin/composer /usr/local/bin/php-composer

# Install WP-CLI
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar && \
    chmod +x wp-cli.phar && \
    mv wp-cli.phar /usr/local/bin/wp && \
    # Create wp-cli directory for www-data user
    mkdir -p /srv/www/.wp-cli && \
    chown www-data:www-data /srv/www/.wp-cli

# Create WP-CLI wrapper script to run as www-data
RUN echo '#!/bin/sh' > /usr/local/bin/wp-cli && \
    echo 'su -s /bin/bash www-data -c "wp $*"' >> /usr/local/bin/wp-cli && \
    chmod +x /usr/local/bin/wp-cli

# Install required tools
RUN apt-get update && \
    apt-get install -y \
        sudo \
        less \
    --no-install-recommends

# Configure sudo for www-data
RUN echo "www-data ALL=(ALL) NOPASSWD: /usr/local/bin/wp" >> /etc/sudoers.d/wp-cli && \
    chmod 0440 /etc/sudoers.d/wp-cli

# Extra clean ups
RUN apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# For Bedrock
WORKDIR /srv/www/web

