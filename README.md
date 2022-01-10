# Curso Notificaciones
## Victor Arana | Coders Free | Código fuente del curso

### Tener en cuenta lo siguiente:

1. El comando para crear una notificación es el siguiente:
´php artisan make:notification MessageSent´


2. A veces es importante publicar librerias, en el tutorial publicamos 3, a continuación los ejemplos:

´php artisan vendor:publish --tag=jetstream-views´

´php artisan vendor:publish --tag=laravel-notification´

´php artisan vendor:publish --tag=laravel-mail´

3. En este proyecto también utilizamos JOBs para programar la acción de que los mensajes que se envían por e-mail se pongan en fila o cola y carguen luego mas rápido. Para esto lo primero que vamos a realizar es ir a la clase MessageSent de la notificación y hacer que extienda de ShouldQueue.

´class MessageSent extends Notification implements ShouldQueue´

4. Luego ejecutamos el siguiente código para crear una migración tabla job donde se guardaran las tareas pendientes por ejecutarse

´php artisan queue:table´

5. con el siguiente comando ponemos a trabajar los JOB

´php artisan queue:work´

### Crear migración por el canal DATABASE

1. Crear una migración: 
- php artisan notification:table


### Configuracion del canal Broadcast

1. Vamos a utilizar Pusher. Primero vamos a Config/app.php y luego vamos a buscar App/providers/broadcaster/serviceProvider y lo vamos a descomentar.

2. Debo configurar luego la cola.

3. Debo instalar uno de los driver que vamos a utilizar. Nosotros vamos a usar Pusher.
composer require pusher/pusher-php-server

4. Luego debo poner nuestras credenciales de pusher. Esto lo hacemos en la página oficial de Pusher.
y configurar el servidor con el canal creado. ENV

5. Luego debemos instalar laravel echo: npm install --save dev laravel-echo pusher-js
                                        

6. ir a la carpeta resource js y bootrap js

### instalación de paquete para SMS

- composer require laravel/nexmo-notification-channel nexmo/laravel
