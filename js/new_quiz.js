var $template = $(".template");
$(document).ready(function () {
    //We will be using an unique index number for each new instance of the cloned form
    var hash = 0;
    //When the button is clicked (or Enter is pressed while it's selected)
    $(".btn-add-panel").click(function () {
        //Increment the unique index cause we are creating a new instance of the form
        hash++;
        //Clone the form and place it just before the button's <p>. Also give its id a unique index
        var $newPanel = $template.clone().attr("id", "pheno_panel" + hash);
        $newPanel.find(".collapse").removeClass("in");
        $newPanel.find(".accordion-toggle").attr("href", "#" + hash)
                .text(document.getElementById('phenotitle').value);
        $newPanel.find(".panel-collapse").attr("id", hash).addClass("collapse").removeClass("in");
        $newPanel.find(".expandablephen").attr("id", 'pheno_value_detail_div' + hash);
        $newPanel.find(".expandablepara").attr("id", 'exp_paradigm_detail_div' + hash);
        $("#accordion").append($newPanel.fadeIn());
        //Make the clone visible by changing CSS
        $("#pheno_panel" + hash).css("display", "inline");
        //For each input fields contained in the cloned form...
        $("#pheno_panel" + hash + " :input").each(function () {
            //Modify the name attribute by adding the index number at the end of it
            $(this).attr("name", $(this).attr("name") + "[" + hash + "]");
            //Modify the id attribute by adding the index number at the end of it
            $(this).attr("id", $(this).attr("id") + "[" + hash + "]");
        });
        //For each of the two buttons for showing detail
        $("#pheno_panel" + hash + " :button").each(function () {
            //Modify the toggle target by adding the index number at the end of it
            $(this).attr("data-target", $(this).attr("data-target") + hash);
        });
        document.getElementById('phenoid' + "[" + hash + "]").value = document.getElementById('phenotitle').value;
    });
});
$(document).on('click', '.glyphicon-remove-circle', function () {
    $(this).parents('.panel').get(0).remove();
});
