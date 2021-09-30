
$(document).ready(function () {
  $("#hideLogin").click(function () {
    console.log("Login was pressed");
    $("#loginForm").hide();
    $("#registerForm").show();
  });

  $("#hideRegister").click(function () {
    // $(".hideRegister"). is jQuery object
    console.log("register was pressed");
    $("#registerForm").hide();
    $("#loginForm").show();
  });
});
