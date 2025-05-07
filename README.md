# Proyecto Laravel - Gestión de Vehículos

Este proyecto Laravel está diseñado para la gestión de vehículos y clientes. A continuación, se detallan los pasos necesarios para la instalación y ejecución del entorno de desarrollo.

---

## Requisitos Previos

Antes de comenzar, asegúrate de tener instalado lo siguiente en tu sistema:

- PHP >= 8.1
- Composer
- Node.js y npm
- MySQL o cualquier motor de base de datos compatible

---

## Pasos de Instalación

1. **Clonar el repositorio**

```bash
git clone https://github.com/Kate1622/Vip_Cars.git
cd Vip_Cars

```
2. **Instalar dependencias de PHP con Composer**

```bash
composer install

```
3. **Instalar dependencias de frontend con npm**

```bash
npm install
```
4. **Copiar archivo de entorno y generar clave**

```bash
cp .env.example .env
php artisan key:generate

```
5. **Configurar el archivo .env**
    No olvidar crear la BD vipcars

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=vipcars
DB_USERNAME=root
DB_PASSWORD=

```

6. **Ejecutar migraciones**

```bash
php artisan migrate:fresh --seed
```

7. **Ejecutando Sistema**

```bash
php artisan serve
```

7. **Credenciales para entrar al sistema**

Usuario: admin@gmail.com
Password: 123456789


