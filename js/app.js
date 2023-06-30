$(window).scroll(function () {
  var pixel = $(window).scrollTop();
  if (pixel >= 300) {
    $('.global-nav').addClass('fixed-menu');
    $('#header').addClass('fixed-header');
    // $('.global-nav').addClass('h-100');
    $('.back-to-top').addClass('d-block');
  } else {
    $('.global-nav').removeClass('fixed-menu');
    $('#header').removeClass('fixed-header');
    // $('.global-nav').removeClass('h-100');
    $('.back-to-top').removeClass('d-block');
  }
});

$(document).ready(function () {
  var hide_navbar = localStorage.getItem("hide_navbar");
  if (hide_navbar == 1) {
    $(".list-form").addClass("tranf-100");
    $(".click-list-0").addClass("w-click-0");
    $(".click-list-100").addClass("w-click-100");
  }
  if ($('#content').length) {
    $('#content').summernote({
      placeholder: 'Nội dung',
      tabsize: 2,
      height: 150
    });
  }

  $(".close-list").click(function () {
    $(".list-form").toggleClass("tranf-100");
    $(".click-list-0").toggleClass("w-click-0");
    $(".click-list-100").toggleClass("w-click-100");
    if ($(".click-list-0").hasClass('w-click-0')) {
      localStorage.setItem("hide_navbar", 1);
    } else {
      localStorage.setItem("hide_navbar", 0);
    }
  });

  $(".icon-navbar").click(function () {
    $(".navbar-show").toggleClass("tranform-tranlate-0");
  });

  $(".eye2").click(function () {
    $(".re-eye__1").toggleClass("d-none-eye");
    $(".re-eye__2").toggleClass("d-block-eye");
  });
  $(".eye").click(function () {
    $(".eye__1").toggleClass("d-none-eye");
    $(".eye__2").toggleClass("d-block-eye");
  });

  if ($('#demoForm').length) {
    $("#demoForm").validate({
      onfocusout: false,
      onkeyup: false,
      onclick: false,
      rules: {
        "title": {
          required: true,
          maxlength: 255
        },
        "desc": {
          required: true,
        },
        "content": {
          required: true,
        },
        "image": {
          required: true,
        },
      }
    });
  }
  $("#form-login").validate({
    onfocusout: false,
    onkeyup: false,
    onclick: false,
    rules: {
      "email": {
        required: true,
        minlength: 5,
      },
      "password": {
        required: true,
        minlength: 5,
      },
    },
    messages: {
      "email": {
        required: "Nhập Email",
        minlength: "Nhập tối thiểu 5 kí tự",
      },
      "password": {
        required: "Nhập password",
        minlength: "Nhập tối thiểu 5 kí tự",
      },
    }
  });
  $("#form-register").validate({
    onfocusout: false,
    onkeyup: false,
    onclick: false,
    rules: {
      "name": {
        required: true,
        minlength: 5,
      },
      "email": {
        required: true,
        minlength: 5,
      },
      "password": {
        required: true,
        minlength: 5,
      },
      "re-password": {
        equalTo: "#input-password",
        minlength: 5,
      },
    },
    messages: {
      "name": {
        required: "Nhập Name",
        minlength: "Nhập tối thiểu 5 kí tự",
      },
      "email": {
        required: "Nhập Email",
        minlength: "Nhập tối thiểu 5 kí tự",
      },
      "password": {
        required: "Nhập Password",
        minlength: "Nhập tối thiểu 5 kí tự",
      },
      "re-password": {
        required: "Nhập Re-Password",
        minlength: "Nhập tối thiểu 5 kí tự",
      },
    }
  });
});


function deleteRows() {
  // Get all the checkboxes that are checked
  var checkboxes = $(".selected-table:checked");
  // Create an array to store the row indexes
  var indexes = [];
  // Iterate over the checkboxes and get the corresponding row indexes
  checkboxes.each(function () {
    // var row = $(this).closest("tr");
    // var index = row.index();
    indexes.push($(this).val());
  });
  location.href = '/php/delete?id[]=' + indexes;
}
function icon_navbar_Function(x) {
  x.classList.toggle("change");
}

function myFunction() {
  var x = document.getElementById("input-password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
function myFunction2() {
  var x = document.getElementById("re-password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

$('.modal').on('show.bs.modal', function (event) {
  $(this).find('iframe').attr("src", $(event.relatedTarget).data('url'));
});

$('.modal').on('hidden.bs.modal', function (e) {
  $(this).find('iframe').attr("src", "");
});