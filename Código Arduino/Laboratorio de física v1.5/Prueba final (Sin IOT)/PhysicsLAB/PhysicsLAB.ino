//Se incluyen las líbrerias que contienen las funciones necesarias para el proceso.
#include <infrarrojo.h> 
#include <LiquidCrystal_I2C.h> 
#include <Wire.h>

  //Se define y setea el display LCD.
  LiquidCrystal_I2C lcd(0x3F, 16, 2);

//Definir sensores
infrarrojo estado(13); //DEFINICION DEL PIN DEL ARDUINO A USAR
infrarrojo estado2(12); //DEFINICION DEL PIN DEL ARDUINO A USAR
infrarrojo estado3(11); //DEFINICION DEL PIN DEL ARDUINO A USAR
infrarrojo estado4(7); //DEFINICION DEL PIN DEL ARDUINO A USAR // SENSOR 7 = 4
infrarrojo estado5(8); //DEFINICION DEL PIN DEL ARDUINO A USAR // SENSOR 6 = 5
infrarrojo estado6(9); //DEFINICION DEL PIN DEL ARDUINO A USAR // SENSOR 5 = 6
infrarrojo estado7(10); //DEFINICION DEL PIN DEL ARDUINO A USAR// SENSOR 4 = 7

//Inicializamos variables que se usarán como parámetro.
int VALOR, VALOR2, VALOR3, VALOR4, VALOR5, VALOR6, VALOR7;

//Variables que reciben el estado del sensor, o los datos = 1 o 0.
int estado_sensor_1, estado_sensor_2, estado_sensor_3, estado_sensor_4, estado_sensor_5, estado_sensor_6, estado_sensor_7;

//Variables que almacenan las diferenetes magnitudes, tanto fundamentales como derivadas.
//Distancias:
float distancia_1 = 0.30, distancia_2 = 0.43, distancia_3 = 0.26, distancia_4 = 0.25;
//Velocidades:
float velocidad_1 = 0, velocidad_2 = 0, velocidad_3 = 0, velocidad_4 = 0;
//Tiempos:
float tiempo_1 = 0, tiempo_2 = 0, tiempo_3 = 0, tiempo_4 = 0;
//Aceleración:
float aceleracion_1 = 0, aceleracion_2 = 0;


//CONFIGURACION DE LOS DISPOSITIVOS
void setup() {
  lcd.init();
  lcd.backlight();
  lcd.clear();
  lcd.setCursor(0, 0);
  lcd.print("  ** VICMAN **"); // Mensaje que se muestra en pantalla 1.
  lcd.setCursor(0, 1);
  lcd.print("** MAKERS <3 **"); // Mensaje que se muestra en pantalla 2.
  delay(5000);
  lcd.clear();
  Serial.begin(9600); //Velocidad de muestreo en el monitor serial.
  //Serial.println("ESPERANDO");
  lcd.print("ESPERANDO...."); // Mensaje que se muestra en pantalla 3.

}

//Código que se ejecutará de forma indefinida o en un bucle infinito.
void loop() {

  //Estado numero 1:
  estado_sensor_1 = estado.lectura(VALOR); // Lectura del sensor 1.

  //Si el sensor NO vió algo? Ejecutar el código del condicional.
  if (estado_sensor_1 == 0) //Condicional para activar o no el experimento.
  {
    lcd.clear();
    //Serial.println("COMIENZA YA");
    lcd.print("COMIENZA YA");
    lcd.setCursor(0, 1);
    lcd.print("#1) VELOCIDAD");

    estado_sensor_2 = 1;

    //Declarar e inicializar variables de tiempo, teniendo en cuenta el sistema C.G.S:
    unsigned long TiempoInicio = 0; // variables de tiempo
    unsigned long TiempoActual = 0; // variables de tiempo
    unsigned long TiempoTranscurrido = 0; // variables de tiempo
    TiempoInicio = millis();

    while (estado_sensor_2 == 1) { //Ciclo de espera mientras que se detecta algo en el segundo sensor.
      estado_sensor_2 = estado2.lectura(VALOR2); // Lectura del sensor 2.
    }
    estado_sensor_3 = 1;
    TiempoActual = millis(); // Variable que toma el tiempo actual.
    TiempoTranscurrido = TiempoActual - TiempoInicio; // Calculo de tiempo transucrrido entre la deteccion del objeto entre los dos sensores.
    TiempoInicio = 0;
    TiempoActual = 0;
    TiempoInicio = millis();
    //Serial.print("Tiempo transcurrido: ");
    //Serial.print(TiempoTranscurrido);
    //Serial.println(" ms");
    tiempo_1 = float(TiempoTranscurrido) / 1000; // Conversion de milisegundos a segundos.
    velocidad_1 = distancia_1 / tiempo_1; // Calculo de velocidad
    //lcd.clear();
    //lcd.print("VEL1 = ");
    //lcd.print(velocidad_1);
    //lcd.print("m/s");
    //Serial.print("La velocidad es de: ");
    //Serial.print(velocidad_1);
    //Serial.println("m/seg");
    while (estado_sensor_3 == 1) { //Ciclo de espera mientras que se detecta algo en el tercer sensor.
      estado_sensor_3 = estado3.lectura(VALOR3); // Lectura del sensor 3.
    }
    TiempoActual = millis(); // Variable que toma el tiempo actual.
    TiempoTranscurrido = TiempoActual - TiempoInicio; // Calculo de tiempo transucrrido entre la deteccion del objeto entre los dos sensores.
    TiempoInicio = 0;
    TiempoActual = 0;
    TiempoInicio = millis();
    //Serial.print("Tiempo transcurrido: ");
    //Serial.print(TiempoTranscurrido);
    //Serial.println(" ms");
    tiempo_2 = float(TiempoTranscurrido) / 1000; // Conversion de milisegundos a segundos.
    velocidad_2 = distancia_2 / tiempo_2; // Calculo de velocidad
    lcd.clear();
    lcd.print("T1 = ");
    lcd.print(tiempo_1);
    lcd.print(" seg");
    lcd.setCursor(0, 1);
    lcd.print("T2 = ");
    lcd.print(tiempo_2);
    lcd.print(" seg");
    delay(5000);
    lcd.clear();
    lcd.print("VEL1 = ");
    lcd.print(velocidad_1);
    lcd.print("m/s");
    lcd.setCursor(0, 1);
    lcd.print("VEL2 = ");
    lcd.print(velocidad_2);
    lcd.print("m/s");
    //Serial.print("La velocidad es de: ");
    //Serial.print(velocidad_2);
    //Serial.println("m/s");

    //MOSTRANDO EN WEB 
    boolean Key = false;
    int mensaje = 0;
    if (Serial.available() > 0) {
      mensaje = Serial.read();
      if (mensaje == '1') {
        Key = true;
      } else {
        Key = false;
      }
    }
    if (Key == true) {


      Serial.println(tiempo_1);
      Serial.println(tiempo_2);
      //MOSTRAR SIGUIENTES VARIABLES
      Serial.println(velocidad_1);
      Serial.println(velocidad_2);

    }
  }

  estado_sensor_4 = estado4.lectura(VALOR4); // Lectura del sensor 4.
  if (estado_sensor_4 == 0) //Condicional para activar o no el experimento de Aceleracion.
  {
    //   Serial.println("Comienzo del Experimento de Aceleracion");
    lcd.clear();
    lcd.print("COMIENZA YA");
    lcd.setCursor(0, 1);
    lcd.print("(#2) ACELERACION");
    estado_sensor_5 = 1;
    unsigned long TiempoInicio = 0; // variables de tiempo
    unsigned long TiempoActual = 0; // variables de tiempo
    unsigned long TiempoTranscurrido = 0; // variables de tiempo
    TiempoInicio = millis();
    while (estado_sensor_5 == 1) { //Ciclo de espera mientras que se detecta algo en el sexto sensor.
      estado_sensor_5 = estado5.lectura(VALOR5); // Lectura del sensor 5.
    }
    estado_sensor_6 = 1;
    TiempoActual = millis(); // Variable que toma el tiempo actual.
    TiempoTranscurrido = TiempoActual - TiempoInicio; // Calculo de tiempo transucrrido entre la deteccion del objeto entre los dos sensores.
    TiempoInicio = 0;
    TiempoActual = 0;
    TiempoInicio = millis();
    //Serial.print("Tiempo transcurrido Tramo Inicial: ");
    //Serial.print(TiempoTranscurrido);
    //Serial.println(" ms");
    tiempo_3 = float(TiempoTranscurrido) / 1000; // Conversion de milisegundos a segundos.
    velocidad_3 = distancia_3 / tiempo_3; // Calculo de velocidad
    //Serial.print("La velocidad inicial es de: ");
    //Serial.print(velocidad_3);
    //Serial.println("cm/seg");
    //aceleracion_1=(velocidad_3-velocidad_2)/tiempo_3;

    while (estado_sensor_6 == 1) { //Ciclo de espera mientras que se detecta algo en el quinto sensor.
      estado_sensor_6 = estado6.lectura(VALOR6); // Lectura del sensor 6.
    }
    estado_sensor_7 = 1;
    TiempoInicio = 0;
    TiempoActual = 0;
    TiempoTranscurrido = 0;
    TiempoInicio = millis();
    while (estado_sensor_7 == 1) { //Ciclo de espera mientras que se detecta algo en el cuarto sensor.
      estado_sensor_7 = estado7.lectura(VALOR7); // Lectura del sensor 7.
    }
    TiempoActual = millis(); // Variable que toma el tiempo actual.
    TiempoTranscurrido = TiempoActual - TiempoInicio; // Calculo de tiempo transucrrido entre la deteccion del objeto entre los dos sensores.
    TiempoInicio = 0;
    TiempoActual = 0;
    TiempoInicio = millis();
    //Serial.print("Tiempo transcurrido Tramo Final: ");
    //Serial.print(TiempoTranscurrido);
    //Serial.println(" ms");
    tiempo_4 = float(TiempoTranscurrido) / 1000; // Conversion de milisegundos a segundos.
    velocidad_4 = distancia_4 / tiempo_4; // Calculo de velocidad
    //Serial.print("La velocidad final es de: ");
    //Serial.print(velocidad_4);
    //Serial.println("cm/seg");
    aceleracion_1 = (velocidad_4 - velocidad_3) / (tiempo_4 + tiempo_3);
    //Serial.print("La aceleracion es de: ");
    //Serial.print(aceleracion_1);
    //Serial.println("cm/seg^2");
    lcd.clear();
    lcd.print("T1 = ");
    lcd.print(tiempo_3);
    lcd.print(" seg");
    lcd.setCursor(0, 1);
    lcd.print("T2 = ");
    lcd.print(tiempo_4);
    lcd.print(" seg");
    delay(5000);
    lcd.clear();
    lcd.print("VEL1 = ");
    lcd.print(velocidad_3);
    lcd.print("m/s");
    lcd.setCursor(0, 1);
    lcd.print("VEL2 = ");
    lcd.print(velocidad_4);
    lcd.print("m/s");
    delay(5000);
    lcd.clear();
    lcd.print("ACEL = ");
    lcd.print(aceleracion_1);
    lcd.print("m/s^2");
  }

}

