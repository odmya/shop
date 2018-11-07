<?php

namespace App\Listeners;

use App\Events\OrderConfirmationEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\OrderConfirmNotifications;

use App\Models\OrderItem;

class OrderConfirmationListener implements ShouldQueue
{

  use InteractsWithQueue;
  public function handle(OrderConfirmationEvent $event)
  {
      // 从事件对象中取出对应的订单

      $order = $event->order;
      // 发送确认邮件
      $order->notify(new OrderConfirmNotifications());
  }

}
