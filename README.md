# Planstin Portal

## About the project

### Libraries

Be familiar with the following libraries:

* DoctrineORM
* Symonfy Form Component

### Client Enrollment Steps

1. Business profile
1. Select services
1. Sign agreement
1. Set billing
1. Invite employees 

### Employee Benefit Enrollment

1. Click link in email
1. Select benefits
1. Sign agreement


## Installation Instructions

1. Configure homestead
    
    Use the typical homestead directions. Configure your instance to run on `planstin.test`.

2. Setup The Database

        $ php artisan doctrine:migrations:migrate

3. Test on `https://planstin.test`

## Deployment Instruction

1. Run Migrations
    
        $ php artisan doctrine:migrations:migrate

