<div class="edit_profile_div">

<div class="profile_header">
    <div class="profile_heade_inn">
        <div class="profile_header_img_2"><img src="assets/images/Path 710.svg"></div></div>
        
</div>
<div class="row profile_title">
<div class="add_cart_part">

    <a href="?wallet" class="profile_title_icon"><img src="assets/images/006-right-arrow.svg"></a>
    <h3 style="width: 50%;float: right;">کارت های من</h3>
    <a href="?add-cart"class="main_btn wallet_btn add_card">افزودن کارت</a>

    </div>

    
    
    <img src="assets/images/Group 465.svg">
  
    
</div>
<div class="profile_left">

    <div class="wallet_table">
        
        <table>
        <?
            if($action->user()){
                $carts = $action->user_get_cart();
            }else if($action -> marketer()){
                $carts = $action->marketer_cart_list($id);
            }
            while($cart = $carts->fetch_object()){
        ?>  
                <tr>
                    <td><?= $cart->title ?></td>
                    <td><?= $action->bank_get($cart->bank_id)->name ?></td>
                    <td><?= $cart->cart_number?></td>
                    <td><a href="?add-cart&id=<?= $cart->id ?>"><i class="fa fa-pencil-square-o"></a></i></td>
                </tr>
        <?
            }
        ?>    
            
        </table> 
    </div>
</div>
</div>
            
       