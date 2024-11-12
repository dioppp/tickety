<?php

namespace App\Enums;

enum CategoryEnum: string
{
    case Konser = 'Konser';
    case Festival = 'Festival';
    case Pertandingan = 'Pertandingan';
    case Pameran = 'Pameran';
    case Workshop = 'Workshop';
    case Seminar = 'Seminar';
    case Lainnya = 'Lainnya';
}
