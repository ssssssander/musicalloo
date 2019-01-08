/*
 * SD setup:
 * CS - pin 4
 * MOSI - pin 11
 * MISO - pin 12
 * CLK - pin 13
 * 
 * File naming format: [number]-part/full-[optionaltext]
 * So for the first audio file to be played that is one instrument: 1-part-mysong or just 1-part
 * For the first full song: 1-full
 * For the second audio file to be played that is one instrument: 2-part
 * For the second full song: 2-full
 * Etc
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
#define SAMPLING_RATE 16000 // Change according to the sampling rate, 16000 is best for playing via Arduino (used to determine audio length in seconds)
#define MAX_NR_OF_FILES 6 // You can increase this number but be aware of the Arduino's memory
#define MAX_FILE_NAME_LENGTH 12 // 8.3 filenames (12 chars)
#define DELIMITER1 '-'
#define DELIMITER2 '.'

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
int currentMusicNr = 1;
String currentPartAudio;
String currentFullAudio;
String fileNames[MAX_NR_OF_FILES];
char currentPartAudioChar[MAX_FILE_NAME_LENGTH];
char currentFullAudioChar[MAX_FILE_NAME_LENGTH];
bool checkPart = false;
bool checkFull = false;

void setup() {
  Serial.begin(9600);
  
  pinMode(TRIG1, OUTPUT);
  pinMode(ECHO1, INPUT);
  pinMode(TRIG2, OUTPUT);
  pinMode(ECHO2, INPUT);
  pinMode(SPEAKER1, OUTPUT);

  music.speakerPin = SPEAKER1;
  music.loop(0);  
  
  Serial.print("Initializing SD card...");

  if (!SD.begin(CS)) {
    Serial.println("Initialization failed");
    while (true);
  }
  Serial.println("Initialization done");

  root = SD.open("/");
  getFileNames(root);
  root.close();

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
      music.pause(); // This function will unpause when playback is stopped
      music.play(currentFullAudioChar, seconds);
      
      playingAudio1 = false;
      playingAudio2 = true;
    }
    
  }
  else if ((distance1 <= 15) || (distance2 <= 15)) {
    if (!playingAudio1) {
      music.pause(); // This function will unpause when playback is stopped
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
  int fileIndex = 0;
  
  while (true) {
    File entry =  dir.openNextFile();
    if (!entry) {
      break; // No more files
    }
    
    if (!entry.isDirectory()) {
      Serial.print(entry.name());
      Serial.print("\t\t");
      Serial.println(entry.size(), DEC);
      fileNames[fileIndex] = entry.name();
      fileIndex++;
    }
    
    entry.close();
  }
}

void nextSong() {
  for (int i = 0; i < MAX_NR_OF_FILES + 1; i++) {
    int nr = split(fileNames[i], DELIMITER1, 0).toInt();
    String type = split(fileNames[i], DELIMITER2, 0);
    type = split(type, DELIMITER1, 1);
    
    Serial.println("Nr:");
    Serial.println(nr);
    Serial.println("Type:");
    Serial.println(type);
    
    if (nr == currentMusicNr) {
      if (type == "PART") {
        currentPartAudio = fileNames[i];
        checkPart = true;
        Serial.println("Found part");
      }
      if (type == "FULL") {
        currentFullAudio = fileNames[i];
        checkFull = true;
        Serial.println("Found full");
      }
    }

    if (checkPart && checkFull) {
      Serial.println("Breaking from loop");
      break;
    }
  }
  
  currentPartAudio.toLowerCase();
  currentFullAudio.toLowerCase();
  
  playingAudio1 = playingAudio2 = false;
  
  music.disable();
  delay(100);
  
  musicFile = SD.open(currentFullAudio);
  musicLength = musicFile.size() / SAMPLING_RATE;
  currentPartAudio.toCharArray(currentPartAudioChar, MAX_FILE_NAME_LENGTH);
  currentFullAudio.toCharArray(currentFullAudioChar, MAX_FILE_NAME_LENGTH);
  
  Serial.print("Song ");
  Serial.println(currentMusicNr);
  Serial.print("Part name: ");
  Serial.println(currentPartAudio);
  Serial.print("Full name: ");
  Serial.println(currentFullAudio);
  Serial.print("Length: ");
  Serial.print(musicLength);
  Serial.println(" seconds");

  musicFile.close();

  checkPart = checkFull = false;
}
