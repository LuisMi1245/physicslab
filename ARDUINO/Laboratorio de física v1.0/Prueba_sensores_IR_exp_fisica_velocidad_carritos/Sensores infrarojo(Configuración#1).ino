/************************************************************************
* PROGRAMA EJEMPLO PARA LEER EL ESTADO LOGICO 0 O 1 DEL SENSOR INFRARROJO
* EJEMPLO CREADO POR ING EDISON V PASTO COLOMBIA
* MICROELECTRONICOS COLOMBIA 2014/ENERO
************************************************************************/
#include <infrarrojo.h>

#include "Arduino.h"
void setup();
void loop();
#line 9
infrarrojo estado(13);//DEFINICION DEL PIN DEL ARDUINO A USAR
infrarrojo estado2(12);//DEFINICION DEL PIN DEL ARDUINO A USAR
infrarrojo estado3(11);//DEFINICION DEL PIN DEL ARDUINO A USAR
infrarrojo estado4(10);//DEFINICION DEL PIN DEL ARDUINO A USAR
infrarrojo estado5(9);//DEFINICION DEL PIN DEL ARDUINO A USAR
infrarrojo estado6(8);//DEFINICION DEL PIN DEL ARDUINO A USAR
infrarrojo estado7(7);//DEFINICION DEL PIN DEL ARDUINO A USAR
int VALOR,VALOR2,VALOR3,VALOR4,VALOR5,VALOR6,VALOR7;//VARIBLE QUE RECIBE EL DATO
int estado_sensor_1,estado_sensor_2,estado_sensor_3,estado_sensor_4,estado_sensor_5,estado_sensor_6,estado_sensor_7;
float vel_1=0,time_1=0,vel_2=0,time_2=0,vel_3=0,time_3=0,vel_4=0,time_4=0,accel_1=0,accel_2=0,dist_1=0.30,dist_2=0.43,dist_3=0.25,dist_4=0.26;

//CONFIGURACION DE SETUP
void setup() {
Serial.begin(9600); //VELOCIDAD COMUNICACION SERIAL
}
//CODIGO PRINCIPAL
void loop() {

estado_sensor_1 = estado.lectura(VALOR); // Lectura del sensor 1.
if(estado_sensor_1 == 0)//Condicional para activar o no el experimento.
{
  Serial.println("Comienzo del Experimento de Velocidad");
  estado_sensor_2=1;
  unsigned long StartTime=0; // variables de tiempo
  unsigned long CurrentTime=0; // variables de tiempo
  unsigned long ElapsedTime=0; // variables de tiempo
  StartTime = millis();

  while(estado_sensor_2==1){ //Ciclo de espera mientras que se detecta algo en el segundo sensor.
  estado_sensor_2=estado2.lectura(VALOR2); // Lectura del sensor 2.
  }
  estado_sensor_3=1;
  CurrentTime = millis(); // Variable que toma el tiempo actual.
  ElapsedTime = CurrentTime - StartTime; // Calculo de tiempo transucrrido entre la deteccion del objeto entre los dos sensores.
  StartTime=0;
  CurrentTime=0;
  StartTime = millis();
  Serial.print("Tiempo transcurrido: ");
  Serial.print(ElapsedTime);
  Serial.println(" ms");
  time_1=float(ElapsedTime)/1000; // Conversion de milisegundos a segundos.
  vel_1=dist_1/time_1; // Calculo de velocidad
  Serial.print("La velocidad es de: ");
  Serial.print(vel_1);
  Serial.println("cm/seg");
  while(estado_sensor_3==1){ //Ciclo de espera mientras que se detecta algo en el segundo sensor.
  estado_sensor_3=estado3.lectura(VALOR3); // Lectura del sensor 2.
  }
  CurrentTime = millis(); // Variable que toma el tiempo actual.
  ElapsedTime = CurrentTime - StartTime; // Calculo de tiempo transucrrido entre la deteccion del objeto entre los dos sensores.
  StartTime=0;
  CurrentTime=0;
  StartTime = millis();
  Serial.print("Tiempo transcurrido: ");
  Serial.print(ElapsedTime);
  Serial.println(" ms");
  time_2=float(ElapsedTime)/1000; // Conversion de milisegundos a segundos.
  vel_2=dist_2/time_2; // Calculo de velocidad
  Serial.print("La velocidad es de: ");
  Serial.print(vel_2);
  Serial.println("cm/seg");
}

estado_sensor_4 = estado4.lectura(VALOR4); // Lectura del sensor 4.
if(estado_sensor_4 == 0) //Condicional para activar o no el experimento de Aceleraci\u00f3n.
{
   Serial.println("Comienzo del Experimento de Aceleracion");
  estado_sensor_5=1;
  unsigned long StartTime=0; // variables de tiempo
  unsigned long CurrentTime=0; // variables de tiempo
  unsigned long ElapsedTime=0; // variables de tiempo
  StartTime = millis();
  while(estado_sensor_5==1){ //Ciclo de espera mientras que se detecta algo en el segundo sensor.
  estado_sensor_5=estado5.lectura(VALOR5); // Lectura del sensor 2.
  }
  estado_sensor_6=1;
  CurrentTime = millis(); // Variable que toma el tiempo actual.
  ElapsedTime = CurrentTime - StartTime; // Calculo de tiempo transucrrido entre la deteccion del objeto entre los dos sensores.
  StartTime=0;
  CurrentTime=0;
  StartTime = millis();
  Serial.print("Tiempo transcurrido: ");
  Serial.print(ElapsedTime);
  Serial.println(" ms");
  time_3=float(ElapsedTime)/1000; // Conversion de milisegundos a segundos.
  vel_3=dist_3/time_3; // Calculo de velocidad
  Serial.print("La velocidad inicial es de: ");
  Serial.print(vel_3);
  Serial.println("cm/seg");
  //accel_1=(vel_3-vel_2)/time_3;
  
  while(estado_sensor_6==1){ //Ciclo de espera mientras que se detecta algo en el segundo sensor.
  estado_sensor_6=estado6.lectura(VALOR6); // Lectura del sensor 2.
  }
  estado_sensor_7=1;
  StartTime=0;
  CurrentTime=0;
  ElapsedTime=0;
  StartTime = millis();
  while(estado_sensor_7==1){ //Ciclo de espera mientras que se detecta algo en el septimo sensor.
  estado_sensor_7=estado7.lectura(VALOR7); // Lectura del sensor 7.
  }
  CurrentTime = millis(); // Variable que toma el tiempo actual.
  ElapsedTime = CurrentTime - StartTime; // Calculo de tiempo transucrrido entre la deteccion del objeto entre los dos sensores.
  StartTime=0;
  CurrentTime=0;
  StartTime = millis();
  Serial.print("Tiempo transcurrido: ");
  Serial.print(ElapsedTime);
  Serial.println(" ms");
  time_4=float(ElapsedTime)/1000; // Conversion de milisegundos a segundos.
  vel_4=dist_4/time_4; // Calculo de velocidad
  Serial.print("La velocidad final es de: ");
  Serial.print(vel_4);
  Serial.println("cm/seg");
  accel_1=(vel_4-vel_3)/(time_4+time_3);
  Serial.print("La aceleracion es de: ");
  Serial.print(accel_1);
  Serial.println("cm/seg^2");
}
  
}

