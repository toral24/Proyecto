# OpenLDAP
OpenLDAP es una implementación de código abierto del protocolo Lightweight Directory Acces Protocol o protocolo de acceso ligero a directorio en español. Es un protocolo que permite acceder a la información almacenada de forma centralizada en la red. Se utiliza a nivel de aplicación para acceder a los servicios de escritorio remoto.

En este caso, se van a implementar dos contenedores:

* Servidor OpenLDAP: En este contenedor se implementará toda la configuración de este protocolo. Esta expuesto por los puertos 389 y 636.

* PHP_LDAP_Admin: Este contenedor se utilizará para tener una interfaz gráfica con la que gestionar el servidor. Estará expuesto por el puerto 80 por lo que no se puede ejecutar a la vez que la estructura LAMP.
