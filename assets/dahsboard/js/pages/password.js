"use strict";
$(document).ready(function () {

    $('.password_validator').bootstrapValidator({
        fields: {
            email: {
                validators: {
                    notEmpty: {
                        message: 'Enter Registered Email'
                    },
                    regexp: {
                        regexp: /^\S+@\S{1,}\.\S{1,}$/,
                        message: 'The input is not a valid email address'
                    }
                }
            },
            lock_password: {
                validators: {

                    notEmpty: {
                        message: 'Enter Your Password'
                    }
                }
            },
            password: {
                validators: {

                    notEmpty: {
                        message: 'Enter New Password'
                    }
                }
            },
            password_confirm: {
                validators: {
                    notEmpty: {
                        message: 'Confirm New Password'
                    },
                    identical: {
                        field: 'password',
                        message: 'Password is not matching with new password'
                    }
                }
            }
        }
    });


});