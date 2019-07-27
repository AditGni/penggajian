<div class="col-md-12">
	<img src="img/home.jpg" class="img-thumbnail">
</div>
<div class="col-md-6 offset-md-3 position-absolute" id="atas">
	<?php
	if(!empty($_SESSION['pesan'])){
		echo "<div class='alert alert-warning'><i class='fa fa-close'></i> Input harus diisi!</div>";
	} else if(!empty($_SESSION['error'])){
		echo "<div class='alert alert-danger'>".$_SESSION['error']."</div>";
	}
	?>
	<div class="card">
		<h5 class="card-header text-center"><i class="fa fa-lock"></i> Login</h5>
		<div class="card-body">
			<form action="?pg=proses&mod=login" method="POST">
				<div class="form-group">
					<input type="text" name="user" class="form-control" placeholder="Username" value="<?php echo $_SESSION['value']['user'];?>">
				</div>
				<div class="form-group">
					<input type="password" name="pass" class="form-control" placeholder="Password" value="<?php echo $_SESSION['value']['pass']?>">
				</div>
				<!-- <div class="float-right">
					<p>Daftar</p>
				</div>
				<div class="clearfix"></div> -->
				<button type="submit" class="btn btn-primary btn-block" name="in"><i class="fa fa-sign-in"></i> Masuk</button>
			</form>
		</div>
	</div>
</div>
<?php
unset($_SESSION['pesan']);
unset($_SESSION['value']);
?>