<?php require_once 'components/header.php'; ?>

<br>
<div class="container">
    <div class="row">

    <h2>Create a new test
        
    </h2>
    <small>Set a name and a describtion for starting create a new Test.</small>
    <hr/>

        <div class="col-sm-6 col-xs-10 ">

        <?php if($status['STATUS'] == 'ERROR') : ?>
            <div class="alert alert-danger">
                <p><strong>Please fix the following errors:</strong></p>
                <?php foreach($status['ERRORS'] as $key=>$value): ?>
                    <p><?php echo $value ?></p>            
                <?php endforeach; ?>
            </div>
        <?php elseif($status['STATUS'] == 'SUCCESS') : ?>
            <div class="alert alert-success">
                <strong>Success</strong> Successfuly created.
            </div>
        <?php endif; ?>

            <form action="./createTest.php" method="POST">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input id="name" autocomplete="off" type="text" name="name" value= "<?= old('name') ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" type="text" name="description" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Create test</button>
                </div>
            </form>
        </div>
    </div>
</div> 

<?php require_once 'components/footer.php'; ?>