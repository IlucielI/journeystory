var input_spokok = document.getElementById('input_spokok');
var input_swajib = document.getElementById('input_swajib');
var input_srela = document.getElementById('input_srela');
var input_jasa = document.getElementById('input_jasa');
var input_sosial = document.getElementById('input_sosial');
var input_total = document.getElementById('input_total');

//UNTUK SIMPANAN
input_spokok.addEventListener('keyup', function (e) {
	//Convert to Rupiah
	var a = input_spokok.value = formatRupiah(this.value, 'Rp. ');
	//Convert to Int
	var clean_a = a.replace(/\D/g, '');
	var a = parseInt(clean_a);
	if (isNaN(a)) {
		a = 0;
	}
	var b = $("#input_swajib").val();
	var clean_b = b.replace(/\D/g, '');
	var b = parseInt(clean_b);
	if (isNaN(b)) {
		b = 0;
	}
	var c = $("#input_srela").val();
	var clean_c = c.replace(/\D/g, '');
	var c = parseInt(clean_c);
	if (isNaN(c)) {
		c = 0;
	}
	var d = $("#input_jasa").val();
	var clean_d = d.replace(/\D/g, '');
	var d = parseInt(clean_d);
	if (isNaN(d)) {
		d = 0;
	}
	var e = $("#input_sosial").val();
	var clean_e = e.replace(/\D/g, '');
	var e = parseInt(clean_e);
	if (isNaN(e)) {
		e = 0;
	}

	var total = a + b + c + d + e;
	if (!isNaN(total)) {
		$("#input_total").val(convertToRupiah(total));

	}
});
input_swajib.addEventListener('keyup', function (e) {
	var a = $("#input_spokok").val();
	var clean_a = a.replace(/\D/g, '');
	var a = parseInt(clean_a);
	if (isNaN(a)) {
		a = 0;
	}
	//Convert to Rupiah
	var b = input_swajib.value = formatRupiah(this.value, 'Rp. ');
	//Convert to Int
	var clean_b = b.replace(/\D/g, '');
	var b = parseInt(clean_b);
	if (isNaN(b)) {
		b = 0;
	}
	var c = $("#input_srela").val();
	var clean_c = c.replace(/\D/g, '');
	var c = parseInt(clean_c);
	if (isNaN(c)) {
		c = 0;
	}
	var d = $("#input_jasa").val();
	var clean_d = d.replace(/\D/g, '');
	var d = parseInt(clean_d);
	if (isNaN(d)) {
		d = 0;
	}
	var e = $("#input_sosial").val();
	var clean_e = e.replace(/\D/g, '');
	var e = parseInt(clean_e);
	if (isNaN(e)) {
		e = 0;
	}

	var total = a + b + c + d + e;
	if (!isNaN(total)) {
		$("#input_total").val(convertToRupiah(total));
	}
});
input_srela.addEventListener('keyup', function (e) {
	var a = $("#input_spokok").val();
	var clean_a = a.replace(/\D/g, '');
	var a = parseInt(clean_a);
	if (isNaN(a)) {
		a = 0;
	}
	var c = $("#input_swajib").val();
	var clean_c = c.replace(/\D/g, '');
	var c = parseInt(clean_c);
	if (isNaN(c)) {
		c = 0;
	}
	//Convert to Rupiah
	var b = input_srela.value = formatRupiah(this.value, 'Rp. ');
	//Convert to Int
	var clean_b = b.replace(/\D/g, '');
	var b = parseInt(clean_b);
	if (isNaN(b)) {
		b = 0;
	}
	var d = $("#input_jasa").val();
	var clean_d = d.replace(/\D/g, '');
	var d = parseInt(clean_d);
	if (isNaN(d)) {
		d = 0;
	}
	var e = $("#input_sosial").val();
	var clean_e = e.replace(/\D/g, '');
	var e = parseInt(clean_e);
	if (isNaN(e)) {
		e = 0;
	}

	var total = a + b + c + d + e;
	if (!isNaN(total)) {
		$("#input_total").val(convertToRupiah(total));
	}
});
input_jasa.addEventListener('keyup', function (e) {
	var a = $("#input_spokok").val();
	var clean_a = a.replace(/\D/g, '');
	var a = parseInt(clean_a);
	if (isNaN(a)) {
		a = 0;
	}
	var b = $("#input_swajib").val();
	var clean_b = b.replace(/\D/g, '');
	var b = parseInt(clean_b);
	if (isNaN(b)) {
		b = 0;
	}
	var c = $("#input_srela").val();
	var clean_c = c.replace(/\D/g, '');
	var c = parseInt(clean_c);
	if (isNaN(c)) {
		c = 0;
	}
	//Convert to Rupiah
	var d = input_jasa.value = formatRupiah(this.value, 'Rp. ');
	//Convert to Int
	var clean_d = d.replace(/\D/g, '');
	var d = parseInt(clean_d);
	if (isNaN(d)) {
		d = 0;
	}
	var e = $("#input_sosial").val();
	var clean_e = e.replace(/\D/g, '');
	var e = parseInt(clean_e);
	if (isNaN(e)) {
		e = 0;
	}

	var total = a + b + c + d + e;
	if (!isNaN(total)) {
		$("#input_total").val(convertToRupiah(total));
	}
});
input_sosial.addEventListener('keyup', function (e) {
	var a = $("#input_spokok").val();
	var clean_a = a.replace(/\D/g, '');
	var a = parseInt(clean_a);
	if (isNaN(a)) {
		a = 0;
	}
	var b = $("#input_swajib").val();
	var clean_b = b.replace(/\D/g, '');
	var b = parseInt(clean_b);
	if (isNaN(b)) {
		b = 0;
	}
	var c = $("#input_srela").val();
	var clean_c = c.replace(/\D/g, '');
	var c = parseInt(clean_c);
	if (isNaN(c)) {
		c = 0;
	}
	var d = $("#input_jasa").val();
	var clean_d = d.replace(/\D/g, '');
	var d = parseInt(clean_d);
	if (isNaN(d)) {
		d = 0;
	}
	//Convert to Rupiah
	var e = input_sosial.value = formatRupiah(this.value, 'Rp. ');
	//Convert to Int
	var clean_e = e.replace(/\D/g, '');
	var e = parseInt(clean_e);
	if (isNaN(e)) {
		e = 0;
	}
	var total = a + b + c + d + e;
	if (!isNaN(total)) {
		$("#input_total").val(convertToRupiah(total));
	}
});
//END UNTUK SIMPANAN


// UNTUK PINJAMAN

// END UNTUK PINJAMAN

/* Fungsi formatRupiah */
function formatRupiah(angka, prefix) {
	var number_string = angka.replace(/[^,\d]/g, '').toString(),
		split = number_string.split(','),
		sisa = split[0].length % 3,
		rupiah = split[0].substr(0, sisa),
		ribuan = split[0].substr(sisa).match(/\d{3}/gi);
	// tambahkan titik jika yang di input sudah menjadi angka ribuan
	if (ribuan) {
		separator = sisa ? '.' : '';
		rupiah += separator + ribuan.join('.');
	}
	rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
	return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}

function convertToRupiah(angka) {
	var rupiah = '';
	var angkarev = angka.toString().split('').reverse().join('');
	for (var i = 0; i < angkarev.length; i++)
		if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
	return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
}
