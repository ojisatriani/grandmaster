$(document).ready(function(){
   $('.tambah').click(function(){
     $("#frmOji").submit();
  });
});

$(document).on('click', 'input[type=checkbox]', function(){
		$(this).siblings('ul')
		.find("input[type='checkbox']")
		.prop('checked', this.checked);
});
