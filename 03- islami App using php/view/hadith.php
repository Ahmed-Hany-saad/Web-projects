<?php include_once "header.php" ?>
<?php if(!isset($_SESSION['person'])){
  header('Location: login.php');
} ?>
<div class="h" style="margin: 70px;margin-top:120px">
	<?php require_once "../controller/HadithController.php"; ?>
	<div class="container mt-5">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title" style="direction: rtl;" > الحديث :</h3>
			</div>
			<div class="card-body" style="margin: auto;text-align:center">
				<p><?php echo $hadith['text']; ?></p>
				<?php if (isset($hadith['narrated'])) : ?>
					<h3 class="card-title">Narrator:</h3>
					<p><?php echo $hadith['narrated']; ?></p>
				<?php endif; ?>
			</div>
		</div>

		<form class="mt-3" method="post">
			<input type="hidden" name="hadith_index" value="<?php echo $hadith_index; ?>">
			<button type="submit" name="previous" class="btn btn-primary mr-2" style="background-color:#F25454;width:100px">Previous</button>
			<button type="submit" name="next" class="btn btn-primary"style="background-color:#F25454;width:100px">Next</button>
		</form>
	</div>
	</div>
	<?php include_once "footer.php" ?>
	<script src="../js/jquery-3.6.3.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/main.js"></script>