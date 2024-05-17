FROM php:8.2-fpm

ENV TZ UTC

RUN apt-get update \
&& apt-get install -y \
locales \
curl \
wget \
zip \
git \
libfreetype6-dev \
libjpeg-dev \
libwebp-dev \
libxpm-dev \
libxslt-dev \
libmcrypt-dev \
libpng-dev \
libxml2-dev \
libzip-dev \
# remove package manager cache
&& rm -rf /var/lib/apt/lists/* && rm -rf /var/cache/apt \
# install php extensions
&& docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include \
&& docker-php-ext-install -j$(nproc) gd opcache zip intl \
# install composer
&& curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
# configure locale
&& echo "en_GB.UTF-8 UTF-8" > /etc/locale.gen \
&& locale-gen en_GB.UTF-8 \
&& dpkg-reconfigure --frontend=noninteractive locales \
&& /usr/sbin/update-locale LANG=en_GB.UTF-8 \
# configure timezone
&& echo "UTC" > /etc/timezone \
&& dpkg-reconfigure --frontend=noninteractive tzdata

# set locale environment variables
ENV LANG en_GB.UTF-8
ENV LANGUAGE en_GB.UTF-8
ENV LC_ALL en_GB.UTF-8

WORKDIR /var/www/html

CMD php-fpm
