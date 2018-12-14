#define AUDIO A3
int a = 0;

void setup() {
  Serial.begin(9600);
  pinMode(AUDIO, OUTPUT);

}

void loop() {
  tone(AUDIO, a, a);
  Serial.println("Beep");
  delay(a);
  
  a++;
}
