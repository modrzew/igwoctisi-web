<h1>Sign up for dominating the galaxy!</h1>
<p>It's so easy even some of the politicians could apply.</p>

<form class="form-horizontal" method="POST">
	<div class="control-group <?php if(isset($errors['username'])) echo 'error'; ?>">
		<label class="control-label" for="username">Desired username</label>
		<div class="controls">
			<input type="text" id="username" name="username" placeholder="Username here" value="<?php if(isset($data)) echo $data['username']; ?>" />
			<?php if(isset($errors['username'])) echo '<span class="help-inline">'.$errors['username'].'</span>'; ?>
		</div>
	</div>
	<div class="control-group <?php if(isset($errors['password'])) echo 'error'; ?>">
		<label class="control-label" for="password">Your password</label>
		<div class="controls">
			<input type="password" id="password" name="password" placeholder="Don't give it away!" value="<?php if(isset($data)) echo $data['password']; ?>" />
			<?php if(isset($errors['password'])) echo '<span class="help-inline">'.$errors['password'].'</span>'; ?>
		</div>
	</div>
	<div class="control-group <?php if(isset($errors['password2'])) echo 'error'; ?>">
		<label class="control-label" for="password2">Your password<sup>2</sup></label>
		<div class="controls">
			<input type="password" id="password2" name="password2" placeholder="Or we'll come to your place!" value="<?php if(isset($data)) echo $data['password2']; ?>" />
			<?php if(isset($errors['password2'])) echo '<span class="help-inline">'.$errors['password2'].'</span>'; ?>
		</div>
	</div>
	<div class="control-group <?php if(isset($errors['email'])) echo 'error'; ?>">
		<label class="control-label" for="email">E-mail</label>
		<div class="controls">
			<input type="text" id="email" name="email" placeholder="Won't get no spam from us." value="<?php if(isset($data)) echo $data['email']; ?>" />
			<?php if(isset($errors['email'])) echo '<span class="help-inline">'.$errors['email'].'</span>'; ?>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn btn-success">Register!</button> <span class="muted">Easy, wasn't it?</span>
		</div>
	</div>
</form>