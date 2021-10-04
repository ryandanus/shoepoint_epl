<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('insert into status values (?, ?, ?, ?, ?)', [1, 'Order Placed', 'Pesanan telah dibuat dan sedang menunggu pembayaran.', NULL, NULL]);
        DB::insert('insert into status values (?, ?, ?, ?, ?)', [2, 'Payment Confirmed', 'Pesanan telah dibayar dan akan segera diproses.', NULL, NULL]);
        DB::insert('insert into status values (?, ?, ?, ?, ?)', [3, 'Cleaning Process', 'Pesanan sedang dalam proses pengerjaan.', NULL, NULL]);
        DB::insert('insert into status values (?, ?, ?, ?, ?)', [4, 'Cleaning Finished', 'Pesanan sudah selesai dikerjakan dan siap untuk dikirim.', NULL, NULL]);
        DB::insert('insert into status values (?, ?, ?, ?, ?)', [5, 'Delivery Process', 'Pesanan sedang dalam proses pengiriman.', NULL, NULL]);
        DB::insert('insert into status values (?, ?, ?, ?, ?)', [6, 'Order Finished', 'Pesanan sudah selesai.', NULL, NULL]);
    }
}
