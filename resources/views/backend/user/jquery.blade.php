$(document).ready(function(){
   $('.tambah').click(function(){
		ojisatrianiLoadingFadeIn();
		$.loadmodal({
			url: "{{ url($url_admin.'/user/create') }}",
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
            ojisatrianiLoadingFadeOut();
				},

			},
        });
  });

	$(document).on("click",".ubah",function() {
    ojisatrianiLoadingFadeIn();
		var id = $(this).attr('user-id');
		$.loadmodal({
			url: "{{ url($url_admin.'/user') }}/"+ id +"/edit",
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
		var id = $(this).attr('user-id');
		$.loadmodal({
			url: "{{ url($url_admin.'/user/hapus') }}/"+ id,
      id: 'responsive',
			dlgClass: 'fade',
			bgClass: 'danger',
			title: 'Hapus',
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

	$(document).on("click",".atur",function() {
		ojisatrianiLoadingFadeIn();
		var id = $(this).attr('user-id');
		$.loadmodal({
			url: "{{ url($url_admin.'/user') }}/atur/"+ id,
      id: 'responsive',
			dlgClass: 'fade',
			bgClass: 'danger',
			title: 'Atur Login',
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
