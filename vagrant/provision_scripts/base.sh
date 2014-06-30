#! /usr/bin/env bash

# Apt
apt-get update

# Firewall Config
ufw default deny
ufw allow ssh
ufw allow http
ufw allow 443
ufw --force enable
