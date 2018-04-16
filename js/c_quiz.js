form = document.querySelector("#cquiz_form");

function addQuestions() {

  for (i=0;i<all_questions.length();i++) {

    var question_input = $('<input>')
      .attr('id', all_questions[i].GID)
      .attr('type', "text")
      .attr('name', all_questions[i].GID)
      .appendTo(form);
  }
}
