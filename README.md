# Sistema Municipal — Laravel 11 + Livewire + MySQL
## Sistema de Gestión Municipal Integrado

Sistema completo con autenticación, dashboard con gráficos (ApexCharts), 
y todos los módulos municipales: Mesa de Partes, Predios, Licencias, 
Caja/Recaudación, RRHH/Planillas, Panel de Admin, Editor de Documentos y 
generación de 6 tipos de PDF editables.

---

## Stack técnico
- **Backend:** Laravel 11 + Livewire 3
- **Frontend:** Tailwind CSS 3 + Alpine.js + ApexCharts (CDN)
- **BD:** MySQL 8
- **PDFs:** barryvdh/laravel-dompdf
- **Roles:** spatie/laravel-permission
- **Fotos:** Storage local de Laravel (public disk)

---

## Instalación rápida

```bash
# 1. Descomprime y entra a la carpeta
cd municipalidad-sistema

# 2. Dependencias PHP
composer install

# 3. Dependencias JS
npm install

# 4. Entorno
cp .env.example .env
php artisan key:generate

# 5. Crear BD en MySQL
# CREATE DATABASE municipalidad_sistema CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
# Edita DB_USERNAME y DB_PASSWORD en .env

# 6. Migrar y poblar datos demo
php artisan migrate --seed

# 7. Enlace de storage (para fotos de perfil)
php artisan storage:link

# 8. Compilar y servir
npm run build
php artisan serve
```

Abre http://localhost:8000

---

## Credenciales de prueba

| Rol | Email | Contraseña |
|---|---|---|
| Administrador | admin@municipalidad.gob.pe | password |
| Mesa de Partes | mesadepartes@municipalidad.gob.pe | password |
| Rentas | rentas@municipalidad.gob.pe | password |

---

## Módulos

| Módulo | Ruta | Descripción |
|---|---|---|
| Dashboard | /dashboard | KPIs + 4 gráficos ApexCharts |
| Mesa de Partes | /expedientes | CRUD completo + trazabilidad + PDFs |
| Editor de Docs | /documentos/editor | Editor visual con preview en tiempo real |
| Predios | /predios | Catastro + autovalúo + impuesto predial |
| Licencias | /licencias | Funcionamiento, vencimiento automático |
| Caja | /caja + /pagos | Cobro de expedientes y predios, historial |
| RRHH | /empleados | Planillas mensuales + boletas PDF |
| Admin | /admin/usuarios | CRUD usuarios, roles, foto de perfil |
| Mi Perfil | /admin/perfil | Editar datos propios + foto + contraseña |

## Documentos PDF generables

1. Comprobante de pago (caja)
2. Constancia de trámite (expediente aprobado)
3. Resolución municipal (expediente aprobado)
4. Carta oficial (editor libre)
5. Carta poder (editor libre)
6. Licencia de funcionamiento
7. Boleta de pago de planilla (RRHH)

Todos editables antes de imprimir desde `/documentos/editor`.

---

## ⚠️ Error "Class App\\Console\\Kernel does not exist"

Si viene de un proyecto Laravel 10 mezclado con Laravel 11, elimina:
```bash
rm -f app/Console/Kernel.php app/Http/Kernel.php app/Exceptions/Handler.php
composer dump-autoload
```

---

## Problemas comunes

- **Sin estilos:** ejecuta `npm run build` antes de `php artisan serve`
- **Error pdo_mysql:** activa la extensión en php.ini y reinicia Apache
- **Fotos no se ven:** ejecuta `php artisan storage:link`
- **Migración falla:** `php artisan migrate:fresh --seed` para empezar de cero
