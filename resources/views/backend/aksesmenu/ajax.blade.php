$(document).on('click', 'input[type=checkbox]', function(){
		$(this).siblings('ul')
		.find("input[type='checkbox']")
		.prop('checked', this.checked);
});

var nextUrl=$("#url").val();
		$(document).on("click",".submit-kelola",function() {
		var url					= "{{ url($url_admin.'/aksesmenu') }}";
		var dataString	= $('#frmOji').serializeArray();
		goAjax(url, dataString);
});
