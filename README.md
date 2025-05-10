<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Documentacion

Para la elaboracion de este crud se realizo lo siguiente:

## Instalar API
```bash
php artisan install:api 
```

## Crear migracion para la entidad
```bash
php artisan make:migration create_entidad_table
```

## Crear las tablas en la db
```bash
php artisan migrate
```

## Crear modelo de la tabla
```bash
php artisan make:model Entidad
```

## Crear el controlador
```bash
php artisian make:controller Api/entidadController
```

# Controlador de entidad

## POST
Para la creacion de una entidad se realizan las siguientes validaciones:

Datos requeridos:
- nombre, debe ser de tipo string, y tiene una longitud maxima de 100 caracteres
- descripcion, debe ser de tipo string, y tiene una longitud maxima de 1000 caracteres
- estado debe ser un string 'activo' o 'inactivo'

Si no se cumple estas reglas se arroja un error 400

Si cumple crea el registro

si no se crea correctamente se arroja un error

si se crea correectamente se retorna el objeto creado

## UPDATE

Lo valores son opcionales y deben cumplir las mismas validaciones que el metodo POST pero con la diferencia de que no todos son requeridos

# API

En la raiz del proyecto se encuentra un archivo llamdo `thunder_client.json` el cual se puede importar a la extension de Thunder Client de vscode para poder probar los endpoints de este poryecto