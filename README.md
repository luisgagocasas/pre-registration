# Debts
WordPress Plugin: para recoger información de posibles alumnos para un colegio.

## Funciones
  - La información se guarda en una tabla.
  - La información se envia a el correo del administrador del sitio.
  - Se uso WP_List_Table para mostrar la información en una tabla dinamica en el administrador de WP.
  - Para añadir y modificar la informacion es posible desde el panel de administración.
  - Para el usuario final se a creado 1 shorcode para recoger informacion.

## Usos
- El Shorcode recopila informacion: se guarda en el la BD y se envia un mail para notificar a la institución.
```sh
ShorCode
[preregistration redirect="http://google.com"]
```

## Instalacion

```sh
patch: wp-content/plugins/
git clone git@github.com:luisgagocasas/pre-registration.git debts
cd debts
```

## Activar
```sh
Go url: /wp-admin/plugins.php
Activate "Pre Registro Alumnos"
```

## Desarrollo
 - Luis Gago Casas
 - 

License
----

* License:     GPL2
* License URI: https://www.gnu.org/licenses/gpl-2.0.html