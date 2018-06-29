#include "DHT.h" //cargamos la librería DHT
#define DHTPIN 2 //Seleccionamos el pin en el que se //conectará el sensor
#define DHTTYPE DHT11 //Se selecciona el DHT11 (hay //otros DHT)
DHT dht(DHTPIN, DHTTYPE); //Se inicia una variable que será usada por Arduino para comunicarse con el sensor

void setup() {
  
Serial.begin(9600); //Se inicia la comunicación serial 
dht.begin(); //Se inicia el sensor
}
void loop() {
  
       float hum = dht.readHumidity(); //Se lee la humedad
       
       float temp = dht.readTemperature(); //Se lee la temperatura
       
       int sensor = analogRead(A1); //Entrada analogica gas
       
       //Se imprimen las variables
       Serial.print("Humedad: ");        
       Serial.print(hum); // Imprime humedad
       
       Serial.print("   Temperatura: "); 
       Serial.print(temp); // Imprime temperatura
       
       Serial.print("   Gas: ");
       Serial.println(sensor); // Imprime sensor-gas       
     
       delay(2000); //Se espera 2 segundos para seguir leyendo //datos
}

