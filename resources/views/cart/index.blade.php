@extends('layouts.app')

@section('title', '购物车')

@section('content')
<div class="container">
<div class="row">
<div class="col-sm-12 col-xs-12">
<div class="panel panel-default">
  <div class="panel-body">
    @if (count($errors) > 0)
      <div class="alert alert-danger">
        <h4>有错误发生：</h4>
        <ul>
          @foreach ($errors->all() as $error)
            <li><i class="glyphicon glyphicon-remove"></i> {{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <div class="row">
        <div class="col-xs-12 col-sm-3"><p class="navbar-text">我的购物车</p></div>
        <div class="col-xs-12 col-sm-9">
          <form action="{{ route('cart.index') }}" class="curreny-form navbar-right">
            <div class="form-group form-group-sm">
              <label>Show price in:</label>
                 <select name="curreny" class="form-control">
                   @foreach ($currenies  as $curreny)
                     <option value="{{$curreny->code}}" @if ($default_curreny->code == $curreny->code) selected @endif >{{$curreny->code}} - {{$curreny->title}}</option>
                   @endforeach

                </select>
            </div>
          </form>
        </div>
    </div>
    <table class="table table-striped table-hover">
      <thead>
      <tr>
        <th><input type="checkbox" id="select-all"></th>
        <th>商品信息</th>
        <th>单价</th>
        <th>数量</th>
        <th>操作</th>
      </tr>
      </thead>
      <tbody class="product_list">
      @foreach($cartItems as $item)
        <tr data-id="{{ $item->rawId() }}">
          <td>
            <input type="checkbox" name="select" value="{{ $item->id }}">
          </td>
          <td >
            <a target="_blank" href="{{ route('products.show', [$item->id]) }}">{{ $item->name }}</a>
          </td>
          <td><span class="price">{{$default_curreny->code }} {{$default_curreny->symbol_left }} {{ number_format($item->price *  $default_curreny->value,2)}} {{$default_curreny->symbol_right }}</span></td>
          <td class="col-xs-2">

            <div class="input-group">
              <span class="input-group-btn">
                <button class="btn btn-default btn_sub" type="button">-</button>
              </span>
              <input type="text" class="form-control" name="amount" value="{{ $item->qty }}">
              <span class="input-group-btn">
                <button class="btn btn-default btn_add" type="button">+</button>
              </span>
            </div>


          </td>
          <td>
            <button class="btn btn-xs btn-danger btn-remove">移除</button>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
<div class="navbar-right">Total: {{$default_curreny->code }} {{$default_curreny->symbol_left }}  {{$total_price}} {{$default_curreny->symbol_right }}</div>
<div class="row">
        <div class="col-xs-11">
          <form  class="navbar-form navbar-right payment-checkout " role="form" id="order-form" action="{{ route('payment.checkout') }}" method="post">
            <div class="form-group">
              <label>Email: </label>
              <input type="text" name="email" class="form-control input-sm " placeholder="Email">
              <input type="hidden" name="curreny" value="{{$default_curreny->code}}">
            </div>
            <a href="#"><img  src="{{ URL::asset('uploads/images/checkout-logo-medium.png') }}" class="paypal"></a>
          </form>
        </div>
</div>

  </div>
</div>
</div>
</div>
</div>
@section('scriptsAfterJs')
<script>
  $(document).ready(function () {


$('.paypal').click(function () {
  $('.payment-checkout').submit();
});

    $('.curreny-form select[name=curreny]').on('change', function() {
      $('.curreny-form').submit();
    });


$('.btn_sub').click(function () {

  var id = $(this).closest('tr').data('id');
  axios.post('{{ route('cart.subcart') }}', {
    rawid: id,
  }).then(function() {
    location.reload();
  });
});

$('.btn_add').click(function () {

  var id = $(this).closest('tr').data('id');

  axios.post('{{ route('cart.updatecart') }}', {
    rawid: id,
  }).then(function() {
    location.reload();
  });
});


    // 监听 移除 按钮的点击事件
    $('.btn-remove').click(function () {
      // $(this) 可以获取到当前点击的 移除 按钮的 jQuery 对象
      // closest() 方法可以获取到匹配选择器的第一个祖先元素，在这里就是当前点击的 移除 按钮之上的 <tr> 标签
      // data('id') 方法可以获取到我们之前设置的 data-id 属性的值，也就是对应的 SKU id
      var id = $(this).closest('tr').data('id');
      swal({
        title: "确认要将该商品移除？",
        icon: "warning",
        buttons: ['取消', '确定'],
        dangerMode: true,
      })
      .then(function(willDelete) {
        // 用户点击 确定 按钮，willDelete 的值就会是 true，否则为 false
        if (!willDelete) {
          return;
        }
        axios.post('{{ route('cart.deletecart') }}', {
          rawid: id,
        }).then(function() {
          location.reload();
        });

      });
    });

    $('#select-all').change(function() {
      // 获取单选框的选中状态
      // prop() 方法可以知道标签中是否包含某个属性，当单选框被勾选时，对应的标签就会新增一个 checked 的属性
      var checked = $(this).prop('checked');
      // 获取所有 name=select 并且不带有 disabled 属性的勾选框
      // 对于已经下架的商品我们不希望对应的勾选框会被选中，因此我们需要加上 :not([disabled]) 这个条件
      $('input[name=select][type=checkbox]:not([disabled])').each(function() {
        // 将其勾选状态设为与目标单选框一致
        $(this).prop('checked', checked);
      });
    });



    // 监听创建订单按钮的点击事件
        $('.btn-create-order').click(function () {
          // 构建请求参数，将用户选择的地址的 id 和备注内容写入请求参数
          var req = {
            email: $('#order-form').find('select[name=email]').val(),
            items: [],
            remark: $('#order-form').find('textarea[name=remark]').val(),
          };
          // 遍历 <table> 标签内所有带有 data-id 属性的 <tr> 标签，也就是每一个购物车中的商品 SKU
          $('table tr[data-id]').each(function () {
            // 获取当前行的单选框
            var $checkbox = $(this).find('input[name=select][type=checkbox]');
            // 如果单选框被禁用或者没有被选中则跳过
            if ($checkbox.prop('disabled') || !$checkbox.prop('checked')) {
              return;
            }
            // 获取当前行中数量输入框
            var $input = $(this).find('input[name=amount]');
            // 如果用户将数量设为 0 或者不是一个数字，则也跳过
            if ($input.val() == 0 || isNaN($input.val())) {
              return;
            }
            // 把 SKU id 和数量存入请求参数数组中
            req.items.push({
              sku_id: $(this).data('id'),
              amount: $input.val(),
            })
          });
          axios.post('{{ route('orders.store') }}', req)
            .then(function (response) {
              swal('订单提交成功', '', 'success');
            }, function (error) {
              if (error.response.status === 422) {
                // http 状态码为 422 代表用户输入校验失败
                var html = '<div>';
                _.each(error.response.data.errors, function (errors) {
                  _.each(errors, function (error) {
                    html += error+'<br>';
                  })
                });
                html += '</div>';
                swal({content: $(html)[0], icon: 'error'})
              } else {
                // 其他情况应该是系统挂了
                swal('系统错误', '', 'error');
              }
            });
        });


  });
</script>
@endsection

@endsection
