$(document).on("click",".submit-tambah",function() {
		var url					= "{{ url($url_admin.'/aksesgrup') }}";
		var dataString	= $('#frmOji').serializeArray();
		goAjax(url, dataString);
});

$( ".submit-ubah" ).click(function() {
		var url					= "{{ url($url_admin.'/aksesgrup') }}/"+$("#id").val();
		var dataString	= $('#frmOji').serializeArray();
		goAjax(url, dataString);
});

$( ".submit-hapus" ).click(function() {
		var url					= "{{ url($url_admin.'/aksesgrup') }}/"+$("#id").val();
		var dataString	= $('#frmOji').serializeArray();
		goAjax(url, dataString);
});
