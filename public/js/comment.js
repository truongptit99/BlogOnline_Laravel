/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/comment.js ***!
  \*********************************/
$('.btn-cmt').click(function (e) {
  e.preventDefault();
  var content = $('#cmt-area').val(),
      post_id = $('#post_id').val(),
      user_id = $('#user_id').val();
  auth_email = $('#auth_email').val();

  if (content == "") {
    alert("Comment is empty!");
  } else {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: '/comments',
      data: {
        'content': content,
        'post_id': post_id,
        'user_id': user_id
      },
      type: "post",
      success: function success() {
        console.log('Create comment successfully!');
        var cmt_count = $('.cmt-count').text();
        cmt_count++;
        $('.cmt-count').text(cmt_count);
        var today = new Date(),
            date = today.getFullYear() + '-' + ("0" + (today.getMonth() + 1)).slice(-2) + '-' + ("0" + today.getDate()).slice(-2) + ' ' + ("0" + today.getHours()).slice(-2) + ':' + ("0" + today.getMinutes()).slice(-2) + ':' + ("0" + today.getSeconds()).slice(-2);
        $('.comment__list').append("<li>\n                        <div class=\"wn__comment\">\n                            <div class=\"thumb\">\n                                <img src=\"/images/anonymous_user.jpg\" alt=\"comment images\">\n                            </div>\n                            <div class=\"content\">\n                                <div class=\"comnt__author d-block d-sm-flex\">\n                                    <span><a href=\"#\">".concat(auth_email, "</a></span>\n                                    <span>").concat(date, "</span>\n                                </div>\n                                <p>").concat(content, "</p>\n                            </div>\n                        </div>\n                    </li>"));
      }
    });
  }
});
$('.edit-cmt').click(function (e) {
  e.preventDefault();
  var cmt_id = $(this).attr('id');
  $('#' + cmt_id + '.cmt-display').hide();
  $('#' + cmt_id + '.form-edit-cmt').show();
});
$('.btn-cancel-edit-cmt').click(function (e) {
  e.preventDefault();
  var cmt_id = $(this).attr('id');
  $('#' + cmt_id + '.cmt-display').show();
  $('#' + cmt_id + '.form-edit-cmt').hide();
});
$('.btn-save-edit-cmt').click(function (e) {
  e.preventDefault();
  var cmt_id = $(this).attr('id'),
      cmt_content = $('#' + cmt_id + '.cmt-content').val(),
      cmt_email = $('#' + cmt_id + '.cmt-email').text(),
      post_id = $('#post_id').val(),
      user_id = $('#user_id').val();
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    url: '/comments/' + cmt_id,
    data: {
      'content': cmt_content,
      'post_id': post_id,
      'user_id': user_id
    },
    type: 'put',
    success: function success() {
      console.log('Update comment successfully!');
      var today = new Date(),
          date = today.getFullYear() + '-' + ("0" + (today.getMonth() + 1)).slice(-2) + '-' + ("0" + today.getDate()).slice(-2) + ' ' + ("0" + today.getHours()).slice(-2) + ':' + ("0" + today.getMinutes()).slice(-2) + ':' + ("0" + today.getSeconds()).slice(-2);
      $('#' + cmt_id + '.form-edit-cmt').hide();
      $('#' + cmt_id + '.cmt-content-edited').append("<div class=\"thumb\">\n                    <img src=\"/images/anonymous_user.jpg\" alt=\"comment images\">\n                </div>\n                <div class=\"content\">\n                    <div class=\"comnt__author d-block d-sm-flex\">\n                        <span><a href=\"#\">".concat(cmt_email, "</a></span>\n                        <span>").concat(date, "</span>\n                    </div>\n                    <p>").concat(cmt_content, "</p>\n                </div>"));
    }
  });
});
$('.delete-cmt').click(function (e) {
  e.preventDefault();
  var cmt_id = $(this).attr('id');

  if (confirm('Are you sure to want to delete?')) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: '/comments/' + cmt_id,
      type: 'delete',
      success: function success() {
        console.log('Delete comment success!');
        $('#' + cmt_id + '.cmt-display').remove();
        var cmt_count = $('.cmt-count').text();
        cmt_count--;
        $('.cmt-count').text(cmt_count);
      }
    });
  }
});
/******/ })()
;