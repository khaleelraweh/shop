<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderTransaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    const NEW_ORDER = 0;
    const PAYMENT_COMPLETED = 1;
    const UNDER_PROCESS = 2;
    const FINISHED = 3;
    const REJECTED = 4;
    const CANCELED = 5;
    const REFUNDED_REQUEST = 6;
    const RETURNED = 7;
    const REFUNDED = 8;
 

    public function order():BelongsTo{
        return $this->belongsTo(Order::class);
    }

    public function status($transaction_number = null){

        $transaction = $transaction_number != '' ? $transaction_number :$this->transaction;

        // switch ($transaction ) {
        //     case 0: $result = 'New order'; break;
        //     case 1: $result = 'Paid'; break;
        //     case 2: $result = 'Under process'; break;
        //     case 3: $result = 'Finished'; break;
        //     case 4: $result = 'Rejected'; break;
        //     case 5: $result = 'Canceled'; break;
        //     case 6: $result = 'Refund requested'; break;
        //     case 7: $result = 'Returned order'; break;
        //     case 8: $result = 'Refunded'; break;

        // }

        switch ($transaction ) {
            case 0: $result = 'طلب جديد'; break;
            case 1: $result = 'تم الدفع'; break;
            case 2: $result = 'تحت المعالجة'; break;
            case 3: $result = 'انتهي'; break;
            case 4: $result = 'مرفوض'; break;
            case 5: $result = 'ملغي'; break;
            case 6: $result = 'طلب الاستعادة'; break;
            case 7: $result = 'تم اعادة الطلب'; break;
            case 8: $result = 'تم استعادة المنتج'; break;

        }
        return $result;
    } 
    
}
