$(document).on("click",".submit-tambah",function() {
		var url					= "{{ url($url_admin.'/submenu') }}";
		var dataString	= $('#frmOji').serializeArray();
		goAjax(url, dataString);
});

$( ".submit-ubah" ).click(function() {
		var url					= "{{ url($url_admin.'/submenu') }}/"+$("#id").val();
		var dataString	= $('#frmOji').serializeArray();
		goAjax(url, dataString);
});

$( ".submit-hapus" ).click(function() {
		var url					= "{{ url($url_admin.'/submenu') }}/"+$("#id").val();
		var dataString	= $('#frmOji').serializeArray();
		goAjax(url, dataString);
});

$("#nama").keyup(function() {
		$("#kode").val( this.value.replace(/\s/g, "").toLowerCase() );
		$("#link").val(this.value.replace(/\s/g, "").toLowerCase() );
});
$("#nama").change(function(){
		$(this).closest('.form-group').removeClass('has-error');
});
$("#kode").change(function(){
		$(this).closest('.form-group').removeClass('has-error');
});
$("#link").change(function(){
		$(this).closest('.form-group').removeClass('has-error');
});
