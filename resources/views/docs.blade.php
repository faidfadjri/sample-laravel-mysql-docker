<!-- resources/views/blank.blade.php -->

@extends('app')

@section('content')
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div id="sidebar" class="h-screen w-1/6 bg-gray-800 p-6 sticky top-0 overflow-hidden">
            <h2 class="text-white text-lg font-semibold mb-10">Documentation</h2>

            <ul>
                <p class="text-gray-300 opacity-90">Getting started</p>
                <hr class="my-3">
                <li class="mb-2">
                    <a href="#nginx" class="text-gray-300 hover:text-white">What is NGINX ?</a>
                </li>
                <li class="mb-5">
                    <a href="#docker" class="text-gray-300 hover:text-white">What is Docker ?</a>
                </li>
                <p class="text-gray-300 opacity-90">Configuration</p>
                <hr class="my-3">
                <li class="mb-2">
                    <a href="#dockerfile" class="text-gray-300 hover:text-white">Setup Dockerfile</a>
                </li>
                <li class="mb-5">
                    <a href="#docker-compose" class="text-gray-300 hover:text-white">Setup docker-compose.yaml</a>
                </li>


                <li>
                    <a href="/" class="text-white underline">Back</a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-10 overflow-y-auto">
            <div class="flex flex-col gap-2 mb-10" id="nginx">
                <img src="https://logos-download.com/wp-content/uploads/2016/09/Nginx_logo.png" alt="nginx-logo" class="h-6 object-contain self-start mb-3">
                <p>
                    Nginx, pronounced as "Engine X," is an alternative web server to Apache. Nginx has advanced capabilities in managing websites with high traffic. Additionally, Nginx can process incoming requests in parallel.
                </p>

                <hr>
                <p>How it works ?</p>
                <img src="https://www.nginx.com/wp-content/uploads/2020/03/do-good-nginx-helps_nginx-topology.png" alt="nginx-workflows" class="self-start object-contain h-80">
                <a href="https://nginx.org/en/" class="text-sky-600 underline">Read official documentation</a>
            </div>

            <div class="flex flex-col gap-2 mb-10" id="docker">
                <img src="https://logos-world.net/wp-content/uploads/2021/02/Docker-Logo-2015-2017.png" alt="nginx-logo" class="h-24 object-contain self-start">
                <p>
                    Docker is a tool that enables us to create an application isolated from the underlying operating system. This means that within a container (the term used for an application's container in Docker), we can use various technologies with diverse versions, including programming languages, frameworks, operating systems, and so on, more quickly and flexibly without depending on the underlying operating system.
                </p>

                <hr>
                <p>How it works ?</p>
                <img src="https://d1jnx9ba8s6j9r.cloudfront.net/blog/wp-content/uploads/2018/11/Picture1-2.png" alt="nginx-workflows" class="self-start object-contain h-80">
                <a href="https://www.docker.com/" class="text-sky-600 underline">Read official documentation</a>
            </div>




            <div class="flex flex-col gap-2 mb-10" id="dockerfile">
                <h2 class="text-3xl font-bold">Setup Dockerfile</h2>
                <p>
                    First, we need to setup the Dockerfile. dockerfile contain information about our base images.
                    if you don't have an idea about what images actually is.

                    <hr>
                    Docker Image is an executable package of software that includes everything needed to run an application.
                    <span class="bg-sky-100 px-3 py-1 w-fit">for example: if you wan't to wrap your node application using docker then you need to use nodejs images</span>

                </p>

                <hr>
                <pre class="overflow-x-auto w-fit rounded bg-gray-100 border border-gray-200 px-8 mb-3">
                        <code class="language-yaml">
    # use PHP 8.2
    FROM php:8.2-fpm

    # Install common php extension dependencies
    RUN apt-get update && apt-get install -y \
        libfreetype-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        zlib1g-dev \
        libzip-dev \
        unzip \
        && docker-php-ext-configure gd --with-freetype --with-jpeg \
        && docker-php-ext-install -j$(nproc) gd \
        && docker-php-ext-install zip

    # Set the working directory
    COPY . /var/www/app
    WORKDIR /var/www/app

    # install composer
    COPY --from=composer:2.6.5 /usr/bin/composer /usr/local/bin/composer

    # copy composer.json to workdir & install dependencies
    COPY composer.json composer.lock ./
    RUN composer install

    # Set the default command to run php-fpm
    CMD ["php-fpm"]

                        </code>
                    </pre>


                    <h2 class="text-2xl font-bold">Code Explanation</h2>
                    <p>Before you start configuring Dockerfile, be carefull Dockerfile using indentation for their language so you may be see some issue if the indentation is not paste correctly</p>
                    <hr>
                    <p>- First we specify the base images in this case we are using <span class="font-semibold">php:8.2-fpm</span></p>
                    <p>- Then install the php "common" extension for laravel framework</p>
                    <p>- Copy all file from the root folder to <span class="font-semibold">"/var/www/app"</span> which the default path for nginx conf.</p>
                    <p>- Install composer for installing laravel needed dependencies and also copy composer.json and run <span>composer install</span></p>
                    <p>- Run default <span class="font-semibold">php-fpm</span> command. I don't have any idea it just follow the official documentation from docker hub
                    </p>
            </div>




            <div class="flex flex-col gap-2" id="docker-compose">
                <h2 class="text-3xl font-bold">Setup docker-compose.yaml</h2>
                <p>
                    Docker compose is another tools from docker that enabled us to managing multiple container for our application. we need it to managing nginx + php container.

                    <hr>

                    <pre class="overflow-x-auto w-fit rounded bg-gray-100 border border-gray-200 px-8 mb-3">
                        <code class="language-yaml">
version: "3"

networks:
  laravel:
    driver: bridge

services:
  nginx:
    image: nginx:alpine
    container_name: nginx
    restart: unless-stopped
    tty: true
    ports:
      - "7000:80"
    volumes:
      - ./nginx/default.conf:/etc/nginx/conf.d/default.conf
      - .:/var/www/app
    depends_on:
      - php
    networks:
      - laravel

  php:
    build:
      context: .
      dockerfile: Dockerfile
    container_name: php
    restart: unless-stopped
    tty: true
    expose:
      - "9000"
    volumes:
      - .:/var/www/app
    networks:
      - laravel
                        </code>
                    </pre>
                </p>
                <a href="https://docs.docker.com/compose/compose-file/compose-file-v3/" class="text-sky-600 underline">Read official documentation</a>
                <h2 class="text-2xl font-bold">Code Explanation</h2>
                    <p>Before you start configuring Dockerfile, be carefull Dockerfile using indentation for their language so you may be see some issue if the indentation is not paste correctly</p>
                    <hr>
                    <p>First we specify the docker-compose version in this case we are using version "3"</p>
                    <p>We defined the network for connecting two container in this case <span class="font-semibold">Nginx + php</span></p>
                    <hr>
                    <p>Then we create a <span class="font-semibold">services</span> which mean our container, nginx and php for laravel</p>
                    <p> -- inside container we define <span class="font-semibold">image we are using</span></p>
                    <p> -- <span class="font-semibold">name</span> of our container</p>
                    <p> -- inside nginx container we define <span class="font-semibold">restart: unless-stopped</span> which mean it always running until we stopped it</p>
                    <p> -- make <span class="font-semibold">tty = true</span> to enable us open the container terminal</p>
                    <p> -- specify specific port <span class="font-semibold">"EXPOSE_PORT":"CONTAINER_PORT"</span> we need to specify the EXPOSE_PORT which the port which will accessed through browser and the CONTAINER_PORT which the port inside of container</p>
                    <p> --> specify the volume. inside of <span class="font-semibold">nginx</span> we define two volume : </p>
                    <p> 1. for copy the nginx configuration from the localhost to the container</p>
                    <p> 2. make volume from the local to container</p>
                    <p class="bg-sky-100 w-fit py-1 px-3">if you notice the nginx and php have the same volume it make they can share the same folder</p>
                    <p> at nginx section we only run the existing image but for php we create a new container using current Dockerfile using <span class="font-semibold">build</span> </p>
            </div>
        </div>
    </div>
@endsection
