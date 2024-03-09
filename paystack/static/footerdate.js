
document.addEventListener("DOMContentLoaded", function () {
    // Get the current date
    var currentDate = new Date();

    // Get the year
    var currentYear = currentDate.getFullYear();

    // Update the content of the paragraph with the id "currentDateParagraph"
    var currentDateParagraph = document.getElementById('currentDateParagraph');
    
    if (currentDateParagraph) {
        currentDateParagraph.textContent = 'NACOS Nasarawa State University Keffi  (c)' + currentYear + '  ' + 'Powered By SHRINE';
    } else {
        console.error('Element with id "currentDateParagraph" not found.');
    }
});