FROM node:22

# Create directories
RUN mkdir -p /usr/local/node/bin && \
    mkdir -p /usr/local/node/lib

# Install Yarn globally with force
RUN npm install -g yarn --force

# Copy node executable and libs
RUN cp /usr/local/bin/node /usr/local/node/bin/ && \
    cp -r /usr/local/lib/node_modules /usr/local/node/lib/ && \
    ln -s ../lib/node_modules/npm/bin/npm-cli.js /usr/local/node/bin/npm && \
    ln -s ../lib/node_modules/yarn/bin/yarn.js /usr/local/node/bin/yarn && \
    chmod +x /usr/local/node/bin/*

# Add our custom bin directory to PATH
ENV PATH=/usr/local/node/bin:$PATH

WORKDIR /srv/www/web

# Optional check
RUN node --version && npm --version && yarn --version
