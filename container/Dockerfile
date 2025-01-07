FROM php:8.3.13-fpm-bookworm

# Set up www-data user properly
RUN usermod -u 1000 www-data && \
    usermod -s /bin/bash www-data && \
    mkdir -p /srv/www && \
    mkdir -p /home/www-data && \
    chown www-data:www-data /srv/www && \
    chown www-data:www-data /home/www-data && \
    usermod -d /home/www-data www-data

# Install all required system packages at once
RUN apt-get update && \
    apt-get install -y \
        mariadb-client \
        libmagickwand-dev \
        ghostscript \
        imagemagick \
        libmagickcore-dev \
        libzip-dev \
        libjpeg-dev \
        libpng-dev \
        libfreetype6-dev \
        libmcrypt-dev \
        git \
        unzip \
        sudo \
        less \
        --no-install-recommends

# Install PHP extensions
RUN \
    # exif
    docker-php-ext-configure exif && \
    docker-php-ext-install -j$(nproc) exif && \
    # mysqli
    docker-php-ext-configure mysqli && \
    docker-php-ext-install -j$(nproc) mysqli && \
    # imagick
    pecl install imagick-3.7.0 && \
    docker-php-ext-enable imagick && \
    # Configure imagick policy
    { \
        echo '<?xml version="1.0" encoding="UTF-8"?>'; \
        echo '<policymap>'; \
        echo '  <policy domain="coder" rights="read|write" pattern="PDF" />'; \
        echo '  <policy domain="coder" rights="read|write" pattern="LABEL" />'; \
        echo '</policymap>'; \
    } > /etc/ImageMagick-6/policy.xml && \
    # zip
    docker-php-ext-install -j$(nproc) zip && \
    docker-php-ext-enable zip && \
    # gd
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install -j$(nproc) gd && \
    # mcrypt
    mkdir -p /usr/src/php/ext/mcrypt && \
    curl -fsSL https://github.com/php/pecl-encryption-mcrypt/archive/master.tar.gz | tar xvz -C "/usr/src/php/ext/mcrypt" --strip 1 && \
    docker-php-ext-configure mcrypt && \
    docker-php-ext-install mcrypt && \
    # opcache
    docker-php-ext-configure opcache && \
    docker-php-ext-install -j$(nproc) opcache

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    ln -s /usr/local/bin/composer /usr/local/bin/php-composer

# Install WP-CLI
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar && \
    chmod +x wp-cli.phar && \
    mv wp-cli.phar /usr/local/bin/wp && \
    # Create wp-cli directory for www-data user in proper location
    mkdir -p /srv/www/.wp-cli && \
    chown www-data:www-data /srv/www/.wp-cli

# Create WP-CLI wrapper script to run as www-data
RUN echo '#!/bin/sh' > /usr/local/bin/wp-cli && \
    echo 'su -s /bin/bash www-data -c "wp $*"' >> /usr/local/bin/wp-cli && \
    chmod +x /usr/local/bin/wp-cli

# Configure sudo for www-data
RUN echo "www-data ALL=(ALL) NOPASSWD: /usr/local/bin/wp" >> /etc/sudoers.d/wp-cli && \
    chmod 0440 /etc/sudoers.d/wp-cli

# Extra clean ups
RUN apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# For Bedrock
WORKDIR /srv/www/web

