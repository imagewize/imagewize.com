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
- **Git**: Installed in the PHP container for version control.

## User Configuration

The `www-data` user is properly configured in the PHP container:
- UID set to 1000 for host system compatibility
- Shell set to /bin/bash for interactive use
- Home directory at /var/www
- Sudo access for WP-CLI commands
- Can be accessed via `su - www-data` for non-root operations

## Usage

- To access the PHP container:
  ```sh
  docker-compose exec php bash
  ```
- To switch to www-data user:
  ```sh
  su - www-data
  ```
- To run WP-CLI as www-data:
  ```sh
  wp-cli <command>
  ```
- To access the Node container:
  ```sh
  docker-compose exec node bash
  ```
- To access the MariaDB container:
  ```sh
  docker-compose exec db bash
  ```

## Clean Up

To stop and remove all containers, networks, and volumes:
```sh
docker-compose down -v
```
