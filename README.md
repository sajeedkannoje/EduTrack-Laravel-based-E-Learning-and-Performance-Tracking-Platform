## Laravel E-Learning Quiz with Performance Tracking App

This Laravel project is an e-learning platform designed to facilitate quizzes, track performance, and manage content for both teachers and students. It supports three main roles: Super Admin, Teacher, and Student.

### Features

- **User Roles**: Super Admin, Teacher, and Student.
- **Teacher Functionality**: Signup/Login, Unique referral code generation, Content creation, Student progress monitoring, Donation section.
- **Student Functionality**: Signup/Login, Referral code usage during signup, Dashboard, Progress tracking, Access to material/content, Mini quizzes for each section, Mega quizzes for each module, Certificate download.
- **General Features**: Authentication and authorization system, Dashboard for teachers and students, Material/content management, Quiz management, Donation feature, Performance tracking, Referral system, Certificate generation, Monitoring tools.

### Setup

1. Clone the repository: `git clone https://github.com/yourusername/Laravel-e-learning-quiz-with-performance-tracking-app.git`
2. Install dependencies: `composer install`
3. Copy the `.env.example` file to `.env` and configure your environment variables, including database settings.
4. Generate application key: `php artisan key:generate`
5. Run migrations: `php artisan migrate`
6. Optionally, seed the database: `php artisan db:seed`
7. Start the development server: `php artisan serve`

### Usage

- Register as a Teacher or Student.
- Teachers can create content, monitor student progress, and manage donations.
- Students can access content, take quizzes, track their progress, and download certificates.

### Technologies Used

- Laravel
- MySQL
- Bootstrap (or any frontend framework of your choice)
- Other Laravel packages for additional functionalities (e.g., PDF generation).

### Contributing

Contributions are welcome! Please follow the [Contribution Guidelines](CONTRIBUTING.md).

### License

This project is licensed under the [MIT License](LICENSE).
