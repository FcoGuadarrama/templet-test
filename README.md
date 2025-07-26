# Sistema de Gestión de Leads

**Francisco Guadarrama Coronado**  
ingfranciscoguadarrama@gmail.com  
+52 229 243 6936  
26 de julio de 2025

---

## Prueba técnica para Templet.io

### Descripción general

Este proyecto consiste en un sistema básico de gestión de leads desarrollado con Laravel. La aplicación permite realizar operaciones CRUD: registrar nuevos leads mediante un formulario, visualizarlos en una tabla, editarlos y eliminarlos. También se incluye un endpoint API que permite consultar los leads en formato JSON.

---

## Tecnologías utilizadas

- Laravel 12
- PHP 8.4
- MySQL
- Tailwind CSS para estilos
- Blade, Eloquent y otras herramientas estándar del ecosistema Laravel

---

## Instalación

### Requisitos

Para ejecutar el proyecto, se debe contar con lo siguiente instalado:

- PHP 8.4 o superior
- Composer
- MySQL

---

## Pasos para poner en marcha el proyecto

1. Clonar el repositorio:

```bash
    git clone https://github.com/FcoGuadarrama/templet-test.git
    cd templet-test
    composer install
```

2. Copiar el archivo `.env`
```bash
  cp .env.example .env
```

3. Configurar las variables de entorno en el archivo `.env`, especialmente las relacionadas con la base de datos.

4. Correr migraciones y seeder para llenar la base de datos con un factory de 20 leads

```bash
    php artisan migrate --seed
```
5. Levantar el servidor de desarrollo
```bash
    php artisan serve
```

---

## Uso general

La aplicación cuenta con una interfaz acceseible desde la ruta `/`, donde se muestra una tabla con los leads registrados. Desde esta vista, se puede acceder al formulario para crear nuevos leads, así como editar o eliminar los existentes.

---

## Validación

- El campo email tiene validaciones estándar de emails, debe de ser único.
- El campo phone debe de ser único.

---

## API

Se proporciona un endpoint para la consulta de leads en formato JSON:

```bash
    GET /api/leads
```
Este endpoint permite aplicar filtros por correo electrónico y país mediante parámetros de consulta:
- `/api/leads?email=juan@test.com`
- `/api/leads?country=Mexico`
- `/api/leads?email=juan&country=Mexico`

---

## Tiempo invertido 

El desarrollo del proyecto tomó aproximadamente dos horas. La mayor parte del tiempo fue dedicada a ajustar la presentación de la interfaz con Tailwind CSS.

---

## Notas adicionales

Se utilizaron las características integradas de Laravel en la medida de lo posible, priorizando el uso de buenas prácticas y convencionees. La estructura del proyecto está pensada para facilitar su comprensión y mantenimiento. La generación de datos mediante Faker permite hacer pruebas sin necesidad de ingresar información manualmente.
