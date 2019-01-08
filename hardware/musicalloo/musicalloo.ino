/*
 * SD setup:
 * CS - pin 4
 * MOSI - pin 11
 * MISO - pin 12
 * CLK - pin 13
 */

#include <SD.h>
#include <SPI.h>
#include <TMRpcm.h>

#define CS 4
#define SPEAKER1 9
#define TRIG1 8
#define ECHO1 7
#define TRIG2 6
#define ECHO2 5
#define SAMPLING_RATE 16000
#define MAX_NR_OF_FILES 10
#define DELIMITER '-'

TMRpcm music;
File musicFile;
File root;
long duration1;
int distance1;
long duration2;
int distance2;
bool playingAudio1 = false;
bool playingAudio2 = false;
unsigned long previousMillis = 0;
unsigned int seconds = 0;
int musicLength;
String fileNames[MAX_NR_OF_FILES];
int fileCounter = 0;
int currentMusicNr = 1;
String currentPartAudio;
String currentFullAudio;
char currentPartAudioChar[20];
char currentFullAudioChar[20];

void setup() {
  Serial.begin(9600);
  
  pinMode(TRIG1, OUTPUT);
  pinMode(ECHO1, INPUT);
  pinMode(TRIG2, OUTPUT);
  pinMode(ECHO2, INPUT);
  pinMode(SPEAKER1, OUTPUT);

  music.speakerPin = SPEAKER1;
  music.loop(1);  
  
  Serial.print("Initializing SD card...");

  if (!SD.begin(4)) {
    Serial.println("initialization failed!");
    while (1);
  }
  Serial.println("initialization done.");

  root = SD.open("/");
  getFileNames(root);

  music.quality(0);
  music.setVolume(6); // 0 to 7

  nextSong();
}


void loop() {
  unsigned long currentMillis = millis();

  emitUltrasound(TRIG1);
  duration1 = pulseIn(ECHO1, HIGH);
  distance1 = (duration1 * 0.034) / 2;
  
  emitUltrasound(TRIG2);
  duration2 = pulseIn(ECHO2, HIGH);
  distance2 = (duration2 * 0.034) / 2;
  
  if ((distance1 <= 15) && (distance2 <= 15)) {
    if (!playingAudio2) {
      music.pause();
      music.play(currentFullAudioChar, seconds);
      
      playingAudio1 = false;
      playingAudio2 = true;
    }
    
  }
  else if ((distance1 <= 15) || (distance2 <= 15)) {
    if (!playingAudio1) {
      music.pause();
      music.play(currentPartAudioChar, seconds);
      
      playingAudio1 = true;
      playingAudio2 = false;
    }
  }
  else {
    music.stopPlayback();   
    
    playingAudio1 = false;
    playingAudio2 = false;
  }
  
  Serial.print("Sensor 1: ");
  Serial.print(distance1);
  Serial.println(" cm");

  Serial.print("Sensor 2: ");
  Serial.print(distance2);
  Serial.println(" cm");

  Serial.print("Song timer: ");
  Serial.println(seconds);

  if (currentMillis - previousMillis >= 1000) {
    previousMillis = currentMillis;
    seconds++;
  }

  if (seconds >= musicLength) {
    seconds = 0;
    currentMusicNr++;
    nextSong();
  }
  
  delay(500);
}

void emitUltrasound(int trigPin) {
  digitalWrite(trigPin, LOW);
  delayMicroseconds(2);
  digitalWrite(trigPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin, LOW);
}

String split(String data, char separator, int index) {
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

void getFileNames(File dir) {
  while (true) {
    File entry =  dir.openNextFile();
    if (!entry) {
      // no more files
      break;
    }
    
    if (!entry.isDirectory()) {
      Serial.print(entry.name());
      Serial.print("\t\t");
      Serial.println(entry.size(), DEC);
      fileNames[fileCounter] = entry.name();
    }
    
    entry.close();
    fileCounter++;
  }
}

void nextSong() {
  for (int i = 0; i < MAX_NR_OF_FILES; i++) {
    int nr = split(fileNames[i], DELIMITER, 0).toInt();
    String type = split(fileNames[i], DELIMITER, 1);
    
    Serial.println("nr");
    Serial.println(nr);
    Serial.println("type");
    Serial.println(type);
    
    if (nr == currentMusicNr) {
      if (type == "P") {
        currentPartAudio = fileNames[i];
      }
      if (type == "F") {
        currentFullAudio = fileNames[i];
        break;
      }
    }
  }

  currentFullAudio.toLowerCase();
  musicFile = SD.open(currentFullAudio);
  musicLength = musicFile.size() / SAMPLING_RATE;
  currentPartAudio.toCharArray(currentPartAudioChar, 20);
  currentFullAudio.toCharArray(currentFullAudioChar, 20);
  Serial.print("Song ");
  Serial.println(currentMusicNr);
  Serial.print("Part name: ");
  Serial.println(currentPartAudio);
  Serial.print("Full name: ");
  Serial.println(currentFullAudio);
  Serial.print("Length: ");
  Serial.print(musicLength);
  Serial.println(" seconds");
}
