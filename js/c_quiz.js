// An object for a Quiz, which will contain Question objects.
var Quiz = function(quiz_name) {
  // Private fields for an instance of a Quiz object.
  this.quiz_name = quiz_name;

  // This one will contain an array of Question objects in the order that the questions will be presented.
  this.questions = [];
}

// A function that you can enact on an instance of a quiz object. This function is called add_question() and takes in a Question object which it will add to the questions field.
Quiz.prototype.add_question = function(question) {
  // Randomly choose where to add question
  var index_to_add_question = Math.floor(Math.random() * this.questions.length);
  this.questions.splice(index_to_add_question, 0, question);
}
Quiz.prototype.render = function(container) {
    $('#quiz-name').text(this.quiz_name);
}

  $.ajax({
    type: 'GET',
    url: './models/saveResults.php',
    data: savedata,
    contentType: 'application/json; charset=utf-8',
    success: function(data) {
      console.log("Results saved!");
      console.log(data);
    },
    error: function(xhr, status, error) {
        alert(xhr.responseText);
    }
  });
