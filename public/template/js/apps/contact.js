$(function () {
  function checkall(clickchk, relChkbox) {
    var checker = $("#" + clickchk);
    var multichk = $("." + relChkbox);

    checker.click(function () {
      multichk.prop("checked", $(this).prop("checked"));
      $(".show-btn").toggle();
    });
  }

  checkall("contact-check-all", "contact-chkbox");

  $("#input-search").on("keyup", function () {
    var rex = new RegExp($(this).val(), "i");
    $(".search-table .search-items:not(.header-item)").hide();
    $(".search-table .search-items:not(.header-item)")
      .filter(function () {
        return rex.test($(this).text());
      })
      .show();
  });

  $("#btn-add-contact").on("click", function (event) {
    $("#addContactModal #btn-add").show();
    $("#addContactModal #btn-edit").hide();
    $("#addContactModal").modal("show");
  });

  function deleteContact() {
    $(".delete").on("click", function (event) {
      event.preventDefault();
      /* Act on the event */
      $(this).parents(".search-items").remove();
    });
  }

  function addContact() {
    $("#btn-add").click(function () {
      var getParent = $(this).parents(".modal-content");

      var $_name = getParent.find("#c-name");
      var $_email = getParent.find("#c-email");
      var $_occupation = getParent.find("#c-occupation");
      var $_phone = getParent.find("#c-phone");
      var $_location = getParent.find("#c-location");

      var $_getValidationField =
        document.getElementsByClassName("validation-text");
      var reg = /^.+@[^\.].*\.[a-z]{2,}$/;
      var phoneReg = /^\d*\.?\d*$/;

      var $_nameValue = $_name.val();
      var $_emailValue = $_email.val();
      var $_occupationValue = $_occupation.val();
      var $_phoneValue = $_phone.val();
      var $_locationValue = $_location.val();

      if ($_nameValue == "") {
        $_getValidationField[0].innerHTML = "Name must be filled out";
        $_getValidationField[0].style.display = "block";
      } else {
        $_getValidationField[0].style.display = "none";
      }

      if ($_emailValue == "") {
        $_getValidationField[1].innerHTML = "Email Id must be filled out";
        $_getValidationField[1].style.display = "block";
      } else if (reg.test($_emailValue) == false) {
        $_getValidationField[1].innerHTML = "Invalid Email";
        $_getValidationField[1].style.display = "block";
      } else {
        $_getValidationField[1].style.display = "none";
      }

      if ($_phoneValue == "") {
        $_getValidationField[2].innerHTML = "Invalid (Enter 10 Digits)";
        $_getValidationField[2].style.display = "block";
      } else if (phoneReg.test($_phoneValue) == false) {
        $_getValidationField[2].innerHTML = "Please Enter A numeric value";
        $_getValidationField[2].style.display = "block";
      } else {
        $_getValidationField[2].style.display = "none";
      }

      if (
        $_nameValue == "" ||
        $_emailValue == "" ||
        reg.test($_emailValue) == false ||
        $_phoneValue == "" ||
        phoneReg.test($_phoneValue) == false
      ) {
        return false;
      }

      var today = new Date();
      var dd = String(today.getDate()).padStart(2, "0");
      var mm = String(today.getMonth()); //January is 0!
      var time = String(today.getTime());
      var yyyy = today.getFullYear();
      var monthNames = [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec",
      ];
      today = dd + " " + monthNames[mm] + " " + yyyy;
      var cdate = dd + mm + time;

      $html =
        '<tr class="search-items">' +
        "<td>" +
        '<div class="n-chk align-self-center text-center">' +
        '<div class="form-check">' +
        '<input type="checkbox" class="form-check-input contact-chkbox primary" id="' +
        cdate +
        '">' +
        '<label class="form-check-label" for="' +
        cdate +
        '"></label>' +
        "</div>" +
        "</div>" +
        "</td>" +
        "<td>" +
        '<div class="d-flex align-items-center">' +
        '<img src="../assets/images/profile/user-2.jpg" alt="avatar" class="rounded-circle" width="35">' +
        '<div class="ms-3">' +
        '<div class="user-meta-info">' +
        '<h6 class="user-name mb-0" data-name=' +
        $_nameValue +
        ">" +
        $_nameValue +
        "</h6>" +
        '<span class="user-work fs-3" data-occupation=' +
        $_occupationValue +
        ">" +
        $_occupationValue +
        "</span>" +
        "</div>" +
        "</div>" +
        "</div>" +
        "</td>" +
        "<td>" +
        '<span class="usr-email-addr" data-email=' +
        $_emailValue +
        ">" +
        $_emailValue +
        "</span>" +
        "</td>" +
        "<td>" +
        '<span class="usr-location" data-location=' +
        $_locationValue +
        ">" +
        $_locationValue +
        "</span>" +
        "</td>" +
        "<td>" +
        '<span class="usr-ph-no" data-phone=' +
        $_phoneValue +
        ">" +
        $_phoneValue +
        "</span>" +
        "</td>" +
        "<td>" +
        '<div class="action-btn">' +
        '<a href="javascript:void(0)" class="text-primari edit"><i class="ti ti-eye fs-5"></i></a>' +
        '<a href="javascript:void(0)" class="text-dark delete ms-2"><i class="ti ti-trash fs-5"></i></a>' +
        "</div>" +
        "</td>" +
        "</tr>";

      $(".search-table > tbody >tr:first").before($html);
      $("#addContactModal").modal("hide");

      var $_setNameValueEmpty = $_name.val("");
      var $_setEmailValueEmpty = $_email.val("");
      var $_setOccupationValueEmpty = $_occupation.val("");
      var $_setPhoneValueEmpty = $_phone.val("");
      var $_setLocationValueEmpty = $_location.val("");

      deleteContact();
      editContact();
      editKriteria();
      checkall("contact-check-all", "contact-chkbox");
    });
  }

  $("#addContactModal").on("hidden.bs.modal", function (e) {
    var $_name = document.getElementById("c-name");
    var $_email = document.getElementById("c-email");
    var $_occupation = document.getElementById("c-occupation");
    var $_phone = document.getElementById("c-phone");
    var $_location = document.getElementById("c-location");
    var $_getValidationField =
      document.getElementsByClassName("validation-text");

    var $_setNameValueEmpty = ($_name.value = "");
    var $_setEmailValueEmpty = ($_email.value = "");
    var $_setOccupationValueEmpty = ($_occupation.value = "");
    var $_setPhoneValueEmpty = ($_phone.value = "");
    var $_setLocationValueEmpty = ($_location.value = "");

    for (var i = 0; i < $_getValidationField.length; i++) {
      e.preventDefault();
      $_getValidationField[i].style.display = "none";
    }
  });

  function editContact() {
    $(".btn-edit").on("click", function (event) {
      event.preventDefault();

      // Sembunyikan tombol add dan tampilkan tombol edit
      $("#editContactModal #btn-add").hide();
      $("#editContactModal #btn-edit").show();

      // Dapatkan baris tabel tempat tombol edit diklik
      var row = $(this).closest("tr");

      // Ambil data dari kolom-kolom tabel
      var namaBantuan = row.find("td:eq(1)").text(); // Nama Bantuan
      var besarBantuan = row.find("td:eq(2)").text(); // Besar Bantuan
      var satuan = row.find("td:eq(3)").text(); // Satuan
      var keterangan = row.find("td:eq(4)").text(); // Keterangan

      // Dapatkan elemen input di modal
      var modal = $("#editContactModal");
      var $namaInput = modal.find("#edit-nama_bantuan");
      var $besarInput = modal.find("#edit-besar_bantuan");
      var $satuanInput = modal.find("#edit-satuan");
      var $keteranganInput = modal.find("#edit-keterangan");

      // Isi nilai ke input modal
      $namaInput.val(namaBantuan);
      $besarInput.val(besarBantuan);
      $satuanInput.val(satuan);
      $keteranganInput.val(keterangan);

      // Set action form dengan ID yang sesuai (dari route di tombol)
      var editUrl = $(this).attr('href');
      $("#editContactForm").attr('action', editUrl.replace('edit', 'update'));

      // Tampilkan modal
      $("#editContactModal").modal("show");
    });

    // Handle submit edit
    $("#btn-edit").on("click", function (e) {
      e.preventDefault();

      // Submit form secara manual
      $("#editContactForm").submit();
    });
  }
  function editKriteria() {
    $(".btn-edit").on("click", function (event) {
      event.preventDefault();

      // Sembunyikan tombol add dan tampilkan tombol edit
      $("#editKriteriaModal #btn-add").hide();
      $("#editKriteriaModal #btn-edit").show();

      // Dapatkan baris tabel tempat tombol edit diklik
      var row = $(this).closest("tr");

      // Ambil data dari kolom-kolom tabel
      var kodeKriteria = row.find("td:eq(1)").text(); // Kode Kriteria
      var namaKriteria = row.find("td:eq(2)").text(); // Nama Kriteria
      var bobotKriteria = row.find("td:eq(3)").text(); // Besar Kriteria
      var jenis = row.find("td:eq(4)").text(); // jenis

      // Dapatkan elemen input di modal
      var modal = $("#editKriteriaModal");
      var $kodeInput = modal.find("#edit-kode_kriteria");
      var $namaInput = modal.find("#edit-nama_kriteria");
      var $bobotInput = modal.find("#edit-bobot");
      var $jenisInput = modal.find("#edit-jenis");

      // Isi nilai ke input modal
      $kodeInput.val(kodeKriteria);
      $namaInput.val(namaKriteria);
      $bobotInput.val(bobotKriteria);
      $jenisInput.val(jenis);

      // Set action form dengan ID yang sesuai (dari route di tombol)
      var editUrl = $(this).attr('href');
      $("#editKriteriaForm").attr('action', editUrl.replace('edit', 'update'));

      // Tampilkan modal
      $("#editKriteriaModal").modal("show");
    });

    // Handle submit edit
    $("#btn-edit").on("click", function (e) {
      e.preventDefault();

      // Submit form secara manual
      $("#editKriteriaForm").submit();
    });
  }

  // Panggil fungsi saat document ready
  $(document).ready(function () {
    editContact();
    editKriteria();
  });

  $(".delete-multiple").on("click", function () {
    var inboxCheckboxParents = $(".contact-chkbox:checked").parents(
      ".search-items"
    );
    inboxCheckboxParents.remove();
  });

  deleteContact();
  addContact();
  editContact();
  editKriteria();
});

// Validation Process

var $_getValidationField = document.getElementsByClassName("validation-text");
var reg = /^.+@[^\.].*\.[a-z]{2,}$/;
var phoneReg = /^\d{10}$/;

getNameInput = document.getElementById("c-name");

getNameInput.addEventListener("input", function () {
  getNameInputValue = this.value;

  if (getNameInputValue == "") {
    $_getValidationField[0].innerHTML = "Name Required";
    $_getValidationField[0].style.display = "block";
  } else {
    $_getValidationField[0].style.display = "none";
  }
});

getEmailInput = document.getElementById("c-email");

getEmailInput.addEventListener("input", function () {
  getEmailInputValue = this.value;

  if (getEmailInputValue == "") {
    $_getValidationField[1].innerHTML = "Email Required";
    $_getValidationField[1].style.display = "block";
  } else if (reg.test(getEmailInputValue) == false) {
    $_getValidationField[1].innerHTML = "Invalid Email";
    $_getValidationField[1].style.display = "block";
  } else {
    $_getValidationField[1].style.display = "none";
  }
});

getPhoneInput = document.getElementById("c-phone");

getPhoneInput.addEventListener("input", function () {
  getPhoneInputValue = this.value;

  if (getPhoneInputValue == "") {
    $_getValidationField[2].innerHTML = "Phone Number Required";
    $_getValidationField[2].style.display = "block";
  } else if (phoneReg.test(getPhoneInputValue) == false) {
    $_getValidationField[2].innerHTML = "Invalid (Enter 10 Digits)";
    $_getValidationField[2].style.display = "block";
  } else {
    $_getValidationField[2].style.display = "none";
  }
});
