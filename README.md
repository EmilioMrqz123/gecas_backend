# GECAS - Sistema de Punto de Venta (Backend API)

Este repositorio contiene el código fuente del Backend (Lado del Servidor) para el Sistema de Punto de Venta de Autos GECAS.

IMPORTANTE:
Este proyecto es solo una de las dos partes que conforman el sistema completo.
* Este repositorio: Contiene la lógica de negocio, conexión a base de datos y API REST (PHP + MongoDB).
* Repositorio Cliente: Contiene la aplicación móvil Android (Frontend).

--------------------------------------------------------------------------------

## Colaboradores del Proyecto

| Nombre | Registro | Correo Institucional |
| :--- | :--- | :--- |
| JUAN EMILIO MARQUEZ GUDIÑO | 23310186 | a23310186@ceti.mx |
| CRISTIAN IVAN CASTRO LLAMAS | 23310187 | a23310187@ceti.mx |
| JONATHAN GIOVANNI CERVANTES RIVERA | 23310196 | a23310196@ceti.mx |

--------------------------------------------------------------------------------

## Requisitos Previos (Instalación Necesaria)

Para ejecutar este servidor en tu equipo local (Laptop/PC), necesitas tener instalado obligatoriamente:

1.  XAMPP (con PHP 8.0 o superior).
    * Descargar en: apachefriends.org
2.  Composer (Gestor de dependencias de PHP).
    * Descargar en: getcomposer.org
3.  MongoDB Community Server (Base de datos).
    * Descargar en: mongodb.com
4.  Extension de PHP para MongoDB (Driver .dll).
    * Nota: Sin esto, PHP no puede hablar con la base de datos. Asegúrate de descargar la DLL correcta (Thread Safe x64) y configurar tu php.ini.

--------------------------------------------------------------------------------

## Instalación y Configuración Inicial

Sigue estos pasos para levantar el servidor en tu máquina por primera vez:

### 1. Ubicación del Proyecto
Este código DEBE residir dentro de la carpeta pública de XAMPP.
* Clona este repositorio dentro de: C:\xampp\htdocs\

```bash
cd C:\xampp\htdocs\
git clone [https://github.com/EmilioMrqz123/gecas_backend.git](https://github.com/EmilioMrqz123/gecas_backend.git)