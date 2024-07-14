$(document).ready(function() {
    $('.right-bar-desktop .btn-menu-bar').click(function() {
        $('.right-bar-desktop').toggleClass('active');
        $('.right-bar-desktop .content-right-bar').toggleClass('active');
        $('.right-bar-desktop .all-links .link span').toggleClass('active');
        $('.right-bar-desktop .content-right-bar .link-menu').toggleClass('active');
    })
    $('.right-bar-desktop .content-right-bar .link-menu').click(function() {
        $('.right-bar-desktop').addClass('active');
        $('.right-bar-desktop .content-right-bar').addClass('active');
        $('.right-bar-desktop .all-links .link span').removeClass('active');
        $('.right-bar-desktop .content-right-bar .link-menu').removeClass('active');
    })

    $('.top-bar-page .btn-menu-mobile').click(function() {
        $('.right-bar-mobile').addClass('active');
        $('.right-bar-mobile .overlay').addClass('active');
    })
    $('.right-bar-mobile .overlay').click(function() {
        $('.right-bar-mobile').removeClass('active');
        $('.right-bar-mobile .overlay').removeClass('active');
    })
    $('.right-bar-mobile .btn-menu-bar').click(function() {
        $('.right-bar-mobile').removeClass('active');
        $('.right-bar-mobile .overlay').removeClass('active');

    })
    $('.table-requests .check-all').on('change', function() {
        if ($(this).is(":checked")) {
            $('.table-requests .form-check-input').prop('checked', true);
        } else {
            $('.table-requests .form-check-input').prop('checked', false);
        }
    });
    $(".togglePassword").click(function(e) {
        e.preventDefault();
        var type = $(this).siblings('.password').attr("type");
        console.log(type);
        if (type == "password") {
            $(this).find('i').removeClass("fa fa-eye-slash");
            $(this).find('i').addClass("fa fa-eye");
            $(this).siblings('.password').attr("type", "text");
        } else if (type == "text") {
            $(this).find('i').removeClass("fa fa-eye");
            $(this).find('i').addClass("fa fa-eye-slash");
            $(this).siblings('.password').attr("type", "password");
        }
    });

    /*
     $('.type-registration .type').on('click', function() {
         $(this).addClass('active');
         $(this).parent().siblings().find('.type').removeClass('active');
         console.log($(this).parent().siblings().find('.type'));
     })
     */

    $('#trainer').on('click', function() {
        $(this).addClass('active');
        $('#company').removeClass('active');
        $('#student').removeClass('active');

        //alert("asad trainr");
        $(".reg").attr("data-bs-target", "#TrainerModal");
    })

    $('#company').on('click', function() {
        $(this).addClass('active');
        $('#trainer').removeClass('active');
        $('#student').removeClass('active');
        //alert("asad company");
        $(".reg").attr("data-bs-target", "#CompanyModal");

    })

    $('#student').on('click', function() {
        $(this).addClass('active');
        $('#trainer').removeClass('active');
        $('#company').removeClass('active');

        //alert("asad company");
        $(".reg").attr("data-bs-target", "#StudentModal");

    })
});