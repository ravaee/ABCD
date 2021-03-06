<?php require_once 'components/header.php'?>

<br>
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-10 col-md-offset-3 col-lg-offset-3 col-sm-offset-3 col-xs-offset-1 ">
            
            <?php if($status['STATUS'] == 'ERROR') : ?>
                <div class="alert alert-danger">
                    <p><strong>Please fix the following errors:</strong></p>
                    <?php foreach($status['ERRORS'] as $key=>$value): ?>
                        <p><?php echo $value ?></p>            
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form action="./login.php" method="POST">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input id="email" type="text" name="email" value= "<?= old('email') ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input id="password" type="password" name="password"  class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Login</button>
                </div>
            </form>
        </div>
    </div>
</div> 

<?php require_once 'components/footer.php'?>


