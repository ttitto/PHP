<?php
function __autoload($className)
{
    $path = "/$className" . ".class.php";
    require_once($path);
}
use classes\Guest;
use classes\SingleRoom;
use classes\Reservation;
use classes\BookingManager;
use classes\Apartment;
use classes\Bedroom;

$guestNakov = new Guest("Svetlin", "Nakov", 8003224277);
$guestPesho = new Guest("Pesho", "Peshev", 9867453422);
$guestMisho = new Guest("Misho", "Mishev", 2345678910);
$guestGosho = new Guest("Gosho", "Georgiev", 8529637415);

$reservation = new Reservation(strtotime("24.10.2014"), strtotime("26.10.2014"), $guestNakov);
$reservationPesho1358 = new Reservation(strtotime("22.10.2014"), strtotime("23.10.2014"), $guestPesho);
$resMisho5677 = new Reservation(strtotime("22.10.2014"), strtotime("26.10.2014"), $guestMisho);
$resGosho5677 = new Reservation(strtotime("20.10.2014"), strtotime("21.10.2014"), $guestGosho);

$room1408 = new SingleRoom(1408, 99);
$room1358 = new SingleRoom(1358, 89);

$apt1234 = new Apartment(1234, 226);
$apt2345 = new Apartment(2345, 268);

$bed5677 = new Bedroom(5677, 189);
$bed2355 = new Bedroom(2355, 249);

BookingManager::bookRoom($room1408, $reservation);
BookingManager:: bookRoom($room1358, $reservationPesho1358);
BookingManager::bookRoom($bed5677, $resMisho5677);
BookingManager::bookRoom($bed5677, $resGosho5677);

$rooms = [$room1358, $room1408, $apt1234, $apt2345, $bed2355, $bed5677];
echo "<hr>Cheaper Bedrooms or Apartments<hr>";

$cheapBedRoomsAndAppartments = array_filter($rooms,
    function ($r) {
        return ($r instanceof classes\Apartment || $r instanceof classes\Bedroom) && $r->getPrice() <= 250;
    });

foreach ($cheapBedRoomsAndAppartments as $cheap) {
    echo $cheap->__toString();
}

echo "<hr>All with balcony<hr>";
$withBalcony = array_filter($rooms,
    function ($r){
        return $r->getHasBalcony();
    });

foreach($withBalcony as $room) {
    echo $room->__toString();
}

echo "<hr>All with bathhub<hr>";

$withBathtub = array_filter($rooms,
    function ($r){
        return in_array("bathtub", $r->getExtras());
    });

foreach($withBathtub as $room) {
    echo $room->__toString();
}