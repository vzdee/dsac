# DSAC | Despacho de Servicios y Asesoría Fiscal

Sistema web para la gestión de citas, clientes, servicios y archivos dentro de un despacho fiscal/contable, desarrollado en Laravel.

El objetivo principal del sistema es facilitar la administración de citas, el seguimiento de clientes y la consulta de documentación relacionada con cada cliente.

## Descripción general

DSAC permite que los clientes puedan solicitar citas en fechas y horarios disponibles, mientras que los contadores pueden gestionar sus citas asignadas, consultar información de clientes y visualizar archivos relacionados.

El administrador cuenta con acceso completo al sistema, permitiendo gestionar servicios, clientes, empleados, citas y archivos mediante operaciones CRUD.

![Imagen Landing](docs/img/dsac.png)

## Funcionalidades principales

* Landing page pública con información del despacho.
* Botones de acción para consultar servicios o solicitar una cita.
* Solicitud de citas por parte de clientes.
* Gestión de clientes y sus datos generales/fiscales.
* Almacenamiento y consulta de archivos relacionados con cada cliente.
* Gestión de servicios ofrecidos por el despacho.
* Gestión de citas con diferentes estados.
* Panel para contadores.
* Panel administrativo con control general del sistema.

## Tecnologías utilizadas

* Laravel 12
* Laravel Jetstream
* Livewire
* Tailwind CSS
* MySQL
* Spatie Laravel Permission
* Laravel Storage
* TallStackUI
* SweetAlert2
* Flowbite

## Instalación

Clonar el repositorio:

```bash
git clone URL_DEL_REPOSITORIO
```

Entrar a la carpeta del proyecto:

```bash
cd nombre-del-proyecto
```

Instalar dependencias de PHP:

```bash
composer install
```

Instalar dependencias de Node:

```bash
npm install
```

Copiar el archivo de entorno:

```bash
cp .env.example .env
```

Generar la clave de la aplicación:

```bash
php artisan key:generate
```

Configurar la conexión a la base de datos en el archivo `.env`.

Ejecutar migraciones:

```bash
php artisan migrate
```

Crear el enlace simbólico para archivos públicos:

```bash
php artisan storage:link
```

Ejecutar el proyecto en desarrollo:

```bash
composer run dev
```

## Estado del proyecto

El proyecto se encuentra en etapa de desarrollo inicial.

Actualmente se está definiendo la estructura principal del sistema, los módulos, las relaciones de la base de datos y el flujo general para la gestión de citas, clientes, servicios y archivos.