"use strict";

function timeDecrement() {
    let timeLeft = Number(document.getElementById('session-expire-seconds').innerHTML);

    document.getElementById('session-expire-seconds').innerHTML = --timeLeft;
    document.getElementById('session-expire-time').innerHTML = secToTime(timeLeft);
}

function secToTime(sec) {
    let hours = parseInt(sec / (60 * 60));
    let minutes = parseInt((sec % (60 * 60)) / 60);
    let seconds = parseInt(sec % (60));
    let resultStr = '';

    if (hours) 
        resultStr += hours + "ч ";
    if (minutes)
        resultStr += minutes + "м ";
    if (seconds)
        resultStr += seconds + "с";
    
    return resultStr;
}

let decrementInterval = setInterval(timeDecrement, 1000);

//Вызов функции для отображения времени сразу после перезагрузки страницы
timeDecrement();

