/*
Arduino Based Music Player

 This example shows how to play three songs from SD card by pressing a push button

 The circuit:
 * Push Button on pin 2 and 3
 * Audio Out - pin 9
 * SD card attached to SPI bus as follows:
 ** MOSI - pin 11
 ** MISO - pin 12
 ** CLK - pin 13
 ** CS - pin 4 

 created  25 Jun 2017
 by Aswinth Raj

 This example code was created for CircuitDigest.com

 */


#include <SD.h> //Lib to read SD card
#include <TMRpcm.h> //Lib to play auido
#include <SPI.h> //SPI lib for SD card

#define SD_ChipSelectPin 4 //Chip select is pin number 4
TMRpcm music; //Lib object is named "music"


#define SPEAKER1 9
#define TRIG1 8
#define ECHO1 7

#define TRIG2 6
#define ECHO2 5




long duration1;
int distance1;

long duration2;
int distance2;

bool playingAudio1 = false;
bool playingAudio2 = false;


unsigned long previousMillis = 0;
unsigned int seconds = 0;




String getValue(String data, char separator, int index)
  {
      int found = 0;
      int strIndex[] = { 0, -1 };
      int maxIndex = data.length() - 1;
  
      for (int i = 0; i <= maxIndex && found <= index; i++) {
          if (data.charAt(i) == separator || i == maxIndex) {
              found++;
              strIndex[0] = strIndex[1] + 1;
              strIndex[1] = (i == maxIndex) ? i+1 : i;
          }
      }
      return found > index ? data.substring(strIndex[0], strIndex[1]) : "";
  }




void setup() {
  pinMode(TRIG1, OUTPUT);
  pinMode(ECHO1, INPUT);
  pinMode(SPEAKER1, OUTPUT);
  
  pinMode(TRIG2, OUTPUT);
  pinMode(ECHO2, INPUT);
  Serial.begin(9600);

  music.speakerPin = SPEAKER1; //Auido out on pin 9
  
  if (!SD.begin(SD_ChipSelectPin)) {
  Serial.println("SD fail");
  return;
  }

  music.quality(0);
  music.setVolume(6);    //   0 to 7. Set volume level
  //music.play((char*)"audio1.wav");
}


void loop() {

  unsigned long currentMillis = millis();
  
  digitalWrite(TRIG1, LOW); // Clear trig pin
  delayMicroseconds(2);
  digitalWrite(TRIG1, HIGH);
  delayMicroseconds(10);
  digitalWrite(TRIG1, LOW);

  duration1 = pulseIn(ECHO1, HIGH);
  distance1 = (duration1 * 0.034) / 2;



  
  
  digitalWrite(TRIG2, LOW); // Clear trig pin
  delayMicroseconds(2);
  digitalWrite(TRIG2, HIGH);
  delayMicroseconds(10);
  digitalWrite(TRIG2, LOW);
  
  duration2 = pulseIn(ECHO2, HIGH);
  distance2 = (duration2 * 0.034) / 2;

  


  
  

  if ((distance1 <= 15) && (distance2 <= 15)) {

    

    if (!playingAudio2) {
      music.setVolume(6);
      
      music.play((char*)"audio2.wav", seconds);
      playingAudio1 = false;
      playingAudio2 = true;
    }
    
  }
  else if ((distance1 <= 15) || (distance2 <= 15)) {

   
      
    if (!playingAudio1) {
      music.setVolume(6);
            
      music.play((char*)"audio1.wav", seconds);
      playingAudio1 = true;
      playingAudio2 = false;
    }
    
  }
  else {
    music.setVolume(0);
    playingAudio1 = false;
    playingAudio2 = false;
  }




  Serial.print("Sensor 1: ");
  Serial.print(distance1);
  Serial.println(" cm");

  Serial.print("Sensor 2: ");
  Serial.print(distance2);
  Serial.println(" cm");

  Serial.println(seconds);

  if (currentMillis - previousMillis >= 1000) {
    previousMillis = currentMillis;
    seconds++;
  }

  if (seconds >= 140) {
    seconds = 0;
  }
  
  delay(500);

  Serial.println(getValue("audio1-125.wav", '-', 1));
}
