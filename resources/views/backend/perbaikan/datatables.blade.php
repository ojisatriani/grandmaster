$(document).ready(function () {
	$('#datatable').DataTable({
		responsive: true,
		lengthChange: false,
		language: {
            url: "{{ asset('resources/vendor/datatables/js/indonesian.json') }}"
        },
		dom: "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'lB>>" +
			"<'row'<'col-sm-12'tr>>" +
			"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
		buttons: [
			{
				extend: 'pdfHtml5',
				text: 'PDF',
				titleAttr: 'Generate PDF',
				className: 'btn-outline-danger btn-sm mr-1',
				exportOptions: 	{
									columns: [0, 1, 2, 3, 4]
								}
			},
			{
				extend: 'excelHtml5',
				text: 'Excel',
				titleAttr: 'Generate Excel',
				className: 'btn-outline-success btn-sm mr-1',
				exportOptions: 	{
									columns: [0, 1, 2, 3, 4]
								}
			},
			{
				extend: 'print',
				text: 'Print',
				titleAttr: 'Print Table',
				className: 'btn-outline-primary btn-sm',
				exportOptions: 	{
									columns: [0, 1, 2, 3, 4]
								}
			}
		],
		processing: true,
		serverSide: true,
		ajax: "{{ url($url_admin.'/perbaikan/data/'.$id) }}",
		columns: [
			{ data: 'aksesgrup.nama' },
			{ data: 'action', orderable: false, searchable: false }
		]
	});
});