$(function () {
  const showTable = "fixed top-0 left-0 z-10";
  const modals = $(".modals-kriteria");
  const ButtonModals = $(".showKriteria");
  const JudulKriteria = $(".judul-kriteria");
  ButtonModals.on("click", function () {
    modals.toggleClass(showTable);
    JudulKriteria.text("Tambah Kriteria");
  });
});
