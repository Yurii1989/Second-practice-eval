<?php

namespace Model;


class Factory
{
    public function getCarInstance($array)
    {
        return new Car($array['brand'], $array['type'], $array['horsepower'], $array['driverId']);
    }
    public function getLorryInstance($array)
    {
        return new Lorry($array['brand'], $array['type'], $array['horsepower'], $array['payload'], $array['driverId']);
    }
}