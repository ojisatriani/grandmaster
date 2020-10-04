$(document).on("click",".submit-tambah",function() {
		var url					= "{{ url($url_admin.'/perbaikan') }}";
		var dataString	= $('#frmOji').serializeArray();
		goAjax(url, dataString);
});

$( ".submit-hapus" ).click(function() {
		var url					= "{{ url($url_admin.'/perbaikan') }}/"+$("#id").val();
		var dataString	= $('#frmOji').serializeArray();
		goAjax(url, dataString);
});