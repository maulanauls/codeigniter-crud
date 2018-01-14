var save_method; //for save method string
var table;// var table
$(document).ready(function () {
		// basic responsive configuration
		table = $('#table').DataTable({
				"processing": true, //feature control the processing indicator.
				"serverSide": true, //feature control datatables server-side processing mode.
				"order": [], //initial no order.
				"bInfo": false,
				// load data for the table's content from an Ajax source
				"ajax": {
						"url": guest_url + 'datalist',
						"type": "POST"
				},
				//set column definition initialisation properties.
				"columnDefs": [{
						"targets": [-1], //last column
						"orderable": false, //set not orderable
				}, ],
		});

		$('[name="name"]').keypress(function() { // name on type remove validation
				$('[name="name"]').parent().removeClass('has-error');
				$('.name').text('');
		});

		$('[name="email"]').keypress(function() { // email on type remove validation
				$('[name="email"]').parent().removeClass('has-error');
				$('.email').text('');
		});

		$('[name="telp"]').keypress(function() { // telp on type remove validation
				$('[name="telp"]').parent().removeClass('has-error');
				$('.telp').text('');
		});

		$('[name="prov"]').change(function(){ // provinsi change kota will be disabled false
				$('[name="kota"]').attr('disabled',false);
		});

		$('[name="kota"]').change(function(){ // provinsi change kota will be disabled false
				$('[name="kecamatan"]').attr('disabled',false);
				select_kecamatan(this.value);
		});

});

function select_kecamatan(id) {
	$.ajax({
			url: base_url + 'checksession',
			type: "GET",
			dataType: "JSON",
			success: function (data) {
					if (data.session == true) {
						$.ajax({
								url: base_url + 'list_kecamatan/' + id,
								type: "GET",
								dataType: "JSON",
								success: function (data) {
									var jsonData = data;
									var $select = $('#kecamatan');
									$(jsonData).each(function (index, o) {
									    var $option = $("<option/>").attr("value", o.id).text(o.name);
									    $select.append($option);
									});
								},
								error: function (jqXHR, textStatus, errorThrown) {
										alert('error');
								}
						});

					} else {
							//if session not login back to login
							window.location.href = logout;
					}
			}
	});
}

function bttn_save_guestbook() {
		if(save_method=="add"){
			link = guest_url+'add';
		} else {
			link = guest_url+'update';
		}

		$('#guest-bookForm').ajaxForm({
				url: link,
				dataType: 'json',
				beforeSerialize: function () {
				},
				beforeSubmit: function () {
						$('#btnSave').html('<i class="fa fa-spinner fa-spin"></i> saving'); //change button text
						$('#btnSave').attr('disabled', true); //set button disable
				},
				beforeSend: function (jqXHR, settings) {
				},
				success: function (data) {
						if (data.status) //if success close modal and reload ajax table
						{
								location.reload();
						} else {
								for (var i = 0; i < data.inputerror.length; i++) {
										$('[name="' + data.inputerror[i] + '"]').parent().addClass('has-error');
										$('.' + data.error_id[i] + '').text(data.error_string[i]);
								}
						}
						$('#btnSave').html('<i class="ti-save"></i> submit'); //change button text
						$('#btnSave').attr('disabled', false); //set button enable
				},
				error: function (jqXHR, textStatus, errorThrown) {
						alert('something happen');
						$('#btnSave').html('<i class="ti-save"></i> submit'); //change button text
						$('#btnSave').attr('disabled', false); //set button enable
				}
		});
}

function bttn_add_guestbook() {
		$.ajax({
				url: base_url + 'checksession',
				type: "GET",
				dataType: "JSON",
				success: function (data) {
						if (data.session == true) {
								save_method = 'add';
								$('#guest-bookForm')[0].reset(); // reset form on modals
								$('.form-group').removeClass('has-error'); // clear error class
								$('.col-md-12').removeClass('has-error'); // clear error class
								$('.help-block').empty(); // clear error string
								$('[name="id"]').val('');
								$('[name="name"]').val('');
								$('[name="email"]').val('');
								$('[name="telp"]').val('');
								$('[name="prov"]').val('');
								$('[name="kota"]').val('').attr('disabled',true);
								$('[name="kecamatan"]').val('').attr('disabled',true);
								$('[name="telp"]').mask("+99999-9999-9999"); // masked input plugins
								$('#text').summernote({
										height: 300,                 // set editor height
										minHeight: null,             // set minimum height of editor
										maxHeight: null,             // set maximum height of editor
										focus: true                  // set focus to editable area after initializing summernote
								});
								$('#modalform').modal('show'); // show bootstrap modal when complete loaded
								$('.modal-title').text('edit data'); // Set title to Bootstrap modal title
						} else {
								//if session not login back to login
								window.location.href = logout;
						}
				}
		});
}

function edit_guestbook(id) {
		$.ajax({
				url: base_url + 'checksession',
				type: "GET",
				dataType: "JSON",
				success: function (data) {
						if (data.session == true) {
								save_method = 'update';
								$('#guest-bookForm')[0].reset(); // reset form on modals
								$('.form-group').removeClass('has-error'); // clear error class
								$('.col-md-12').removeClass('has-error'); // clear error class
								$('.help-block').empty(); // clear error string
								//ajax load data from json
								$.ajax({
										url: guest_url+ 'edit/' +id,
										type: "GET",
										dataType: "JSON",
										success: function (data) {
												$('[name="id"]').val(data.id);
												$('[name="name"]').val(data.name);
												$('[name="email"]').val(data.email);
												$('[name="telp"]').val(data.telp);
												$('[name="prov"]').val(data.prov);
												$('[name="kota"]').val(data.kota);
												$('[name="kecamatan"]').val(data.kecamatan);
												$('#text').summernote({
														height: 300,                 // set editor height
														minHeight: null,             // set minimum height of editor
														maxHeight: null,             // set maximum height of editor
														focus: true                  // set focus to editable area after initializing summernote
												});
												$('#modalform').modal('show'); // show bootstrap modal when complete loaded
												$('.modal-title').text('edit data'); // Set title to Bootstrap modal title
										},
										error: function (jqXHR, textStatus, errorThrown) {
												alert('error');
										}
								});
						} else {
								//if session not login back to login
								window.location.href = logout;
						}
				}
		});
}

function delete_guestbook(id) {
		$.ajax({
				url: base_url + 'checksession',
				type: "GET",
				dataType: "JSON",
				success: function (data) {
						if (data.session == true) {
								if (confirm('are you sure to delete?')) {
										// ajax delete data to database
										$.ajax({
												url: guest_url + 'delete/' + id,
												type: "POST",
												dataType: "JSON",
												success: function (data) {
														reload_table();
												},
												error: function (jqXHR, textStatus, errorThrown) {
														alert('error');
												}
										});

								}
						} else {
								window.location.href = logout;
						}
				}
		});
}

//-- reload datatables if content use datatable for show the data in database --//
function reload_table() {
		$.ajax({
				url: base_url + 'checksession',
				type: "GET",
				dataType: "JSON",
				success: function (data) {

						if (data.session == true) {
								table.ajax.reload(null, false);

						} else {
								window.location.href = logout;
						}
				}
		}); //reload datatable ajax
}
