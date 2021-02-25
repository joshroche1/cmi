#!/bin/bash
# Installs AWS, Azure, Google Cloud Platform (GCP), and Oracle Cloud Infrastructure (OCI) CLI/SDK tools
# You will need API keys/tokens or login information in order to run the setup stripts.
# Several of them require you to be able to copy a URL into a browser or authentication; CTRL-C will kill the script in PuTTY so you will need to be able to copy responses without terminal input.

# AWS CLI
curl "https://awscli.amazonaws.com/awscli-exe-linux-x86_64.zip" -o "awscliv2.zip"
unzip awscliv2.zip
./aws/install
#snap install aws-cli

# Azure CLI
curl -sL https://aka.ms/InstallAzureCLIDeb | bash
#snap install azure-cli

# GCP SDK
RUN echo "deb [signed-by=/usr/share/keyrings/cloud.google.gpg] http://packages.cloud.google.com/apt cloud-sdk main" | tee -a /etc/apt/sources.list.d/google-cloud-sdk.list && curl https://packages.cloud.google.com/apt/doc/apt-key.gpg | apt-key --keyring /usr/share/keyrings/cloud.google.gpg  add - && apt-get update -y && apt-get install google-cloud-sdk -y
#echo "deb [signed-by=/usr/share/keyrings/cloud.google.gpg] https://packages.cloud.google.com/apt cloud-sdk main" | tee -a /etc/apt/sources.list.d/google-cloud-sdk.list
#apt-get install apt-transport-https ca-certificates gnupg -y
#curl https://packages.cloud.google.com/apt/doc/apt-key.gpg | sudo apt-key --keyring /usr/share/keyrings/cloud.google.gpg add -
#apt-get update && sudo apt-get install google-cloud-sdk -y

# OCI CLI
bash -c "$(curl -L https://raw.githubusercontent.com/oracle/oci-cli/master/scripts/install/install.sh)"

# AWS configuration
aws configure

# Azure configuration
az login

# GCP configuration
gcloud init

# OCI configuration
oci setup
