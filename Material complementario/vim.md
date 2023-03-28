# Guía uso de vim

## Motivo de esta guía

A lo largo del curso para editar archivos de texto en Linux se ha utilizado el editor de texto nano como en este trabajo se van a manejar principalmente ficheros de yml se utilizará vim porque a la hora de editarlos realiza las tabulaciones necesarias automáticamente evitando así errores y pérdidas de tiempo innecesarias. Como su manejo es menos intuitivo que nano se ha elaborado está guía para sacar todo el potencial de este editor de texto.
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
Sustituir palabras:
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