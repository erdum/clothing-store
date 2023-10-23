# Full Fledge E-Commerce Store

## Installation on local environment
- Clone the repository:
```bash
git clone https://github.com/erdum/clothing-store.git
```

- Instal Laravel and dependencies:
```bash
composer install
```

- Rename .env.example to .env
```bash
mv .env.example .env
```

- Create database and schema:
```bash
php artisan migrate
```

- Link app storage to public directory for accessing user uploaded content
```bash
php artisan storage:link
```

- Run the local server
```bash
php artisan serve
```



## License
This project is licensed under the [MIT License](./LICENSE).
## Support

- You may get an error when uploading an image "some function is undefined" this error is mostly some missing php module, in case of image uploading try install php-gd module.