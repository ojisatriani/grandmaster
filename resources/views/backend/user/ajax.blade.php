$(document).on("click",".submit-tambah",function() {
	var dataString =  $($("#frmOji")[0].elements).not("#password").serializeArray();
	dataString.push({ name:'password', value: $.base64.encode($("#password").val()) });
	var url					= "{{ url($url_admin.'/user') }}";
	goAjax(url, dataString);
});

$( ".submit-ubah" ).click(function() {
	var dataString 			=  $($("#frmOji")[0].elements).not("#password").serializeArray();
	dataString.push({ name:'password', value: $.base64.encode($("#password").val()) });
	var url					= "{{ url($url_admin.'/user') }}/"+$("#id").val();
	goAjax(url, dataString);
});

$( ".submit-atur-login" ).click(function() {
	var url					= "{{ url($url_admin.'/user/atur_login') }}/"+$("#id").val();
	var dataString			= $('#frmOji').serializeArray();
	goAjax(url, dataString);
});

$( ".submit-hapus" ).click(function() {
	var url					= "{{ url($url_admin.'/user') }}/"+$("#id").val();
	var dataString			= $('#frmOji').serializeArray();
	goAjax(url, dataString);
});

$(document).on("click",".submit-ubah-password",function() {
	var id					= $("#id").val();
	var _token				= $("input[name=_token]").val();
	var dataString			= {'id': id, 'password_lama': $.base64.encode($("#password_lama").val()), 'password':$.base64.encode($("#password").val()), 'password_confirmation':$.base64.encode($("#password_confirmation").val()), '_token':_token};
	var url					= "{{ url($url_admin.'/user/ubahpassword') }}";
	goAjax(url, dataString);
});
