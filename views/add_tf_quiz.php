<?php include('./header.php'); ?>
<script src="../js/new_quiz.js"></script>
<br>
<!-- <form action='../index.php' method='POST' accept-charset="UTF-8">
  <input type="hidden" name="action" value="new_tf_quiz">

  <label class="pull-left">Quiz Name:</label>
  <input class="pull-left" type='text' name='quizname' maxlength="100" required>

  <label class="pull-left">Quiz Topic:</label>
  <input class="pull-left" type='text' name='topic' maxlength="300">

  <label class="pull-left">Question Prompt:</label>
  <input class="pull-left" type='text' name='prompt' maxlength="300" required>

  <label class="pull-left">Answer:</label>
  <select name='answer' class="pull-left">
    <option value="True">True</option>
    <option value="False">False</option>
  </select>

  <input type='submit' value='Submit' class="btn btn-success pull-left">
</form> -->
<div class="input-group col-md-6">
    <input id='phenotitle' type="text" class="ui-widget col-md-12" placeholder="Phenoterm">
    <span class="input-group-btn">
        <button class="btn btn-default btn-add-panel" type="submit">
            <i class="glyphicon glyphicon-plus"></i>
        </button>
    </span>
</div>
<br><br>
<form action='.' class="ajax" method="post">
    <div class="panel-group" id="accordion">
        <div class="panel panel-default template" id="pheno_panel" style="display: none">
            <div class="panel-heading">
                <div class="panel-heading"> <span class="glyphicon glyphicon-remove-circle pull-right "></span>
                    <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            Gene Expression
                        </a>
                    </h4>
                </div>
            </div>

            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="form-group row">
                        <label for="pheno_ontological_id" class="col-sm-3 col-form-label">Phenotypic ontological ID</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="pheno_ontological_id" placeholder="Phenotypic ontological ID">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phenobase_extension_term" class="col-sm-3 col-form-label">PhenoBase extension term</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="phenobase_extension_term" placeholder="PhenoBase extension term">
                        </div>
                    </div>

                    <div class="form-vertical col-md-12">
                        <div class="col-md-6 inline">
                            <div class="entry input-group" style="vertical-align: middle;">
                                <label class="mr-sm-4" for="pheno_value">Pheno Value</label>
                                <select class="custom-select mb-2 mr-sm-2" name="pheno_value">
                                    <option selected>Choose...</option>
                                    <option>Increased</option>
                                    <option>Decreased</option>
                                    <option>No Change</option>
                                    <option>Abnormal</option>
                                    <option>Ameliorated</option>
                                    <option>Refractory</option>
                                    <option>Side Effect</option>
                                    <option>Restored</option>
                                    <option>No Adverse Effect</option>
                                    <option>Not Reported</option>
                                </select>
                                <span class="group-btn">
                                    <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#pheno_value_detail_div">
                                        <i class="glyphicon glyphicon-plus"></i> Detail
                                    </button>
                                </span>
                            </div>

                            <div class="form-group collapse expandablephen" id="pheno_value_detail_div">
                                <label for="pheno_value_detail">Pheno Value Detail:</label>
                                <textarea class="form-control" rows="5" name="pheno_value_detail"></textarea>

                            </div>

                        </div>

                        <div class="col-md-6 inline">
                            <div class="entry input-group" >
                                <label for="exp_paradigm" class="col-sm-8 form-label">Experimental Paradigm</label>
                                <div style="display: inline-flex;">
                                    <input type="text" class="form-control" name="exp_paradigm" placeholder="Experimental Paradigm">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#exp_paradigm_detail_div">
                                            <i class="glyphicon glyphicon-plus"></i> Detail
                                        </button>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group collapse expandablepara" id="exp_paradigm_detail_div" >
                                <label for="exp_paradigm_detail">Experimental Paradigm Detail:</label>
                                <textarea class="form-control" rows="5" name="exp_paradigm_detail"></textarea>
                            </div>
                            <br>
                        </div>
                    </div>



                    <div class="form-group row">
                        <label for="age" class="col-sm-3 col-form-label">Age at Testing</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="age" placeholder="Age at Testing">
                        </div>
                    </div>

                    <fieldset class="form-inline row">
                        <label for="gender" class="col-sm-3 col-form-label">Gender</label>
                        <div class="col-sm-6">
                            <label class="radio-inline">
                                <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="female">
                                Female
                            </label>
                            <label class="radio-inline">
                                <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="male">
                                Male
                            </label>
                            <label class="radio-inline">
                                <input class="form-check-input" type="radio" name="gender" id="gridRadios3" value="?" checked>
                                Unknown
                            </label>
                        </div>
                    </fieldset>

                    <div class="form-inline row">
                        <label class="col-sm-2 col-form-label" for="gp_symbol">Gene/Protein symbol</label>
                        <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" name="gp_symbol" placeholder="Gene/Protein symbol">

                        <label class="col-sm-2-right col-form-label" for="gp_symbol_id">Gene/Protein/GEO ID</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <input type="text" class="form-control" name="gp_symbol_id" placeholder="Gene/Protein/GEO ID">
                        </div>
                    </div>

                    <div class="form-inline row" >
                        <label class="col-sm-2 col-form-label" for="anatomy_region">Anatomical Region</label>
                        <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" name="anatomy_region" placeholder="Anatomical Region">

                        <label class="col-sm-2-right col-form-label" for="anatomy_region_id">Anatomical Region ID</label>
                        <input type="text" class="form-control" name="anatomy_region_id" placeholder="Anatomical Region ID">

                    </div>

                    <div class="form-inline row">
                        <label class="col-sm-2 col-form-label" for="cell_type">Cell Type</label>
                        <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" name="cell_type" placeholder="Cell Type">

                        <label class="col-sm-2-right col-form-label" for="cell_type_id">Cell Type ID</label>
                        <input type="text" class="form-control" name="cell_type_id" placeholder="Cell Type ID">

                    </div>

                    <div class="form-group row">
                        <label for="pmid" class="col-sm-3 col-form-label">PMID</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="pmid" placeholder="PMID">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="figure" class="col-sm-3 col-form-label">Figure</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="figure" placeholder="Figure">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="close_pheno_term" class="col-sm-3 col-form-label">Closest PhenoBase term</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="close_pheno_term" placeholder="Closest PhenoBase term">
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name ="model_id" value="<?php echo $model_id ?>">
            <input type="hidden" name ="pheno_id" id="phenoid" value="">
        </div>
    </div>

    <input type="hidden" name="action" value="add_pheno">

    <input type="submit" value="submit" id="form_submit">

</form>


<?php include('./footer.php'); ?>
