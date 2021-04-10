Pasos para la Instalación

<!-- ejecutar por consola -->
git clone https://github.com/LeoMarAlvarez api

cd api

composer install

cp .env-example .env

php artisan key:generate

<!-- configurar las credenciales de BD en el archivo .env -->

<!-- crear la bd usuarios_bd -->

php artisan migrate

php artisan db::seed

php artisan serve --host=localhost