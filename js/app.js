"use strict";

function publishConveyorStatus(status) {
    publish(CONVEYOR_STATUS_TOPIC, status);
}

function publishConveyorMode(mode) {
    publish(CONVEYOR_MODE_TOPIC, mode);
}

function publishConveyorSpeed(speed) {
    publish(CONVEYOR_SPEED_TOPIC, speed);
}

function publishBoilerStatus(status) {
    publish(BOILER_STATUS_TOPIC, status);
}

function publishBoilerMotor(motor) {
    publish(BOILER_MOTOR_TOPIC, motor);
}

function publishBoilerBurner(burner) {
    publish(BOILER_BURNER_TOPIC, burner);
}

function displayAndPublishConveyorStatus() {
    let status = '';

    if(document.getElementById('conveyor-status').checked) {
        document.getElementById('conveyor-status-message').innerHTML = "Конвейер включен";
        status = 'TRUE';
    } else {
        document.getElementById('conveyor-status-message').innerHTML = "Конвейер выключен";
        status = 'FALSE';
    }

    publishConveyorStatus(status);
}

function displayAndPublishConveyorMode() {
    let mode = '';

    if (document.getElementById('conveyor-mode').checked) {
        document.getElementById('conveyor-mode-message').innerHTML = "Выбран экспертный режим";
        mode = 'TRUE';
    } else {
        document.getElementById('conveyor-mode-message').innerHTML = "Выбран стандартный режим";
        mode = 'FALSE';
    }

    publishConveyorMode(mode);
}

function displayAndPublishConveyorSpeed() {
    let speed = document.getElementById('conveyor-speed').value;

    document.getElementById('conveyor-speed-message').innerHTML = (Math.round(speed * 100) / 100).toFixed(2);

    publishConveyorSpeed(speed);
}

function displayAndPublishBoilerStatus() {
    let status = '';

    if (document.getElementById('boiler-status').checked) {
        document.getElementById('boiler-status-message').innerHTML = "Котел включен";
        status = 'TRUE';
    } else {
        document.getElementById('boiler-status-message').innerHTML = "Котел выключен";
        status = 'FALSE';
    }

    publishBoilerStatus(status);
}

function displayAndPublishBoilerMotor() {
    let motor = '';

    if(document.getElementById('boiler-motor').checked) {
        document.getElementById('boiler-motor-message').innerHTML = "Авария двигателя насоса";
        motor = 'TRUE';
    } else {
        document.getElementById('boiler-motor-message').innerHTML = "Двигатель насоса в норме";
        motor = 'FALSE';
    }

    publishBoilerMotor(motor);
}

function displayAndPublishBoilerBurner() {
    let burner = '';

    if(document.getElementById('boiler-burner').checked) {
        document.getElementById('boiler-burner-message').innerHTML = "Авария горелки";
        burner = 'TRUE';
    } else {
        document.getElementById('boiler-burner-message').innerHTML = "Горелка в норме";
        burner = 'FALSE';
    }
    
    publishBoilerBurner(burner);
}


