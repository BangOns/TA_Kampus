$(function () {
  const showTable = "show";
  const notShowTable = "not-show";
  const modals = $(".modals-kriteria");
  const ButtonOpenModals = $(".showKriteria");
  const ButtonCloseModals = $(".close-modals");
  const JudulKriteria = $(".judul-kriteria");
  ButtonOpenModals.on("click", function () {
    modals.addClass(showTable);
    modals.removeClass(notShowTable);
    JudulKriteria.text("Tambah Kriteria");
  });
  ButtonCloseModals.on("click", function () {
    modals.addClass(notShowTable);
    modals.removeClass(showTable);
  });
});
