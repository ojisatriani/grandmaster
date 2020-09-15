var nextUrl=$("#url").val();
function errorMsg(pesan){
		$(".pesan").html('<div class="alert alert-danger" role="alert"><i class="fa fa-ban"></i> Terjadi kesalahan. Error '+ pesan +'</div>');
		$("input").prop('disabled', false);
		$(".loading").hide();
		$(".modal-footer").show();
}

function successMsg(data){
		if(data.status == true){
			if (typeof data.url !== 'undefined') {
				location.href= data.url;
			} else {
				$('#datatable').DataTable().ajax.reload();
				$('.modal').modal('hide');
				Swal.fire({
					title: 'Okay...',
					text: 'Berhasil proses data',
					type: 'success',
					timer: 1500
				});
			}
		}else{
			$("button").prop("disabled", false);
			$("input").prop('disabled', false);
			$.each(data.pesan, function(i, item) {
				$('#'+i).closest('.form-group').addClass('has-error');
				$('#'+i).focus();
				$(".pesan").html('<div class="alert alert-danger" role="alert"><i class="fa fa-ban"></i> '+ item +'</div>');
				return false;
			});
		}
		$(".loading").hide();
		{{--  $(".pesan").html('');  --}}
		$(".modal-footer").show();

}
function sebelumKirim(){
		$(".pesan").html('<div class="alert alert-info" role="alert"><center><i class="fa fa-spinner fa-spin"></i> Loading...</center></div>');
		$("input").prop('disabled', true);
		$(".loading").show();
		$(".modal-footer").hide();
}

function goAjax(targetUrl, dataString, methodType = 'POST'){
		$.ajax({
			type: methodType,
			url: targetUrl,
			data: dataString,
			enctype: 'multipart/form-data',
			dataType: 'json',
			cache: false,
			beforeSend: function(){
					sebelumKirim();
			},
			success: function(data){
					successMsg(data);
			},
			error: function(x, e){
				//	errorMsg(x.status);
			}
		});
}

function addCommas(nStr)
{
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
			x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	return x1 + x2;
}
