<div class="container">
    <div class="row">
        <?php if(validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo validation_errors(); ?>
            </div>
        <?php endif; ?>
        <?php if (isset($error)) : ?>
            <div class="col-md-12">
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="col-md-12">
            <div class="page-header">
                <h1>Login</h1>
            </div>
            <?php echo form_open('/user/login'); ?>
                <div class="form-group">
                    <label for="username"></label>
                    <input type="text" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="password"></label>
                    <input type="password" name="password" placeholder="Password"></div>
                <div class="form-group">
                    <input type="submit" value="Login">
                    <a href="register">
                        <input type="button" value="Register">
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
