$(document).ready(function() {
	var progressbox 		= $('.progress'); //progress bar wrapper
	var progressbar 		= $('.progress-bar'); //progress bar element
	var statustxt 			= $('#statustxt'); //status text element
	var myform 				= $("#frmOji"); //upload form
	var output 				= $("#output"); //ajax result output element
	var completed 			= '0%'; //initial progressbar value
	var nextUrl             = $("#url").val();
	var modalfooter         = $(".modal-footer");
	var tablelist         	= $("#table-list").val();
	progressbox.hide();
	$( ".kirim-modal" ).click(function() {
			$('#frmOji').submit();
	});
	$(myform).ajaxForm({
		cache: false,
		beforeSend: function() { //brfore sending form
			myform.prop("disabled", true);
			statustxt.empty();
			progressbox.show(); //show progressbar
			progressbar.width(completed); //initial value 0% of progressbar
			statustxt.html(completed); //set status text
			modalfooter.hide();
		},
		uploadProgress: function(event, position, total, percentComplete) { //on progress
			progressbar.width(percentComplete + '%') //update progressbar percent complete
			statustxt.html((percentComplete-1) + '%'); //update status text
			if(percentComplete == 100)
			{
				$('.pesan').html('<div class="haraptunggu alert alert-info text-center" role="alert">Harap tunggu, proses penyimpanan file sedang berlangsung!</div>');
			}
		},
		complete: function(response, x , e) { // on complete
			var data = $.parseJSON(response.responseText);
			if(data.status ==true){
				 $("#"+tablelist).DataTable().ajax.reload();
				$('.modal').modal('hide');
				Swal.fire({
				    title: 'Okay...',
				    text: 'Berhasil proses data',
				    type: 'success',
				    timer: 1500
				});
			}else{
				progressbox.hide();
				$('.pesan').html('');
				modalfooter.show();
				$.each(data.pesan, function(i, item) {
					$(".pesan").html('<div class="alert alert-danger" role="alert">' + item +'</div>');
				});
			}
		}
	});
});