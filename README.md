# Laboratorio de física IOT
Este trabajo ha sido realizado netamente por 2 estudiantes de grado 11 (once) en instituciones públicas de Colombia - Córdoba.
- Institución Educativa Cristobal Colón.
- Institución Educativa Victoria Manzur.

Nos hemos esforzado bastante para optimizar la instalación el proyecto como tal, tenemos conocimientos intermedios en temas computacionales, por favor, valorar el esfuerzo con comentarios y críticas constructivas.


Requisitos para instalar el laboratorio de física:

(Windows 7, 8, 8.1 y 10 de 64 o 32 bits)

1. Tener o instalar apache, mysql, mariadb (Xampp, Lampp, Wampp).
---> www.wampserver.com/en/
2. Tener o instalar el entorno de desarrollo NeatBeans (Compatible con Java).
---> https://netbeans.org/downloads/
3. Tener o instalar el Jre (Java Runtime Environment)
---> https://www.java.com/es/download/
4. Tener o instalar el Jdk (Java Development Kit)
---> http://www.oracle.com/technetwork/java/javase/downloads/jdk-netbeans-jsp-142931.html
5. Tener o instalar el Arduino IDE (Entorno de desarrollo de Arduino) https://www.arduino.cc/download_handler.php?f=/arduino-1.8.5-windows.exe

Proceso #1
MANUAL PARA INSTALAR LA PLATAFORMA WEB:

1. Instalar todo el software requerido dicho anteriormente. (*Obligatorio)
2. Descargar y descomprimir el proyecto.
--->https://github.com/LuisMi1245/physicslab
3. Una vez descompreso el proyecto, movemos la carpeta "physicslab" y el archivo "index.php" a la ruta de instalación de xampp, y htdocs. Por ejemplo:
Ruta --->  C:\wamp64\www  (En el caso de instalar wampp).
Ruta --->  C:\xampp\htdocs  (En el caso de instalar xampp).
4. Abrir la plataforma servidor xampp (wampp o lampp) y seguir los pasos del manual: "Abrir acceso por red a xampp.pdf".
5. Luego de haber cumplido los anteriores pasos, la plataforma web ya está lista para arrancar. Para ello debe abrir su plataforma de servidor web (xampp o wampp), encender los servicios de "APACHE", y "MYSQL" (*OBLIGATORIO).
6. Dirigirse a su navegador y escriba en la barra de direcciones, lo siguiente ---> localhost 
Nota: Deberá aparecer el Menú principal de la plataforma, de lo contrario, algo realizó mal al ubicar la carpeta "physicslab" y el archivo "index.php".
Para solucionarlo, en la barra de direcciones, luego de ---> localhost , digite lo siguiente  /physicslab/IOT/www/physics.php
Y quedará de la siguiente forma ---> localhost/physicslab/IOT/www/physics.php
7. Luego, abrirá la barra de la plataforma, y se dirigirá al apartado de configuraciones.
8. En configuraciones, la opción número #1, le dice que si no ha instalado una base de datos, escriba la contraseña y presione el botón.
Usted escribirá la contraseña que de por sí, se encuentra en el archivo physicslab/IOT/www/config.php (línea 104). Y presionará el botón "MONTAR BASE DE DATOS".
9. Si usted lo hizo todo correcto, le aparecerá un mensaje que dice: "Se ha instalado correctamente la base de datos".
10. Su plataforma web ya está lista para obtener datos y funcionar.

Proceso #2
MANUAL PARA INSTALAR EL LECTOR DE DATOS DE ARDUINO (HECHO EN JAVA)

11. Mover los archivos "rxtxParallel.dll" y "rxtxSerial.dll" a la siguiente ruta:
---> C:\Program Files\Java\jdk1.8.0_152\jre\bin\ 
Nota: Tenga en cuenta que antes de hacer esto ya deben estar estar instalados los anteriores programas mencionados. De lo contrario NO ENCONTRARÁ LA RUTA. 
12. Abrir el NetBeans y cargar la carpeta "Java (Software)" que se encuentra en nuestro proyecto.
12.1. Si NetBeans le pide librerias que no encuentra? Las librerias se encuentran en el proyecto:
---> https://github.com/LuisMi1245/physicslab/tree/master/physicslab/IOT/www/fisicalab/lib
Nota: Todas las librerias necesarias se encuentran en dicha carpeta, no hace falta descargar algo adicional.
13. Se dirijirá al archivo "Windows.java", en la línea número #36, y modificará el puerto "COM3" al puerto en que usted conectó su Arduino.
Nota: Para saber en que puerto conecté el Arduino, conecto mi Arduino a mi computadora, me dirijo al Arduino IDE en la pestaña de "Herramientas", luego "Puerto", y allí se mostrará "ArduinoX (COMX)". La X vendría siendo el número del puerto.
14. Teniendo la carpeta "Java (Software)" perfectamente lista, compilamos y ejecutamos el código "Windows.java". 
Nota: Abrirá una ventanita con las opciones que necesita para exportar los datos obtenidos por el Arduino.
15. (PASO OPCIONAL) Si los errores persisten, deberá manualmente anotar los datos arrojados por el arduino en el archivo "datos.xlsx" que se encuentra en /physicslab/IOT/www/fisicalab/datos.xlsx.
Nota: Es solo en el caso de no lograr instalar correctamente el software de Java. Si desde el principio del Proceso #2 tuvo errores, omita el paso #11 al #14 y ejecute el #15.



¿SI USTED LOGRÓ INSTALARLO? SIENTASE AFORTUNADO, XD
ES MÁS FÁCIL DE LO QUE PARECE.
LUEGO DE INSTALARLO, OLVIDESE DE VOLVER A CACHARREAR CON TODO ESTE MONTÓN DE ARCHIVOS. NO SERÁ NECESARIO.


Proceso #3
MANUAL DE USO:

1. Conecte el Arduino al computador, luego verifique y compile el código "PhysicsLAB.ino" que se encuentra en:
---> physicslab/Código Arduino/Laboratorio de física v5.0 Final Version/PhysicsLAB/PhysicsLAB.ino
2. Abra su administrador de servidores web (xampp o wampp) y encienda los servicios Apache y Mysql.
3. Dele al botón inicio en su computadora y escriba "cmd" y luego Enter.
4. Se abrirá la consola de comandos, escribirá --> ipconfig
5. Se debe ubicar en donde dice:  

 Wireless LAN adapter Wireless Network Connection:

   Connection-specific DNS Suffix  . :
   Link-local IPv6 Address . . . . . : fe80::b8d4:c525:2a8:c33b%11
   IPv4 Address. . . . . . . . . . . : 192.168.0.12       <------- ESTA DIRECCIÓN DEBE TOMARLA Y PASARSELA A SUS COMPAÑEROS 
                                                                   PARA QUE LA DIGITEN EN EL NAVEGADOR DE SUS DISPOSITIVOS
   Subnet Mask . . . . . . . . . . . : 255.255.255.0
   Default Gateway . . . . . . . . . : 192.168.0.1


Nota: Si a sus compañeros no les aparece, es porque no realizó bien el paso #4 del Proceso#1 .

3. Abra el NetBeans y ejecute el archivo "Windows.java".

4. Ejecute el ejercicio de física. 

5. Presiones el botón "obtener datos" en la ventanita del código de Java.

6. Los datos aparecerán ordenadamente, y usted le dará al botón "Exportar a Excel".

Nota: Recuerde que el archivo por obligación debe llamarse "datos" y su extensión debe ser ".xlsx".

7. Dirijase a la plataforma web, y observe como sus datos ya aparecen en las tablas.

8. Presione el botón "GUARDAR DATOS*" y luego a "HACER CONVERSIÓN" para obtener las magnitudes derivadas.

9. Repita el proceso, omitiendo el paso 1, 2 y 3. Para obtener nuevos datos.


