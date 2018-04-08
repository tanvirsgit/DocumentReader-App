FROM php:7.2.3-stretch

LABEL maintainer="himuhasib@gmail.com"

# Install gnupg, we need gnupg to add Yarn's public key
RUN apt-get update && apt-get install -y gnupg

RUN curl -sL https://deb.nodesource.com/setup_8.x | bash -E -
RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add -
RUN echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list
 
 #updating and installing the required platforms
RUN apt-get update && apt-get install -y \
        g++ \
        nodejs \
        rsync \
        tar \
        yarn \
        zip

# Install PDO extension
RUN docker-php-ext-install pdo_mysql


# Install composer
ADD getcomposer.sh getcomposer.sh
RUN chmod u+x getcomposer.sh
RUN ./getcomposer.sh
RUN mv composer.phar /usr/local/bin/composer

# Clearing up
RUN rm getcomposer.sh
RUN apt-get remove -y gnupg && apt-get autoremove -y && apt-get clean -y


# Add project
# adding the zip folder the docker
ADD detapp.zip /var/www/detapp.zip 
#unzipping the zip folder and directing to a destination.   
RUN unzip /var/www/detapp.zip -d /var/www/
WORKDIR /var/www/detapp
CMD php artisan serve --host=0.0.0.0 --port=8000