function ojisatrianiLoadingFadeIn() {
      loadingBlock();
    }
function ojisatrianiLoadingFadeOut() {
      $.unblockUI();
    }
$(document).keyup(function(e) {
     if (e.keyCode == 27) { // escape key maps to keycode `27`
        ojisatrianiLoadingFadeOut()
    }
});

$.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
function loadingBlock() { 
	$.blockUI({
		css: { 
			border: 'none', 
			padding: '10px', 
			width: '150px', 
			top:"40%",left:"45%",
			textAlign:"center",
			backgroundColor: '#000', 
			'-webkit-border-radius': '10px', 
			'-moz-border-radius': '10px', 
			opacity: .5, 
			color: '#fff' 
		},
		message: '<h4>Loading... <i class="fa fa-refresh fa-spin"></i></h4>',
		onOverlayClick: $.unblockUI
	}); 
}

$(document).ajaxError(function (event, jqxhr, settings, exception) {
	if (jqxhr.status == 500) {
		$(".alertbottom").fadeToggle(350);
	}
});

$(function () {
	"use strict";


	//Alerts
	$(".myadmin-alert .closed").click(function (event) {
		$(this).parents(".myadmin-alert").fadeToggle(350);
		return false;
	});
	

}); // End of use strict


$(document).ready(function(){
	$('.ubahpassword').click(function(){
		ojisatrianiLoadingFadeIn();
		var id = $(this).attr('user-id');
		$.loadmodal({
			url: "{{ url($url_admin.'/user/ubahpassword') }}/"+ id,
			id: 'responsive',
			dlgClass: 'fade',
			bgClass: 'warning',
			title: 'Ubah Password',
			width: 'whatever',
			modal: {
				keyboard: true,
				// any other options from the regular $().modal call (see Bootstrap docs)
				},
					ajax: {
				dataType: 'html',
				method: 'GET',
				success: function(data, status, xhr){
					ojisatrianiLoadingFadeOut();
				},
			},
				});
		return false;
	});

	$('.keluar').click(function(){
		$.ajax({
			type: 'POST',
			url: '{{ url('logout') }}',
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			enctype: 'multipart/form-data',
			dataType: 'json',
			cache: false,
			beforeSend: function(){
					{{-- sebelumKirim(); --}}
			},
			success: function(data){
				location.href="{{ url('login') }}"
			},
			error: function(x, e){
				//	errorMsg(x.status);
			}
		});
	});
});