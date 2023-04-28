# OpenLDAP
OpenLDAP es una implementación de código abierto del protocolo Lightweight Directory Acces Protocol o protocolo de acceso ligero a directorio en español. Es un protocolo que permite acceder a la información almacenada de forma centralizada en la red. Se utiliza a nivel de aplicación para acceder a los servicios de escritorio remoto.

En este caso, se van a implementar dos contenedores:

* Servidor OpenLDAP: En este contenedor se implementará toda la configuración de este protocolo. Esta expuesto por los puertos 389 y 636.

* PHP_LDAP_Admin: Este contenedor se utilizará para tener una interfaz gráfica con la que gestionar el servidor. Estará expuesto por el puerto 80 por lo que no se puede ejecutar a la vez que la estructura LAMP.

A continuación se puede ver el archivo docker-compose.yaml con el que se levantaron los contenedores:

```yaml
version: '3.7'
services:
  openldap:
    image: osixia/openldap:latest
    container_name: openldap
    hostname: openldap
    ports: 
      - "389:389"
      - "636:636"
    volumes:
      - ./data/certificates:/container/service/slapd/assets/certs
      - ./data/slapd/database:/var/lib/ldap
      - ./data/slapd/config:/etc/ldap/slapd.d
    environment: 
      - LDAP_ORGANISATION=proyecto
      - LDAP_DOMAIN=proyecto.local
      - LDAP_ADMIN_USERNAME=sergio
      - LDAP_ADMIN_PASSWORD=toral
      - LDAP_CONFIG_PASSWORD=toral
      - "LDAP_BASE_DN=dc=proyecto,dc=local"
      - LDAP_TLS_CRT_FILENAME=server.crt
      - LDAP_TLS_KEY_FILENAME=server.key
      - LDAP_TLS_CA_CRT_FILENAME=proyecto.local.ca.crt
      - LDAP_READONLY_USER=true
      - LDAP_READONLY_USER_USERNAME=user-ro
      - LDAP_READONLY_USER_PASSWORD=ro_pass
    networks:
      - openldap
  
  phpldapadmin:
    image: osixia/phpldapadmin:latest
    container_name: phpldapadmin
    hostname: phpldapadmin
    ports: 
      - "80:80"
    environment: 
      - PHPLDAPADMIN_LDAP_HOSTS=openldap
      - PHPLDAPADMIN_HTTPS=false
    depends_on:
      - openldap
    networks:
      - openldap

networks:
  openldap:
    driver: bridge
```
