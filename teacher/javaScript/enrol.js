window.onload = function() {
    let newStudentBtn = document.querySelector('.newStudentBtn');
    let enrollmentBtn = document.querySelector('.enrollmentBtn');
    let newTeacherBtn = document.querySelector('.newTeacherBtn');
    let newStudentForm = document.querySelector('#newStudentForm');
    let enrolmentForm = document.querySelector('#enrolmentForm');
    let newTeacherForm = document.querySelector('#newTeacherForm');

    newStudentBtn.classList.add('activeBtn');

    enrollmentBtn.addEventListener('click', function() {
        newStudentForm.style.display = 'none';
        enrolmentForm.style.display = 'block';
        newTeacherForm.style.display = 'none';
        newStudentBtn.classList.remove('activeBtn');
        enrollmentBtn.classList.add('activeBtn');
        newTeacherBtn.classList.remove('activeBtn');
    });

    newStudentBtn.addEventListener('click', function() {
        newStudentForm.style.display = 'block';
        enrolmentForm.style.display = 'none';
        newTeacherForm.style.display = 'none';
        newStudentBtn.classList.add('activeBtn');
        enrollmentBtn.classList.remove('activeBtn');
        newTeacherBtn.classList.remove('activeBtn');
    });

    newTeacherBtn.addEventListener('click', function() {
        newStudentForm.style.display = 'none';
        enrolmentForm.style.display = 'none';
        newTeacherForm.style.display = 'block';
        newStudentBtn.classList.remove('activeBtn');
        enrollmentBtn.classList.remove('activeBtn');
        newTeacherBtn.classList.add('activeBtn');
    });
}