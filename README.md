# Flowboard

A full-stack Kanban board application inspired by Trello and Linear.

Flowboard is a learning project built to practice modern full-stack development using Laravel 13 and React 19 with a decoupled API architecture.

The project focuses on authentication, API design, authorization, caching, queues, realtime communication, and production-ready development practices.
---


## Tech Stack

### Backend

- Laravel 13
- PHP 8.3+
- MySQL 8
- Redis

### Frontend

- React 19
- TypeScript
- Vite

### Tools

- Git
- GitHub

## Architecture

This project follows a decoupled architecture.

- Laravel provides a RESTful JSON API.
- React consumes the API as a Single Page Application (SPA).
- Authentication is handled using Laravel Sanctum.
- Data is stored in MySQL.
- Redis is used for caching, queues, and realtime features.

## Project Structure

```
flowboard/
│
├── flowboard-api/
│   ├── app/
│   ├── routes/
│   ├── database/
│   └── ...
│
└── flowboard-web/
    ├── src/
    ├── public/
    └── ...
```

- **flowboard-api/** → Laravel REST API
- **flowboard-web/** → React Single Page Application

## Getting Started
## Installation

### 1. Clone the repository

```bash
git clone <repository-url>
cd flowboard
```

### 2. Install flowboard-api

```bash
cd flowboard-api
composer install
cp .env.example .env
php artisan key:generate
```

### 3. Install flowboard-web

```bash
cd ../flowboard-web
npm install
```

## Git Workflow

This project follows a simple Git branching strategy:

- **main** → Stable production-ready code.
- **feature/*** → Used for developing new features.

### Example

```text
main
 ├── feature/authentication
 ├── feature/boards
 ├── feature/cards
 └── feature/realtime
```
## Progress

### Phase 0 – Environment & Scaffolding

- [x] Laravel API created
- [x] React application created
- [x] Backend and frontend connected
- [x] API endpoint tested
- [x] CORS configured
- [x] Git repository initialized
- [x] .gitignore created
- [x] README created
- [ ] First commit
- [ ] GitHub repository connected
- [ ] Branching strategy applied



## Roadmap

- [x] Phase 0 – Environment & Scaffolding
- [ ] Phase 1 – Authentication
- [ ] Phase 2 – Core Domain & CRUD
- [ ] Phase 3 – Redis
- [ ] Phase 4 – Realtime Collaboration
- [ ] Phase 5 – Polish & Depth
- [ ] Phase 6 – Production Readiness

## Author

**Mariam Mahrous**

GitHub: 

