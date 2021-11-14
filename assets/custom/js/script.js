const flashData = $('.flash-data').data('flashdata');
const error = $('.flash-data').data('error');

if (flashData){
	if (error){
		Swal.fire({
			title: 'Error',
			text: ''+flashData,
			icon: 'error'
		});
	}else {
		Swal.fire({
			title: 'Data Telah',
			text: ''+flashData,
			icon: 'success'
		});
	}
}


$('.remove').on('click', function (e) {
  e.preventDefault();
  var href =$(this).parent().attr('href');
  Swal.fire({
    title: 'Apakah Yakin Hapus Data Ini?',
    text: "Data yang terhapus tidak dapat dikembalikan!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya, Hapus!',
    cancelButtonText: 'Tidak!'
  }).then((result) => {
    if (result.isConfirmed) {
      document.location.href = href,true;
      
    }
  });
});

$('.reset').on('click', function (e) {
  e.preventDefault();
  var href =$(this).parent().attr('href');
  Swal.fire({
    title: 'Apakah Yakin Reset Password?',
    text: 'Reset password akan merubah password user menjadi default "d3cim4"',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya, Reset!',
    cancelButtonText: 'Tidak'
  }).then((result) => {
    if (result.isConfirmed) {
      document.location.href = href,true;
      
    }
  });
});


