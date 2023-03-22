# Guía uso de vim

## Índice

1. [Inicio](../../../)
2. [Guías bash y vim](.)

    2.1. [Guía bash](./bash.md)

    2.2. [Guía vim](./vim.md)
 
3. [Docker](../Docker/)

    3.1. [Conceptos básicos](../Docker/Conceptos.md)
    
    3.2. [Comandos](../Docker/comandos.md)

4. [Kubernetes](../Kubernetes/)

    4.1. [Conceptos básicos](../Kubernetes/Conceptos.md)

A lo largo del curso para editar archivos de texto en Linux se ha utilizado el editor de texto nano como en este trabajo.
## Conceptos básicos
* Guardar archivo y darle nombre:
```bash
:w {nombre archivo}
```
* Guardar archivo y salir del editor:
```bash
:wq
```
* Salir sin guardar:
```bash
:q!
```
Guía del comando que se pasa como parámetro:
```bash
:h {comando}
```
Insertar texto:
```bash
i
```
### Sustituir palabras (con ejemplos)
Sustituir todas las palabras tarta por rosquilla:
```bash
vim +%s/tarta/rosquilla/g hola.txt 
```
Se puede sustituir el + por -c:
```bash
vim -c %s/tarta/rosquilla/g hola.txt 
```
Y también hacer varios cambios a la vez:
```bash
vim -c %s/tarta/rosquilla/g -c %s/rosquilla/huevo/g -c %s/huevo/donut/g hola.txt 
```
### Copiar, borrar y pegar
Modo visual (solo permite seleccionar texto):
```bash
v
```
Cortar texto (vale para borrar también):
```bash
dd
```
Pegar texto copiado:
```bash
p
```
Copiar texto:
```bash
yy
```