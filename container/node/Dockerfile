FROM node:22

# Create directories
RUN mkdir -p /usr/local/node/bin && \
    mkdir -p /usr/local/node/lib/node_modules && \
    mkdir -p /usr/local/volta

# Install Volta and configure environment
RUN curl https://get.volta.sh | bash && \
    echo 'export VOLTA_HOME="/usr/local/volta"' >> /root/.bashrc && \
    echo 'export PATH="$VOLTA_HOME/bin:$PATH"' >> /root/.bashrc

# Set Volta environment for current build
ENV VOLTA_HOME=/usr/local/volta
ENV PATH=$VOLTA_HOME/bin:$PATH

# Source Volta configuration and install tools
SHELL ["/bin/bash", "--login", "-c"]
RUN source /root/.bashrc && \
    volta install node@22 && \
    volta install npm && \
    volta install yarn

# Copy node, npm, yarn, and volta from base installation
RUN cp $(which node) /usr/local/node/bin/ && \
    cp $(which npm) /usr/local/node/bin/ && \
    cp $(which yarn) /usr/local/node/bin/ && \
    cp $(which volta) /usr/local/node/bin/ && \
    cp -r /usr/local/lib/node_modules/* /usr/local/node/lib/node_modules/

# Add our custom bin directories to PATH
ENV PATH=/usr/local/node/bin:/usr/local/volta/bin:$PATH

WORKDIR /srv/www/web

# Verify installations
RUN source /root/.bashrc && \
    node --version && \
    npm --version && \
    yarn --version && \
    volta --version
