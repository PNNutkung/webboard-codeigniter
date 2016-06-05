<div class="container">
    <div class="row">
        <?php if (validation_errors()) : ?>
            <div class="col-md-12">
                <div class="alert alert-danger" role="alert">
                    <?php echo validation_errors(); ?>
                </div>
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
                <h1>Register</h1>
            </div>
            <?php echo form_open('/user/register'); ?>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" placeholder="Enter a username">
                    <p>A valid email address</p>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="E-mail">
                    <p>At least 6 characters</p>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Password">
                    <p>At least 6 characters</p>
                </div>
                <div class="form-group">
                    <label for="password_confirm">Confirm password</label>
                    <input type="password" name="password_confirm" placeholder="Confirm password">
                </div>
                <div class="form-group">
                    <input type="submit" value="Register">
                </div>
            </form>
        </div>
    </div>
</div>
