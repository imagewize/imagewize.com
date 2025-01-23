# Imagewize

Custom web design and e-commerce solutions, crafted with WordPress and WooCommerce. We're a digital agency specializing in creating beautiful, high-performing websites that drive results.

## About Us

Since our founding, we've had the privilege of working with outstanding clients across multiple countries, including:
- The Netherlands
- Belgium
- United States
- Denmark

Our expertise spans custom web design, e-commerce solutions, and digital strategy, helping businesses establish a strong online presence.

## Technical Stack

This repository contains the complete setup for imagewize.com, built using the modern WordPress stack by Roots.io, including:

- **Trellis**: Server provisioning and deployment ([See Trellis README](trellis/README.md))
- **Bedrock**: Modern WordPress boilerplate ([See Bedrock README](site/README.md))
- **Sage 10**: Modern WordPress theme framework with our custom theme Nyneave

## Requirements

- PHP >= 8.1
- Composer
- Node.js >= 16
- Yarn or NPM
- Ansible >= 2.10 (for Trellis)
- Virtualbox & Vagrant or Limactl (for local development)

## Getting Started

1. Clone this repository
2. Follow the setup instructions in the respective component READMEs:
   - For server setup: [Trellis README](trellis/README.md)
   - For WordPress setup: [Bedrock README](site/README.md)
3. Alternatively, you can also use Lando for local development:
   - We rely on the default Roots `.lando.yml` config, but may update it to use Nginx and other tweaks i.e. [Kaalma's config](https://github.com/rkaalma/roots-lando-bedrock-sage-bud-example/blob/main/.lando.yml)
   - This works well on Linux or any other platform
   - For theme development, run yarn commands locally (e.g. `yarn dev`, `yarn build`)
   - Other commands like wp or composer can be run with `lando wp` or `lando composer` Also see [Lando Documentation](https://docs.lando.dev/plugins/wordpress/config.html)

