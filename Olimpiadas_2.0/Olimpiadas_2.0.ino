

/****************************************************LIBRERIAS DE SENSORES********************************************************************************************/
 
#include "DHT.h" //cargamos la librería DHT
#define DHTPIN 2 //Seleccionamos el pin en el que se //conectará el sensor
#define DHTTYPE DHT11 //Se selecciona el DHT11 (hay //otros DHT)
DHT dht(DHTPIN, DHTTYPE); //Se inicia una variable que será usada por Arduino para comunicarse con el sensor


/****************************************************LIBRERIAS DE PLACA ETHERNET********************************************************************************************/
 
#include <Ethernet.h>
byte mac[] = {   0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };
IPAddress ip(169,254,43,250); // Poner aqui el IP elegido para la placa controladora (arduino)
EthernetServer server(80);  // Arrancamos el servidor en el puerto estandard 80
#include <SD.h>
#include <SPI.h>
#define SS_SD_CARD    4  // define pin 4 como en pin "esclavo" el que nos dira si la SD se detecto o no 
#define SS_ETHERNET   10 // define pin 10 como en pin "escritura", colocar este en HIGH para permitir escitura


/****************************************************STRING********************************************************************************************
 */




void setup() {
 
Serial.begin(9600); //Se inicia la comunicación serial 
//Serial1.begin(9600);  //Se inicia la comunicación serialn 1
dht.begin(); //Se inicia el sensor de temperatura y humedad

   pinMode (SS_SD_CARD, OUTPUT);
   pinMode (SS_ETHERNET, OUTPUT);
   digitalWrite (SS_SD_CARD, HIGH);
   digitalWrite (SS_ETHERNET, HIGH);
   Ethernet.begin(mac, ip);
   server.begin();// Inicia el servidor web
   Serial.print("Servidor Web en la direccion:    ");
   Serial.println(Ethernet.localIP());

   
  
   Serial.print("Inicializando SD...");

  // Verificamos en forma de negacion si se introdujo la tarjeta SD
  if (!SD.begin(SS_SD_CARD)) {
    Serial.println("Fallo o tarjeta no presente");
    // don't do anything more:
    return;
  }
  Serial.println("Tarjeta SD OK"); //
delay(5000);
 
/***********************COMUNICACION DE PUERTOS SERIE PARA FUNCIONAMIENTO DE MODULO WIFI********************************************************************************************
 */
                                                      /*  WiFi.begin(SSID, PASS);
                                                        server2.begin();
                                                        Serial.print("Servidor Web en la direccion:    ");
                                                        Serial.println(WiFi.localIP());
  
           Serial1.println("AT\r"); //PROBAR CON \n\r
           Serial1.setTimeout(3000); //Set el Timeout en 3 segundos para Serial.find() 
  
 if(Serial1.find("OK"))
    { //Verificar si Modulo Wifi responde
              Serial.println("MODULO WIFI OK");
              delay (1000);
              Serial1.println ("AT+CWMODE_DEF=3");
                if(Serial1.find("OK"))
                  {
                  Serial.println("MODULO WIFI MODO SERVIDOR/CLIENTE");
                  }
                  
              else
                  {
                  Serial.println("MODULO WIFI MODO ERROR");  
                  }
    }          
   else 
    {
    Serial.println("MODULO WIFI NO RESPONDE");
    }

                delay (1000);

                String cmd= "AT+CWJAP=\""; //
                cmd+=SSID;
                cmd+="\",\"";
                cmd+=PASS;
                cmd+="\"";

                Serial1.println(cmd);
                delay (5000);
             
                      if(Serial1.find("OK"))
                        { //Verificar si Modulo Wifi se conecto con la red
                        Serial.println("CONEXION EXISTOSA");
                        }
                        else 
                        {
                        Serial.println("CONEXION ERRONEA");
                        }*/

}//fin Setup


void loop() 
{
/****************************************************IMPRESION POR PANTALLA DE DATOS DE SENSORES********************************************************************************************
 */


          float H = dht.readHumidity (); //Se lee la humedad
          float T = dht.readTemperature(); //Se lee la temperatura

          float Kelvin = T + 273.15;  // conversion de grados celcius a kelvin
          float Fahren = T *1.8+32;   // conversion de grados clcuis a fahregein

          
          //Se imprimen las variables
          Serial.print("Humedad: "); 
          Serial.print(H);
          Serial.print("  Celcius: ");
          Serial.print(T);
          Serial.print("  Kelvin: ");
          Serial.println(Kelvin);
          delay(500);// fin impresion por pantalla de datos

          

          

/****************************************************INCIO DE LECTURA Y ESCRITURA DE TARJETA SD ********************************************************************************************
 */
    String dataString = ""; // Vacia el String para evitar problemas
  // Abre el archivo .txt
  //Solo puede haber un archivo abierto a la vez,
  //por lo que hay que cerrar este si queremos utilizar otro

  File dataFile = SD.open("Olimpiadas.txt", FILE_WRITE);

  //Guardamos en dataString la temperatura y una etiqueta
  // para que se vea la C de grados Centigrados

  dataString +=  String(H) + String ("%  ") + String(T) + String ("C");
  // Si el archivo existe, escribimos en el.
  if (dataFile) {
    dataFile.print( (millis()/1000 ) );
    dataFile.print(",");
    dataFile.println(dataString);
    dataFile.close();
    //    Imprimimos dataString por el Serial para ver la medida.
    Serial.println(dataString);
  }
  // Si el archivo no se abre, imprime un error para avisar.
  else {
    Serial.println("error abriendo Olimpiadas.txt");
  }


 /****************************************************INICIO PLACA ETHERNET********************************************************************************************
 */
   EthernetClient client = server.available();  // Buscamos entrada de clientes
   if (client) 
    { 
      Serial.println("new client");
      boolean currentLineIsBlank = true;  // Las peticiones HTTP finalizan con linea en blanco
      while (client.connected())
        { 
          if (client.available())
             { 
              char c = client.read();
                Serial.write(c);   // Esto no es necesario, pero copiamos todo a la consola
                // A partir de aquí mandamos nuestra respuesta
               if (c == '\n' && currentLineIsBlank) 
                  {   
                    // Enviar una respuesta tipica
                      client.println("HTTP/1.1 200 OK");             
                      client.println("Content-Type: text/html");
                      client.println("Connection: close");
                      client.println("Refresh: 5");            // Actualizar cada 5 segs
                      client.println();
                      client.println("<!DOCTYPE HTML>");
                      client.println("<html>");

                      float Humedad = dht.readHumidity();           // Leer el sensor
                      float Celcius = dht.readTemperature();
                      Serial.println(T);
                      Serial.println(H);
                      
                      // Desde aqui creamos nuestra pagina con el codigo HTML que pongamos
                      client.print("<head><title>Proyecto Sacha</title></head>");
                      client.print("<body><h1> Proyecto Sacha</h1><p>Temperatura - ");
                      client.print(T);     // Aqui va la temperatura
                      client.print(" grados Celsius</p>");
                      client.print("<p>Humedad:  ");
                      client.print(H);    // Aqui va la humedad
                      client.print(" Porciento</p>");
                      client.print("<p><em> La página se actualiza cada 5 segundos.</em></p></body></html>");
                      break;
                }
            if (c == '\n')
                currentLineIsBlank = true;          // nueva linea
            else if (c != '\r')
                currentLineIsBlank = false;         // \r falso
          }
        }
     delay(10);         // Para asegurarnos de que los datos se envia
     client.stop();     // Cerramos la conexion
     Serial.println("client disonnected");
   } // fin PLACA ETHERNET
}



 /**************************************************PLACA ETHERNET********************************************************************************************
 */
/*
WiFiClient client = server2.available();
  
    if (client) 
    { 
      Serial.println("new client");
      boolean currentLineIsBlank = true;  // Las peticiones HTTP finalizan con linea en blanco
      while (client.connected())
        { 
          if (client.available())
             { 
              char c = client.read();
                Serial.write(c);   // Esto no es necesario, pero copiamos todo a la consola
                // A partir de aquí mandamos nuestra respuesta
               if (c == '\n' && currentLineIsBlank) 
                  {   
                    // Enviar una respuesta tipica
                      client.println("HTTP/1.1 200 OK");             
                      client.println("Content-Type: text/html");
                      client.println("Connection: close");
                      client.println("Refresh: 5");            // Actualizar cada 5 segs
                      client.println();
                      client.println("<!DOCTYPE HTML>");
                      client.println("<html>");

                      float Humedad = dht.readHumidity();           // Leer el sensor
                      float Celcius = dht.readTemperature();
                      Serial.println(T);
                      Serial.println(H);
                      
                      // Desde aqui creamos nuestra pagina con el codigo HTML que pongamos
                      client.print("<head><title>Proyecto Sacha</title></head>");
                      client.print("<body><h1> Proyecto Sacha</h1><p>Temperatura - ");
                      client.print(T);     // Aqui va la temperatura
                      client.print(" grados Celsius</p>");
                      client.print("<p>Humedad:  ");
                      client.print(H);    // Aqui va la humedad
                      client.print(" Porciento</p>");
                      client.print("<p><em> La página se actualiza cada 5 segundos.</em></p></body></html>");
                      break;
                }
            if (c == '\n')
                currentLineIsBlank = true;          // nueva linea
            else if (c != '\r')
                currentLineIsBlank = false;         // \r falso
          }
        }
     delay(10);         // Para asegurarnos de que los datos se envia
     client.stop();     // Cerramos la conexion
     Serial.println("client disonnected");
    }
} // fin loop
*/

