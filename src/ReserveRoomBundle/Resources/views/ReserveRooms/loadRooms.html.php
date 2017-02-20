<?php $view->extend('views/base/base.html.php') ?>

<link rel="stylesheet" href="<?php echo $view['assets']->getUrl('bundles/reserveroom/css/bootstrap.min.css')?>" />
<link rel="stylesheet" href="<?php echo $view['assets']->getUrl('bundles/reserveroom/css/style.css')?>" />


<div class="container-fluid" data-ajax="<?php echo $view['router']->generate('ajax')?>">
    <?php echo $view->render('ReserveRoomBundle:ReserveRooms:alerts.html.php') ?>
    <div class="page-header">
        <h1>Zarezerwuj Pokój Hotelowy:</h1>
    </div>
    <form action="<?php echo $view['router']->generate('add_reservation')?>" method="GET">
        <div class="row">
            <div class="col-lg-3">
                <h3>Wybierz czas rezerwacji:</h3>
                <div class="form-group" id="dateContainer">
                    <label>Data rezerwacji:</label>
                    <input type="date" name="reservationDate" id="date" class="form-control">
                </div>
                <div class="form-group">
                    <label>Liczba dni:</label>
                    <select name="days" class="form-control" id="days">
                        <?php for($i = 1;$i<= 14; $i++): ?>
                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <a href="<?php echo $view['router']->generate('index')?>" class="btn btn-default back-home">Powrót do strony głównej</a>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <?php foreach($rooms as $room): ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="room">
                                <img src="<?php echo $view['assets']->getUrl('img/rooms/'.$room->getImage())?>" alt="" class="img-thumbnail img-responsive">
                                <p>Wolnych miejsc: <b id="free_place_<?php echo $room->getId()?>"><?php echo $room->getPlaceToStore()?></b></p>
                                <button type="submit" class="btn btn-danger" value="<?php echo $room->getId()?>" name="id" id="reserve_room_<?php echo $room->getId()?>">Zarezerwuj pokój</button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        
    
        
    </form>
</div>

<script src="<?php echo $view['assets']->getUrl('bundles/reserveroom/js/modernizr.js')?>"></script>
<script src="<?php echo $view['assets']->getUrl('bundles/reserveroom/js/js-webshim/minified/polyfiller.js')?>"></script>
<script src="<?php echo $view['assets']->getUrl('bundles/reserveroom/js/bootstrap.min.js')?>"></script>
<script src="<?php echo $view['assets']->getUrl('bundles/reserveroom/js/script.js')?>"></script>
