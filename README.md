# School Management System

A web-based School Management System built with Laravel.

> Status: Early stage — currently a fresh Laravel setup. Features below are planned.

## Features (Planned)

- Student management
- Teacher management
- Class & subject management
- Attendance tracking
- Exams & grading
- Fee management
- Announcements/notifications
- Role-based access (Admin, Teacher, Student, Parent)

## Requirements

- PHP >= 8.2
- Composer
- Node.js & npm
- MySQL

## Installation

```bash
git clone https://github.com/nowsher-uzzaman-nahid/school-management-system.git
cd school-management-system

composer install
npm install

cp .env.example .env
php artisan key:generate

php artisan migrate

npm run dev
php artisan serve
```

Visit `http://localhost:8000`.

## Roadmap

- [ ] Authentication & roles
- [ ] Student & teacher CRUD
- [ ] Attendance module
- [ ] Exams & grading
- [ ] Fee management
- [ ] Tests

## Contributing

Pull requests are welcome. Open an issue first for major changes.

## License

MIT (or your preferred license).
