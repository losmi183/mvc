<h1>Register</h1>

<?php $form = \app\core\form\Form::begin('', "post"); ?>
  <?php echo $form->field($model, 'firstname'); ?>
  <?php echo $form->field($model, 'lastname'); ?>
  <?php echo $form->field($model, 'email'); ?>
  <?php echo $form->field($model, 'password')->passwordField(); ?>
  <?php echo $form->field($model, 'confirmPassword')->passwordField(); ?>
  <button type="submit" class="btn btn-primary">Submit</button>
<?php echo \app\core\form\Form::end(); ?>

<!-- <form action="" method="post">
  <div class="mb-3">
    <label>First name</label>
    <input type="text" name="firstname" value="<?php echo $model->firstname ?? ''; ?>" 
      class="form-control <?php  echo $model->hasError('firstname') ? 'is-invalid' : '';  ?>">
      <div class="invalid-feedback">
      <?php echo $model->getFirstError('firstname'); ?>
    </div>
  </div>
  <div class="mb-3">
    <label>Last name</label>
    <input type="text" name="lastname"  value="<?php echo $model->lastname ?? ''; ?>" 
    class="form-control <?php  echo $model->hasError('lastname') ? 'is-invalid' : ''; ?>">
    <div class="invalid-feedback">
      <?php echo $model->getFirstError('lastname'); ?>
    </div>
  </div>
  <div class="mb-3">
    <label>Email</label>
    <input type="email" name="email"  value="<?php echo $model->email ?? ''; ?>" class="form-control 
    <?php  echo $model->hasError('email') ? 'is-invalid' : ''; ?>" >
    <div class="invalid-feedback">
      <?php echo $model->getFirstError('email'); ?>
    </div>
  </div>
  <div class="mb-3">
    <label>Password</label>
    <input type="password" name="password" class="form-control 
    <?php  echo $model->hasError('password') ? 'is-invalid' : ''; ?>"></input>
    <div class="invalid-feedback">
      <?php echo $model->getFirstError('password'); ?>
    </div>
  </div>
  <div class="mb-3">
    <label>Confirm Password </label>
    <input type="password" name="confirmPassword" class="form-control" 
    <?php  echo $model->hasError('confirmPassword') ? 'is-invalid' : ''; ?>></input>
    <div class="invalid-feedback">
      <?php echo $model->getFirstError('confirmPassword'); ?>
    </div>
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form> -->