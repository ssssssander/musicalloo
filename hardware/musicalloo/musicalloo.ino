#define TRIG 12
#define ECHO 13
#define SPEAKER 3

long duration;
int distance;

void setup() {
  pinMode(TRIG, OUTPUT);
  pinMode(ECHO, INPUT);
  pinMode(SPEAKER, OUTPUT);
  Serial.begin(9600);
}
void loop() {
  digitalWrite(TRIG, LOW); // Clear trig pin
  delayMicroseconds(2);
  digitalWrite(TRIG, HIGH);
  delayMicroseconds(10);
  digitalWrite(TRIG, LOW);
  
  duration = pulseIn(ECHO, HIGH);
  distance = (duration * 0.034) / 2;

  if (distance <= 15) {
    tone(SPEAKER, 200, 500);
  }
  
  Serial.print(distance);
  Serial.println(" cm");
  
  delay(500);
}
