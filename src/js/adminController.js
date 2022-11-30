(() => {
  const cardUser = document.getElementById("cardUser");
  const cardHotel = document.getElementById("cardHotel");

  cardUser.addEventListener("click", () => {
    window.location.href = "../../public/admin/user_list.php";
  });

  cardHotel.addEventListener("click", () => {
    window.location.href = "../../public/admin/hotel_list.php";
  });
})();
