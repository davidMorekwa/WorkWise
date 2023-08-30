# Workwise

Workwise is a job board website built using the Laravel framework. It provides a platform for job seekers to search and apply for jobs, as well as for employers to post job listings and find suitable candidates. This README file provides an overview of the project, its features, and instructions for setting up and running the application.

## Features

1. User Registration and Authentication:
   - Job seekers and employers can register and create their accounts.
   - Users can log in securely using their credentials.
   - Password reset functionality is available in case users forget their passwords.

2. Job Listings:
   - Employers can post job listings with detailed information such as job title, description, requirements, and company information.
   - Job seekers can browse and search for job listings based on various criteria such as job title, location, and category.
   - Pagination is implemented to display a limited number of job listings per page.

3. Job Applications:
   - Job seekers can apply for jobs by submitting their resumes and cover letters.
   - Employers can view and manage job applications received for their job listings.

4. User Profiles:
   - Users can create and manage their profiles with personal information and CVs.
   - Employers can view profiles of job applicants CVs once they make applications.

5. Email Notifications:
   - Users receive email notifications for account registration, password reset, and job application status updates.

## Prerequisites

Before running the Workwise Job Board application, make sure you have the following installed:

- PHP (>= 7.4)
- Composer
- MySQL (>= 5.7)
- Node.js (>= 12)
- NPM (>= 6)

## Getting Started

To get started with Workwise, follow these steps:

1. Clone the repository:

```bash
git clone https://github.com/your-username/workwise.git
```

2. Navigate to the project directory:

```bash
cd workwise
```

3. Install PHP dependencies:

```bash
composer install
```

4. Install JavaScript dependencies:

```bash
npm install && npm run dev
```

5. Create a copy of the `.env.example` file and rename it to `.env`. Update the database connection details in the `.env` file with your MySQL credentials.

6. Generate a new application key:

```bash
php artisan key:generate
```

7. Run database migrations and seed the database:

```bash
php artisan migrate --seed
```

8. Start the development server:

```bash
php artisan serve
```

9. Access the application by visiting `http://localhost:8000` in your web browser.

## Contributing

Contributions to the Workwise Job Board project are always welcome. If you find a bug or have suggestions for new features, please open an issue or submit a pull request.

## License

The Workwise Job Board project is open-source software licensed under the [MIT license](LICENSE).

## Contact

If you have any questions or inquiries, feel free to contact the project maintainer at [mwandajosiah@gmail.com & d.nyamongo11@gmail.com](mailto:your-email@example.com).

Thank you for using Workwise!
