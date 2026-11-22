enter Space Booking System

Project Overview

Center Space Booking System is a web-based and mobile API booking management system that allows customers to browse centers, explore available spaces, and make bookings.

The system also provides an administrative dashboard for managing centers, spaces, employees, and customer bookings.

Main Features

1. Authentication and User Management

- Customer registration and login through REST API.
- Customer logout and profile retrieval.
- Super Admin account management.
- Employee management.
- Role-based access control.

2. Center Management

- Create, view, update, and delete centers.
- Manage center information and locations.
- Activate or deactivate centers.

3. Space Management

- Create, view, update, and delete spaces.
- Assign spaces to centers.
- Define space type, capacity, and hourly price.
- Manage space availability and maintenance status.

4. Booking Management

- Customers can create bookings through the API.
- Customers can view their own bookings.
- Customers can cancel eligible bookings.
- Employees can review bookings and confirm or reject them.
- Calculate booking prices based on duration and hourly price.
- Validate booking capacity and availability.

5. Dashboard

- View statistics about centers, spaces, employees, and customers.
- View booking statistics by status.
- Manage system data through a web interface.

User Roles

- Super Admin: Manages employees and the overall system.
- Employee: Manages centers, spaces, and bookings through the dashboard.
- Customer: Registers and manages bookings through the mobile application API.

Technologies Used

- PHP
- Laravel
- MySQL
- Laravel Sanctum
- REST API
- Blade
- Bootstrap
- HTML
- CSS
- JavaScript
- Postman
- Git and GitHub

Installation and Setup

1. Clone the Repository

git clone https://github.com/noursalehh/Center_Space_Booking_System.git

2. Navigate to the Project Folder

cd Center_Space_Booking_System

3. Install Dependencies

composer install

4. Configure Environment

Copy ".env.example" and create a new file named ".env".

Configure your database connection in the ".env" file.

5. Generate Application Key

php artisan key:generate

6. Run Migrations and Seeders

php artisan migrate --seed

7. Start the Development Server

php artisan serve

The application will be available at:

"http://127.0.0.1:8000"

API Endpoints

Authentication

Method| Endpoint| Description
POST| "/api/register"| Register a customer
POST| "/api/login"| Customer login
POST| "/api/logout"| Customer logout
GET| "/api/my-profile"| Get customer profile

Centers

Method| Endpoint| Description
GET| "/api/centers"| Get active centers
GET| "/api/centers/{id}"| Get center details

Spaces

Method| Endpoint| Description
GET| "/api/centers/{center}/spaces"| Get spaces of a center
GET| "/api/spaces/{id}"| Get space details

Bookings

Method| Endpoint| Description
POST| "/api/bookings"| Create a booking
GET| "/api/bookings"| Get customer bookings
GET| "/api/bookings/{id}"| Get booking details
PATCH| "/api/bookings/{id}/cancel"| Cancel a booking

Booking Statuses

- Pending
- Confirmed
- Rejected
- Cancelled

Authentication

The API uses Laravel Sanctum for token-based authentication.

Protected API endpoints require a valid Bearer Token.

Project Repository

"Center Space Booking System" (https://github.com/noursalehh/Center_Space_Booking_System)