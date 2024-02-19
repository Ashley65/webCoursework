
// // Get the course card
// var courseCard = document.querySelector(".courseCard");
//
// // Get the arrow buttons
// var arrowButtons = document.querySelectorAll(".courseNav .material-symbols-outlined");
//
// // Add event listener to each arrow button
// arrowButtons.forEach(function(button){
//     button.addEventListener("click", function(){
//         var currentCourseId = parseInt(courseCard.dataset.courseId);
//         var direction = button.textContent === "arrow_forward" ? 1 : -1;
//         var newCourseId = currentCourseId + direction;
//
//         // Send an AJAX request to get the new course details
//         $.ajax({
//             url: ',
//             type: 'GET',
//             data: { course_id: newCourseId },
//             success: function(response) {
//                 var newCourseDetails = JSON.parse(response);
//
//                 if (newCourseDetails.error) {
//                     alert(newCourseDetails.error);
//                 } else {
//                     // Update the course information in the course card
//                     courseCard.querySelector(".courseBody h2").textContent = newCourseDetails.course_name;
//                     courseCard.querySelector(".courseBody p").textContent = newCourseDetails.course_description;
//                     courseCard.querySelector(".courseNav .courseTitle p").textContent = newCourseDetails.course_name;
//
//                     // Update the course id in the course card data attribute
//                     courseCard.dataset.courseId = newCourseId;
//                 }
//             },
//             error: function() {
//                 alert('An error occurred while fetching the course details.');
//             }
//         });
//     });
// });

function getCourseFile(courseId) {
    var courseFile = "";
    $.ajax({
        url: '/getCourseFile',
        type: 'GET',
        data: { course_id: courseId },
        async: false,
        success: function(response) {
            var files = JSON.parse(response);

            if (files.error) {
                alert(files.error);
            } else {
                courseFile = files;
            }
        },
        error: function() {
            alert('An error occurred while fetching the course file.');
        }
    });
    return courseFile;
}
