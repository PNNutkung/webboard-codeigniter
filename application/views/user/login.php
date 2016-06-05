<div class="container">
    <div class="row">
        <?php if(validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?php validation_errors() ?>
            </div>
        <?php endif; ?>
        <?php if (isset($error)) : ?>
            <div class="col-md-12">
                <div class="alert alert-danger" role="alert">
                    <?php $error ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="col-md-12">
            <div class="page-header">
                <h1>Login</h1>
            </div>
            <?php form_open() ?>
        </div>
    </div>
</div>
