"use strict";
$(document).ready(function() {

    $(".content .row").find('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    });

    $('[type="reset"]').on('click', function() {
        setTimeout(function() {
            $("input").iCheck("update");
        }, 10);
    });

    $('.repeater-default').repeater({
        show: function() {
            $(this).slideDown();
            $(".content .row").find('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        },
        hide: function(remove) {
            if (confirm('Are you sure you want to remove this item?')) {
                $(this).slideUp(remove);
            }
        }
    });
    $('.form-validation').bootstrapValidator({
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'The user name is required and cannot be empty'
                    }
                }
            },
            address: {
                validators: {
                    notEmpty: {
                        message: 'This address is required and cannot be empty'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Please provide a password'
                    }
                }
            },
            confirmpassword: {
                validators: {
                    notEmpty: {
                        message: 'The confirm password is required and can\'t be empty'
                    },
                    identical: {
                        field: 'password',
                        message: 'Please enter the password same as above'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required'
                    },
                    regexp: {
                        regexp: /^\S+@\S{1,}\.\S{1,}$/,
                        message: 'Please enter valid email format'
                    }
                }
            }

        },
        submitHandler: function(validator, form, submitButton) {
            var fullName = [validator.getFieldElements('name').val(), ].join(' ');
            $('#helloModal')
                .find('.modal-title').html('Hello ' + fullName).end()
                .modal();
        }
    });

});
