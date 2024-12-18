<?php

namespace App\Enums;

enum CategoryEnum: string
{
    case KONSER = 'Konser';
    case FESTIVAL = 'Festival';
    case PERTANDINGAN = 'Pertandingan';
    case PAMERAN = 'Pameran';
    case WORKSHOP = 'Workshop';
    case SEMINAR = 'Seminar';
    case LAINNYA = 'Lainnya';
}
