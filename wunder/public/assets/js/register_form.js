// var notSubmitted = true;
// $('form').on('submit', function () {
//     notSubmitted = false;
//     console.log(notSubmitted);
// });

// $(window).on("beforeunload", function () {
//     return notSubmitted ? $('form').submit() : null;
// })

// $("form").submit(function (e) {
//     e.preventDefault();
//     console.log(e.target);
//     // ... ajax submission goes here ...

//     var request = new XMLHttpRequest();

//     // Instantiating the request object
//     request.open("POST", e.target.action);

//     var myForm = document.getElementById(e.target.id);
//     var formData = new FormData(myForm);
//     request.send(formData);

// });
