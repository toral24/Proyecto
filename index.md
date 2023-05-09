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

## Introducción al proyecto

En este proyecto se va a realizar una investigación sobre la innovación tecnológica que han supuesto la contenerización. La contenerización es algo a medio camino entre una máquina virtual y ejecutar los procesos directamente en la misma máquina. En el caso de Linux un contenedor es muy similar a un chroot, pero con mejoras de seguridad y límites configurables.

Los contenedores son una forma de virtualización del Sistema Operativo (SO), que contiene todo lo necesario para ejecutar una aplicación (código, tiempo de ejecución, herramientas del sistema y bibliotecas). Los contenedores tienen parámetros definidos y pueden ejecutar un programa, una carga de trabajo o una tarea específica.

A diferencia de las máquinas virtuales no requieren de una copia completa del Sistema Operativo (SO), por lo que son más livianos y eficientes al ejecutar la aplicación para la que fueron diseñados. Mientras que las máquinas virtuales al utilizar un sistema operativo diferente del sistema hospedador, que se ejecutan en el mismo a través de un hipervisor, permiten más aislamiento y seguridad de datos que los contenedores que si utilizan recursos de este sistema.

Los contenedores son también más portables, lo que permite dividir las cargas de trabajo más complejas en numerosos contenedores que pueden implementarse en múltiples sistemas o infraestructuras en la nube gestionándolo todo desde un mismo panel de orquestación.

La orquestación es una metodología que ofrece visibilidad y control sobre donde se implementan los contenedores y como se asignan las cargas de trabajo en múltiples contenedores. Sin está se debe gestionara cada contenedor manualmente. También permite aplicar políticas como la tolerancia a fallos, de manera selectiva u holística a una colección de contenedores 
