$(document).ready(function(){
   $('.tambah').click(function(){
     var aksesgrupid = $(this).attr('aksesgrup-id');
		ojisatrianiLoadingFadeIn();
		$.loadmodal({
			url: "{{ url($url_admin.'/aksesmenu/create') }}/"+ aksesgrupid,
			id: 'responsive',
			dlgClass: 'fade',
			bgClass: 'primary',
			title: 'Kelola',
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
            $("#aksesgrup_id").val(aksesgrupid);
				},

			},
        });
  });

});
