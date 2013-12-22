	<script type="text/javascript">
    $(document).ready(function(){ 
			$('.delivery').hide();
			var checked_idx = $("input[name='deliver_to'][checked=checked]").val();
			$('#dto_' + checked_idx).show();
			$("input[name='deliver_to']").click(function() {
				var input = $(this).val();
				$(".delivery").hide();
				$("#dto_" + input).show();
				if(input == 0) {
					$('#deliver_to').val($('#dto_' + input + ' option:selected').text());
				} else {
					$('#deliver_to').val($('#dto_' + input).val());
			  }
			}); 
			$('#dto_0').change(function() {
				var txt = $('#dto_0 option:selected').text();
				$('#deliver_to').val(txt);
			});
			$('#dto_1').change(function() {
			  $('#deliver_to').val($(this).val());
			});
		});
	</script>
