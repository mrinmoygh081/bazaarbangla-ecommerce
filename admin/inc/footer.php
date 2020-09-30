	<div class="clearfix space70"></div>
	<!-- FOOTER -->
	<footer id="footer2">
		
		<div class="footer-bottom container">
			<div class="row">
				<div class="col-md-6">
					<p>&copy; Copyright 2015. CodingCyber</p>
				</div>
				<div class="col-md-6">
					
				</div>
			</div>
		</div>
	</footer>
	<!-- FOOTER -->
</div>


<!-- Javascript -->
<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
<script src="./js/jquery.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/script.js"></script>


<script>
$(document).ready(function () {
    $('#selectAllBox').click(function (event) {
        if (this.checked) {
            $('.checkBoxes').each(function () {
                this.checked = true;
            });
        } else {
            $('.checkBoxes').each(function () {
                this.checked = false;
            });
        }
    });
});

</script>

</body>
</html>