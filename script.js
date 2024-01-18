function validateForm(){
    var toCheck= document.getElementById().value;
    var re = /^[a-zA-Z0-9]+$/;
    if(!re.test(toCheck)){
        alert("Error: Input contains invalid characters!");
        return false;
    }
    return true;
}

function startTimer(){
    setTimeout(countDown, 500)

}

function countDown(){
    let timerText = document.getElementById('timertext');
    timerText.style.display='block';
    let currentTimer = timerText.innerHTML;
    currentTimer = parseInt(currentTimer);
    currentTimer --;
    timerText.innerHTML = currentTimer;

    setTimeout(countDown, 100)
}