const API_URL = "http://localhost/takampus/public/data_kriteria";

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

    handleFormEditKriteria(id);
  });
  $(".deleteKriteria").on("click", function () {
    modalsDelete.addClass(showTable);
    modalsDelete.removeClass(notShowTable);
    const id = $(this).data("id");

    handleFormDeleteKriteria(id);
  });

  // Subkriteria
  $(".tambahSubKriteria").on("click", function () {
    modals.addClass(showTable);
    modals.removeClass(notShowTable);
    JudulKriteria.text("Tambah Sub-Kriteria");
    $("#kriteria").prop("disabled", true);
    $("#bobot_kriteria").prop("disabled", true);
    $("#jenis_kriteria").prop("disabled", true);
    //
    const id = $(this).data("id");

    handleGetDataKriteriaById(id);

    handleFormTambahSubKriteria(id);
  });
  $(".editSubKriteria").on("click", function () {
    modals.addClass(showTable);
    modals.removeClass(notShowTable);
    JudulKriteria.text("Edit Sub-Kriteria");
    $("#kriteria").prop("disabled", true);
    $("#bobot_kriteria").prop("disabled", true);
    $("#jenis_kriteria").prop("disabled", true);
    //
    const id = $(this).data("id");
    const id_subkriteria = $(this).data("id_subkriteria");
    handleGetDataKriteriaById(id);
    handleGetDataSubKriteriaById(id_subkriteria);
    handleFormEditSubKriteria(id_subkriteria);
  });
  $(".editSubkriteriaMobile").on("click", function () {
    modals.addClass(showTable);
    modals.removeClass(notShowTable);
    JudulKriteria.text("Edit Sub-Kriteria");
    $("#kriteria").prop("disabled", true);
    $("#bobot_kriteria").prop("disabled", true);
    $("#jenis_kriteria").prop("disabled", true);
    //
    const id = $(this).data("id");
    const id_subkriteria = $(this).data("id_subkriteria");
    handleGetDataKriteriaById(id);
    handleGetDataSubKriteriaById(id_subkriteria);
    handleFormEditSubKriteria(id_subkriteria);
  });
  $(".deleteSubKriteria").on("click", function () {
    modalsDelete.addClass(showTable);
    modalsDelete.removeClass(notShowTable);
    const id_subkriteria = $(this).data("id_subkriteria");
    handleFormDeleteSubKriteria(id_subkriteria);
  });

  // Close modals
  $(".close-modals").on("click", function () {
    modals.addClass(notShowTable);
    modals.removeClass(showTable);
    modalsDelete.addClass(notShowTable);
    modalsDelete.removeClass(showTable);
    $("#kriteria").prop("disabled", false);
    $("#bobot_kriteria").prop("disabled", false);
    $("#jenis_kriteria").prop("disabled", false);
    $("#sub_kriteria").prop("disabled", false);
    $("#bobot_subkriteria").prop("disabled", false);
  });
}
function handleGetDataKriteriaById(id) {
  $.ajax({
    url: `${API_URL}/getDataKriteriaId`,
    method: "POST",
    data: { id },
    dataType: "json",
    success: function (data) {
      if (data) {
        $("#kriteria").val(data.kriteria);
        $("#bobot_kriteria").val(data.bobot_kriteria);
        $("#jenis_kriteria").val(data.jenis_kriteria);
      } else {
        alert("Data tidak ditemukan.");
      }
    },
    error: function (xhr, status, error) {
      console.error("Error fetching data:", error);
      alert("Terjadi kesalahan saat mengambil data kriteria.");
    },
  });
}
function handleFormTambahKriteria() {
  $("#form-kriteria").attr("action", `${API_URL}/tambahKriteria`);
}

function handleFormEditKriteria(id) {
  $("#form-kriteria").attr("action", `${API_URL}/editKriteriaById/${id}`);
  handleGetDataKriteriaById(id);
}
function handleFormDeleteKriteria(id) {
  $("#form-delete-kriteria").attr(
    "action",
    `${API_URL}/deleteKriteriaById/${id}`
  );
}

// Subkriteria
function handleGetDataSubKriteriaById(id) {
  $.ajax({
    url: `${API_URL}/getDataSubKriteriaId`,
    method: "POST",
    data: { id },
    dataType: "json",
    success: function (data) {
      if (data) {
        $("#sub_kriteria").val(data.sub_kriteria);
        $("#bobot_subkriteria").val(data.bobot_subkriteria);
      } else {
        alert("Data tidak ditemukan.");
      }
    },
    error: function (xhr, status, error) {
      alert("Terjadi kesalahan saat mengambil data sub kriteria.");
    },
  });
}
function handleFormTambahSubKriteria(id) {
  $("#form-kriteria").attr("action", `${API_URL}/tambahSubKriteria/${id}`);
}
function handleFormEditSubKriteria(id_subkriteria) {
  $("#form-kriteria").attr(
    "action",
    `${API_URL}/editSubKriteria/${id_subkriteria}`
  );
}
function handleFormDeleteSubKriteria(id) {
  $("#form-delete-kriteria").attr(
    "action",
    `${API_URL}/deleteSubKriteriaById/${id}`
  );
}
