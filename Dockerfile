FROM php:8.3-cli

# Install git + unzip (needed for Composer)
RUN apt-get update && apt-get install -y \
    git unzip zip && \
    rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set workdir
WORKDIR /app

