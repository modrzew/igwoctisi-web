<h1>Login</h1>

<form class="form-horizontal" method="POST">
	<div class="control-group">
		<label class="control-label" for="username">Username</label>
		<div class="controls">
			<input type="text" id="username" name="username" value="<?php if(isset($data)) echo $data['username']; ?>" />
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="password">Password</label>
		<div class="controls">
			<input type="password" id="password" name="password" value="<?php if(isset($data)) echo $data['password']; ?>" />
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn btn-success">Login</button></span>
		</div>
	</div>
</form>