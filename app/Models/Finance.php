<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public static function getDetail() {
        $pemasukan = self::where('ref', 'Pemasukan')->sum('nominal');
        $pengeluaran = self::where('ref', 'Pengeluaran')->sum('nominal');

        $total = $pemasukan - $pengeluaran;
        $finance = [
            'pemasukan' => $pemasukan,
            'pengeluaran' => $pengeluaran,
            'total' => $total,
        ];
        return collect($finance);
    }

    public static function addFromPayment($payment, $price) {
        $data = [
            'ref' => 'Pemasukan',
            'nominal' => $price,
            'desc' => "Payment from #$payment->payment_ref",
            'created_at' => now(),
            'updated_at' => now(),
        ];

        return self::insert($data);
    }
}
