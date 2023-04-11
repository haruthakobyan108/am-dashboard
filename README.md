# AM Dashboard

AM Dashboard is a lightweight admin dashboard designed specifically for account managers. It provides a user-friendly interface for managing users, organizations, and reports.

## Technologies Used

The following technologies were used to develop this project:

- PHP (Laravel)
- PostgreSQL
- Redis
- Docker Compose with Bash script for development

## Getting Started

To get started with the project, follow these steps:

1. Clone the project repository to your local machine.
2. Navigate to the project directory.
3. Run the following command to create and start all necessary containers for development:

``./bin/up.sh``

4. After the containers are running, run the following command to apply Laravel migrations:

``docker exec {php_container} php artisan migrate``

Alternatively, you can enter the PHP container interactively and run the migrations from there.


## Features

- Users management: Add, edit, and delete user accounts.
- Organizations management: Create, edit, and delete organizations.
- Business models management: Manage business models associated with each organization.
- Roles management: Assign roles to users for specific organizations.
- Reports: Generate reports based on user and organization data.

## Contributors

This project was developed by Harutyun Hakobyan.
