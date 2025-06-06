$(function () {
  handleModalsForm();
});

// function form

// handle Modals
function handleModalsForm() {
  const showTable = "show";
  const notShowTable = "not-show";
  const modals = $(".modals-kriteria");
  const modalsDelete = $(".modals-delete");
  const JudulKriteria = $(".judul-kriteria");
  // Kriteria
  $(".tambahKriteria").on("click", function () {
    modals.addClass(showTable);
    modals.removeClass(notShowTable);
    JudulKriteria.text("Tambah Kriteria");
    $("#nama_kriteria").prop("disabled", false);
    $("#bobot_kriteria").prop("disabled", false);
    $("#jenis_kriteria").prop("disabled", false);
    $("#sub_kriteria").prop("disabled", false);
    $("#bobot_subkriteria").prop("disabled", false);
    handleFormTambahKriteria();
    //
  });
  $(".editKriteria").on("click", function () {
    modals.addClass(showTable);
    modals.removeClass(notShowTable);
    JudulKriteria.text("Edit Kriteria");

    $("#sub_kriteria").prop("disabled", true);
    $("#bobot_subkriteria").prop("disabled", true);
    //
    const id = $(this).data("id");
  });
  $(".deleteKriteria").on("click", function () {
    modalsDelete.addClass(showTable);
    modalsDelete.removeClass(notShowTable);
  });

  // Subkriteria
  $(".tambahSubKriteria").on("click", function () {
    modals.addClass(showTable);
    modals.removeClass(notShowTable);
    JudulKriteria.text("Tambah Sub-Kriteria");
    $("#nama_kriteria").prop("disabled", true);
    $("#bobot_kriteria").prop("disabled", true);
    $("#jenis_kriteria").prop("disabled", true);
    //
  });
  $(".editSubKriteria").on("click", function () {
    modals.addClass(showTable);
    modals.removeClass(notShowTable);
    JudulKriteria.text("Edit Sub-Kriteria");
    $("#nama_kriteria").prop("disabled", true);
    $("#bobot_kriteria").prop("disabled", true);
    $("#jenis_kriteria").prop("disabled", true);

    //
    const id = $(this).data("id");
  });
  $(".deleteSubKriteria").on("click", function () {
    modalsDelete.addClass(showTable);
    modalsDelete.removeClass(notShowTable);
  });

  // Close modals
  $(".close-modals").on("click", function () {
    modals.addClass(notShowTable);
    modals.removeClass(showTable);
    modalsDelete.addClass(notShowTable);
    modalsDelete.removeClass(showTable);
  });
}

function handleFormTambahKriteria() {
  $("#form-kriteria").attr(
    "action",
    "http://localhost/takampus/public/Data_Kriteria/tambahKriteria"
  );
  // $("#form-kriteria").on("submit", function (e) {
  //   e.preventDefault();
  //   const newData = $(this).serialize();

  //   $.ajax({
  //     url: "http://localhost/takampus/public/data_kriteria/tambahKriteria",
  //     data: newData,
  //     dataType: "json",
  //     method: "POST",
  //     onSuccess: function (data) {
  //       console.log(data);
  //     },
  //   });
  // });
}
