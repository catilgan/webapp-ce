# CodeOcean webapp

Open source software development platform with built-in version control, issue tracking. Build with laravel, self hosted on your own server.

## Requirements

* PHP >= 7.0
* Database Mysql, MariaDB, PostgreSQL, MSSQL
* NGINX or APACHE
* REDIS
* Docker
* CodeOcean-workhorse for GIT operations

## Installation

Install PHP dependencies

```bash
composer install
```

Install javascript dependencies

```bash
npm install
```

Update Javascripts and CSS scripts

```bash
npm run dev
```

Update Javascripts and CSS scripts for codebase theme

```bash
gulp build
```

For git features you will need install gitcity-workhorse

```
git clone https://github.com/gitcity-sk/gitcity-workhorse.git
cd gitcity-workhorse
php srv.php
```

## Configuration

All paths are sent to workhorse from webapplicaton. Open `.env` file (in webapp project folder) and add following lines (update paths as you need)

```
GIT_DATA=F:\data\Repositories\
GIT_SSH_KEYS=F:\data\Repositories\.ssh\
SPACES_DATA=F:\data\Spaces\
```

* Setup Database

Supported are Mysql, MariaDB, PostgreSQL, MSSQL. Edit `.env` file and setup credentials. If you dont have acces to sql server you can use `sqlite`.

* Setup web app application

```
php artisan key:generate
php artisan migrate
php artisan db:seed
```

* Run server and navigate to `localost:8000`.

```
php artisan server
```

## Contributing

1. Create issue in issue tracker. If you dont know what see directions section.
2. Fork it!
3. Create your feature branch: `git checkout -b my-new-feature`. Naming is `{issue-id}-{issue-title-without-spaces}`.
4. Commit your changes: `git commit -am 'Add some feature'`
5. Push to the branch: `git push origin my-new-feature`
6. Submit a pull request :)

## Directions

What to do?

* Next month
  * Add more tests
  * Finalize spaces (add views and controllers), single file uploading
  * Finalize ACL (roles and permissions)
  * Finalize issues (add assignees, allow to close/re-open issue)
  * Add mailers (when role, issue assigned)
* Next two months
  * Chunked upload to spaces

More will come.

## License

MIT
