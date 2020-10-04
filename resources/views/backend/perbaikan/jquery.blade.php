$(document).ready(function(){
   $('.tambah').click(function(){
     var aksesgrupid = $(this).attr('aksesgrup-id');
		ojisatrianiLoadingFadeIn();
		$.loadmodal({
			url: "{{ url($url_admin.'/perbaikan/create') }}/"+ aksesgrupid,
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

  	$(document).on("click",".hapus",function() {
		ojisatrianiLoadingFadeIn();
		var id = $(this).attr('perbaikan-id');
		$.loadmodal({
			url: "{{ url($url_admin.'/perbaikan') }}/hapus/"+ id,
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
