<?php

namespace App\Enums;

enum CategoryEnum: string
{
    case KONSER = 'Konser';
    case STAND_UP_COMEDY = 'Stand Up Comedy';
    case FESTIVAL = 'Festival';
    case PERTANDINGAN = 'Pertandingan';
    case PAMERAN = 'Pameran';
    case SEMINAR = 'Seminar';
    case LAINNYA = 'Lainnya';
}
