"use strict";
$(document).ready(function () {

        //Basic
        $('#basic').on('click', function () {
            swal({
                buttonsStyling: false,
                confirmButtonClass: 'btn btn-primary',
                text:'Anyone can use a computer'
            }).catch(swal.noop)
        });

        //A title with a text under
        $('#title').on('click', function () {
            swal({
                buttonsStyling: false,
                confirmButtonClass: 'btn btn-primary',
                title: 'The Internet?',
                text: 'That thing is still around?',
                type: 'question'
            })
        });

        //Success Message
        $('#success').on('click', function () {
            swal(
                {
                    title: 'Good job!',
                    text: 'You clicked the button!',
                    type: 'success',
                    buttonsStyling: false,
                    confirmButtonClass: 'btn btn-primary'
                }
            )
        });

        //Warning Message
        $('#warning').on('click', function () {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger m-l-10',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                swal({
                        buttonsStyling: false,
                        confirmButtonClass: 'btn btn-primary',
                        title: 'Deleted!',
                        text: 'Your file has been deleted.',
                        type: 'success'
                })
            })
        });

        //Parameter
        $('#params').on('click', function () {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger m-l-10',
                buttonsStyling: false
            }).then(function () {
                swal({
                    buttonsStyling: false,
                    confirmButtonClass: 'btn btn-primary',
                    title: 'Deleted!',
                    text: 'Your file has been deleted.',
                    type: 'success'
                })
            }, function (dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                    swal({
                            buttonsStyling: false,
                            confirmButtonClass: 'btn btn-danger',
                            title: 'Cancelled',
                            text: 'Your imaginary file is safe :)',
                            type: 'error'
                        }
                    )
                }
            })
        });

        //Custom Image
        $('#image').on('click', function () {
            swal({
                buttonsStyling: false,
                confirmButtonClass: 'btn btn-primary',
                title: 'Sweet!',
                text: 'Modal with a custom image.',
                imageUrl: 'img/authors/user.jpg',
                imageHeight: 50,
                animation: false
            })
        });

        //Auto Close Timer
        $('#close').on('click', function () {
            swal({
                buttonsStyling: false,
                confirmButtonClass: 'btn btn-primary',
                title: 'Auto close alert!',
                text: 'I will close in 2 seconds.',
                timer: 2000
            }).then(
                function () {
                },
                // handling the promise rejection
                function (dismiss) {
                    if (dismiss === 'timer') {
                        console.log('I was closed by the timer')
                    }
                }
            )
        });

        //custom html alert
        $('#html-alert').on('click', function () {
            swal({
                title: '<i>HTML</i> <u>example</u>',
                type: 'info',
                html: 'You can use <b>bold text</b>, ' +
                '<a href="http://lorvent.com/">links</a> ' +
                'and other HTML tags',
                showCloseButton: true,
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger m-l-10',
                confirmButtonText: '<i class="fa fa-thumbs-up"></i> Great!',
                cancelButtonText: '<i class="fa fa-thumbs-down"></i>'
            })
        });

        //Custom width padding
        $('#padding-width-alert').on('click', function () {
            swal({
                buttonsStyling: false,
                confirmButtonClass: 'btn btn-primary',
                title: 'Custom width, padding, background.',
                width: 600,
                padding: 100,
                background: '#fff url(//subtlepatterns2015.subtlepatterns.netdna-cdn.com/patterns/geometry.png)'
            })
        });

        //Ajax
        $('#ajax-alert').on('click', function () {
            swal({
                title: 'Submit email to run ajax request',
                input: 'email',
                showCancelButton: true,
                confirmButtonText: 'Submit',
                showLoaderOnConfirm: true,
                buttonsStyling: false,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger m-l-10',
                preConfirm: function (email) {
                    return new Promise(function (resolve, reject) {
                        setTimeout(function () {
                            if (email === 'taken@example.com') {
                                reject('This email is already taken.')
                            } else {
                                resolve()
                            }
                        }, 2000)
                    })
                },
                allowOutsideClick: false
            }).then(function (email) {
                swal({
                    buttonsStyling: false,
                    confirmButtonClass: 'btn btn-primary',
                    type: 'success',
                    title: 'Ajax request finished!',
                    html: 'Submitted email: ' + email
                })
            })
        });

        //chaining modal alert
        $('#chaining-alert').on('click', function () {
            swal.setDefaults({
                buttonsStyling: false,
                confirmButtonClass: 'btn btn-primary',
                cancelButtonClass: 'btn btn-danger m-l-10',
                input: 'text',
                confirmButtonText: 'Next &rarr;',
                showCancelButton: true,
                animation: false,
                progressSteps: ['1', '2', '3']
            })

            var steps = [
                {
                    title: 'Question 1',
                    text: 'Chaining swal2 modals is easy'
                },
                'Question 2',
                'Question 3'
            ]

            swal.queue(steps).then(function (result) {
                swal.resetDefaults()
                swal({
                    buttonsStyling: false,
                    confirmButtonClass: 'btn btn-primary',
                    title: 'All done!',
                    html: 'Your answers: <pre>' +
                    JSON.stringify(result) +
                    '</pre>',
                    confirmButtonText: 'Lovely!',
                    showCancelButton: false
                })
            }, function () {
                swal.resetDefaults()
            })
        });

        //Danger
        $('#dynamic-alert').on('click', function () {
            swal.queue([{
                title: 'Your public IP',
                buttonsStyling: false,
                confirmButtonClass: 'btn btn-primary',
                confirmButtonText: 'Show my public IP',
                text: 'Your public IP will be received ' +
                'via AJAX request',
                showLoaderOnConfirm: true,
                preConfirm: function () {
                    return new Promise(function (resolve) {
                        $.get('https://api.ipify.org?format=json')
                            .done(function (data) {
                                swal.insertQueueStep(data.ip)
                                resolve()
                            })
                    })
                }
            }])
        });
});