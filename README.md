<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Laravel + Vue3 Blog

This is a blog fullstack project using PHP Laravel and SQLite database as a backend rest API and Vue 3 + TailwindCSS for frontend.

## Required for Laravel 11

-   Composer
-   PHP (>= 8.2) (`php.ini`)
    -   `Ctype` PHP Extension ``
    -   `cURL` PHP Extension (`curl`)
    -   `DOM` PHP Extension
    -   `Fileinfo` PHP Extension (`fileinfo`)
    -   `Filter` PHP Extension
    -   `Hash` PHP Extension
    -   `Mbstring` PHP Extension (`mbstring`)
    -   `OpenSSL` PHP Extension (`openssl`)
    -   `PCRE` PHP Extension
    -   `PDO` PHP Extension (`pdo_sqlite`, `pdo_mysql`, `pdo_pgsql`, etc...)
    -   `Session` PHP Extension
    -   `Tokenizer` PHP Extension
    -   `XML` PHP Extension
    -   `GD` PHP Extension (`gd`) (fake image creation)

## Development

Follow these steps to get this project live

## Development

Follow these steps to get this project live

```shell
git clone https://github.com/Koalhack/blog-ugozer.git
cd blog-ugozer
cp .env.example .env
composer install
npm install
```

```shell
php artisan storage:link
php artisan migrate
php artisan key:generate
```

> seed your database with data (Optional)
>
> ```shell
> php artisan migrate:fresh --seed
> ```

**Backend**: Launch this command in one terminal instance

```shell
php artisan serve
```

**Frontend**: Launch this command in another terminal instance

```shell
npm run dev
```

After go to this [url](http://127.0.0.1:8000) or type `http://127.0.0.1:8000` in your browser.

# Features

    1. Post (Create/Update/Delete)
    2. Category (Create/Delete)
    3. Image (Add/Delete)

# Backend

### Endpoints

    1. Post
        1 ) [POST] Create -> /api/post/create
        2 ) [PUT] Update -> /api/post/{id}/update
        3 ) [DELETE] Delete -> /api/post/{id}/delete
        4 ) [GET] Show -> /api/post/{id}
        5 ) [GET] All -> /api/posts

    2. Category
        1 ) [POST] Create -> /api/category/create
        2 ) [DELETE] Delete -> /api/category/{id}/delete
        3 ) [GET] All Paginate -> /api/categoriesPag
        4 ) [GET] All -> /api/categories

    3. Image
        1 ) [POST] Add -> /api/image/add
        2 ) [DELETE] Delete -> /api/image/{id}/delete
        3 ) [GET] All Paginate -> /api/imagesPag
        4 ) [GET] All -> /api/images

# Frontend

### Endpoints

```
├─ '/' (Index)
│  └─ /post/{slug}/{id} (Post Detail)
│
├─ '/admin/post' (List Post + Delete)
│　├─ /create (Add Post)
│　└─ /edit/{id} (Edit Post)
├─ '/admin/category' (List Category + Delete)
│　└─ /create (Add Category)
├─ '/admin/image' (List Image + Delete)
 　└─ /create (Add Image)
```

> Example
>
> ```
> http://127.0.0.1:8000 -> index
> http://127.0.0.1:8000/post/{slug}/{id} -> detail post
>
> http://127.0.0.1:8000/admin/post -> admin post
> http://127.0.0.1:8000/admin/category -> admin category
> http://127.0.0.1:8000/admin/image -> admin image
>
> http://127.0.0.1:8000/admin/post/create -> create post
> http://127.0.0.1:8000/admin/category/create -> create category
> http://127.0.0.1:8000/admin/image/create -> add image
>
> http://127.0.0.1:8000/admin/post/edit/{id} -> edit post
> ```
