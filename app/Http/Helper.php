 <?php

    use App\Models\Notifications;
    use App\Models\Products;
    use App\Models\SellEvent;
    use App\Models\User;
    use Carbon\Carbon;
    use Illuminate\Support\Arr;
    use Illuminate\Support\Facades\DB;
    use SebastianBergmann\Diff\Diff;

    function calcul($products_ids)
    {
        // $products = Products::find(1);
        // $date1 = $products->updated_at;

        $refill = User::find(1);
        $date2 = $refill->product_refill_at;
        //dd($date1);

        $value = DB::table('sell_events')
            ->select('sell_events.*')
            ->join('products', 'products.id', '=', 'sell_events.product_id')
            ->whereIn('sell_events.product_id', array_keys($products_ids))
            ->where('sold_at', '>=', $date2)
            ->get();
        //dd($value);
        return $value;
    }

    function countQuantiy(array $arrays)
    {
        $count = 0;
        foreach ($arrays as $keys => $value) {
            $count += $value;
        }
        return $count;
    }

    function alertQuantity($product_id)
    {
        $quantityA = 0;
        $message = '';
        $product = Products::find($product_id);
        $value = DB::table('sell_events')
            ->select('sell_events.*')
            ->where('product_id', $product_id)
            ->get();
        $quantityA = $value->sum('quantity');

        $restant = $product->quantity_init - $quantityA;

        if ($restant <= 20) {
            $message = 'le produit est en quantité insuffisante';
        }

        if ($restant <= 0) {
            $message = 'le produit est fini en stock';
        }
        /**if($message!='')
        {Notifications::create([
            'message' => $message,
            'product_id' => $product_id,
        ]);}*/

        return $message;
    }

    function alertExpiration(Products $item)
    {
        $quantityA = 0;
        $message = '';

        $expirationDate = $item->expiration_date;
        $depotDate = $item->created_at;
        $datework = Carbon::parse($expirationDate);
        $depotDate = Carbon::parse($depotDate);
        $now = Carbon::now();
        //$diff = $now->diffForHumans($datework);
        $diff = $now->diffInDays($datework);
        $result = $now->gt($datework);
        $result1 = $now->eq($datework);
        //calcul du pourcentage de progression
        $percentTime = 0;
        $totalTime = $depotDate->diffInDays($datework);
        $cal = $now->diffInDays($depotDate);

        $percentTime = intval(($cal * 100) / $totalTime);
        //verification de la date de peremption
        if ($result1) {
            $diff = $now->diffForHumans($datework) . ' peremption';
            $diff = array($diff, 'message' => 'le produit ' . $item->name . 'a atteint la date d\'expiration');
            $diff = array($diff, 'percent' => $percentTime);
            $message = 'le produit ' . $item->name . ' a atteint la date d\'expiration';
        } elseif ($result) {
            $diff = $now->diffForHumans($datework) . ' peremption';
            $diff = array($diff, 'message' => 'le produit ' . $item->name . ' a dépassée la date d\'expiration');
            $diff = array($diff, 'percent' => 100);
            $message = 'le produit' . $item->name . ' a dépassée la date d\'expiration';
        } elseif ($now->lt($datework) && $now->diffInDays($datework) <= 3 && $now->diffInDays($datework) > 0) {
            $diff = 0;
            $diff = array($diff, 'message' => 'warning it\'s stay ' . $now->diffForHumans($datework) . ' peremption of '  . $item->name);
            $diff = array($diff, 'percent' => $percentTime);
            $message = 'warning it\'s stay ' . $now->diffForHumans($datework) . ' peremption';
        } else {
            $diff = $now->diffForHumans($datework) . ' peremption';
            $diff = array($diff, 'message' => '.');
            $diff = array($diff, 'percent' => $percentTime);
        }

        return $diff;
    }

    function googleLineGraph()
    {
        $product = Products::get();
        $size = count($product);
        $result = array();

        $products = SellEvent::distinct()->get(['product_id']);
        $tab[] = ['month'];
        for ($i = 1; $i < 13; $i++) {
            $tab[] = [date("F", mktime(0, 0, 0, $i, 10)),];
        }

        foreach ($products as $p) {
            $data = DB::table('products')
                ->select('products.name as name')
                ->where('id', $p->product_id)
                ->get();
            foreach ($data as $value) {
                $tab[0][] = $value->name;
            }

            $sumMP = SellEvent::select(
                DB::raw("(SUM(quantity)) as quantity"),
                DB::raw("MONTH(sold_at) as month_name")
            )
                ->whereYear('sold_at', date('Y'))
                ->where('product_id', $p->product_id)
                ->orderBy('sold_at', 'ASC')
                ->groupBy(DB::raw("MONTH(sold_at)"))
                ->pluck('quantity', 'month_name');

            for ($i = 1; $i < 13; $i++) {
                isset($sumMP[$i]) ? $tab[$i][] = (int)$sumMP[$i] : $tab[$i][] = 0;
            }
        }
        return $tab;
    }