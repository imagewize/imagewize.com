# Imagewize.com

This repository contains the complete setup for imagewize.com, built using the modern WordPress stack by Roots.io, including Trellis, Bedrock, and Sage 10.

## Requirements

Trellis needs to run on a clean VPS, Ubuntu 24.0.4 LTS will do. Also SSH access is needed using your SSH public key. This package is all set up for that. Other teammates can always be added at a later stage.

- PHP >= 8.1
- Composer
- Node.js >= 16
- Yarn or NPM
- Ansible >= 2.10 (for Trellis)
- Virtualbox & Vagrant (for local development)

## Installation

Just like with any Trellis installation the provisioning and deployment should be done using its instructions. 


## Components

### Trellis
Trellis provides server provisioning and deployment tools using Ansible. It creates a consistent, secure WordPress hosting environment with:

- Limactl for local developemnt
- Nginx
- PHP 8.2
- MariaDB
- SSL via Let's Encrypt
- Automated deployments
- Server hardening

### Bedrock
Bedrock is a modern WordPress boilerplate that improves the folder structure and security:
- Dependency management with Composer
- Environment variables using dotenv
- Enhanced security practices
- Better folder organization
- Modern development workflows

### Nyneave
Nyneave is a Sage 10 based theme featuring all the goodies it has to offer and more:
- Laravel Blade templating
- Modern frontend tooling with Webpack
- WP Acorn for Laravel Integration
- Tailwind CSS
- Bud for asset compilation
- Yarn for package management
- Log1x Navigation
- Blade UI Icons
- WooCommerce

