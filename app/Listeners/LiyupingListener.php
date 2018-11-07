<?php

namespace App\Listeners;

use App\Events\LiyupingEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\OrderItem;

class LiyupingListener implements ShouldQueue
{

  use InteractsWithQueue;
  public function handle(LiyupingEvent $event)
  {
      // 从事件对象中取出对应的订单

      $order = $event->order;
      // 预加载商品数据
      $order->load('items.product');
      // 循环遍历订单的商品
      foreach ($order->items as $item) {
          $product   = $item->product;
          // 计算对应商品的销量
          $soldCount = OrderItem::query()
              ->where('product_id', $product->id)
              ->whereHas('order', function ($query) {
                  $query->whereNotNull('payment_no');  // 关联的订单状态是已支付
              })->sum('amount');
          // 更新商品销量
          $product->update([
              'sold_count' => $soldCount,
          ]);
      }
  }

}
