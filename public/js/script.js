$(document).ready(function () {
  $("#answerType").on("change", function () {
    var ans = $("#answerType").find(":selected").val()
    if (ans == "Dropdown" || ans == "Checkbox" || ans == "Radio") {
      $("#options").css("visibility", "visible")
    } else {
      $("#options").css("visibility", "hidden")
    }
  })
})
