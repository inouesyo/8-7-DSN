<?php
$products = [
  0 => [
    'product_name' => 'みかん',
    'price' => '300',
  ],
  0 => [
    'product_name' => 'りんご',
    'price' => '500',

  ],
  0 => [    
    'product_name' => 'ばなな',
    'price' => '1500',
  ]
];


?>

<html>
<body>
<table border = 1>
  
      <tr>
        <th>商品名</th>
        <th>価格</th>
        <th>個数</th>
        <th>カートに入れる</th>
      </tr>

      <?php foreach ($products as $v ) : ?>
        <form>
            <tr>
                <td>
                  <?php $v['product_name'] ?>
                  <input type ="hidden" name = "product_name" value = " <?php $v['product_name'] ?>" >
                </td>
                <td>
                  <?php $v['price'] ?>
                  <input type ="hidden" name = "price" value = " <?php $v['price'] ?>" >
                </td>
                <td>
                  <input type = "text" name = "kosu" >
                </td>
                <td>
                  <input type = "submit" value = "カートに入れる">
                </td>
            </tr>
        </form>
      <?php endforeach ?>

          
      </tr>

</table>
</body>
<html>