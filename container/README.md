# Docker Container Setup for Roots Bedrock

This setup is designed to run Roots Bedrock on Docker with PHP, Node, MariaDB, and additional tools like WP-CLI.

## Prerequisites

- Docker
- Docker Compose

## Setup Instructions

1. Copy the `.env` file in this directory into the `site/` directory.
2. Navigate to the `container` directory.
3. Build and start the Docker Compose setup:

```sh
docker-compose up -d
```

example output
```sh
jasper@raspberrypi:~/code/imagewize.com/container $ docker compose up -d
[+] Running 5/5
 ✔ Network container_app-network  Creat...                                 0.2s 
 ✔ Container container-node-1     Started                                  1.5s 
 ✔ Container container-db-1       Started                                  1.7s 
 ✔ Container container-php-1      Started                                  1.3s 
 ✔ Container container-nginx-1    Started                                  1.9s
jasper@raspberrypi:~/code/imagewize.com/container $ docker ps --format "table {{.Names}}\t{{.Status}}\t{{.Ports}}"
NAMES               STATUS         PORTS
container-nginx-1   Up 2 minutes   0.0.0.0:80->80/tcp, :::80->80/tcp
container-php-1     Up 2 minutes   9000/tcp
container-node-1    Up 2 minutes   
container-db-1      Up 2 minutes   0.0.0.0:3307->3306/tcp, [::]:3307->3306/tcp
```

## Services

- **PHP**: PHP 8.3 with FPM, Composer, and WP-CLI.
- **Nginx**: Nginx 1.19.2 serving the Bedrock application.
- **MariaDB**: MariaDB 10.5 for the database.
- **Node**: Node.js with Volta for managing Node, npm, and Yarn versions.

## Volumes

- `node_binaries`: Mounted as read-only to `/usr/local/node`.
- `volta_home`: Mounted as read-only to `/usr/local/volta`.

## Networks

- `app-network`: A bridge network for inter-service communication.

## Additional Tools

- **WP-CLI**: Installed in the PHP container for managing WordPress from the command line.
- **Composer**: Installed in the PHP container for managing PHP dependencies.
- **Git**: Installed in the PHP container for version control and package downloads.

## User Configuration

The `www-data` user is properly configured in the PHP container:
- UID set to 1000 for host system compatibility
- Shell set to /bin/bash for interactive use
- Home directory at /srv/www/web (matches Bedrock application directory)
- Sudo access for WP-CLI commands
- Can be accessed via `su - www-data` for non-root operations

## Usage

- To access the PHP container (note the full container name):
  ```sh
  docker compose exec php bash
  # or using direct container name
  docker exec -it container-php-1 bash
  ```

> Note: The container name 'container-php-1' comes from:
> - 'container': directory name (project name)
> - 'php': service name
> - '1': instance number
>
> You can also set a custom project name using the COMPOSE_PROJECT_NAME environment variable
> or the `-p` flag with docker-compose commands.

- To switch to www-data user:
  ```sh
  su - www-data
  ```
- To run WP-CLI as www-data:
  ```sh
  wp <command>
  ```
- To access the Node container:
  ```sh
  docker compose exec node bash
  ```
- To access the MariaDB container:
  ```sh
  docker compose exec db bash
  ```

## Clean Up

To stop and remove all containers, networks, and volumes:
```sh
docker-compose down -v
```
````
