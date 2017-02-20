<?php $view->extend('views/base/base.html.php') ?>

<link rel="stylesheet" href="<?php echo $view['assets']->getUrl('bundles/reserveroom/css/bootstrap.min.css')?>" />
<link rel="stylesheet" href="<?php echo $view['assets']->getUrl('bundles/reserveroom/css/style.css')?>" />


<div class="container" data-ajax="<?php echo $view['router']->generate('ajax')?>">
    <?php echo $view->render('ReserveRoomBundle:ReserveRooms:alerts.html.php') ?>
    <div class="page-header">
        <h1>Zarezerwuj pokój:</h1>
    </div>
    <div class="room-to-reserve">
        <img src="<?php echo $view['assets']->getUrl('img/rooms/'.$room->getImage())?>" alt="" class="img-thumbnail">
    </div>
    
    <h3>Dane rezerwacji:</h3>
    <form action="<?php echo $view['router']->generate('add_reservation',array("id"=>$view['request']->getParameter('id'),"reservationDate"=>$view['request']->getParameter('reservationDate'),"days"=>$view['request']->getParameter('days')))?>" method="POST">
        <div class="form-group">
            <label>Data rezerwacji:</label>
            <input type="text" name="reservation[reservationFrom]" class="form-control" value="<?php echo $view['request']->getParameter('reservationDate')?>">
        </div>
        <div class="form-group">
            <label>Liczba dni:</label>
            <input type="text" name="reservation[days]"  class="form-control" value="<?php echo $view['request']->getParameter('days')?>">
        </div>
        <div class="form-group">
            <label>Imię:</label>
            <input type="text" name="reservation[name]" class="form-control" placeholder="Wprowadź imię rezerwującego">
        </div>
        <div class="form-group">
            <label>Nazwisko:</label>
            <input type="text" name="reservation[surname]" class="form-control" placeholder="Wprowadź nazwisko rezerwującego">
        </div>
        <div class="form-group">
            <label>Numer telefonu:</label>
            <input type="text" name="reservation[phone]" class="form-control" placeholder="Numer telefonu w postaci 111222333"> 
        </div>
        <div class="form-group">
            <label>Liczba osób:</label>
            <select name="reservation[ammountOfPeople]" class="form-control">
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
        </div>
        <button type="submit" class="btn btn-danger">Zarezerwuj pokój</button>
        <a href="<?php echo $view['router']->generate('load_rooms')?>" class="btn btn-default back-home">Powrót</a>
    </form>
    
</div>