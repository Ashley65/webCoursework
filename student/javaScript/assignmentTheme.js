document.addEventListener("DOMContentLoaded", function () {
    const body = document.body;
    const toggleTheme = document.querySelector(".toggleTheme");

    const theme = localStorage.getItem("theme");

    function setTheme(isDark) {
        body.classList.toggle("dark", isDark);
        toggleTheme.classList.toggle("active", isDark);
        document.body.classList.toggle('dark-mode-var');

        if (isDark) {
            document.querySelector('.logo img').src = '../../../assets/img/AceTraining-logo-dark-transparent.png';
        } else {
            document.querySelector('.logo img').src = '../../../assets/img/AceTraining-logo-light-transparent.png';
        }

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