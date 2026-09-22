# Vehicle Service Tracker API

A RESTful API for tracking vehicle service history, built with Laravel and MySQL.

## Tech Stack

- **Backend:** Laravel 11 (PHP)
- **Database:** MySQL
- **Tools:** Composer, Artisan CLI

## Features

- Register and manage vehicles
- Track complete service history per vehicle
- Full CRUD operations for cars and service records
- Input validation and error handling
- Nested REST API structure

## API Endpoints

### Cars

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/api/cars` | Get all cars |
| POST | `/api/cars` | Add a new car |
| GET | `/api/cars/{id}` | Get a specific car |
| PUT | `/api/cars/{id}` | Update a car |
| DELETE | `/api/cars/{id}` | Delete a car |

### Service Records

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/api/cars/{car_id}/services` | Get all services for a car |
| POST | `/api/cars/{car_id}/services` | Add a service record |
| GET | `/api/cars/{car_id}/services/{id}` | Get a specific service record |
| PUT | `/api/cars/{car_id}/services/{id}` | Update a service record |
| DELETE | `/api/cars/{car_id}/services/{id}` | Delete a service record |

## Getting Started

### Requirements

- PHP 8.2+
- Composer
- MySQL

### Installation

1. Clone the repository:
```bash
   git clone https://github.com/wbRayyan/vehicle-service-tracker.git
   cd vehicle-service-tracker
```

2. Install dependencies:
```bash
   composer install
```

3. Copy environment file:
```bash
   cp .env.example .env
```

4. Configure your database in `.env`:
```env
   DB_DATABASE=vehicle_tracker
   DB_USERNAME=root
   DB_PASSWORD=
```

5. Generate app key:
```bash
   php artisan key:generate
```

6. Run migrations:
```bash
   php artisan migrate
```

7. Start the server:
```bash
   php artisan serve
```

API is now running at `http://127.0.0.1:8000`

## Example Usage

### Add a Car

```json
POST /api/cars

{
    "make": "BMW",
    "model": "3 Series",
    "year": 2023,
    "plate_number": "BMW-001"
}
```

### Add a Service Record

```json
POST /api/cars/1/services

{
    "service_date": "2024-01-15",
    "mileage": 15000,
    "service_type": "Oil Change",
    "notes": "Full synthetic oil used"
}
```
## Project Structure

```text
app/
├── Http/Controllers/
│   ├── CarController.php
│   └── ServiceRecordController.php
└── Models/
    ├── Car.php
    └── ServiceRecord.php
database/
└── migrations/
routes/
└── api.php


## Author

**Rayan Bhatti**
- GitHub: [@wbRayyan](https://github.com/wbRayyan)
- LinkedIn: [linkedin.com/in/wb-rayan-bhatti](https://linkedin.com/in/wb-rayan-bhatti)