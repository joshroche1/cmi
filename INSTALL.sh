#!/bin/bash
# run as root
# from Ubuntu 20.04 / Debian 10
apt-get update
apt-get upgrade -y
apt-get install apache2 php
apt-get install ansible -y

mkdir -p /var/www/html/resources/appml_models
mkdir -p /var/www/html/ansible/playbooks
mkdir /var/www/html/ansible/logs
cp 0.1/* /var/www/html/
cp -R resources/* /var/www/html/resources
cp ansible/playbooks/test_local.yml /var/www/html/ansible/playbooks/test_local.yml
