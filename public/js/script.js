$("#select_all").change(function () {
  $(".check").prop("checked", $(this).prop("checked"));
});
$(".check").change(function () {
  if ($(this).prop("checked") == false) {
    $("#select_all").prop("checked", false);
  }
  if ($(".check:checked").length == $(".check").length) {
    $("#select_all").prop("checked", true);
  }
});

function tambah() {
  var checked = document.getElementsByName("checked[]");
  var hasChecked = false;
  for (var i = 0; i < checked.length; i++) {
    if (checked[i].checked) {
      hasChecked = true;
      break;
    }
  }
  if (hasChecked == false) {
    alert("Tolong centang salah satu");
    return false;
  } else {
    const conf = confirm("Apakah anda yakin ?");
    document.proses.action = 'asdasint';
    document.proses.submit();
  }
}