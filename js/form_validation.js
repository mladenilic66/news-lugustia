// strip inputs from html tags
function strip_tags(input) {
   var reg_ex = /(<([^>]+)>)/ig;
   return input.replace(reg_ex, "");
}


// login/register forms input validation
$(document).ready(function() {
    
    $("#username_r_error").hide();
    $("#first_name_r_error").hide();
    $("#last_name_r_error").hide();
    $("#password_r_error").hide();
    $("#password_rpt_r_error").hide();
    $("#email_r_error").hide();

    var username_r_er = false;
    var first_name_r_er = false;
    var last_name_r_er = false;
    var password_r_er = false;
    var password_rpt_r_er = false;
    var email_r_er = false;

    $("#username_r").focusout(function() {
        valid_username_r();
    });

    $("#first_name_r").focusout(function() {
        valid_first_name_r();
    });

    $("#last_name_r").focusout(function() {
        valid_last_name_r();
    });

    $("#password_r").focusout(function() {
        valid_password_r();
    });

    $("#password_rpt_r").focusout(function() {
        valid_password_rpt_r();
    });

    $("#email_r").focusout(function() {
        valid_email_r();
    });

    function valid_username_r() {

        var username_r = $("#username_r").val();
        var username_r = strip_tags(username_r);
        var username_r = username_r.length;

        if(username_r < 3) {
            $("#username_r_error").html("Minimum 3 characters");
            $("#username_r_error").show();
            username_r_er = true;
        } else {
            $("#username_r_error").hide();
        }
    }

    function valid_password_r() {

        var password_r = $("#password_r").val();
        var password_r = password_r.length;

        if(password_r < 8) {
            $("#password_r_error").html("Minimum 8 characters");
            $("#password_r_error").show();
            password_r_er = true;
        } else if(password_r > 30) {
            $("#password_r_error").html("Maximum 30 characters");
            $("#password_r_error").show();
            password_r_er = true;
        } else {
            $("#password_r_error").hide();
        }
    }
    
    function valid_password_rpt_r() {

        var password_r = $("#password_r").val();
        var password_rpt_r = $("#password_rpt_r").val();

        if(password_rpt_r != password_r) {
            $("#password_rpt_r_error").html("Passwords do not match");
            $("#password_rpt_r_error").show();
            password_rpt_r_er = true;
        } else {
            $("#password_rpt_r_error").hide();
        }
    }

    function valid_first_name_r() {

        var first_name_r = $("#first_name_r").val();
        var first_name_r = strip_tags(first_name_r);
        var first_name_r = first_name_r.length;

        if(first_name_r < 1) {
            $("#first_name_r_error").html("Should not be empty");
            $("#first_name_r_error").show();
            first_name_r_er = true;
        } else {
            $("#first_name_r_error").hide();
        }
    }

    function valid_last_name_r() {

        var last_name_r = $("#last_name_r").val();
        var last_name_r = strip_tags(last_name_r);
        var last_name_r = last_name_r.length;

        if(last_name_r < 1) {
            $("#last_name_r_error").html("Should not be empty");
            $("#last_name_r_error").show();
            last_name_r_er = true;
        } else {
            $("#last_name_r_error").hide();
        }
    }

    function valid_email_r() {

        var email_r = $("#email_r").val();
        var email_r_reg_ex = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
    
        if(email_r_reg_ex.test(email_r)) {
            $("#email_r_error").hide();
            $("#email_r").removeClass("error_outline");
        } else {
            $("#email_r_error").html("Invalid email address");
            $("#email_r_error").show();
            $("#email_r").addClass("error_outline");
            email_r_er = true;
        }
    }

    $("#register_form").submit(function() {

        username_r_er = false;
        first_name_r_er = false;
        last_name_r_er = false;
        password_r_er = false;
        password_rpt_r_er = false;
        email_r_er = false;

        valid_username_r();
        valid_first_name_r();
        valid_last_name_r();
        valid_password_r();
        valid_password_rpt_r();
        valid_email_r();

        if(username_r_er == false && email_r_er == false && first_name_r_er == false && last_name_r_er == false && password_r_er == false && password_rpt_r_er == false) {
            return true;
        } else {
            return false;
        }
    });
});




//admin add user forms input validation
$(document).ready(function() {
    
    $("#username_a_error").hide();
    $("#first_name_a_error").hide();
    $("#last_name_a_error").hide();
    $("#password_a_error").hide();
    $("#password_rpt_a_error").hide();
    $("#email_a_error").hide();

    var username_a_er = false;
    var first_name_a_er = false;
    var last_name_a_er = false;
    var password_a_er = false;
    var password_rpt_a_er = false;
    var email_a_er = false;

    $("#username_a").focusout(function() {
        valid_username_a();
    });

    $("#first_name_a").focusout(function() {
        valid_first_name_a();
    });

    $("#last_name_a").focusout(function() {
        valid_last_name_a();
    });

    $("#password_a").focusout(function() {
        valid_password_a();
    });

    $("#password_rpt_a").focusout(function() {
        valid_password_rpt_a();
    });

    $("#email_a").focusout(function() {
        valid_email_a();
    });

    function valid_username_a() {

        var username_a = $("#username_a").val();
        var username_a = strip_tags(username_a);
        var username_a = username_a.length;

        if(username_a < 3) {
            $("#username_a_error").html("Minimum 3 characters");
            $("#username_a_error").show();
            $("#username_a").addClass("form_errors_border");
            username_a_er = true;
        } else {
            $("#username_a").removeClass("form_errors_border");
            $("#username_a_error").hide();
        }
    }

    function valid_email_a() {

        var email_a = $("#email_a").val();
        var email_a_reg_ex = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
    
        if(email_a_reg_ex.test(email_a)) {
            $("#email_a_error").hide();
            $("#email_a").removeClass("form_errors_border");
        } else {
            $("#email_a_error").html("Invalid email address");
            $("#email_a_error").show();
            $("#email_a").addClass("form_errors_border");
            email_a_er = true;
        }
    }

    function valid_password_a() {

        var password_a = $("#password_a").val();
        var password_a = password_a.length;

        if(password_a < 8) {
            $("#password_a_error").html("Minimum 8 characters");
            $("#password_a_error").show();
            $("#password_a").addClass("form_errors_border");
            password_a_er = true;
        } else if(password_a > 30) {
            $("#password_a_error").html("Maximum 30 characters");
            $("#password_a_error").show();
            $("#password_a").addClass("form_errors_border");
            password_a_er = true;
        } else {
            $("#password_a").removeClass("form_errors_border");
            $("#password_a_error").hide();
        }
    }
    
    function valid_password_rpt_a() {

        var password_a = $("#password_a").val();
        var password_rpt_a = $("#password_rpt_a").val();

        if(password_rpt_a != password_a) {
            $("#password_rpt_a_error").html("Passwords do not match");
            $("#password_rpt_a_error").show();
            $("#password_rpt_a").addClass("form_errors_border");
            password_rpt_a_er = true;
        } else {
            $("#password_rpt_a").removeClass("form_errors_border");
            $("#password_rpt_a_error").hide();
        }
    }

    function valid_first_name_a() {

        var first_name_a = $("#first_name_a").val();
        var first_name_a = strip_tags(first_name_a);
        var first_name_a = first_name_a.length;

        if(first_name_a < 1) {
            $("#first_name_a_error").html("Should not be empty");
            $("#first_name_a_error").show();
            $("#first_name_a").addClass("form_errors_border");
            first_name_a_er = true;
        } else {
            $("#first_name_a").removeClass("form_errors_border");
            $("#first_name_a_error").hide();
        }
    }

    function valid_last_name_a() {

        var last_name_a = $("#last_name_a").val();
        var last_name_a = strip_tags(last_name_a);
        var last_name_a = last_name_a.length;

        if(last_name_a < 1) {
            $("#last_name_a_error").html("Should not be empty");
            $("#last_name_a_error").show();
            $("#last_name_a").addClass("form_errors_border");
            last_name_a_er = true;
        } else {
            $("#last_name_a").removeClass("form_errors_border");
            $("#last_name_a_error").hide();
        }
    }
    

    $("#add_user_form").submit(function() {

        username_a_er = false;
        first_name_a_er = false;
        last_name_a_er = false;
        password_a_er = false;
        password_rpt_a_er = false;
        email_a_er = false;

        valid_username_a();
        valid_first_name_a();
        valid_last_name_a();
        valid_password_a();
        valid_password_rpt_a();
        valid_email_a();

        if(username_a_er == false && email_a_er == false && first_name_a_er == false && last_name_a_er == false && password_a_er == false && password_rpt_a_er == false) {
            return true;
        } else {
            return false;
        }
    });
});

//admin add category form input validation
$(document).ready(function() {
    
    $("#category_error").hide();
    var category_er = false;

    $("#category").focusout(function() {
        valid_category();
    });

    function valid_category() {

        var category = $("#category").val();
        var category = strip_tags(category);
        var category = category.length;

        if(category < 1) {
            $("#category_error").html("Should not be empty");
            $("#category_error").show();
            $("#category").addClass("form_errors_border");
            category_er = true;
        } else {
            $("#category").removeClass("form_errors_border");
            $("#category_error").hide();
        }
    }
    

    $("#add_category_form").submit(function() {

        category_er = false;
        valid_category();

        if(category_er == false) {
            return true;
        } else {
            return false;
        }
    });
});

//admin add article form input validation
$(document).ready(function() {
    
    $("#add_article_error").hide();
    var article_title_er = false;

    $("#title").focusout(function() {
        valid_article_title();
    });

    function valid_article_title() {

        var article = $("#title").val();
        var article = strip_tags(article);
        var article = article.length;

        if(article < 1) {
            $("#add_article_error").html("Should not be empty");
            $("#add_article_error").show();
            $("#title").addClass("form_errors_border");
            article_title_er = true;
        } else {
            $("#title").removeClass("form_errors_border");
            $("#add_article_error").hide();
        }
    }
    

    $("#article_edit_form").submit(function() {

        article_title_er = false;
        valid_article_title();

        if(article_title_er == false) {
            return true;
        } else {
            return false;
        }
    });
});



//admin edit comments form input validation
$(document).ready(function() {
    
    $("#comment_error").hide();
    var comment_er = false;

    $("#comment").focusout(function() {
        valid_comment();
    });

    function valid_comment() {

        var comment = $("#comment").val();
        var comment = strip_tags(comment);
        var comment = comment.length;

        if(comment < 1) {
            $("#comment_error").html("Should not be empty");
            $("#comment_error").show();
            $("#comment").addClass("form_errors_border");
            comment_er = true;
        } else {
            $("#comment").removeClass("form_errors_border");
            $("#comment_error").hide();
        }
    }
    

    $("#comment_edit_form").submit(function() {

        comment_er = false;
        valid_comment();

        if(comment_er == false) {
            return true;
        } else {
            return false;
        }
    });
});