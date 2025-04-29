## Hrm Tenant

### Overview:

The Hrm Tenant application is a critical component of your Hrm SaaS solution. It securely stores database credentials for individual Hrm company tenants, enabling them to maintain control over their data access.

### Installation:

1. **Prerequisites:** 

    Ensure you have a local development environment set up listed prerequisites:
    - PHP >= 8.2
    - php-curl
    - php-xml
    - php-mysql
    - php-mbstring
    - Laravel >= 10.0
    - MySql
    - Node >= 20.0
    - NPM >= 6.0
    - Composer >= 2.0
   
2. **Clone the Repository:**
    ```bash
    git clone git@bitbucket.org:mkrakib/hrm-tenant.git
    ```
3. **Install Dependencies:**
    ```bash
    cd hrm-tenant
    composer install
    ```
4. **Configuration:**

   - Database Configuration:

       Edit the `.env` file to configure your database connection details (host, database name, username, password).
       Consider using a secure environment variable management solution for production environments.
      
   - Application Configuration:
   
       Review the **config** directory for any additional application-specific configuration files.

5. **Database Migrations:**

    Run the following command to create the database tables:**
    ```bash
    php artisan migrate
    ```
6. **Run the seeder:**
    
    Run the following command to seed the database with sample data:
    ```bash
    php artisan db:seed
    ```
7. **Start the Application:**
    
    Run the following command to start the application:
    ```bash
    php artisan serve
    ```
    The application will be accessible at `http://localhost:8000`.

### Code Structure
- Have to strictly follow SOLID and DRY principles.
- Method should not have more than 15 lines of code with valid exception. Comment and line break will not be counted.
- Business logic will be on service class. There will be multiple services under namespaces if required

### Usage:
- This application primarily serves as a data store for tenant database credentials.
- Integration with other Hrm components likely happens through APIs or defined workflows.

## ABC
