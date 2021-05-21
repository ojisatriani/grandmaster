$(document).ready(function(){
   $('.tambah').click(function(){
	   	var parentid = $(this).attr('parent-id');
		ojisatrianiLoadingFadeIn();
		$.loadmodal({
			url: "{{ url($url_admin.'/menu/create') }}",
			id: 'responsive',
			dlgClass: 'fade',
			bgClass: 'primary',
			title: 'Tambah',
			width: 'whatever',
			modal: {
				keyboard: true,
				// any other options from the regular $().modal call (see Bootstrap docs)
				},
          ajax: {
				dataType: 'html',
				method: 'GET',
				success: function(data, status, xhr){
	            $("#parent_id").val(parentid);
            		ojisatrianiLoadingFadeOut();
				},

			},
        });
  });

	$(document).on("click",".ubah",function() {
    ojisatrianiLoadingFadeIn();
		var id = $(this).attr('menu-id');
		$.loadmodal({
			url: "{{ url($url_admin.'/menu') }}/"+ id +"/edit",
      id: 'responsive',
			dlgClass: 'fade',
			bgClass: 'warning',
			title: 'Ubah',
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
	});

	$(document).on("click",".hapus",function() {
		ojisatrianiLoadingFadeIn();
		var id = $(this).attr('menu-id');
		$.loadmodal({
			url: "{{ url($url_admin.'/menu') }}/hapus/"+ id,
      id: 'responsive',
			dlgClass: 'fade',
			bgClass: 'danger',
			title: 'Hapus',
			width: 'whatever',
			modal: {
				keyboard: true,
				// any other options from the regular $().modal call (see Bootstrap docs)
				//$('#uraian').val(id),
				},
          ajax: {
				dataType: 'html',
				method: 'GET',
				success: function(data, status, xhr){
            ojisatrianiLoadingFadeOut();
				},
			},
        });
	});

});
