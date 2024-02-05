
// Get the course card
var courseCard = document.querySelector(".courseCard");

// Get the arrow buttons
var arrowButtons = document.querySelectorAll(".courseNav .material-symbols-outlined");

// Add event listener to each arrow button
arrowButtons.forEach(function(button){
    button.addEventListener("click", function(){
        // Get the current course id from the course card
        var currentCourseId = parseInt(courseCard.dataset.courseId);

        // Determine whether the next or previous button was clicked
        var direction = button.textContent === "arrow_forward" ? 1 : -1;

        // Calculate the new course id
        var newCourseId = currentCourseId + direction;

        // Make sure the new course id is within the valid range
        newCourseId = Math.max(0, Math.min(newCourseId, courses.length - 1));

        // Get the new course details
        var newCourseDetails = courses[newCourseId];

        // Update the course information in the course card
        courseCard.querySelector(".courseBody h2").textContent = newCourseDetails.course_name;
        courseCard.querySelector(".courseBody p").textContent = newCourseDetails.course_description;
        courseCard.querySelector(".courseNav .courseTitle p").textContent = newCourseDetails.course_name;

        // Update the course id in the course card data attribute
        courseCard.dataset.courseId = newCourseId;
    });
});