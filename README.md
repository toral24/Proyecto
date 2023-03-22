# Docker y Kubernetes. La revolución de los contenedores.

## Índice

1. [Inicio](../../)
2. [Guías bash y vim](./Guias_bash_y_vim/)

    2.1. [Guía bash](./Guias_bash_y_vim/bash.md)

    2.2. [Guía vim](./Guias_bash_y_vim/vim.md)
 
3. [Docker](./Docker/)

    3.1. [Conceptos básicos](./Docker/Conceptos.md)
    
    3.2. [Comandos](./Docker/comandos.md)

4. [Kubernetes](./Kubernetes/)

    4.1. [Conceptos básicos](./Kubernetes/Conceptos.md)
    
    4.2. [Comandos kubectl](./Kubernetes/Comandos_kubectl.md)

## Proyecto fin de ciclo Sergio Toral García. IES San Andrés.

En este proyecto se va a realizar una investigación sobre la innovación tecnológica que han supuesto la contenerización. La **contenerización** es algo a medio camino entre una máquina virtual y ejecutar los procesos directamente en la misma máquina. En el caso de Linux un contenedor es muy similar a un chroot, pero con mejoras de seguridad y límites configurables. 

Los **contenedores** son una forma de virtualización del Sistema Operativo (SO), que contiene todo lo necesario para ejecutar una aplicación (código, tiempo de ejecución, herramientas del sistema y bibliotecas). Los contenedores tienen parámetros definidos y pueden ejecutar un programa, una carga de trabajo o una tarea específica. 

A diferencia de las **máquinas virtuales** no requieren de una copia completa del Sistema Operativo (SO), por lo que son más livianos y eficientes al ejecutar la aplicación para la que fueron diseñados. Mientras que las máquinas virtuales al utilizar un sistema operativo diferente del sistema hospedador, que se ejecutan en el mismo a través de un hipervisor, permiten más aislamiento y seguridad de datos que los contenedores que si utilizan recursos de este sistema. 

Los contenedores son también más portables, lo que permite dividir las cargas de trabajo más complejas en numerosos contenedores que pueden implementarse en multiples sistemas o infraestructuras en la nube gestionandolo todo desde un mismo panel de orquestación.

La **orquestación** es una metodología que ofrece visibilidad y control sobre donde se implementan los contenedores y como se asignan las cargas de trabajo en multiples contenedores. Sin está se debe gestionara cada contenedor manualmente. También permite aplicar políticas como la tolerancia a fallos, de manera selectiva u holística a una colección de contenedores.

[Kubernetes](./Kubernetes/) es una plataforma de orquestación de contenedores de código abierto, diseñada originalmente por Google, y es la solución estándar de facto en el mercado hoy en día. [Docker](./Docker/) es otro software de código abierto que se utiliza para implementar un solo contenedor, y se ha convertido en la solución estándar de facto para su propósito.

