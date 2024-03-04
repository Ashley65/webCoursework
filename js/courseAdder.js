window.onload = function() {
    const videosButton = document.querySelector('.course-videos-btn');
    const materialsButton = document.querySelector('.course-materials-btn');
    const fileInput = document.querySelector('.hidden-file-input');
    const fileNameDisplay = document.querySelector('.file-name');

    document.querySelector('.materialsUploadForm').style.display = 'block';
    document.querySelector('.videosUploadForm').style.display = 'none';
    materialsButton.classList.add('button-focused');

    videosButton.addEventListener('click', function() {
        document.querySelector('.videosUploadForm').style.display = 'block';
        document.querySelector('.materialsUploadForm').style.display = 'none';
        videosButton.classList.add('button-focused');
        materialsButton.classList.remove('button-focused');
    });

    materialsButton.addEventListener('click', function() {
        document.querySelector('.materialsUploadForm').style.display = 'block';
        document.querySelector('.videosUploadForm').style.display = 'none';
        materialsButton.classList.add('button-focused');
        videosButton.classList.remove('button-focused');
    });

    setTimeout(function() {
        materialsButton.focus();
    }, 0);

    document.querySelector('.custom-file-button').addEventListener('click', function(event) {
        event.preventDefault();
        fileInput.click();
    });

    fileInput.addEventListener('change', function() {
        if (fileInput.files.length > 0) {
            let fileName = fileInput.files[0].name;
            if (fileName.length > 40) {
                fileName = fileName.substring(0, 40) + '...';
            }
            fileNameDisplay.textContent = fileName;
        }
    });
};