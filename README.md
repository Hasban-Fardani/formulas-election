<h1 align="center">Simple Laravel Election</h1>

## Requirement 
1. php v8.2 or higher
2. mysql v8.0 or higher
3. composer
3. bun / npm / deno

## Installation
1. clone this repo
```bash
git clone https://github.com/Hasban-Fardani/simple-laravel-election.git
```
2. copy .env.example to .env
```bash
cp .env.example .env
```
3. edit .env file
4. install dependencies
```bash
composer install

npm install 
# or
bun install
```
5. generate key
```bash
php artisan key:generate
```
6. migrate database
```bash
php artisan migrate
```
7. optimize (optional)
```bash
php artisan optimize
```

## Routes
- GET /
  
  it will redirect to /login

- GET /login
- GET /home
- GET /election/<election_id>
- GET /admin
- GET /admin/election
- GET /admin/user