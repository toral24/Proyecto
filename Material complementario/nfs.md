# Servidor NFS

Para facilitar la comunicación entre la máquina virtual en la que se van a implementar los servicios y el equipo local se ha instalado en la máquina virtual un servidor NFS a través del cual se van a compartir dos directorios en la red, uno para Docker y otro para Kubernetes como unidades de red en el equipo local activando la característica de cliente NFS en Windows.