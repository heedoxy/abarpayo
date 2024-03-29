
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <title>ابرپایو</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="assets/css/swiper.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/fontiran.css">
    <link rel="stylesheet" href="assets/css/fontAswome.css">
    <link rel="stylesheet" href="assets/css/bootstrap-grid.css">
    <script src='assets/js/swiper.js'></script>
    <script src='assets/js/jquery.js'></script>
    <script src='assets/js/fontAwsome.js'></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<?
require_once "functions/database.php";
require_once "const-values.php";
$action = new Action();

if(!isset($_SESSION['MfromValidation'])){
     header("Location: marketer-phone.php");
}

if($action->auth()){
     header('Location: index.php');
}
$title = "ثبت نام";

    if(isset($_POST['submit'])){
        unset($_SESSION['MfromValidation']);
        $first_name = $action->request('first_name');
        $last_name = $action->request('last_name');
        $package_id = $action->request('package_id');
        $national_code = $action->request('national_code');
        $payment_type  = $action->request('payment_type');
        $support_id = 13;
        if(isset($_SESSION['invitation_code'])){
            $reference_id = $_SESSION['invitation_code'];
            $_SESSION['refrence_id']=$reference_id;
            $support_id = $reference_id;
            $isVip = $action->is_vip($reference_id);
            if($isVip){
                $marketer_invitation_score = (int)$action->get_vip_score($reference_id)->score;
            }
            $action->marketer_score_log_add($reference_id,$marketer_invitation_score,9,1);
            $action->marketer_score_edit($reference_id,$marketer_invitation_score,1);
        }else{
            $reference_code = $action->request('reference_code');
            if($reference_code){
                $result = $action->marketer_reference_code($reference_code);
                if(mysqli_num_rows($result)){
                    $reference = $result->fetch_object();
                    $reference_id = $reference->id;
                    $_SESSION['refrence_id']=$reference_id;
                    $support_id = $reference_id;
                    $isVip = $action->is_vip($reference_id);
                    if($isVip){
                        $invitation_score = $action->get_vip_score($reference_id);
                    }
                    $action->marketer_score_log_add($reference_id,$marketer_invitation_score,9,1);
                    $action->marketer_score_edit($reference_id,$marketer_invitation_score,1);
                }
            }
        }
        $phone = $_SESSION['phone'];
        $command = $action->marketer_add($first_name,$last_name,$phone,$package_id,$payment_type,$national_code,$reference_id,$support_id);

        if($command){
            $action->marketer_score_log_add($command,$marketer_register_score,16,1);
            $action->marketer_score_edit($command,$marketer_register_score,1);
            $_SESSION['marketer_id'] = $command;
            $action-> marketer_update_last_login( $_SESSION['marketer_id']);

            $action->log_action(17,2);
            $_SESSION['marketer_access'] = $action->marketer_get($command)->package_id;
            ?>
            <script>
            var id=<?=$command;?>;
            $.ajax({
                    url:'calculat.php',
                    method:'post',
                    data:{id},
                    success:function(data){
                        console.log(id)
                        console.log(data)
                    }
             })
            </script><?
           if($payment_type == 1){
            $action->marketer_change_status($command);
            header("Location: index.php");
           }else{
               $price =  $action->package_get($package_id)->price;
               $discount = $action->package_get($package_id)->discount;
               $final = floatval($price) - floatval($price * $discount/100);
               $_SESSION['marketer_package'] = $final;
                header("Location: marketer-package-request.php");
           }
        }
        if(!isset($_SESSION['refrence_id'])){
            $_SESSION['error']=1;
        }
       
    }

?>


    <div class="background_page">
        <div class="container">
            <div class="center_form">
                <div class="row">
                    <div class="col-md-5 right-form">
                        <div class="form_top">
                        <?if(isset($_SESSION['error'])){?>
                            <div class="modal">
                                <div class="alert alert-fail">
                                    <span class="close_alart">×</span>
                                    <p style="display:inline">
                                        کد وارد شده نامعتبر است!
                                    </p>
                                </div>
                            </div>
                            <script src="assets/js/alert.js"></script>
                        <?unset($_SESSION['error']);}?>
                        <a href="index.php">
                        <img src="assets/images/logo.png">
                       </a>
                            <h4>ثبت نام بازارسازان</h4>
                        </div>
                        
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="first_name">نام</label>
                                <input type="text" name="first_name" placeholder="فقط حروف فارسی" required>
                            </div>
                            <div class="form-group">
                                <label for="last_name">نام خانوادگی</label>
                                <input type="text" name="last_name" placeholder="فقط حروف فارسی" required>
                            </div>
                            <div class="form-group">
                                <label for="national_code">کد ملی</label>
                                <input type="text" name="national_code">
                            </div>
                            <?if(!isset($_SESSION['invitation_code'])){?>
                            <div class="form-group">
                                <label for="reference_code">کد معرف(اختیاری)</label>
                                <input type="text" name="reference_code" >
                            </div>
                            <?}?>
                            <div class="form-group">
                                <label for="package_id">انتخاب محصول</label>
                                
                                <select name="package_id" required>
                                <?
                                $option_result = $action->package_list();
                                while ($option = $option_result->fetch_object()) {
                                    echo '<option value="';
                                    echo $option->id;
                                    echo '"';
                                    if ($option->id == $row->package_id) echo "selected";
                                    echo '>';
                                    if($option->discount){
                                    echo $option->name." | ".$option->price."تومان"." | ".$option->discount."% تخفیف ";
                                    }else{
                                        echo $option->name." | ".$option->price."تومان";
                                    }
                                    echo '</option>';
                                }
                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="payment_type">نحوه پرداخت</label>
                                <select name="payment_type" required>
                                    <option value=1>اعتباری</option>
                                    <option value=2>نقدی</option>
                                </select>
                            </div>
                            <div class="form-group">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick="checkRule()">
                            <label class="form-check-label" for="flexCheckDefault">
                                پذیرش 
                            </label>
                            <a href="rules.php" id="rule-btn" class="show-rules">قوانین و مقررات</a>
                        </div>
                            <input id="signup"  name="submit" type="submit" class="main_btn" value="ثبت خرید">
                            
                        </form>
                    </div>
                    <div class="col-md-7 left-form">
                    <img src="assets/images/Group 494@2x.png">
                    </div>
                </div>
                <p>با ورود یا ثبت نام در ابرپایو <a>شرایط و قوانین </a> را میپذیرید.</p>
            </div>
        </div>
    </div>
    <script>
        function checkRule() {
                document.getElementById("signup").disabled = true;
                var checkBox = document.getElementById("flexCheckDefault");
                if (checkBox.checked == true){
                    document.getElementById("signup").disabled = false;
                } else {
                    document.getElementById("signup").disabled = true;
                }
            }
            checkRule()

    </script>
</body>
</html>