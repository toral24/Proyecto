# Kubernetes

<img src="../Imagenes/kubernetes.png" width="50%">

Kubernetes hace referencia al timonel de un barco en esperanto. De ahí el logo, que recuerda a un timón.

Kubernetes es una plataforma de código abierto que se utiliza para administrar contenedores de linux. Se utiliza para implementar, escalar, mantener, programar y operar automáticamente múltiples contenedores de aplicaciones en grupos de nodos. Por otro lado, facilita la automatización y configuración declarativa.

Kubernetes está escrito en el lenguaje de programación Go, fue desarrollado por Google y liberado en el año 2014. Fue diseñado para utilizarse tanto en la nube como en ordenadores o centros de datos locales.

## Objetos de Kubernetes

Los objetos de Kubernetes son entidades persistentes dentro del sistema de Kubernetes, que se utilizan para representar el estado deseado del clúster. En ellos se especifica que contenedores se van a correr, de que recursos van a disponer y que políticas llevar a cabo con dichos contenedores (reinicio, actualización, …).
Todos los objetos de Kubernetes incluyen el campo spec en el que se especifica el estado deseado del objeto. Lo más habitual para definir un objeto de Kubernetes es utilizar un archivo .yaml, también conocidos como manifiestos, en el que se proporciona toda la información. Para crear el objeto definido en dicho archivo se utiliza el comando de kubectl kubectl apply -f “archivo.yaml” y la api de Kubernetes convierte está información a JSON y crea el objeto si no ha habido ningún error. El archivo .yaml debe contener obligatoriamente los siguientes campos:
* apiVersision: Versión de la API de Kubernetes.
* Kind: Clase de objeto.
* Metadata: Permite identificar el objeto incluyendo las etiquetas name, UID y/o namespace.


