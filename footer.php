			
			</div>
		</div>
	</div>
		<div class="container">
			<div class="row">
				<div class="span8" align="right">
					<font face="Times New Roman, Times, serif">Copyright &copy; MIAGE-NANCY 2015 - Soutenance Projet CSI_Groupe3</font>
				</div>
				<div class="span4" align="right">
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="./jquery.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$("#produit").change(function(){
			var lib= this;
			var id = lib.value;
			$.ajax({
				type: "POST",
				url: "produit-info.php",
				data: {"id": id},
				dataType: 'json',
				success: function(produit){
					$("#qteliv").val(produit.qtestock);
					$("#prix").val(produit.prix);
				}
			});	
		});
	});
	</script>
	<script type="text/javascript"  src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
</body>
</html>