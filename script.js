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



document.addEventListener("DOMContentLoaded", function () {
    const body = document.body;
    const toggleTheme = document.querySelector(".toggleTheme");

    const theme = localStorage.getItem("theme");

    function setTheme(isDark) {
        body.classList.toggle("dark", isDark);
        toggleTheme.classList.toggle("active", isDark);
        document.body.classList.toggle('dark-mode-var');

        localStorage.setItem("theme", isDark ? "dark" : "light");
    }

    if (theme === "dark") {
        setTheme(true);
    }

    toggleTheme.addEventListener("click", () => {
        const isDark = body.classList.contains("dark");
        setTheme(!isDark);
    });
});