<?php require_once 'components/header.php'; ?>

<br>
<div class="container">
    <h2>Add questions to <b><?= $test->name ?></b> </h2>
    <small>Select questions from list bellow and push update button.</small>
    <hr/>

    <h4></h4>

    <div id="test_question_panel" class="panel panel-info question_panel">
        <div class="panel-heading">This section conteins current questions of this test.</div>
        <div class="panel-body question_panel_body">
            <?php $i=1; ?>
            <?php foreach($testQuestions as $tq): ?>
                <p><b><?= $i++ . ") " . $tq->Question;?></b></p>
                <div class="row">
                    <div class="col-sm-3">
                        <p><?= "A) " . $tq->A;?></p>
                    </div>
                    <div class="col-sm-3">
                        <p><?= "B) " . $tq->B;?></p>
                    </div>
                    <div class="col-sm-3">
                        <p><?= "C) " . $tq->C;?></p>
                    </div>
                    <div class="col-sm-3">
                        <p><?= "D) " . $tq->D;?></p>
                    </div>
                </div>
                <hr/>
            <?php endforeach; ?>
        </div>
    </div>

    <div id="all_question_panel" class="panel panel-warning question_panel">
        <div class="panel-heading">This section conteins current questions of this test.</div>
        <div class="panel-body question_panel_body">
        <?php $i=1; ?>
            <?php foreach($questions as $tq): ?>
                <?php if($tq->TestId == $test->id) continue; ?>
                <div class="checkbox">
                    <label><input type="checkbox" value=""><p><b><?= $i++ . ") " . $tq->Question;?></b></p></label>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p><?= "A) " . $tq->A;?></p>
                    </div>
                    <div class="col-sm-3">
                        <p><?= "B) " . $tq->B;?></p>
                    </div>
                    <div class="col-sm-3">
                        <p><?= "C) " . $tq->C;?></p>
                    </div>
                    <div class="col-sm-3">
                        <p><?= "D) " . $tq->D;?></p>
                    </div>
                </div>
                <hr/>
            <?php endforeach; ?>
        </div>
    </div>
        
    <br/>
    <br/>

    <h3>All Questions.</h3>
    <small>This table conteins all questions, use checkbox to select several questions and push update button for adding to test.</small>
    
</div> 

<?php require_once 'components/footer.php'; ?>