<?php require_once 'components/header.php'; ?>

<br>
<div class="container">
    <div class="row">
        <h2>Managing all tests.</h2>    
        <small>You can use <b>Edit</b> button to edit tests or <b>Bind</b> for binding users to tests.</small>
        <hr/>
        <br/>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>NO.</th>
                <th>Name</th>
                <th>Description</th>
                <th>Questions count</th>
                <th>Users count</th>
            </tr>
            </thead>
            <tbody>
            <?php $i=0 ?>
            <?php foreach($tests as $test): ?>
            <?php $url = "/adminEditQuestions.php/?test=" . $test->id?>
            <?php $i++ ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $test->name ?></td>
                <td><?= $test->description ?></td>
                <td><?= ($test->qcount==null)?0:$test->qcount ?></td>
                <td><?= ($test->count==null)?0:$test->count ?></td>
                <td><a href= <?= $url ?> class="btn btn-primary">Edit questions</a></td>
                <td><a href="/" class="btn btn-primary">Bind to users</a></td>
            </tr>            
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div> 

<?php require_once 'components/footer.php'; ?>