var menuIcon = document.querySelector(".menu-icon");
var sidebar = document.querySelector(".sidebar");
var container = document.querySelector(".container");

menuIcon.onclick = function(){
    sidebar.classList.toggle("small-sidebar");
    container.classList.toggle("large-container");
}
// script.js

// Function to show the upload video form
function showUploadForm() {
    var uploadForm = document.getElementById("uploadForm");
    uploadForm.style.display = "block";
}
