# cmi
Cloud Management Interface Project
========================================
Web application for managing remote servers, cloud services, and hypervisors.

Components:
- Ansible
- AWS CLI, Google Cloud SDK, Azure CLI, Oracle CLI
- Apache 2 HTTP server
- PHP
- jQuery / AppML

========================================

Functions:
- Add, Change, Delete VMs from management
  + use local running user SSH key (ssh-copy-id) for access
- Add, Change, Delete Cloud Providers/Hypervisors
  + use AWS CLI, GCP CLI, Azure CLI, OCI CLI programs and run shell commands thru Ansible
- Update/Upgrade VMs
- Add/Delete VMs from Cloud Providers/Hypervisors?
- Connect to VMs thru terminal (webmin?xterm.js?anyterm?) or open web page to VM
- Manage Users 
