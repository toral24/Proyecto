# Comandos útilies de bash
Para copiar todos los archivos de un directorio en otro, si ya existen en el otro directorio no hace nada. Útil para hace backups. Se utiliza el siguiente comando:
```bash
rsync -a
```
Para mostrar el tamaño de un directorio, si se añade * al final muestrta el peso de cada archivo del directorio.
```bash
du -sh 
```
Para mostrar los valores de un archvio
```bash
stat {nombre del archivo}
```
Para comprimir un archivo
```bash
zip -r {nombre archivo comprimido} {ruta directorio}
```
Descomprimir un archivo:
```bash
unzip {nombre archivo comprimido}
```
Mostrar los archivos que contiene un archivo comprimido:
```bash
zipinfo {nombre archivo comprimido}
```
Buscar archivos:
```bash
find {ruta directorio} {parametros; 
Algunos útiles son:
-mtime (filtrar por tiempo de modificación)
-inmae (filtrar por nombre)
}
```
Calculadora
```bash
bc
```
Para mostrar los procesos:
```bash
ps fax
```
El primer dígito que se muestra es un id que se puede pasar al siguiente comando para detenerlos:
```bash
kill {id} o {nombre proceso}
```
