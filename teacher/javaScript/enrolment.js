window.onload = function() {
    let newStudentBtn = document.querySelector('.newStudentBtn');
    let enrollmentBtn = document.querySelector('.enrollmentBtn');
    let newStudentForm = document.querySelector('#newStudentForm');
    let enrolmentForm = document.querySelector('#enrolmentForm');

    newStudentBtn.classList.add('activeBtn');

    enrollmentBtn.addEventListener('click', function() {
        newStudentForm.style.display = 'none';
        enrolmentForm.style.display = 'block';
        newStudentBtn.classList.remove('activeBtn');
        enrollmentBtn.classList.add('activeBtn');
    });

    newStudentBtn.addEventListener('click', function() {
        newStudentForm.style.display = 'block';
        enrolmentForm.style.display = 'none';
        newStudentBtn.classList.add('activeBtn');
        enrollmentBtn.classList.remove('activeBtn');
    });
}