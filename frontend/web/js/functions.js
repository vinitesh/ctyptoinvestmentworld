$('#login-form').on('beforeSubmit', function () {
    var url = $(this).attr('action');
    $('.login-form-btn .fa-spinner').show();
    $.ajax({
	url: url,
	async: false,
	data: $(this).serialize(),
	dataType: 'json',
	type: 'post',
	success: function (data) {
	    if (data.status == 'send-code') {
		$('.confirmation-text strong').html(data.email);
		$('.login-step-1').hide();
		$('.login-step-2').show();
		$('.login-step-1 .error-msg').hide();
	    } else if (data.status == 'error') {
		$('.login-step-1 .error-msg').html(data.message).show();
	    }
	    $('.login-form-btn .fa-spinner').hide();
	},
	error: function () {
	    $('.login-form-btn .fa-spinner').hide();
	}
    });
    return false;
});

$('#login-form-code').on('beforeSubmit', function () {
    var url = $(this).attr('action');
    $('.confirm-form-btn .fa-spinner').show();
    $.ajax({
	url: url,
	async: false,
	data: $(this).serialize(),
	dataType: 'json',
	type: 'post',
	success: function (data) {
	    if (data.status == 'error') {
		$('.login-step-2 .error-msg').html(data.message).show();
	    }
	    $('.confirm-form-btn .fa-spinner').hide();
	},
	error: function () {
	    $('.confirm-form-btn .fa-spinner').hide();
	}
    });
    return false;
});

$('.resendcode').click(function () {
    var url = $(this).attr('href');
    $.ajax({
	url: url,
	async: false,
	dataType: 'json',
	type: 'post',
	success: function (data) {
	    if (data.status == 'success') {
		$('.login-step-2 .error-msg').html(data.message).show();
	    }
	}

    });
    return false;
});

$('.select-currency').click(function () {
    var rate = $(this).attr('data-rate');
    var id = $(this).attr('data-id');
    var cur_name = $(this).attr('data-currency');
    var letter = $(this).attr('data-letter');
    $('.select-currency').removeClass('active');
    $(this).addClass('active');
    $('.exchange_container').slideDown(200);
    $('#orders-currency_id').val(id);
    $('#orders-rate').val(rate);
    $('.c-letter').html(letter);
    $('.c-rate').html(rate);
    $('#orders-summ_out').attr('placeholder', cur_name);
    $('.field-orders-summ_out .input-group-addon').html(cur_name);
});

$('#orders-summ_out').keyup(function () {
    var rate = $('#orders-rate').val() * 1;
    var sum = $(this).val() / rate;
    $('#orders-summ_in').val(sum.toFixed(5));
});

$('#orders-summ_out').change(function () {
    var rate = $('#orders-rate').val() * 1;
    var sum = $(this).val() / rate;
    $('#orders-summ_in').val(sum.toFixed(5));
});

$('#order-form').on('beforeSubmit', function () {
    $('.exchange-btn .fa-spinner').show();
    var url = $(this).attr('action');
    $.ajax({
	async: false,
	url: url,
	data: $(this).serialize(),
	type: 'post',
	dataType: 'json',
	success: function (data) {
	    if (data.status == 'success') {
		$('.exchange-replace').html(data.message);
	    } else {
		swal(
			data.title,
			data.message,
			'error'
			);
	    }
	}
    });
    $('.exchange-btn .fa-spinner').hide();
    return false;
});

$(document).on('submit', '#buysteptwo', function () {
    $('.exchange-btn .fa-spinner').show();
    var url = $(this).attr('action');
    $.ajax({
	//async: false,
	url: url,
	data: $(this).serialize(),
	type: 'post',
	dataType: 'json',
	success: function (data) {
	    if (data.status == 'success') {
		$('.exchange-replace').html(data.message);
	    } else {
		swal(
			data.title,
			data.message,
			'error'
			);
	    }
	    $('.exchange-btn .fa-spinner').hide();
	}
    });
    
    return false;
});

$('#contact-form').on('beforeSubmit', function () {
    $('#contact-form .fa-spinner').show();
    var url = $(this).attr('action');
    $.ajax({
	async: false,
	url: url,
	data: $(this).serialize(),
	type: 'post',
	dataType: 'json',
	success: function (data) {
	    if (data.status == 'success') {
		swal(
			data.title,
			data.message,
			'success'
			);
		$('#contact-form')[0].reset();
	    } else {
		swal(
			data.title,
			data.message,
			'error'
			);
	    }
	}
    });
    $('#contact-form .fa-spinner').hide();
    return false;
});