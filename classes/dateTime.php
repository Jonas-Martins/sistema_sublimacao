<?php
class dateTime {
    function dateNow() {
        $data = new DateTime();
        $data->setTimezone(new DateTimeZone('America/Sao_Paulo'));
        return $data->format('d/m/Y');
    }
}
