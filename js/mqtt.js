"use strict";

const CLIENT = new Paho.MQTT.Client("broker.hivemq.com", 8000, "RakursMachineAdvisorStand2");

const CONVEYOR_STATUS_TOPIC = "rakurs/machine-advisor-stand/to-plc/conveyor/status",
      CONVEYOR_MODE_TOPIC = "rakurs/machine-advisor-stand/to-plc/conveyor/mode",
      CONVEYOR_SPEED_TOPIC = "rakurs/machine-advisor-stand/to-plc/conveyor/speed",
      BOILER_STATUS_TOPIC = "rakurs/machine-advisor-stand/to-plc/boiler/status",
      BOILER_MOTOR_TOPIC = "rakurs/machine-advisor-stand/to-plc/boiler/motor",
      BOILER_BURNER_TOPIC = "rakurs/machine-advisor-stand/to-plc/boiler/burner";

CLIENT.connect({ onSuccess: onConnect });
CLIENT.onConnectionLost = onConnectionLost;

function onConnect() {
    console.log("connection to MQTT broker is successful");
    document.getElementById('broker-connection-status').innerHTML = 'Ваша сессия успешно запущена';
}

function onConnectionLost() {
    console.log("connection to MQTT broker is lost");
    document.getElementById('broker-connection-status').innerHTML = 'Ваша сессия разорвана';
}

function publish(topic, msg) {
    const message = new Paho.MQTT.Message(msg);

    message.destinationName = topic;
    
    CLIENT.send(message);
}