# Docker y Kubernetes. La revolución de los contenedores. 

 1. [Material complementario](./Material_complementario/)

    1.1. [Guía bash](./Material_complementario/bash.md)

    1.2. [Guía vim](./Material_complementario/vim.md)
 
2. [Docker](./Docker/)

    2.1. [Conceptos básicos](./Docker/Conceptos.md)
    
    2.2. [Comandos](./Docker/comandos.md)

    2.3. [Contenido práctico](./Docker/ContenidoPractico.md)

3. [Kubernetes](./Kubernetes/)

    3.1. [Herramientas](./Kubernetes/Herramientas.md)

    3.2. [Comandos kubectl](./Kubernetes/Comandos_kubectl.md)

    3.3. [Objetos](./Kubernetes/Objetos.md)

    3.4. [Contenido práctico](./Kubernetes/ContenidoPractico.md)

# Introducción, objetivos y recursos
## Objetivos

El principal objetivo de este proyecto es realizar una investigación sobre la innovación tecnológica que ha supuesto la introducción de los contenedores en el mundo de la informática. Por una parte, se van a definir unos conceptos básicos sobre la plataforma Docker y unas pruebas con docker compose para crear varios contenedores y comprobar su funcionamiento. Y por otra, se va a realizar un análisis más en profundidad sobre el orquestador de contenedores Kubernetes, definiendo todos los objetos de los que dispone además de un manifiesto de cada uno de los mismos de ejemplo que se encuentran en el Anexo 5 y algunas herramientas útiles, además se realizarán unas pruebas creando un clúster de Kubernetes con la herramienta kind (Kubernetes IN Docker) probando algunos de estos manifiestos y utilizando la herramienta ArgoCD para GitOps junto con Helm para ofrecer varias aplicaciones web.

Como objetivos secundarios se pretende profundizar un poco en el manejo de sistemas operativos Linux (ya que se va a utilizar una máquina virtual con Ubuntu) y aprender a manejar el editor de texto Vim con el que se editaran los manifiestos de Kubernetes y Docker compose entre otros archivos ([material complementario](./Material_complementario/)) y familiarizarse con la interfaz de línea de comandos de Docker y Kubernetes ([comandos_docker](./Docker/comandos.md) y [comandos_kubectl](./Kubernetes/Comandos_kubectl.md)). Además se va a crear con GitHub pages esta página web a partir de un repositorio con todo el contenido de está memoria del y todos los repositorios necesarios para desplegar los contenedores de docker y para los charts de Helm.
## Introducción
En este proyecto se va a realizar una investigación sobre la innovación tecnológica que han supuesto la contenerización. La contenerización es algo a medio camino entre una máquina virtual y ejecutar los procesos directamente en la misma máquina. En el caso de Linux un contenedor es muy similar a un chroot, pero con mejoras de seguridad y límites configurables.

Los contenedores son una forma de virtualización del Sistema Operativo (SO), que contiene todo lo necesario para ejecutar una aplicación (código, tiempo de ejecución, herramientas del sistema y bibliotecas). Los contenedores tienen parámetros definidos y pueden ejecutar un programa, una carga de trabajo o una tarea específica.

A diferencia de las máquinas virtuales no requieren de una copia completa del Sistema Operativo (SO), por lo que son más livianos y eficientes al ejecutar la aplicación para la que fueron diseñados. Mientras que las máquinas virtuales al utilizar un sistema operativo diferente del sistema hospedador, que se ejecutan en el mismo a través de un hipervisor, permiten más aislamiento y seguridad de datos que los contenedores que si utilizan recursos de este sistema.

Los contenedores son también más portables, lo que permite dividir las cargas de trabajo más complejas en numerosos contenedores que pueden implementarse en múltiples sistemas o infraestructuras en la nube gestionándolo todo desde un mismo panel de orquestación.

La orquestación es una metodología que ofrece visibilidad y control sobre donde se implementan los contenedores y como se asignan las cargas de trabajo en múltiples contenedores. Sin está se debe gestionara cada contenedor manualmente. También permite aplicar políticas como la tolerancia a fallos, de manera selectiva u holística a una colección de contenedores.

## Recursos

Para la realización de este proyecto se ha utilizado una máquina virtual con Ubuntu Server 22.04 LTS, la cual se ha ejecutado con el hipervisor VMWare en su versión 16 dentro de un ordenador de torre con un procesador Ryzen 5 5600G con 12 núcleos y un reloj base de 3.9 GHz, un disco duro NVME de 1 TB y 16 GB de RAM. Sin embargo, para la presentación se va a utilizar un ordenador portátil con solo 8 GB de RAM, un SSD de 500 GB y un procesador Intel I3 de 7 generación.
 
