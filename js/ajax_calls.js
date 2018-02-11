//displaying all articles for search criteria
$(document).ready(function(){

load_data();

function load_data(query) {
    $.ajax({
        url:"http://news.lenuson.com/admin/fetch_article",
        method:"POST",
        data:{query:query},
        success:function(data) {
            $('.result').html(data);
        }
    });
}

  $('#art_search').keyup(function() {

      var search = $(this).val();

      if(search != ''){
          load_data(search);
      } else {
          load_data();
      }
  });

});


//displaying all users for search criteria
$(document).ready(function(){

load_user();

function load_user(user) {
    $.ajax({
        url:"http://news.lenuson.com/admin/fetch_user",
        method:"POST",
        data:{user:user},
        success:function(data) {
            $('.user_result').html(data);
        }
    });
}

  $('#usr_search').keyup(function() {

      var searche = $(this).val();

      if(searche != ''){
          load_user(searche);
      } else {
          load_user();
      }
  });

});



//displaying all categories for search criteria
$(document).ready(function(){

load_cat();

function load_cat(cat) {
    $.ajax({
        url:"http://news.lenuson.com/admin/fetch_categories",
        method:"POST",
        data:{cat:cat},
        success:function(data) {
            $('.categories_result').html(data);
        }
    });
}

  $('#cat_search').keyup(function() {

      var search = $(this).val();

      if(search != ''){
          load_cat(search);
      } else {
          load_cat();
      }
  });

});


//displaying all comments for search criteria
$(document).ready(function(){

load_comm();

function load_comm(comm) {
    $.ajax({
        url:"http://news.lenuson.com/admin/fetch_comments",
        method:"POST",
        data:{comm:comm},
        success:function(data) {
            $('.comments_result').html(data);
        }
    });
}

  $('#comm_search').keyup(function() {

      var search = $(this).val();

      if(search != ''){
          load_comm(search);
      } else {
          load_comm();
      }
  });

});